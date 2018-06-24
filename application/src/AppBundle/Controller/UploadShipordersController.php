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
class UploadShipordersController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Upload the Shiporders XML",
     *   statusCodes={
     *     201="Returned when XML is successfully processed"
     *   }
     * )
     * @param Request $request
     * @return Response
     */
    public function postUploadShipordersAction(Request $request): Response
    {
        $serializer = $this->get('jms_serializer');
        $jsonResponseService = $this->get('infra.json_response.service');
        $shiporderService = $this->get('app.shiporder.service');

        $shiporders = $serializer->deserialize(
            $request->getContent(),
            'Infrastructure\Presentation\DataTransferObject\Shiporders',
            'xml'
        );

        $shiporderService->insertByCollection($shiporders->getShiporders());

        return $jsonResponseService->created();
    }
}