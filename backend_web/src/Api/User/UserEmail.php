<?php
//backend_web/src/Api/Product/UserEmail.php
declare(strict_types=1);

namespace App\Api\User;
use App\Component\Serialize;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\UserService;

class UserEmail extends BaseController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(Request $request)
    {
        //$this->logpost();
        $email = $request->get("email") ?? "";
        $email = trim($email);
        $isvalid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $isvalid=1;
        $response = $this->get_response_json();
        if($isvalid) {
            $user = $this->userService->find_one_by_email($email);
            $json = Serialize::get_jsonarray(["result"=>$user,"error"=>""]);
        }
        else{
            $json = Serialize::get_jsonarray(["error"=>"invalid email"]);
        }

        $response->setContent($json);
        return $response;
    }

}//UserEmail
