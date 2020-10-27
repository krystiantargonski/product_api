<?php


namespace App\Api\Request\Handler;


use App\Api\Request\Data\ApiObjectInterface;

interface ApiHandlerInterface
{
    public function process(ApiObjectInterface $object);
}