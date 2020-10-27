<?php


namespace App\Api\Validator;


use App\Api\Request\Data\ApiObjectInterface;

interface ApiValidatorInterface
{
    public function validate(ApiObjectInterface $apiObject);
}