<?php
namespace App\Services\Restrict;

use App\Entity\App\AppOrderHead;
use App\Entity\App\AppOrderLines;
use App\Entity\User;
use App\Entity\AppProduct;
use App\Repository\ProductRepository;
use App\Services\BaseService;
use App\Repository\OrderheadRepository;
use App\Repository\OrderlinesRepository;
use App\Repository\UserRepository;
use App\Services\Email\OrderPurchaseEmailService;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Component\Word;

class OrderService extends BaseService
{
    private UserRepository $userRepository;
    private OrderheadRepository $orderheadRepository;
    private OrderlinesRepository $orderlinesRepository;
    private Security $security;
    private ProductRepository $productRepository;
    private UserPasswordEncoderInterface $encoder;
    private OrderPurchaseEmailService $emailService;
    private array $password;

    public function __construct(OrderheadRepository $orderheadRepository,
                                OrderlinesRepository $orderlinesRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                UserPasswordEncoderInterface $encoder,
                                OrderPurchaseEmailService $emailService,
                                Security $security)
    {
        $this->orderheadRepository = $orderheadRepository;
        $this->orderlinesRepository = $orderlinesRepository;
        $this->userRepository = $userRepository;
        $this->security = $security;
        $this->productRepository = $productRepository;
        $this->encoder = $encoder;
        $this->emailService = $emailService;
        $this->password = [];
    }

    private function _get_password(User $ouser): array
    {
        $word = (new Word())->get_password();
        $arpassword = [
            "word"    =>$word,
            "password"=>$this->encoder->encodePassword($ouser,$word)
        ];
        $this->logd($arpassword,"password");
        return $arpassword;
    }

    private function _save_user($aruser): ?User
    {
        $email = strtolower($aruser["email"]);
        $email = trim($email);
        $aruser["email"] = $email;

        $ouser = $this->userRepository->findOneByEmail($email);

        if(!$ouser) {
            $ouser = new User();
            $ouser->setInsertUser("self");
            $ouser->setInsertPlatform($this->get_platform());
            $this->password = $this->_get_password($ouser);
            $ouser->setPassword($this->password["password"]);
            $this->logd(self::getUuid(),"uuid");
            $ouser->setCodeCache(self::getUuid());
        }
        $ouser->setUpdateUser("self");
        $ouser->setUpdatePlatform($this->get_platform());
        $ouser->setUpdateDate(new \DateTime());
        $ouser->setAddress($aruser["address"]);
        $ouser->setEmail($aruser["email"]);
        $ouser->setPhone($aruser["phone"]);
        $ouser->setFullname($aruser["fullname"]);
        $ouser->setIdProfile(5);
        $ouser->setPhone($aruser["phone"]);
        $this->userRepository->save($ouser);
        //$this->logd($ouser,"ouser after saved");
        return $ouser;
    }

    private function _save_header($arorder,User $ouser):AppOrderHead
    {
        $oorderh = new AppOrderHead();
        if($ouser->getId()) {
            $oorderh->setInsertUser($ouser->getId());
            $oorderh->setInsertPlatform($this->get_platform());
            $oorderh->setUpdateUser($ouser->getId());
            $oorderh->setUpdatePlatform($this->get_platform());
            $oorderh->setUpdateDate(new \DateTime());

            $oorderh->setAddress($ouser->getAddress());
            $oorderh->setIdUser($ouser->getId());
            $oorderh->setNotes($arorder["notes"]);
            $oorderh->setStatus("pending");
            $oorderh->setDatePurchase(new \DateTime());
            $oorderh->setCodeCache(self::getUuid());
            $this->orderheadRepository->save($oorderh);
        }
        return $oorderh;
    }

    private function _save_lines($arorder, AppOrderHead $oorderh): array
    {
        $arlines = [];
        if($oorderh->getId()) {
            $products = $arorder["products"] ?? [];

            foreach ($products as $k => $product) {

                //$oproduct = new AppProduct();
                //$oproduct->setId($product["id"]);
                $oproduct = $this->productRepository->findOneById($product["id"]);

                $oorderl = new AppOrderLines();
                //claves
                $oorderl->setIdOrderHead($oorderh->getId());
                $oorderl->setIdProduct($product["id"]);

                $imaxline = $this->orderlinesRepository->getMaxNumline($oorderl);
                $oorderl->setLinenum($imaxline+10);

                //sistema
                $oorderl->setInsertUser($oorderh->getIdUser());
                $oorderl->setInsertPlatform($this->get_platform());
                $oorderl->setUpdateUser($oorderh->getIdUser());
                $oorderl->setUpdatePlatform($this->get_platform());
                $oorderl->setUpdateDate(new \DateTime());

                $oorderl->setPrice($oproduct->getPriceSale());
                $oorderl->setPrice1($oproduct->getPriceSale1());
                $oorderl->setPrice2($oproduct->getPriceSale2());
                $description = "%s-%s-%s %s";
                $description = sprintf($description,$oorderh->getId(),$imaxline,$oproduct->getId(), $oproduct->getDescription());
                $oorderl->setDescription($description);
                $oorderl->setProduct($oproduct->getDescription());
                $oorderl->setUnits((int)$product["units"]);
                $oorderl->setTaxPercent($oproduct->getTaxPercent());
                $oorderl->setTotal((int)$product["units"] * $oproduct->getPriceSale());
                $oorderl->setTotal1((int)$product["units"] * $oproduct->getPriceSale1());
                $oorderl->setTotal2((int)$product["units"] * $oproduct->getPriceSale2());
                $oorderl->setIdUser($oproduct->getIdUser());
                $this->orderlinesRepository->save($oorderl);

                $arlines[] = $oorderl;
            }//foreach
        }// if(orderh)
        return $arlines;
    }
    private function _send_email(User $ouser, AppOrderHead $oorderh, array $arlines)
    {
        $this->emailService->set_user($ouser);
        $this->emailService->set_order_head($oorderh);
        $this->emailService->set_order_lines($arlines);
        $this->emailService->send();
    }

    public function purchase($aruser, $aroder) : ?AppOrderHead
    {
        try {
            $ouser = $this->_save_user($aruser);
            $oheaderh = $this->_save_header($aroder,$ouser);
            $arlines = $this->_save_lines($aroder,$oheaderh);
            $totals = $this->orderlinesRepository->getSumTotals($oheaderh->getId());
            $oheaderh->setTotal($totals["total"]);
            $oheaderh->setTotal1($totals["total1"]);
            $oheaderh->setTotal2($totals["total2"]);
            $this->orderheadRepository->save($oheaderh);
            $this->_send_email($ouser,$oheaderh,$arlines);
            //return new AppOrderHead(); //prueba de error
            return $oheaderh;
        }
        catch (\Exception $e)
        {
            $this->logd($e->getMessage(),"ERROR on purchase");
            $this->logd($aruser,"aruser");
            $this->logd($aroder,"arorder");
            return new AppOrderHead();
        }
    }
}