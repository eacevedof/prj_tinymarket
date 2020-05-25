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
use mysql_xdevapi\Exception;
use Symfony\Component\Security\Core\Security;
use App\Services\EmailService;

class OrderService extends BaseService
{
    private UserRepository $userRepository;
    private OrderheadRepository $orderheadRepository;
    private OrderlinesRepository $orderlinesRepository;
    private Security $security;
    private ProductRepository $productRepository;

    public function __construct(OrderheadRepository $orderheadRepository,
                                OrderlinesRepository $orderlinesRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                Security $security)
    {
        $this->orderheadRepository = $orderheadRepository;
        $this->orderlinesRepository = $orderlinesRepository;
        $this->userRepository = $userRepository;
        $this->security = $security;
        $this->productRepository = $productRepository;
    }

    private function _save_user($aruser):User
    {
        $email = $aruser["email"];
        $ouser = $this->userRepository->findOneByEmail($email);

        if(!$ouser) $ouser = new User();

        $ouser->setAddress($aruser["address"]);
        $ouser->setEmail($aruser["email"]);
        $ouser->setFullname($aruser["fullname"]);
        $ouser->setIdProfile(5);
        $ouser->setPhone($aruser["phone"]);
        $this->userRepository->save($ouser);
        $this->logd($ouser,"ouser after saved");
        return $ouser;
    }

    private function _save_header($arorder,User $ouser):AppOrderHead
    {
        $oorderh = new AppOrderHead();
        if($ouser->getId()) {
            $oorderh->setAddress($ouser->getAddress());
            $oorderh->setInsertUser($ouser->getId());
            $oorderh->setUpdateUser($ouser->getId());
            $oorderh->setUpdateDate(new \DateTime());
            $oorderh->setIdUser($ouser->getId());
            $oorderh->setNotes($arorder["notes"]);
            $oorderh->setStatus("pending");
            $oorderh->setDatePurchase(new \DateTime("NOW"));
            $this->orderheadRepository->save($oorderh);
        }
        //$o = new \DateTime()
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
                $oorderl->setIdOrderHead($oorderh->getId());
                $oorderl->setIdProduct($product["id"]);

                $imaxline = $this->orderlinesRepository->getMaxNumline($oorderl);
                $oorderl->setLinenum($imaxline+10);

                $oorderl->setPrice($oproduct->getPriceSale());
                $oorderl->setPrice1($oproduct->getPriceSale1());
                $oorderl->setPrice2($oproduct->getPriceSale2());
                $oorderl->setDescription($oproduct->getDescription());
                $oorderl->setProduct($oproduct->getDescription());
                $oorderl->setUnits((int)$product["units"]);
                $oorderl->setTaxPercent($oproduct->getTaxPercent());
                $oorderl->setTotal((int)$product["units"] * $oproduct->getPriceSale());
                $oorderl->setTotal1((int)$product["units"] * $oproduct->getPriceSale1());
                $oorderl->setTotal2((int)$product["units"] * $oproduct->getPriceSale2());
                $oorderl->setIdUser($oproduct->getIdUser());
                $this->orderlinesRepository->save($oorderl);

                $arlines[] = $oorderl;
            }
        }
        return $arlines;
    }

    public function purchase($aruser, $aroder) : ?AppOrderHead
    {
        try {
            $ouser = $this->_save_user($aruser);
            $oheaderh = $this->_save_header($aroder,$ouser);
            $oheaderl = $this->_save_lines($aroder,$oheaderh);
            return $oheaderh;
        }
        catch (Exception $e)
        {
            $this->logd($e->getMessage(),"ERROR on purchase");
            $this->logd($aruser,"aruser");
            $this->logd($aroder,"arorder");
            return new AppOrderHead();
        }
    }
}