<?php
//backend_web/src/Api/Product/OrderPurchase.php
declare(strict_types=1);

namespace App\Api\Order;
use App\Component\Serialize;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\ProductService;

class OrderPurchase extends BaseController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(Request $request)
    {
        $this->logpost();
        $json = Serialize::get_jsonarray(["ok"]);

        $response = $this->get_response_json();
        $response->setContent($json);
        return $response;
    }

}//OrderPurchase
