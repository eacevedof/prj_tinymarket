<?php
declare(strict_types=1);
namespace App\Controller;
use App\Traits\LogTrait;
use App\Traits\EnvTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    use LogTrait;

    private $request;

    public function __construct(RequestStack $request){$this->request =$request->getCurrentRequest();}

    protected function get_post($key){return $this->request->request->get($key) ?? null;}

    protected function get_get($key){return $this->request->query->get($key) ?? null;}

    protected function get_request(){return $this->request;}

    protected function get_response_json()
    {
        $response = new Response();
        //$response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    protected function get_header($key=null)
    {
        $all = getallheaders();
        $this->logd($all,"get_header.all");
        if(!$key) return $all;
        foreach ($all as $k=>$v)
            if(strtolower($k)===strtolower($key))
                return $v;
        return null;
    }

}