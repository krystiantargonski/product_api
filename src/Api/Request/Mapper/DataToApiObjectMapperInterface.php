<?php


namespace App\Api\Request\Mapper;


interface DataToApiObjectMapperInterface
{
    public function getObject($requestData, $objectClass);
}