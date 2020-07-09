<?php
namespace App\Controller\Restrict;
use App\Controller\BaseController;

class ReactController extends BaseController
{
    public function __invoke()
    {
        return $this->render("restrict/admin-react.html.twig");
    }
}//ReactController
