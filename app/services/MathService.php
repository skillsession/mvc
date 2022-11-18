<?php

/**
 * MathService is an example of how a service can be used for an algorithm
 */
class MathService {

    public function add_random_number ($a) {
        return $a + rand(1, 100);
    }

}