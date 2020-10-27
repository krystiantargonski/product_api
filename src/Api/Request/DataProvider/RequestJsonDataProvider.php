<?php


namespace App\Api\Request\DataProvider;


class RequestJsonDataProvider extends RequestDataProvider {

    public function getData() {
        if (0 === strpos($this->request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode(urldecode($this->request->getContent()), true);
            return is_array($data) ? $data : [];
        }

        return [];
    }
}
