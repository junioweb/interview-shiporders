<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @return JsonResponse
     */
    public function listAction(): JsonResponse
    {
        $json = $this->container->get('jms_serializer')
            ->serialize('oi', 'json');

        $response = new JsonResponse($json, 200, ['Content-Type' => 'application/json']);

        return $response;
    }
}