<?php
//proyecto\src\Controller\Common\SecurityController.php
namespace App\Controller\Common;

use App\Security\LoginAuthenticator;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\BaseController;
use App\Component\Curl;

class SecurityController extends BaseController
{
    public function login()
    {
        $error = "";
        return $this->render("open/security/login.html.twig",[
            "error" => $error,
        ]);
    }

    private function _get_apifytoken()
    {}

    private function _get_resourcetoken()
    {}

    public function check_login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        //$this->logd($error, "authentication.error");
        $this->logd($authentication, "authentication");

        $lastUsername = $authentication->getLastUsername();
        $response = $this->get_response_json();
        $response->setContent(json_encode(["error"=>$error,"username"=>$lastUsername]));
        return $response;
    }
}//SecurityController
