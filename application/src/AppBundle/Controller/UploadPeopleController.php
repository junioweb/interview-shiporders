<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UploadPeopleController
 * @package AppBundle\Controller
 * @Rest\Prefix("/upload-people")
 */
class UploadPeopleController extends FOSRestController
{
    /**
     * @Rest\Post("")
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
        $serializer = $this->get('jms_serializer');
        $jsonResponseService = $this->get('infra.json_response.service');
        $personService = $this->get('app.person.service');

        $people = $serializer->deserialize(
            $request->getContent(),
            'Infrastructure\Presentation\DataTransferObject\People',
            'xml'
        );

        $personService->insertByCollection($people->getPeople());

        return $jsonResponseService->created();
    }
}