<?php


namespace App\Api\Request\Handler\Product;


use App\Api\Request\Data\ApiObjectInterface;
use App\Api\Request\Data\Product\CreateProductApiObject;
use App\Api\Request\Handler\ApiHandlerInterface;
use App\Repository\Product\CreateProductRepository;

class CreateProductApiHandler implements ApiHandlerInterface
{
    protected $createProductRepository;

    public function __construct(CreateProductRepository $createProductRepository)
    {
        $this->createProductRepository = $createProductRepository;
    }

    /**
     * @param CreateProductApiObject $object
     */
    public function process(ApiObjectInterface $object)
    {
        return $this->createProductRepository->createProduct($object);
    }
}