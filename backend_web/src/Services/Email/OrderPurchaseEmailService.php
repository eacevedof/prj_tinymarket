<?php
namespace App\Services\Email;

use App\Services\BaseService;
use App\Entity\App\AppOrderHead;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;

final class OrderPurchaseEmailService extends BaseService
{
    private MailerInterface $mailer;
    private User $ouser;
    private AppOrderHead $oorderh;
    private array $arlines;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->arlines = [];
    }

    public function set_user(User $ouser)
    {
        $this->ouser = $ouser;
        return $this;
    }

    public function set_order_head(AppOrderHead $oorderh)
    {
        $this->oorderh = $oorderh;
        return $this;
    }

    public function set_order_lines(array $arlines = [])
    {
        $this->arlines = $arlines;
        return $this;
    }

    private function _get_objemail()
    {
        //por defecto lo tomo como prueba
        $email = (new TemplatedEmail())
            ->from(new Address('tfwnoreply@gmail.com', "El Chalán Aruba (noreply)"))
            ->to(new Address("eacevedof@gmail.com"))
            ->subject('El Chalán Aruba - Test '.$this->oorderh->getId())
            ->htmlTemplate('emails/order_purchase.html.twig')
            ->context([
                "ouser"=>$this->ouser,
                "oorderh"=>$this->oorderh,
                "arlines"=>$this->arlines,
            ]);
        if($this->is_envprod())
        {
            $email->to(new Address($this->ouser->getEmail()))
                ->subject('El Chalán Aruba - Purchase '.$this->oorderh->getId())
                ->addBcc("elchalanaruba@gmail.com");
        }
        return $email;
    }

    public function send()
    {
        $email = $this->_get_objemail();
        $this->mailer->send($email);
    }
}