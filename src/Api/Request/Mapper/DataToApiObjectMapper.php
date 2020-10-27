<?php


namespace App\Api\Request\Mapper;


use App\Api\Helper\VariableNameConverter;

class DataToApiObjectMapper implements DataToApiObjectMapperInterface
{
    public function getObject($requestData, $objectClass) {
        $object = new $objectClass;
        $objectProperties = get_object_vars($object);
        $objectMethods = get_class_methods($objectClass);

        foreach ($requestData as $propertyName => $propertyValue) {
            $setter = 'set' . ucfirst($propertyName);
            $propertyName = VariableNameConverter::toCamelCase($propertyName);
            if (array_key_exists($propertyName, $objectProperties)) {
                $object->$propertyName = $propertyValue;
            } if (in_array($setter, $objectMethods)) {
                $object->$setter($propertyValue);
            }
        }

        return $object;
    }
}