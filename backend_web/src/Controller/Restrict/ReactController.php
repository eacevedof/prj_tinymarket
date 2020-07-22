<?php
namespace App\Controller\Restrict;
use App\Controller\BaseController;

class ReactController extends BaseController
{
    public function __invoke($reactslug)
    {
        $this->logd($reactslug,"reactslug");

        return $this->render("restrict/admin-react.html.twig",["reactslug"=>""]);
    }
}//ReactController
