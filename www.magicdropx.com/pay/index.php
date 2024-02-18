<?PHP
include "../cfg/config.php";

$merchant='magicX';// 商户号 String 必填 商户签约时，支付平台分配的唯一商 户号。
$payment_type='1';//_type 支付类型 String 必填 接受的值及说明： 1=>掃碼 , 2=> 網關 , 3=> 直連 , 7=>原生渠道, 10=>USDT
$amount=$_REQUEST['amount'];// 提交金额 Number 必填 支付请求金额。
$order_id='C'.date('YmdHis').rand(11111,99999);// 订单号 String 必填 商户系统里的订单号
$bank_code='gcash';// 银行代码 String 必填 直連gcash固定值gcash、直連paymaya固定值PMP、直連UnionBank固定值UBP、USDT-TRC固定值usdt-trc
$callback_url='https://www.magicdropx.com/pay/return.php';// 回调地址 String 必填 会员支付成功时会通知的地址。
$return_url='https://www.magicdropx.com/pay/return.php';// 跳转地址 String 必填 直连通道之后成功后跳 转地址。
$key='5d04316a81a6bc6f452fab14d20a57b8';
$sign='';// 签名 String 必填 MD5 签名结果，请参阅支付结果通知接口的 签名算法。

$str="amount=".$amount."&bank_code=".$bank_code."&callback_url=".$callback_url."&merchant=".$merchant."&order_id=".$order_id."&payment_type=".$payment_type."&return_url=".$return_url."&key=".$key;
//echo $str;
$sign=md5($str);

$data = ['merchant'=>$merchant,'payment_type'=>$payment_type,'amount'=>$amount,'order_id'=>$order_id,'bank_code'=>$bank_code,'callback_url'=>$callback_url,'return_url'=>$return_url,'sign'=>$sign];
$url='https://payermax.la2568.site/api/transfer';
$headers = array('Content-Type: application/x-www-form-urlencoded','Host:payermax.la2568.site');
$curl = curl_init(); // 启动一个CURL会话
curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Post提交的数据包
curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($curl); // 执行操作
if (curl_errno($curl)) {
	echo 'Errno'.curl_error($curl);//捕抓异常
}
curl_close($curl); // 关闭CURL会话
$json=json_decode($result,true);
//print_r($json);

$recharge_no=$order_id;//'充值订单号',
$pay_no=$order_id;//'支付单号',
$third_no='';//'三方返回的订单号',
$user_id=$uid;//'用户id',
$username=$user['nickname'];//'用户名',
//$amount='';//'充值金额',
$pay_way='1';//'支付方式 1:微信 2:支付宝 ',
$status='1';//'充值状态 1:待支付 2:支付成功 3:支付失败 4:过期 5:取消',
$third_return='';//'第三方支付返回原始信息',
$create_time=date('Y-m-d H:i:s');//'创建时间',
$update_time=$create_time;//'更新时间',

$sql="INSERT INTO hm_user_balance_recharge_log (recharge_no,pay_no,third_no,user_id,username,amount,pay_way,status,third_return,create_time,update_time) VALUES ('$recharge_no','$pay_no','$third_no','$user_id','$username','$amount','$pay_way','$status','$third_return','$create_time','$update_time')";
mysqli_query($db,$sql) or die(mysqli_error($db));


echo '<script>window.location.href = "'.$json['qrcode_url'].'";</script>'

?>