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
        return $ouser;
    }

    private function _save_header($arorder,User $ouser):AppOrderHead
    {
        $oorderh = new AppOrderHead();
        $oorderh->setAddress($ouser->getAddress());
        $oorderh->setNotes($arorder["notes"]);
        $oorderh->setStatus("pending");
        $oorderh->setDatePurchase(Date("YmdHis"));
        $this->orderheadRepository->save($oorderh);
        return $oorderh;
    }

    private function _save_lines($arorder, AppOrderHead $oorderh): array
    {
        $oorderl = null;
        $products = $arorder["products"] ?? [];

        $arproducts = [];
        foreach ($products as $product){
            //$oproduct = new AppProduct();
            //$oproduct->setId($product["id"]);
            $oproduct = $this->productRepository->findOneById($product["id"]);
            $oorderl = new AppOrderLines();
            $oorderl->setLinenum(1);
            $oorderl->setIdOrderHead($oorderh->getId());
            $oorderl->setIdProduct($product["id"]);
            $oorderl->setPrice($oproduct->getPriceSale());
            $oorderl->setPrice1($oproduct->getPriceSale1());
            $oorderl->setPrice2($oproduct->getPriceSale2());
            $oorderl->setDescription($oproduct->getDescription());


        }

        return $oorderl;
    }

    public function purchase($aruser, $aroder)
    {
        //$ouser = $this->_save_user($aruser);
        //$oheaderh = $this->_save_header($aroder,$ouser);
        //$oheaderl = $this->_save_lines($aroder,$oheaderh);
    }
}