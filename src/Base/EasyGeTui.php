<?php
namespace PHPGeTui\Base;

class EasyGeTui extends BasePush
{

    /**
     * 单推
     * @param string $title
     * @param string $content
     * @param string $cid
     * @param array $trans
     * @return array|null
     * @throws \Exception
     */
    public function pushMsgToSingle($title, $content, $cid, $trans = [])
    {
        $template = $this->setNotificationTransmissionTemplate($title, $content, $trans);
        $target = $this->setSingleTarget($cid);
        $message = $this->setSingleMsg($template);
        try {
            $rep = $this->pushMessageToSingle($message, $target);
        } catch (\RequestException $e) {
            $id = $e->getRequestId();
            $rep = $this->pushMessageToSingle($message, $target, $id);
        }
        return $rep;
    }


    /**
     * 此接口频次限制100次/天，每分钟不能超过5次
     * @param string $title
     * @param string $content
     * @param array $trans
     * @return array|mixed|null
     * @throws \Exception
     */
    public function pushMsgToApp($title, $content, $trans = [])
    {
        $template = $this->setNotificationTransmissionTemplate($title, $content, $trans);
        $message = $this->setAppMsg($template);
        try {
            $rep = $this->pushMessageToApp($message);
        } catch (\Exception $e) {
            $rep = ['result' => 'err', 'msg' => $e->getMessage()];
        }
        return $rep;
    }


}



