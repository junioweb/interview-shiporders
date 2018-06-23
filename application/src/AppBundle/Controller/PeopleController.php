<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PeopleController
 * @package AppBundle\Controller
 * @Rest\Prefix("/people")
 */
class PeopleController extends FOSRestController
{
    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     * @Rest\Get("")
     * @return Response
     */
    public function listAction(): Response
    {
        $jsonResponseService = $this->get('infra.json_response.service');
        $personService = $this->get('app.person.service');

        $people = $personService->findAll();

        return $jsonResponseService->success($people);
    }
}