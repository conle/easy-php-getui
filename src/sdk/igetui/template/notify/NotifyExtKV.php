<?php
namespace PHPGeTui\sdk\igetui\ex;

class NotifyExtKV{
    var $key;
    var $value;
    var $constrains = PlatformConstains::ALL;

    function __construct($key, $value, $constrains)
    {
        $this->key = $key;
        $this->value = json_encode($value);
        $this->constrains = $constrains;
    }

    function get_key(){
        return $this->key;
    }
    function get_value(){
        return $this->value;
    }
    function get_constrains(){
        return $this->constrains;
    }
    function set_key($key){
        $this->key = $key;
    }

}