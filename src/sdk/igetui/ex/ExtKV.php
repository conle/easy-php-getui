<?php
namespace PHPGeTui\sdk\igetui\ex;

use PHPGeTui\sdk\protobuf\PBMessage;

class ExtKV extends PBMessage
{
    var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
    public function __construct($reader=null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
    }
    function key()
    {
        return $this->_get_value("1");
    }
    function set_key($value)
    {
        return $this->_set_value("1", $value);
    }
    function value()
    {
        return $this->_get_value("2");
    }
    function set_value($value)
    {
        return $this->_set_value("2", $value);
    }
    function constains()
    {
        return $this->_get_value("3");
    }
    function set_constains($value)
    {
        return $this->_set_value("3", $value);
    }
}