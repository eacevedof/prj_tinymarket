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
        $perpage = $request->query->get("perpage") ?? 50;
        $codCache = $request->get("enterprise") ?? 0;

        $products = $this->productService->get_all_by_page($page,$perpage);

        $json = Serialize::get_jsonarray($products);

        $response = $this->get_response_json();
        $response->setContent($json);
        return $response;
    }

}//ProductList
