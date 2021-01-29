 <?php
include "LogAbstract.php";
include "LogInterface.php";

namespace ivanenko;
use core\EquationInterface;

class MyLog extends LogAbstract implements LogInterface {
    public function _write() {
        foreach ($this->log as &$value) {
            echo("$value<br>");
        }
    }
    public function addLogEntry($entry) {
        $this->log[] = $entry;
    }
}


?>
