<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PeopleController
 * @package AppBundle\Controller
 */
class PeopleController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Returns a map of person",
     *   output={"collection"=true, "collectionName"="people", "class"="Domain\Model\Person\Person"},
     *   statusCodes={
     *     200="Returned when successful"
     *   }
     * )
     * @return Response
     */
    public function getPeopleAction(): Response
    {
        $jsonResponseService = $this->get('infra.json_response.service');
        $personService = $this->get('app.person.service');

        $people = $personService->findAll();

        return $jsonResponseService->success($people);
    }
}