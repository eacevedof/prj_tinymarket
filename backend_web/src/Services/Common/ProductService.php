<?php
namespace App\Services\Common;

use App\Services\BaseService;
use App\Repository\ProductRepository;

class ProductService extends BaseService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get_list()
    {
        $products = $this->productRepository->findAll();
        //print_r($products);die;
        return $products;
    }

    public function get_list_filter(array $criteria=[])
    {
        $products = $this->productRepository->findBy($criteria,["id"=>"DESC"]);
        return $products;
    }

}