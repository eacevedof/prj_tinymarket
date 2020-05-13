<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);
namespace App\Controller\Open;

use App\Controller\BaseController;
use App\Providers\HomeProvider;
use App\Providers\SeoProvider;
use App\Services\EmailService;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;

class HomeController extends BaseController
{

    public function __construct(RequestStack $request)
    {
        parent::__construct($request);
        $this->provider= new HomeProvider();
    }

    public function index()
    {
        $seo = SeoProvider::get_meta("home");
        $arslider = $this->provider->get_text_slider();
        $services = $this->provider->get_text_services();
        return $this->render('open/home/index.html.twig',["arslider"=>$arslider,"services"=>$services,"seo"=>$seo]);
    }

    public function mail(MailerInterface $mailer)
    {
        $this->logd($_POST,"mail.post");
        $this->logd($_SERVER["REMOTE_ADDR"],"ip from");
        try{
            $mail = new EmailService($this->get_request(),$mailer);
            $mail->send();
        }
        catch(\Exception $e){
            $this->logd($e->getMessage(),"mail.error");
            return (new Response('Content',
                Response::HTTP_BAD_REQUEST,
                ['content-type' => 'application/json']))->setContent(json_encode(
                    [
                        "title" => "error",
                        "description"=>$e->getMessage()
                    ]
            ));
        }

        return (new Response('Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']))->setContent(json_encode(
                [
                    "title" => "success",
                    "description"=>"Email has benn sent"
                ]
            ));
    }
}