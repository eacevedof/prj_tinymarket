<?php
//backend_web/src/Api/Product/ProductList.php
declare(strict_types=1);

namespace App\Api\Product;
use App\Component\Serialize;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\ProductService;

class ProductList extends BaseController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(Request $request)
    {
        $page = $request->query->get("page") ?? 1;
        //$products = $this->productService->get_list();
        $products = $this->productService->get_list_paginated($page);

        //dump($products);die("xxx");
        //$products = $this->productService->get_list_filter(["id"=>3]);
        $response = $this->get_response_json();
        $json = Serialize::get_jsonarray($products);
        $response->setContent($json);
        return $response;
    }

}//ProductList
