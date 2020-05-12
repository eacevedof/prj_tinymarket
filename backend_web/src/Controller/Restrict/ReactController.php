<?php
namespace App\Controller\Restrict;
use App\Controller\BaseController;

class ReactController extends BaseController
{
    public function __invoke()
    {
        //$response->headers->set('Content-Type', 'application/json');
        //$response->headers->set('Access-Control-Allow-Origin', '*');
        return $this->render("restrict/restrict-react.html.twig");
    }
}//ReactController
