<?php
declare(strict_types=1);

namespace App\Listener;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
//use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use App\Traits\Log;

class GeneralExceptionListener
{
    use Log;
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
            $message = "1 - Resource: {$exception->getMessage()} with code: {$exception->getCode()}";
            $objcontent = $twig->render("errors/404.html.twig", ["message" => $message]);

            //no se primte code 0 en status code
            //$this->response->setStatusCode($exception->getCode());
            $this->response->setContent($objcontent);
            // sends the modified response object to the event
            $event->setResponse($this->response);
        }
    }

    private function _handle_404($event, $exception)
    {
        //if($exception instanceof HttpExceptionInterface)
            if($exception instanceof NotFoundHttpException) {
                //die("404");
                $message = "2 - Resource: {$exception->getMessage()} with code: {$exception->getCode()}";

                $twig = $this->container->get("twig");
                $objcontent = $twig->render("errors/404.html.twig", ["message" => $message]);

                //$this->response->setStatusCode($exception->getCode());
                $this->response->setContent($objcontent);

                // HttpExceptionInterface is a special type of exception that
                // holds status code and header details
                if ($exception instanceof ResourceNotFoundException) {
                    $this->response->setStatusCode($exception->getStatusCode());
                    $this->response->headers->replace($exception->getHeaders());
                } else {
                    $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
                }

                // sends the modified response object to the event
                $event->setResponse($this->response);
            }
    }//_handle_404

    private function _handle_403($event, $exception){
        if($exception instanceof AccessDeniedException){
            die("{$exception->getCode()} - AccessDeniedException");
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