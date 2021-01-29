<?php
namespace ivanenko;
include "EquationInterface.php";
include "A.php";
use core\EquationInterface;


class NoRootException extends \RuntimeException {
}


class B extends A implements EquationInterface {
    protected $a;
    private $x2;

    public function __construct($a) {
        $this->a = $a;
    }
    
    protected function discriminant($a, $b, $c) {
        return $b*$b - 4 * $a * $c;
    }
    
    public function quadratic_equation($a, $b, $c) {
        if($a == 0) {
             throw new ZeroDivisionException();
        } else {
            $d = $this->discriminant($a, $b, $c);
            if($d < 0) {
                throw new NoRootException();
            } else {
                if($d == 0) {
                     $this->x2 = $this->x = (- $b) / (2 *$a);
                } else {
                    $this->x = ((- $b) + sqrt($d)) / (2 *$a );
                    $this->x2 = ((- $b) - sqrt($d)) / (2 *$a);
                }
                return $this->x;
            }
        }
    }    

    public function get_x2() {
        return $this->x2;
    }
    
    public function solve($a, $b, $c) {
        $ret["x1"] = $this->quadratic_equation($a, $b, $c);
        $ret["x2"] = $this->get_x2();
        return $ret;
    }
}


?> 
 
