<?php

namespace Infrastructure\Presentation\DataTransferObject;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SimpleMessage
 * @package Presentation\DataTransferObject
 */
class SimpleMessage
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     */
    private $mensagem;

    /**
     * SimpleMessage constructor.
     * @param string $mensagem
     */
    public function __construct(string $mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return string
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }
}
