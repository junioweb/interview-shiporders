<?php

namespace AppBundle\EventListener;

use DomainException;
use Exception;
use Infrastructure\Service\JsonResponse;
use Monolog\Logger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class ExceptionListener
 * @package AppBundle\EventListener
 */
class ExceptionListener implements EventSubscriberInterface
{
    /**
     * @var JsonResponse
     */
    private $jsonResponseService;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * ExceptionListener constructor.
     * @param JsonResponse $jsonResponseService
     */
    public function __construct(JsonResponse $jsonResponseService, Logger $logger)
    {
        $this->logger = $logger;
        $this->jsonResponseService = $jsonResponseService;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => ['onException', 9999]
        ];
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onException(GetResponseForExceptionEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $exception = $event->getException();

        $event->setResponse($this->handleException($exception));
    }

    /**
     * @param Exception $exception
     */
    private function saveLogger(Exception $exception)
    {
        $this->logger->error($exception->getMessage(), $exception->getTrace());
    }

    /**
     * @param Exception $exception
     * @return Response
     */
    private function handleException(Exception $exception): Response
    {
        $this->saveLogger($exception);

        $mensagem = $exception->getMessage();

        switch (true) {
            case $exception instanceof NotFoundHttpException:
                return $this->jsonResponseService->notFound($mensagem);
            case $exception instanceof DomainException:
                return $this->jsonResponseService->internalError($mensagem);
            case $exception instanceof AccessDeniedException:
                return $this->jsonResponseService->forbidden($mensagem);
            case $exception instanceof FileException:
                return $this->jsonResponseService->internalError('Erro durante o upload do arquivo.');
            default:
                return $this->jsonResponseService->internalError('Ocorreu um erro interno.');
        }
    }
}
