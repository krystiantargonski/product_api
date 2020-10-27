<?php


namespace App\Repository\Product;


use App\Api\Request\Data\Product\CreateProductApiObject;
use App\Entity\Product;

class CreateProductRepository extends ProductRepository
{
    public function createProduct(CreateProductApiObject $object)
    {
        $product = new Product();
        $product->setName($object->name);
        $product->setPrice($object->price);
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush($product);

        return $product;
    }
}