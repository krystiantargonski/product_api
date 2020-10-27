<?php


namespace App\Api\Request\Parser;


use App\Api\Request\Handler\ApiHandlerInterface;

interface ApiRequestParserInterface
{

    public function processRequest($requestData, $objectClass, ApiHandlerInterface $handler);
}