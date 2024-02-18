<?php
$merchant='magicX';// 商户号 String 必填 商户签约时，支付平台分配的唯一商 户号。
$payment_type='1';//_type 支付类型 String 必填 接受的值及说明： 1=>掃碼 , 2=> 網關 , 3=> 直連 , 7=>原生渠道, 10=>USDT
$amount='20';//$_REQUEST['money'];// 提交金额 Number 必填 支付请求金额。
$order_id=date('YmdHis').rand(11111,99999);// 订单号 String 必填 商户系统里的订单号
$bank_code='gcash';// 银行代码 String 必填 直連gcash固定值gcash、直連paymaya固定值PMP、直連UnionBank固定值UBP、USDT-TRC固定值usdt-trc
$callback_url='https://www.magicdropx.com/pay/return.php';// 回调地址 String 必填 会员支付成功时会通知的地址。
$return_url='https://www.magicdropx.com/pay/return.php';// 跳转地址 String 必填 直连通道之后成功后跳 转地址。
$key='5d04316a81a6bc6f452fab14d20a57b8';
$sign='';// 签名 String 必填 MD5 签名结果，请参阅支付结果通知接口的 签名算法。



$str="amount=".$amount."&bank_code=".$bank_code."&callback_url=".$callback_url."&merchant=".$merchant."&order_id=".$order_id."&payment_type=".$payment_type."&return_url=".$return_url."&key=".$key;
$str1="amount=".$amount."&bank_code=".$bank_code."&callback_url=".$callback_url."&merchant=".$merchant."&order_id=".$order_id."&payment_type=".$payment_type."&return_url=".$return_url;
//echo $str;
$sign=md5($str);
//$sign = strtoupper($sign);
//echo $sign;
//exit;
?>
<html>
<head>
<title>pay to bank</title>
</head>
<body onLoad="document.pay.submit();">

<form action="https://payermax.la2568.site/api/transfer" name="pay" id="pay" method="post">
<input type="hidden" name="merchant" value="<?php echo $merchant?>">
<input type="hidden" name="payment_type" value="<?php echo $payment_type?>">
<input type="hidden" name="amount" value="<?php echo $amount?>">
<input type="hidden" name="order_id" value="<?php echo $order_id?>">
<input type="hidden" name="bank_code" value="<?php echo $bank_code?>">
<input type="hidden" name="callback_url" value="<?php echo $callback_url?>">
<input type="hidden" name="return_url" value="<?php echo $return_url?>">
<input type="hidden" name="sign" value="<?php echo $sign?>">
</form>
</body>

</html>