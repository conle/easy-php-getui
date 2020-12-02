<?php
namespace PHPGeTui\sdk\igetui\ex;

class Sound{
    //取值范围0，1
    var $critical = -1;
    var $name;
    //取值范围0-1，一位小数，超过一位四舍五入
    var $volume = -1;

    function set_critical($critical)
    {
        $this->critical = $critical;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function set_volume($volume)
    {
        if ($volume > 1 || $volume < 0){
            throw new Exception("volume of sound_d should between 0.0 and 1.0");
        }
        $this->volume = round($volume, 1);
    }

    function get_asMap()
    {
        $a = array();
        if (!empty($this->name)){
            $a["name"] = $this->name;
        }
        if ($this->critical != -1){
            $a["critical"] = $this->critical;
        }
        if ($this->volume != -1){
            $a["volume"] = $this->volume;
        }
        return $a;
    }
}