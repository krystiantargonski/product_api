<?php


namespace App\Api\Request\DataProvider;


use Symfony\Component\HttpFoundation\RequestStack;

class RequestDataProvider implements RequestDataProviderInterface {

    protected $request;

    public function __construct(RequestStack $requestStack) {
        $this->request = $requestStack->getCurrentRequest();
    }

    public function getData() {
        return array_merge($this->request->request->all(), $this->request->query->all());
    }
}