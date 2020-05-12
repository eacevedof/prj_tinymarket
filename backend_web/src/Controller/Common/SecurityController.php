<?php
//proyecto\src\Controller\Common\SecurityController.php
namespace App\Controller\Common;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\BaseController;

class SecurityController extends BaseController
{
    public function __invoke(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        $lastUsername = $authentication->getLastUsername();
        return $this->render("open/security/login.html.twig",[
            "error" => $error,
            "_last_username"=>$lastUsername
        ]);
    }
}//SecurityController
