<?php
namespace App\Services\Restrict;

use App\Entity\User;
use App\Services\BaseService;
use App\Repository\OrderheadRepository;
use App\Repository\OrderlinesRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;

class OrderService extends BaseService
{
    private UserRepository $userRepository;
    private OrderheadRepository $orderheadRepository;
    private OrderlinesRepository $orderlinesRepository;
    private Security $security;

    public function __construct(OrderheadRepository $orderheadRepository,
                                OrderlinesRepository $orderlinesRepository,
                                UserRepository $userRepository,
                                Security $security)
    {
        $this->orderheadRepository = $orderheadRepository;
        $this->orderlinesRepository = $orderlinesRepository;
        $this->userRepository = $userRepository;
        $this->security = $security;
    }

   public function purchase($user,$order)
   {

   }
}