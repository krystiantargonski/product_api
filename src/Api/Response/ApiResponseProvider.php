<?php


namespace App\Api\Response;


use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseProvider
{

    const RESPONSE_SUCCESS = 'success';
    const RESPONSE_ERROR = 'error';
    const RESPONSE_VALIDATION_ERROR = 'validation_error';

    protected $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getSuccessResponse($data)
    {
        $output = json_decode($this->serializer->serialize($data, 'json'));

        return new JsonResponse(new ApiResponse(self::RESPONSE_SUCCESS, $output), JsonResponse::HTTP_CREATED);
    }

    public function getValidationErrorResponse($data)
    {
        return new JsonResponse(new ApiResponse(self::RESPONSE_VALIDATION_ERROR, $data), JsonResponse::HTTP_NOT_ACCEPTABLE);
    }

    public function getErrorResponse($data)
    {
        return new JsonResponse(new ApiResponse(self::RESPONSE_ERROR, $data), JsonResponse::HTTP_BAD_REQUEST);
    }
}
