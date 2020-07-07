<?php
//proyecto\src\Controller\Common\SecurityController.php
namespace App\Controller\Common;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\BaseController;

class SecurityController extends BaseController
{
    public function login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        return $this->render("open/security/login.html.twig",[
            "error" => $error,
        ]);
    }

    public function check_login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        $this->logd($error, "authentication.error");
        $this->logd($authentication, "authentication");

        $lastUsername = $authentication->getLastUsername();
        $response = $this->get_response_json();
        $response->setContent(json_encode(["error"=>$error,"username"=>$lastUsername]));
        return $response;
    }
}//SecurityController
