<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UploadPeopleController
 * @package AppBundle\Controller
 */
class UploadPeopleController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Upload the People XML",
     *   statusCodes={
     *     201="Returned when XML is successfully processed"
     *   }
     * )
     * @param Request $request
     * @return Response
     */
    public function postUploadPeopleAction(Request $request): Response
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