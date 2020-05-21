<?php
namespace App\Services\Restrict;

use App\Services\BaseService;
use App\Repository\OrderheadRepository;
use App\Repository\OrderlinesRepository;
use Symfony\Component\Security\Core\Security;

class OrderService extends BaseService
{
    private OrderheadRepository $orderheadRepository;
    private OrderlinesRepository $orderlinesRepository;
    private Security $security;

    public function __construct(OrderheadRepository $orderheadRepository,OrderlinesRepository $orderlinesRepository, Security $security)
    {
        $this->orderheadRepository = $orderheadRepository;
        $this->orderlinesRepository = $orderlinesRepository;
        $this->security = $security;
        // dump($this->security->getUser());die;
    }

    public function get_list()
    {
        $orders = $this->orderheadRepository->findAll();
        //print_r($orders);die;
        return $orders;
    }
    
    public function get_all_by_page($page = 1, $perpage=20, $criteria=[])
    {
        $paginator = $this->orderheadRepository->findAllByPage($page, $perpage, $criteria);

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
        $orders = $this->orderheadRepository->findBy($criteria,["id"=>"DESC"]);
        return $orders;
    }

}