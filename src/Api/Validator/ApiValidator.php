<?php


namespace App\Api\Validator;


use App\Api\Helper\VariableNameConverter;
use App\Api\Request\Data\ApiObjectInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiValidator implements ApiValidatorInterface
{
    protected $validator;

    protected $errorFormatter;

    public function __construct(ValidatorInterface $validator, ErrorFormatter $errorFormatter)
    {
        $this->validator = $validator;
        $this->errorFormatter = $errorFormatter;
    }

    public function validate(ApiObjectInterface $apiObject)
    {
        $errors = $this->validator->validate($apiObject);
        if (count($errors) > 0) {
            $errorsData = $this->errorFormatter->format($errors);
            $results = [];
            foreach ($errorsData as $errorName => $errorValue) {
                $results[VariableNameConverter::uncamelCase($errorName)] = $errorValue;
            }

            return $results;
        }

        return true;
    }
}