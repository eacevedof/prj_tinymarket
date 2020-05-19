<?php
namespace App\Services\Common;

use App\Services\BaseService;
use App\Repository\ProductRepository;
use Symfony\Component\Security\Core\Security;

class ProductService extends BaseService
{
    private ProductRepository $productRepository;
    private Security $security;

    public function __construct(ProductRepository $productRepository,Security $security)
    {
        $this->productRepository = $productRepository;
        $this->security = $security;
        // dump($this->security->getUser());die;
    }

    public function get_list()
    {
        $products = $this->productRepository->findAll();
        //print_r($products);die;
        return $products;
    }
    
    public function get_all_by_page($page = 1, $limit=20)
    {
        $paginator = $this->productRepository->findAllByPage($page, $limit);

        //ejemplo respuesta: https://laravel-json-api.readthedocs.io/en/latest/fetching/pagination/
        $return = [
            'result' => $paginator["result"],
            'meta' => [
                "page"=>[
                    'total'=>$paginator["maxsize"],
                    'current-page' => $page,
                    "per-page" => $limit,
                ]
            ],
            "errors"=>[]
        ];
        return $return;
    }
    
    
    

    public function get_list_filter(array $criteria=[])
    {
        $products = $this->productRepository->findBy($criteria,["id"=>"DESC"]);
        return $products;
    }

}