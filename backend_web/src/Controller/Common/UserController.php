<?php
//proyecto\src\Controller\Common\UserController.php
namespace App\Controller\Common;
use App\Repository\UserRepository;
use App\Services\Common\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Controller\BaseController;
use App\Entity\User;
use App\Form\RegisterType;

class UserController extends BaseController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->userService->register($request,$encoder,$user);
            return $this->redirectToRoute("tasks");
        }
        return $this->render('open/user/register.html.twig', [
            "form" => $form->createView()
        ]);
    }

    public function index()
    {
        //$response->headers->set('Content-Type', 'application/json');
        //$response->headers->set('Access-Control-Allow-Origin', '*');
        $users = $this->userService->index();
        return $this->render("restrict/restrict-layout.html.twig",["users"=>$users]);
    }


}//UserController
