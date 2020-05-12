<?php
namespace App\Services\Common;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Services\BaseService;
use App\Repository\UserRepository;
use App\Entity\User;

class UserService extends BaseService
{
    private UserRepository $userRepository;
    private UserPasswordEncoderInterface $encoder;
    private User $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request, UserPasswordEncoderInterface $encoder, User $user)
    {
        //roles: 1:admin, 2:system, 3:enterprise, 4:user, 5:anonymous
        $user->setIdProfile(3);//user
        $user->setUpdateDate(new \DateTime("now"));
        //cifrando la contraseña
        $encoded = $encoder->encodePassword($user,$user->getPassword());
        $user->setPassword($encoded);
        $this->userRepository->save($user);
    }

    public function index()
    {
        $users = $this->userRepository->findBy([],["id"=>"DESC"]);
        return $users;
    }

}