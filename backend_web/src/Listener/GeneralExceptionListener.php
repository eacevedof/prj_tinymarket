<?php
declare(strict_types=1);

namespace App\Listener;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
//use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use App\Traits\LogTrait;

class GeneralExceptionListener
{
    use LogTrait;
    private ContainerInterface $container;
    private Response $response;

    public function __construct(
        ContainerInterface $container
    )
    {
        $this->container = $container;
        $this->response = new Response();
    }

    private function _log($event, $exception)
    {
        $this->logd(get_class($event),"event type");
        $this->logd(get_class($exception),"exception type");
    }

    private function _handle_simple404($event, $exception)
    {
        if($exception instanceof NotFoundHttpException) {
            //die("404");
            $twig = $this->container->get("twig");
            $message = "1 - Error: {$exception->getMessage()}";
            $code = !$exception->getCode() ? Response::HTTP_NOT_FOUND: $exception->getCode();

            $objcontent = $twig->render("errors/404.html.twig", [
                    "title"=>"{$code} | {$exception->getMessage()}"
                    ,"message" => $message
                ]);

            $this->response->setStatusCode($code);
            $this->response->headers->replace($exception->getHeaders());
            $this->response->setContent($objcontent);
            // sends the modified response object to the event
            $event->setResponse($this->response);
        }
    }

    private function _handle_404($event, $exception)
    {
        if($exception instanceof ResourceNotFoundException) {
            //die("404");
            $twig = $this->container->get("twig");
            $message = "2 - Error: {$exception->getMessage()}";
            $code = !$exception->getCode() ? Response::HTTP_NOT_FOUND: $exception->getCode();

            $objcontent = $twig->render("errors/404.html.twig", [
                    "title"=>"{$code} | {$exception->getMessage()}"
                    ,"message" => $message
                ]);

            $this->response->setStatusCode($code);
            $this->response->headers->replace($exception->getHeaders());
            $this->response->setContent($objcontent);

            $event->setResponse($this->response);
        }
    }//_handle_404

    private function _handle_403($event, $exception){
        if($exception instanceof AccessDeniedException){
            //die("403");
            $twig = $this->container->get("twig");
            $message = "3 - Error: {$exception->getMessage()}";
            $code = !$exception->getCode() ? $exception->getStatusCode() : $exception->getCode();

            $objcontent = $twig->render("errors/403.html.twig", [
                "title"=>"{$code} | {$exception->getMessage()}"
                ,"message" => $message]
            );

            $this->response->setStatusCode($code);
            //$this->response->headers->replace($exception->getHeaders());
            $this->response->setContent($objcontent);

            $event->setResponse($this->response);
        }
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $this->_log($event,$exception);
        //forbidden
        $this->_handle_403($event, $exception);
        //NotFoundHttpException
        $this->_handle_simple404($event, $exception);
        //ResourceNotFoundException
        $this->_handle_404($event, $exception);
    }

}