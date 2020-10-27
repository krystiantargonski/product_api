<?php


namespace App\Api\Request\Data\Product;


use App\Api\Request\Data\ApiObjectInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CreateProductApiObject implements ApiObjectInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     */
    public $name;

    /**
     * @Assert\NotBlank
     * @Assert\Type(message="Price must be a numeric value", type={"float", "integer"})
     */
    public $price;
}