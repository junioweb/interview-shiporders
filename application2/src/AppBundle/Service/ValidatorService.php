<?php
namespace AppBundle\Service;

use AppBundle\Service\Exception\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ValidatorService
 * @package AppBundle\Service
 */
class ValidatorService
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ValidatorService constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param $entidade
     * @param null $grupos
     */
    public function validar($entidade, $grupos = null)
    {
        $errors = $this->validator->validate($entidade, null, $grupos);

        if ($errors->count() > 0) {
            $msgs = $this->tratarErros($errors->getIterator());
            throw new ValidationException($msgs);
        }
    }

    /**
     * @param \ArrayIterator $errors
     * @return array
     */
    public function tratarErros(\ArrayIterator $errors): array
    {
        $msgs = [];
        foreach ($errors as $erro) {
            $msgs[] = $erro->getMessage();
        }

        return $msgs;
    }
}
