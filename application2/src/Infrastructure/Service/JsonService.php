<?php
namespace Infrastructure\Service;

use AppBundle\Service\Exception\ValidationException;
use AppBundle\Service\ValidatorService;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;

class JsonService
{
    private $serializer;
    private $validator;

    public function __construct(Serializer $serializer, ValidatorService $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * Converte $json em $tipo.
     *
     * @param $json
     * @param $tipo
     * @return mixed
     */
    public function converter($json, $tipo)
    {
        return $this->serializer->deserialize($json, $tipo, 'json');
    }

    /**
     * Converte $json em $tipo e valida os dados de acordo com os Asserts definidos na classe de $tipo.
     *
     * @param $json
     * @param $tipo
     * @return mixed
     * @throws ValidationException
     */
    public function converterValidandoDados($json, $tipo)
    {
        $objeto = $this->converter($json, $tipo);
        $this->validator->validar($objeto);

        return $objeto;
    }

    public function toJson($data, SerializationContext $context = null)
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    public function toJsonExcludingGroup($data, string $exclusionGroup = 'detail')
    {
        return $this->serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->setExclusionGroups($exclusionGroup)
        );
    }

    public function toJsonByGroups($data, array $groups = ['default'])
    {
        return $this->serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->setGroups($groups)
        );
    }
}
