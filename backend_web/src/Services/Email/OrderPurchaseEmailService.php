<?php
namespace App\Services\Email;
use App\Component\Mail;
use App\Entity\App\AppOrderLines;
use App\Entity\App\AppOrderHead;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

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

    private function _process()
    {
        $email = (new TemplatedEmail())
            ->from('no-reply@gmail.com')
            ->to(new Address('eacevedof@gmail.com'))
            ->subject('Envio prueba')

            // path of the Twig template to render
            ->htmlTemplate('emails/order_purchase.html.twig')

            // pass variables (name => value) to the template
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'username' => 'foo',
            ]);
        $this->mailer->send($email);
    }

    public function send()
    {
        $this->_process();
    }
}