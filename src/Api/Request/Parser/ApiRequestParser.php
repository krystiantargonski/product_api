<?php


namespace App\Api\Request\Parser;


use App\Api\Request\Handler\ApiHandlerInterface;
use App\Api\Request\Mapper\DataToApiObjectMapper;
use App\Api\Response\ApiResponseProvider;
use App\Api\Validator\ApiValidator;

class ApiRequestParser implements ApiRequestParserInterface
{
    protected $apiObjectMapper;

    protected $validator;

    protected $apiResponseProvider;

    public function __construct(DataToApiObjectMapper $apiObjectMapper, ApiValidator $validator, ApiResponseProvider $apiResponseProvider)
    {
        $this->apiObjectMapper = $apiObjectMapper;
        $this->validator = $validator;
        $this->apiResponseProvider = $apiResponseProvider;
    }

    /**
     * @param $requestData
     * @param $objectClass
     * @param ApiHandlerInterface $handler
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function processRequest($requestData, $objectClass, ApiHandlerInterface $handler)
    {
        try {
            $object = $this->apiObjectMapper->getObject($requestData, $objectClass);

            if (($errors = $this->validator->validate($object)) !== true) {
                return $this->apiResponseProvider->getValidationErrorResponse($errors);
            }

            $responseData = $handler->process($object);
        } catch(\Exception $e) {
            return $this->apiResponseProvider->getErrorResponse(['message' => $e->getMessage()]);
        }

        return $this->apiResponseProvider->getSuccessResponse($responseData);
    }
}