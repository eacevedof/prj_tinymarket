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
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function _log($event, $exception)
    {
        $this->logd(get_class($event),"event type");
        $this->logd(get_class($exception),"exception type");
    }

    private function _handle_404($event, $exception)
    {
        //if($exception instanceof HttpExceptionInterface)
            if($exception instanceof NotFoundHttpException) {
                //die("404");
                $message = sprintf(
                    'Resource: %s with code: %s',
                    $exception->getMessage(),
                    $exception->getCode()
                );

                $engine = $this->container->get('twig');
                $content = $engine->render("errors/404.html.twig", ["message" => $message]);

                // Customize your response object to display the exception details
                $response = new Response();
                $response->setContent($content);

                // HttpExceptionInterface is a special type of exception that
                // holds status code and header details
                if ($exception instanceof ResourceNotFoundException) {
                    $response->setStatusCode($exception->getStatusCode());
                    $response->headers->replace($exception->getHeaders());
                } else {
                    $response->setStatusCode(Response::HTTP_NOT_FOUND);
                }

                // sends the modified response object to the event
                $event->setResponse($response);
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
        //not found
        $this->_handle_404($event, $exception);
    }

}