<?php
namespace ivanenko;

class ZeroDivisionException extends \RuntimeException {
}

class A {
    protected $x;

    
    public function __construct() {
    }

    
    public function linear_equation($a, $b) {
        if($a == 0) {
            throw new ZeroDivisionException();
        } else {
            $this->x = (- $b) / $a;
            return $this->x;
        }
    }
    
    public function get_x() {
        return $this->x;
    }
}

?> 
