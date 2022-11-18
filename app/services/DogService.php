<?php

/**
 * Dog Service is an example of how a Service can be used to access an external API
 */
class DogService {

    public function get_fact () {
        $URL = "https://dog-facts-api.herokuapp.com/api/v1/resources/dogs?number=1";
        $json = file_get_contents($URL);
        $object = json_decode($json);
        return $object[0]->fact;
    }

}