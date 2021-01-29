 <?php
include "C.php";
include "MyLog.php";
use ivanenko\A;
use ivanenko\B;
use ivanenko\C;
use ivanenko\MyLog;
use ivanenko\NoRootException;
use ivanenko\ZeroDivisionException;

$a1 = new A();
$b2 = new B($a1);
$b3 = new B($a1);
$b4 = new B($b2);
$c5 = new C($b3, $b4);
MyLog::log("<html><head><title>лаба</title></head><body>");
if(isset($_GET['sub']))
{
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    MyLog::log("Уравнение: $a x^2 + $b x + $c = 0:<br>");
    try {
        if(!$a && $b) {
            MyLog::log("Уравнение линейное<br>");
            $a1->linear_equation($b, $c); 
            $x = $a1->get_x();
            MyLog::log("x = $x<br><br>");
        } else if($a) {
            MyLog::log("Уравнение квадратное<br>");
            $xx = $b2->solve($a, $b, $c);
            foreach ($xx as &$x) {
                MyLog::log("x = $x<br>");
            }
        } else {
            MyLog::log("Уравнение не существует<br>");
        }
    } catch (Exception $e) {
        if($e instanceof NoRootException) {
            MyLog::log("корней нет!<br>"); 
        }
        if($e instanceof ZeroDivisionException) {
            MyLog::log("не дели на ноль!<br>");
        }
    }
}
MyLog::log('<form action="#" method="get"><input type="text" name="a" /> x^2 + <input type="text" name="b" /> x + <input type="text" name="c" /> = 0<input type="submit" name="sub" value = "ввод"/></form></body></html>');
MyLog::write();
?>
