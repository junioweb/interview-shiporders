<?php

namespace Infrastructure\Service;

use JMS\Serializer\Serializer;
use Presentation\DataTransferObject\SimpleMessage;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class JsonResponse
 * @package Infrastructure\Service
 */
final class JsonResponse
{
    /**
     * @var Serializer
     */
    private $jsonService;

    /**
     * JsonResponse constructor.
     * @param JsonService $jsonService
     */
    public function __construct(JsonService $jsonService)
    {
        $this->jsonService = $jsonService;
    }

    /**
     * @param null $objeto
     * @param array $grupos
     * @return Response
     */
    public function success($objeto = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(Response::HTTP_OK, $grupos, $objeto);
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function badRequest(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_BAD_REQUEST,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function internalError(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function notFound(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_NOT_FOUND,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function forbidden(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_FORBIDDEN,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function unauthorized(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_UNAUTHORIZED,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function suporteMidia(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_UNSUPPORTED_MEDIA_TYPE,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param array $grupos
     * @return Response
     */
    public function noContent(array $grupos = ['default']): Response
    {
        return $this->gerarResponse(Response::HTTP_NO_CONTENT, $grupos);
    }

    /**
     * @param null $objeto
     * @param array $grupos
     * @return Response
     */
    public function successAllowOrigin($objeto = null, array $grupos = ['default'])
    {
        $headers = [
            'Content-type' => 'application/json',
            'Access-Control-Allow-Origin' => '*'
        ];
        return $this->gerarResponse(Response::HTTP_OK, $grupos, $objeto, $headers);
    }

    /**
     * @param int $code
     * @param array $grupos
     * @param null $objeto
     * @param array $headers
     * @return Response
     */
    private function gerarResponse(
        int $code,
        array $grupos,
        $objeto = null,
        array $headers = ['Content-type' => 'application/json']
    ): Response
    {
        if (!$objeto) {
            return new Response('', $code);
        }

        return new Response(
            $this->jsonService->toJsonByGroups($objeto, $grupos),
            $code,
            $headers
        );
    }

    /**
     * @param string|null $mensagem
     * @return null|SimpleMessage
     */
    private function objetoResposta(string $mensagem = null)
    {
        return $mensagem ? new SimpleMessage($mensagem) : null;
    }
}