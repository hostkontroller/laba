<?php
namespace ivanenko;

include "LogAbstract.php";
include "LogInterface.php";

use core\LogInterface;
use core\LogAbstract;

class MyLog extends LogAbstract implements LogInterface {
    public static function write() {
        MyLog::Instance()->_write();
    }
    
    public function _write() {
        foreach ($this->log as &$value) {
            echo("$value\n");
        }
    }
    
    public static function log($str) {
        MyLog::Instance()->log_internal($str);
    }
    
    protected function log_internal($str) {
        $this->log[] = $str;
    }
}


?>
