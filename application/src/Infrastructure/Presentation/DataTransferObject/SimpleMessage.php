<?php

namespace Presentation\DataTransferObject;

/**
 * Class SimpleMessage
 * @package Presentation\DataTransferObject
 */
class SimpleMessage
{
    /**
     * @var string
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
