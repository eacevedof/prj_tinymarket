<?php
declare(strict_types=1);

namespace App\Listener;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResourceNotFoundListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function _handle_404($event, $exception)
    {
        if($exception instanceof NotFoundHttpException)
        {
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
    }
    
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if($exception instanceof HttpExceptionInterface) {
            $this->_handle_404($event, $exception);
        }
    }

}