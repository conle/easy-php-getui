<?php

namespace PHPGeTui\BasePush;

class BasePush extends \IGeTui
{
    protected $host = 'http://sdk.open.api.igexin.com/apiex.htm';

    /**
     * @var string
     */
    protected $appid;

    protected $android_package_name;

    /**
     * BasePush constructor.
     * @param string $appid
     * @param string $appkey
     * @param string $masterSecret
     * @param string|string $domainUrl
     * @param null $ssl
     */
    public function __construct($appid, $appkey, $masterSecret, $domainUrl, $ssl = NULL)
    {
        parent::__construct($domainUrl, $appkey, $masterSecret, $ssl);
        $this->appid = $appid;
    }


    /**
     * 透析模板
     * @param string $title
     * @param string $content
     * @param array $data
     * @param int $transmissionType
     * @param bool $is_slient
     * @return \IGtTransmissionTemplate
     * @throws \Exception
     */
    protected function setNotificationTransmissionTemplate($title = '', $content = '', $data = [], $transmissionType = 1, $is_slient = false)
    {
        $mes = $listId = [
            'title' => $title,
            'content' => $content,
            'payload' => [
                "push" => "inner",
                "event" => "warning",
                "silent" => $is_slient,
            ]
        ];
        $mes['payload']['data'] = $data;
        $template = new \IGtTransmissionTemplate();
        $template->set_appid($this->appid);//应用appid
        $template->set_appkey($this->appkey);//应用appkey
        $template->set_transmissionType($transmissionType);//透传消息类型
        $template->set_transmissionContent(json_encode($listId));//透传内容

        $intent = 'intent:#Intent;action=android.intent.action.oppopush;launchFlags=0x14000000;component=' . $this->android_package_name . '/io.dcloud.PandoraEntry;S.UP-OL-SU=true;S.title=' . $title . ';S.content=' . $content . ';S.payload=' . json_encode($mes['payload']) . ';end';

        $notify = new \IGtNotify();
        $notify->set_title($title);
        $notify->set_content($content);
        $notify->set_intent($intent);
        $notify->set_type(\NotifyInfo_Type::_intent);
        $template->set3rdNotifyInfo($notify);

        //APN高级推送
        $alertmsg = new \DictionaryAlertMsg();
        $alertmsg->body = $mes['content'];
        $alertmsg->actionLocKey = "查看";
        $alertmsg->locKey = $listId['content'];
        $alertmsg->locArgs = array("locargs");
        $alertmsg->launchImage = "launchimage";
        //IOS8.2 支持
        $alertmsg->title = $mes['title'];
        $alertmsg->titleLocKey = $mes['title'];
        $alertmsg->titleLocArgs = array("TitleLocArg");

        $apn = new \IGtAPNPayload();
        $apn->alertMsg = $alertmsg;
        $apn->badge = 0;
        $apn->sound = "";
        $apn->add_customMsg("payload", "payload");
        $apn->contentAvailable = 0;
        $apn->category = "ACTIONABLE";
        $template->set_apnInfo($apn);
        return $template;
    }

    /**
     * @param $template
     * @return \IGtSingleMessage
     */
    protected function setSingleMsg($template)
    {
        $message = new \IGtSingleMessage();
        $message->set_isOffline(true);//是否离线
        $message->set_offlineExpireTime(3600 * 12 * 1000);//离线时间
        $message->set_data($template);//设置推送消息类型
        $message->set_PushNetWorkType(0);
        return $message;
    }

    /**
     * @param $cid
     * @return \IGtTarget
     */
    protected function setSingleTarget($cid)
    {
        $target = new \IGtTarget();
        $target->set_appid($this->appid);
        $target->set_clientId($cid);
        return $target;
    }

    /**
     * 群推msg
     * @param $template
     * @return \IGtAppMessage
     */
    protected function setAppMsg($template)
    {
        $message = new \IGtAppMessage();
        $message->set_isOffline(true);//是否离线
        $message->set_offlineExpireTime(3600 * 12 * 1000);//离线时间
        $message->set_data($template);//设置推送消息类型
        $message->set_PushNetWorkType(0);

        $appIdList = [$this->appid];
        $phoneTypeList = ['IOS', 'ANDROID'];
        $cdt = new \AppConditions();
        $cdt->addCondition3(\AppConditions::PHONE_TYPE, $phoneTypeList);
        $message->set_appIdList($appIdList);
        $message->set_conditions($cdt);

        return $message;
    }


}