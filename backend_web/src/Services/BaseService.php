<?php
namespace App\Services;

use App\Traits\Log;
use Symfony\Component\HttpFoundation\Request;

class BaseService
{
    use Log;

    private $request;

    public function __construct(Request $request)
    {
        $this->request =$request;
    }

    protected function get_env($key)
    {
        return $_ENV[$key] ?? "";
    }

    protected function is_envprod()
    {
        $env = $this->get_env("APP_ENV");
        $this->logd($env,"service.is_envprod");
        return $env==="prod";
    }

    protected function get_post($key)
    {
        return $this->request->request->get($key) ?? null;
    }
    protected function get_get($key)
    {
        return $this->request->query->get($key) ?? null;
    }
}