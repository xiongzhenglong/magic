<?php
include("../cfg/config.php"); //包含文件
if($uid==""){
	echo "<script>location.href='./login.html';</script>";
	exit;
}
$id=(int)$_REQUEST["id"];

$jp=runsql($db,"select recovery_price,order_id,goods_name from hm_order_record_detail where id='$id' and status='1' order by id asc");//奖品

if(!$jp){
	$json=array('code'=>0,'msg'=>'提货失败');
	echo json_encode($json);
	mysqli_close($db);
	exit;
}
$dz=runsql($db,"select * from hm_user_address where user_id='$uid' and default_flag='1' order by id asc");

$create_time=date('Y-m-d H:i:s');
$update_time=$create_time;

$sql="update hm_order_record_detail set status='3',update_time='$update_time' where id='$id' and user_id='$uid'";
mysqli_query($db,$sql) or die(mysqli_error($db));//奖品状态


$order_no='F'.date("YmdHis").rand(100000,999999);//'订单号',
$pay_no='F'.date("YmdHis").rand(100000,999999);//'支付订单号',
$amount='0.00';//'支付金额',
$pay_way='4';//'支付方式 1:微信 2:支付宝 3:哈希币 4:余额',
$pay_status='2';//'支付状态 1:待支付 2:已支付 3:已退款 4:部分退款 5:部分支付 6:支付异常',
$box_type='2';//'支付的盒子类型 1:全部 2:盒子中',
$user_id=$uid;//'支付人id',
$username=$user['nickname'];//'支付人名',
$address_id=$dz['id'];//'发货地址id',
$express_content='提货'.$jp[2];//'发货内容',
$pay_time=$create_time;//'支付时间',
$third_no='';//'三方单号',
$third_return='';//'三方返回的信息',
$pay_error='';//'异常支付信息',
//$create_time='';//'创建时间',
//$update_time='';//'更新时间',

$sql="INSERT INTO hm_order_express (order_no,pay_no,amount,pay_way,pay_status,box_type,user_id,username,address_id,express_content,pay_time,third_no,third_return,pay_error,create_time,update_time) VALUES ('$order_no','$pay_no','$amount','$pay_way','$pay_status','$box_type','$user_id','$username','$address_id','$express_content','$pay_time','$third_no','$third_return','$pay_error','$create_time','$update_time')";//运费订单
mysqli_query($db,$sql) or die(mysqli_error($db));


$wl=runsql($db,"select id from hm_order_express where user_id='$uid' and create_time='$create_time' order by id asc");//运费订单id

$deliver_no='F'.date("YmdHis").rand(100000,999999);//'系统内部发货单号',
$express_order_id=$wl[0];//'运费订单id',
//$address_id='';//'关联的地址id',
$address_info=$dz['province_name'].$dz['city_name'].$dz['area_name'].$dz['address'];//'收货地址',
//$user_id='';//'所属用户的id',
$type='1';//'类型1:发货物流 2:退货物流',
$status='1';//'状态：1:待发货  2:已发货 3:已签收  4:异常',
$express_name='';//'物流公司',
$express_code='';//'物流标识',
$express_no='';//'物流单号',
$express='';//'物流信息',
$express_status='1';//'物流状态 1:录入 2:进行中 3:已完成',
$postage_fee=$amount;//'物流费用',
//$create_time='';//'创建时间',
//$update_time='';//'更新时间',

$sql="INSERT INTO hm_user_box_deliver (deliver_no,express_order_id,address_id,address_info,user_id,`type`,status,express_name,express_code,express_no,express,express_status,postage_fee,create_time,update_time) VALUES ('$deliver_no','$express_order_id','$address_id','$address_info','$user_id','$type','$status','$express_name','$express_code','$express_no','$express','$express_status','$postage_fee','$create_time','$update_time')";//订单物流表
mysqli_query($db,$sql) or die(mysqli_error($db));

$json=array('code'=>1,'msg'=>'提货成功,发货中');
echo json_encode($json);

mysqli_close($db);


?>