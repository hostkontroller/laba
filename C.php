<?php
namespace ivanenko;

include "B.php";

class C extends B {
    protected $b;

    public function __construct($b3, $b4) {
        $this->a = $b3;
        $this->b = $b4;
    }
}
?>
