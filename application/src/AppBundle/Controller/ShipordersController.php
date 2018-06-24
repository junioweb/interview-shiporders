<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ShipordersController
 * @package AppBundle\Controller
 */
class ShipordersController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Returns a map of shiporders",
     *   output={
     *     "collection"=true,
     *     "collectionName"="shiporders",
     *     "class"="Domain\Model\Shiporder\Shiporder"
     *   },
     *   statusCodes={
     *     200="Returned when successful"
     *   }
     * )
     * @return Response
     */
    public function getShipordersAction(): Response
    {
        $jsonResponseService = $this->get('infra.json_response.service');
        $shipordersService = $this->get('app.shiporder.service');

        $shiporders = $shipordersService->findAll();

        return $jsonResponseService->success($shiporders);
    }
}