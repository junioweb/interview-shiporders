<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class PeopleController
 * @package AppBundle\Controller
 * @Rest\Prefix("/people")
 */
class PeopleController extends FOSRestController
{
    /**
     * @Rest\Get("")
     */
    public function listAction()
    {
        $personService = $this->get('app.person.service');
        $jsonResponse = $this->get('infra.json_response.service');

        $people = $personService->list();

        $jsonResponse->success($people);
    }
}