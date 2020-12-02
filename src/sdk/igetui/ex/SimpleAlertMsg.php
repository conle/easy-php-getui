<?php
namespace PHPGeTui\sdk\igetui\ex;


class SimpleAlertMsg implements ApnMsg{
    var $alertMsg;

    public function get_alertMsg() {
        return $this->alertMsg;
    }
}
