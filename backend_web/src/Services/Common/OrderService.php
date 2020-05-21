<?php
namespace App\Services\Common;

use App\Services\BaseService;
use App\Repository\OrderRepository;
use Symfony\Component\Security\Core\Security;

class OrderService extends BaseService
{
    private OrderRepository $OrderRepository;
    private Security $security;

    public function __construct(OrderRepository $OrderRepository,Security $security)
    {
        $this->OrderRepository = $OrderRepository;
        $this->security = $security;
        // dump($this->security->getUser());die;
    }

    public function get_list()
    {
        $Orders = $this->OrderRepository->findAll();
        //print_r($Orders);die;
        return $Orders;
    }
    
    public function get_all_by_page($page = 1, $perpage=20, $criteria=[])
    {
        $paginator = $this->OrderRepository->findAllByPage($page, $perpage, $criteria);

        //ejemplo respuesta: https://laravel-json-api.readthedocs.io/en/latest/fetching/pagination/
        $return = [
            'result' => $paginator["result"],
            'meta' => [
                "page"=>[
                    'total'=>$paginator["maxsize"],
                    'current-page' => $page,
                    "per-page" => $perpage,
                ]
            ],
            "errors"=>[]
        ];
        return $return;
    }
    
    
    

    public function get_list_filter(array $criteria=[])
    {
        $Orders = $this->OrderRepository->findBy($criteria,["id"=>"DESC"]);
        return $Orders;
    }

}