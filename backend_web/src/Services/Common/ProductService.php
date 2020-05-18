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
    
    public function get_list_paginated($currentPage = 2)
    {
        $limit = 100;
        $products = $this->productRepository->findAllByPage($currentPage, $limit);
        $productsResultado = $products['paginator'];
        $productsQueryCompleta =  $products['query'];

        $maxPages = ceil($products['paginator']->count() / $limit);

        $return = array(
            'products' => $productsResultado,
            'maxPages'=>$maxPages,
            'thisPage' => $currentPage,
            'all_items' => $productsQueryCompleta
        );
        return $return;
    }

    public function get_list_filter(array $criteria=[])
    {
        $products = $this->productRepository->findBy($criteria,["id"=>"DESC"]);
        return $products;
    }

}