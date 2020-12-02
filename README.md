# easy-php-getui
个推封装 V1.0
## 说明
1.x版本 简易封装个推 使用
无消息队列等
## 安装

### 一、执行命令安装
```
composer require conle/easy-php-getui
```

或者

### 二、require安装

```
"require": {
        "conle/easy-php-getui":"1.*"
},
```

## 使用
#### 获取个推配置
1. 注册个推
   1. [官方网址](https://www.getui.com/)
2. 获取配置
   1. 根据引导创建应用
   2. 应用信息中 获取appId等配置

#### 使用方法
```
$appId = '';
$appKey = '';
$masterSecret = '';
$easyPush = new EasyGetui($appId, $appKey, $masterSecret);
$title = '推送标题';
$content = '推送内容';
$cid = 'ClientId';
$trans = [];//附加data 可不传
$rep = $easyPush->pushMsgToSingle($title, $content, $cid, $trans);//单推                              //获取二维码生成的地址

```
#### 属性部分描述
```
$easyPush->android_package_name='安卓包名'
$easyPush->offlineExpireTime='离线时间'//默认12小时 单位ms
$easyPush->phoneTypeList=[手机类型]//默认['IOS', 'ANDROID'] 大写

```

     


