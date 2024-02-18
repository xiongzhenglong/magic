<?php
header("Content-type: text/html; charset=utf-8");
include("../cfg/config.php"); //包含文件
if($uid<=0){
	mysqli_close($db);
    exit;
}
function getgg($i){
	if($i=="1"){
		return '单规格';
	}
	if($i=="2"){
		return '多规格';
	}
}



$gid=(int)$_REQUEST["gid"];
$zf=(int)$_REQUEST["zf"];//支付方式
$sl=(int)$_REQUEST["sl"];
$msg='';
$god=runsql($db,"select * from hm_goods where id='$gid' order by id desc");
$bl=runsql($db,"select value from hm_sys_setting where id='74' order by id asc");//系统比率，兑换比例


$hj=$sl*$god['integral_price'];
if($user['integral']>=$hj && $hj>0){

$pid='0';//'父订单id',
$type='1';//'订单类型 1:普通订单 2:盲盒订单',
$order_no='B'.date("YmdHis").rand(100000,999999);//'订单号',
$pay_order_no='B'.date("YmdHis").rand(100000,999999);//'支付订单号',
$user_id=$uid;//'下单用户',
$user_name=$user['nickname'];//'下单人名',
$blindbox_id='0';//'购买盲盒的id',
$box_id='0';//'购买的盲盒的箱子id（预留）',
$play_id='0';//'盲盒玩法id',
$total_num=$sl;//'订单商品数量',
$unit_price='0.00';//'单抽价格',
$postage='0.00';//'邮费',
$order_price=$hj;//'订单总金额',
$pay_way=$zf;//'支付方式 1:微信 2:支付宝 3:哈希币 4:余额',
$pay_price=$hj;//'实际支付金额',
$pay_integral=$hj;//'实际支付哈希币',
$pay_postage='0';//'实际支付邮费',
$coupon_amount='0';//'优惠券累计抵扣金额',
$pay_status='2';//'支付状态 1:待支付 2:已支付 3:已退款 4:部分退款 5:部分支付 6:支付异常 7:支付超时',
$pay_time=date('Y-m-d H:i:s');//'支付时间',
$delivery_time='';//'发货时间',
$address_id='';//'发货地址id',
$address_info='';//'发货地址详情',
$express_name='';//'发货物流名',
$express_code='';//'物流编号',
$express_no='';//'发货订单号',
$cancel_time='';//'取消时间',
$received_time='';//'收货时间',
$close_time='';//'关闭时间',
$status='2';//'订单状态 1:待支付 2:待发货 3:待收货 4:部分发货 5:已完成 6:已取消 7:已关闭 8:库存不足',
$return_msg='';//'第三方返回信息',
$third_code='';//'第三方支付订单号',
$remark='';//'用户备注',
$integral_ratio=$bl[0];//'哈希币兑换比',
$del_flag='1';//'1:正常 2:删除',
$user_del='1';//'用户是否删除 1:正常 2:删除',
$create_time=$pay_time;//'创建时间',
$update_time=$pay_time;//'更新时间',

$sql="INSERT INTO hm_order  (pid,`type`,order_no,pay_order_no,user_id,user_name,blindbox_id,box_id,play_id,total_num,unit_price,postage,order_price,pay_way,pay_price,pay_integral,pay_postage,coupon_amount,pay_status,pay_time,status,create_time,update_time) VALUES ('$pid','$type','$order_no','$pay_order_no','$user_id','$user_name','$blindbox_id','$box_id','$play_id','$total_num','$unit_price','$postage','$order_price','$pay_way','$pay_price','$pay_integral','$pay_postage','$coupon_amount','$pay_status','$pay_time','$status','$create_time','$update_time')";//创建订单
mysqli_query($db,$sql) or die(mysqli_error($db));

$sql= "update hm_user set integral=integral-'$hj' where id='$uid'";//减掉哈希币
mysqli_query($db,$sql) or die(mysqli_error($db));

$orderid=runsql($db,"select id from hm_order where order_no='$order_no' and user_id='$uid' order by id asc");//获取订单ID

$order_id=$orderid[0];//'关联的订单id',
//$order_no='';
//$user_id='';//'用户id',
$goods_id=$god['id'];//'商品id',
$goods_name=$god['name'];//'商品名称',
$goods_image=$god['image'];//'商品图片',
$rule_id=$god['type'];//'规格id',
$rule=getgg($god['type']);//'规格描述',
$num=$sl;//'购买数量',
$real_pay_amount='0.00';//'实际支付金额',
$real_pay_integral=$hj;//'实际支付积分',
//$create_time='';//'创建时间',
//$update_time='';//'更新时间',
$sql="INSERT INTO hm_order_detail (order_id,order_no,user_id,goods_id,goods_name,goods_image,rule_id,rule,num,real_pay_amount,real_pay_integral,create_time,update_time) VALUES ('$order_id','$order_no','$user_id','$goods_id','$goods_name','$goods_image','$rule_id','$rule','$num','$real_pay_amount','$real_pay_integral','$create_time','$update_time')";//哈希币商城订单详情
mysqli_query($db,$sql) or die(mysqli_error($db));


//$user_id='';//'关联的用户id',
$username=$user_name;//'用户名',
$integral=$hj;//'变动的哈希币',
$type='2';//'类型 1:回收新增 2:兑换消耗 3:后台赠送 4:后台减少',
//$order_id=$orderid[0];//'关联的订单id',
$exchange_id='0';//'关联的回收的id',
//$create_time='';//'创建时间',
//$update_time='';//'更新时间',
$sql="INSERT INTO hm_user_integral_change_log (user_id,username,integral,type,order_id,exchange_id,create_time,update_time) VALUES ('$user_id','$username','$integral','$type','$order_id','$exchange_id','$create_time','$update_time')";//用户哈希币变动记录
mysqli_query($db,$sql) or die(mysqli_error($db));

$json=array('code'=>1,'od'=>0,'msg'=>'兑换成功');
echo json_encode($json);
}else{
	$json=array('code'=>0,'od'=>0,'msg'=>'余额不足');
	echo json_encode($json);
}
mysqli_close($db);
exit;

?>

