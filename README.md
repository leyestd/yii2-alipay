# yii2-alipay
担保交易扩展

安装
composer require leyestd/yii2-alipay "dev-master"

配置
设置common/config/params.php

return [
    'adminEmail' => 'xxxxx@qq.com',

    'supportEmail' => 'xxxxxxx@qq.com',

    'user.passwordResetTokenExpire' => 3600,

    'showUrl'=>'http://www.sasr.cn/index.php',

    'notifyUrl' => 'http://www.sasr.cn/index.php/ali-return/notify',  

    'returnUrl' => 'http://www.sasr.cn/index.php/ali-return/returned', 
  
    'aliPartner' => 'xxxxxxxxxxxxx',

    'aliSellerEmail' => 'xxxxxx@126.com',

    'aliKey'=> 'xxxxxxxx'

];

使用

use leyestd\alipay\Alipay;

use leyestd\alipay\lib\AlipaySubmit;

//参数为支付宝所需

$alipay=new Alipay($order->orderNumber,  ltrim($productSkus),$cost,$order->notes,$show_url,$recipient->name,$recipient->address,$recipient->postcode,$recipient->phone,$recipient->mobile);

$html_text = (new AlipaySubmit($alipay->alipay_config))->buildRequestForm($alipay->parameter, "get", "确认");
               
echo $html_text;

支付宝支付后返回

$alipayNotify = new AlipayNotify((new Aliconfig)->getAliconfig());

$verify_result = $alipayNotify->verifyReturn();

以下为支付宝支付后通知

$alipayNotify = new AlipayNotify((new Aliconfig)->getAliconfig());

$verify_result = $alipayNotify->verifyNotify();

日志

默认在frontend/runtime/logs/alilog.txt  需要写入权限

也可自己修改AlipayCore下的logResult方法到指定位置


