<?php

include "t2.php";
use vlad\Foo;

class ZeroDivisionException extends RuntimeException {
}

class NoRootException extends RuntimeException {
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

class B extends A {
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
                    $this->x = (- $b) + sqrt($d) / (2 *$a );
                    $this->x2 = (- $b) - sqrt($d) / (2 *$a);
                }
                return $this->x;
            }
        }
    }    

    public function get_x2() {
        return $this->x2;
    }
}

class C extends B {
    protected $b;

    public function __construct($b3, $b4) {
        $this->a = $b3;
        $this->b = $b4;
    }
}



$a1 = new A();
$b2 = new B($a1);
$b3 = new B($a1);
$b4 = new B($b2);
$c5 = new C($b3, $b4);


?>


 <html>
<head>
<title>тема 1</title>
</head>
<body>
<?php
try {
    $a = 1;
    $b = 2;
    $a1->linear_equation($a ,$b); 
    $x = $a1->get_x();
    echo("$a x + $b = 0:<br> x = $x<br><br>");
} catch (Exception $e) {
    if( $e instanceof ZeroDivisionException) {
        echo("не дели на ноль, лупень!"); echo("<br>");
    }
}

try {
    $a = 2;
    $b = 6;
    $c = 1;
    $x = $b2->quadratic_equation($a, $b, $c); 
    $x = $b2->get_x();
    $x2 = $b2->get_x2();
    echo("$a x^2 + $b x + $c = 0:<br> x = $x<br>");
    if($x2 != $x) {
        echo("x = $x2<br>");
    }
} catch (Exception $e) {
    if( $e instanceof ZeroDivisionException) {
        echo ("не дели на ноль, лупень!"); echo("<br>");
    }
    if( $e instanceof NoRootException) {
        echo ("корней нет, лупень!"); echo("<br>");
    }
}


echo(Foo::bar());
?>
</body>
 </html>
