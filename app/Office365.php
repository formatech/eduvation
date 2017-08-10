<?php

namespace App;

class Office365 {

    private $secret; 

    public function __construct($key) {
        $this->secret = $key;
    }


    function documents() {

        if($this->secret !== '1234') {
            throw new \Exception("Wrong api key");
        }

        return [
            'document 1',
            'document 2',
            'document 3',
            'document 4',
        ];
    }
}