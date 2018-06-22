<?php
namespace AppBundle\Service\Exception;

class ValidationException extends \DomainException
{
    private $errors;

    /**
     * ValidationException constructor.
     * @param array $errors
     * @param null $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(array $errors, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->errors = $errors;

        $message = $message ?? "Error encountered during validation.";
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
