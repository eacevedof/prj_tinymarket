<?php
//backend_web/src/Api/Product/OrderPurchase.php
declare(strict_types=1);

namespace App\Api\Order;
use App\Component\Serialize;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Restrict\OrderService;

class OrderPurchase extends BaseController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function __invoke(Request $request)
    {
        $this->logpost();
        $ip = $request->getClientIp();
        $ip = str_replace(".","-",$ip);
        //-- [20200527-144051 - 172.20.0.1]
        $errcode = date("Ymd-His")." - ".$ip;

        if(!($request->get("user") && $request->get("user"))){
            $response = [
                "result" => null,
                "error" => "missing data"
            ];
        }
        else {
            $order = $this->orderService->purchase(
                $request->get("user"),
                $request->get("order")
            );

            if($order->getId())
                $response = [
                    "result" => $order,
                    "error" => ""
                ];
            else
                $response = [
                    "result" => null,
                    "error" => "Sorry some error occurred. We could not process your order. Try again later please",
                    "error_code"=>$errcode
                ];
        }


        $json = Serialize::get_jsonarray($response);
        //$json = Serialize::get_jsonarray(["xxx"]);
        $response = $this->get_response_json();
        $response->setContent($json);
        return $response;
    }

}//OrderPurchase
