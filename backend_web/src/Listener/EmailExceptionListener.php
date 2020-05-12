<?php
namespace App\Listener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class EmailExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        //si salta un 404 en prod entra por aqui y en dev no. Pq?? ni idea, lo comento
        //dump("EmailExceptionResponseListener.onKernelException 1");
        $exception = $event->getThrowable();
        if ($exception instanceof HttpExceptionInterface) {
           //dump("EmailExceptionResponseListener.onKernelException 2");
        }
    }
}