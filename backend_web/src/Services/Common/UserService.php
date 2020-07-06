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

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserPasswordEncoderInterface $encoder, User $user)
    {
        //roles: 1:admin, 2:system, 3:enterprise, 4:user, 5:anonymous
        if(!$user->getIdProfile()) $user->setIdProfile(3);//user
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

    public function find_one_by_email($email): ?User
    {
        $oUser = $this->userRepository->findOneByEmail($email);
        return $oUser;
    }

}