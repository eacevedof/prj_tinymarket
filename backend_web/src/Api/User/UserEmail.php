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
        $email = $request->get("email") ?? "";
        $email = trim($email);
        $user = $this->userService->check_email($email);

        $json = Serialize::get_jsonarray([$user]);

        $response = $this->get_response_json();
        $response->setContent($json);
        return $response;
    }

}//UserEmail
