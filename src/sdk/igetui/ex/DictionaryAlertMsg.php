<?php
namespace PHPGeTui\sdk\igetui\ex;

class DictionaryAlertMsg implements ApnMsg {

    var $title;
    var $body;
    var $titleLocKey;
    var $titleLocArgs = array();
    var $actionLocKey;
    var $locKey;
    var $locArgs = array();
    var $launchImage;
    var $subtitle;
    var $subtitleLocKey;
    var $subtitleLocArgs;
    //IOS 12 新增
    var $summaryArg;
    //IOS 12 新增
    var $summaryArgCount = -1;

    public function get_alertMsg() {

        $alertMap = array();

        if ($this->title != null && $this->title != "") {
            $alertMap["title"] = $this->title;
        }
        if ($this->body != null && $this->body != "") {
            $alertMap["body"] = $this->body;
        }
        if ($this->titleLocKey != null && $this->titleLocKey != "") {
            $alertMap["title-loc-key"] = $this->titleLocKey;
        }
        if (sizeof($this->titleLocArgs) > 0) {
            $alertMap["title-loc-args"] = $this->titleLocArgs;
        }
        if ($this->actionLocKey != null && $this->actionLocKey) {
            $alertMap["action-loc-key"] = $this->actionLocKey;
        }
        if ($this->locKey != null && $this->locKey != "") {
            $alertMap["loc-key"] = $this->locKey;
        }
        if (sizeof($this->locArgs) > 0) {
            $alertMap["loc-args"] = $this->locArgs;
        }
        if ($this->launchImage != null && $this->launchImage != "") {
            $alertMap["launch-image"] = $this->launchImage;
        }

        if(count($alertMap) == 0)
        {
            return null;
        }

        if ($this->subtitle != null && $this->subtitle != "") {
            $alertMap["subtitle"] = $this->subtitle;
        }
        if (sizeof($this->subtitleLocArgs) > 0) {
            $alertMap["subtitle-loc-args"] = $this->subtitleLocArgs;
        }
        if ($this->subtitleLocKey != null && $this->subtitleLocKey != "") {
            $alertMap["subtitle-loc-key"] = $this->subtitleLocKey;
        }
        if (!empty($this->summaryArg)){
            $alertMap["summary-arg"] = $this->summaryArg;
        }
        if ($this->summaryArgCount != -1){
            $alertMap["summary-arg-count"] = $this->summaryArgCount;
        }
        return $alertMap;
    }

    function set_summaryArg($summaryArg){
        $this->summaryArg = $summaryArg;
        return $this;
    }

    function set_summaryArgCount($summaryArgCount){
        $this->summaryArgCount = $summaryArgCount;
        return $this;
    }
}