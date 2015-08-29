<?php
namespace leyestd\alipay;

use leyestd\alipay\Aliconfig;

/* *
 * 功能：纯担保交易接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 * ************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 * 1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 * 2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 * 3、支付宝论坛（http://club.alipay.com/read-htm-tid-8681712.html）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */

//require_once("alipay.config.php");

/* * ************************请求参数************************* */

class Alipay {

//支付类型
    public $payment_type = "1";
//必填，不能修改
//服务器异步通知页面路径
    //public $notify_url = \Yii::$app->params['notifyUrl'];
//需http://格式的完整路径，不能加?id=123这类自定义参数
//页面跳转同步通知页面路径
    //public $return_url = \Yii::$app->params['returnUrl'];
//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
//必填
//商品数量
    public $quantity = "1";
//必填，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品
//物流费用
    public $logistics_fee = "0.00";
//必填，即运费
//物流类型
    public $logistics_type = "EXPRESS";
//必填，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
//物流支付方式
    public $logistics_payment = "SELLER_PAY";
//必填，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）
//订单描述
//商户订单号


    public $parameter = [];
    public $alipay_config = [];

    public function __construct($out_trade_no, $subject, $price, $body, $show_url, $receive_name, $receive_address, $receive_zip, $receive_phone, $receive_mobile) {
   
        //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //合作身份者id，以2088开头的16位纯数字
        $this->alipay_config=(new Aliconfig)->getAliconfig();

        $this->parameter = array(
            "service" => "create_partner_trade_by_buyer",
            "partner" => trim($this->alipay_config['partner']),
            "seller_email" => trim($this->alipay_config['seller_email']),
            "payment_type" => $this->payment_type,
            "notify_url" => \Yii::$app->params['notifyUrl'],
            "return_url" => \Yii::$app->params['returnUrl'],
            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "price" => $price,
            "quantity" => $this->quantity,
            "logistics_fee" => $this->logistics_fee,
            "logistics_type" => $this->logistics_type,
            "logistics_payment" => $this->logistics_payment,
            "body" => $body,
            "show_url" => $show_url,
            "receive_name" => $receive_name,
            "receive_address" => $receive_address,
            "receive_zip" => $receive_zip,
            "receive_phone" => $receive_phone,
            "receive_mobile" => $receive_mobile,
            "_input_charset" => trim(strtolower($this->alipay_config['input_charset']))
        );
        
    }

//$out_trade_no = $_POST['WIDout_trade_no'];
////商户网站订单系统中唯一订单号，必填
////订单名称
//$subject = $_POST['WIDsubject'];
////必填
////付款金额
//$price = $_POST['WIDprice'];
//
//$body = $_POST['WIDbody'];
////商品展示地址
//$show_url = $_POST['WIDshow_url'];
////需以http://开头的完整路径，如：http://www.商户网站.com/myorder.html
////收货人姓名
//$receive_name = $_POST['WIDreceive_name'];
////如：张三
////收货人地址
//$receive_address = $_POST['WIDreceive_address'];
////如：XX省XXX市XXX区XXX路XXX小区XXX栋XXX单元XXX号
////收货人邮编
//$receive_zip = $_POST['WIDreceive_zip'];
////如：123456
////收货人电话号码
//$receive_phone = $_POST['WIDreceive_phone'];
////如：0571-88158090
////收货人手机号码
//$receive_mobile = $_POST['WIDreceive_mobile'];
//如：13312341234

    /*     * ********************************************************* */

//构造要请求的参数数组，无需改动
}

//建立请求
//$alipaySubmit = new AlipaySubmit($this->alipay_config);
//$html_text = $alipaySubmit->buildRequestForm($this->parameter, "get", "确认");
//echo $html_text;

