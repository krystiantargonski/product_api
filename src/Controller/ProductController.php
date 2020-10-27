<?php

namespace App\Controller;

use App\Api\Request\Data\Product\CreateProductApiObject;
use App\Api\Request\DataProvider\RequestJsonDataProvider;
use App\Api\Request\Handler\Product\CreateProductApiHandler;
use App\Api\Request\Parser\ApiRequestParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product", name="product_")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/create", name="create", methods={"POST"})
     * @param RequestJsonDataProvider $requestDataProvider
     * @param ApiRequestParser $apiRequestParser
     * @param CreateProductApiHandler $createProductApiHandler
     * @return Response
     */
    public function create(RequestJsonDataProvider $requestDataProvider, ApiRequestParser $apiRequestParser, CreateProductApiHandler $createProductApiHandler): Response
    {
        return $apiRequestParser->processRequest($requestDataProvider->getData(),
                                        CreateProductApiObject::class, $createProductApiHandler
                );
    }
}
