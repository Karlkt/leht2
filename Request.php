<?php

class Request {

    private $_request;

    public function __construct($request) {
        $this->_request = $request;
    }

    public function param($key) {
        return isset($this->_request[$key])
            ? $this->_request[$key]
            : '';
    }

    public function __toString() {
        return sprintf('<pre>%s</pre>', print_r($this->_request, true));
    }

}
