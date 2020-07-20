<?php
//proyecto\src\Controller\Common\SecurityController.php
namespace App\Controller\Common;
//use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\BaseController;

class SecurityController extends BaseController
{
    //solo muestra la vista del formulario con vue
    public function login()
    {
        $error = "";
        return $this->render("open/security/login.html.twig",[
            "error" => $error,
        ]);
    }
/*
 * al existir LoginAuthenticator la ruta /check-login pasa por este "pseudo controlador"
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
*/
}//SecurityController
