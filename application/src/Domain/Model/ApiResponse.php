<?php

namespace Domain\Model;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class representing the ApiResponse model.
 *
 * @package Swagger\Server\Model
 * @author  Swagger Codegen team
 */
class ApiResponse 
{
        /**
     * @var string|null
     * @SerializedName("message")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $message;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->message = isset($data['message']) ? $data['message'] : null;
    }

    /**
     * Gets message.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets message.
     *
     * @param string|null $message
     *
     * @return $this
     */
    public function setMessage($message = null)
    {
        $this->message = $message;

        return $this;
    }
}


