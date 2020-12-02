<?php
namespace PHPGeTui\sdk\igetui\ex;

use PHPGeTui\sdk\protobuf\type\PBEnum;

class ServerNotify_NotifyType extends PBEnum
{
    const normal  = 0;
    const serverListChanged  = 1;
    const exception  = 2;
}