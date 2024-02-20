<?php
include("../cfg/config.php"); //包含文件
if($uid==""){
	echo "<script>location.href='./login.html';</script>";
	exit;
}
$id=(int)$_REQUEST["id"];

$jp=runsql($db,"select order_id,goods_id,goods_price,recovery_price from hm_order_record_detail where id='$id' and status='1' order by id asc");//奖品


if(!$jp){
	$json=array('code'=>0,'msg'=>'Exchange failed');
	echo json_encode($json);
	mysqli_close($db);
	exit;
}
$create_time=date('Y-m-d H:i:s');
$update_time=$create_time;

$sql="update hm_order_record_detail set status='2',update_time='$update_time' where id='$id' and user_id='$uid'";
mysqli_query($db,$sql) or die(mysqli_error($db));//奖品状态

$sql= "update hm_user set integral=integral+'$jp[3]' where id='$uid'";//加金币
mysqli_query($db,$sql) or die(mysqli_error($db));

$exchange_no='E'.date("YmdHis").rand(100000,999999);

$sql="INSERT INTO hm_user_box_exchange (exchange_no,user_id,username,exchange_num,total_amount,status,create_time,update_time) VALUES ('$exchange_no','$uid','$user[nickname]','1','$jp[3]','1','$create_time','$update_time')";//用户箱子兑换表
mysqli_query($db,$sql) or die(mysqli_error($db));

$box=runsql($db,"select id from hm_user_box_exchange where user_id='$uid' and create_time='$create_time' order by id asc");//get用户箱子兑换表

$sql="INSERT INTO hm_user_box_exchange_detail (exchange_id,user_id,user_box_uuid,record_detail_id,goods_id,num,amount,create_time,update_time) VALUES ('$box[0]','$uid','0','$id','$jp[1]','1','$jp[3]','$create_time','$update_time')";//用户盒子发货详情表
mysqli_query($db,$sql) or die(mysqli_error($db));

$sql="INSERT INTO hm_user_integral_change_log (user_id,username,integral,type,order_id,exchange_id,create_time,update_time) VALUES ('$uid','$user[nickname]','$jp[3]','1','$jp[0]','$box[0]','$create_time','$update_time')";//增加用户哈希币变动记录

mysqli_query($db,$sql) or die(mysqli_error($db));

$json=array('code'=>1,'msg'=>'Exchange successful');
echo json_encode($json);

mysqli_close($db);




















/* for($i=0;$i<count($jp);$i++){
	$it=array('id'=>$jp[$i]['id'],'goods_image'=>$jp[$i]['goods_image'],'goods_name'=>$jp[$i]['goods_name'],'recovery_price'=>$jp[$i]['recovery_price'],'create_time'=>$jp[$i]['create_time']);
	array_push($list,$it);
} */

//$sql="select * from hm_order_record_detail where status='1' and user_id='$uid' order by id asc LIMIT $ks, $sl";
/* $sql="select * from hm_order_record_detail where status='1' and user_id='$uid' order by id asc";
$res=mysqli_query($db,$sql);
while($rs=mysqli_fetch_array($res)){

	//$str.='1';
	//$it=array('id'=>$rs['id'],'goods_image'=>$rs['goods_image'],'goods_name'=>$rs['goods_name'],'recovery_price'=>$rs['recovery_price'],'create_time'=>$rs['create_time']);
	//array_push($list,$it);
	//echo $rs['id'];
	$str.= $rs['id'].','.$rs['goods_image'].','.$rs['goods_name'].','.$rs['recovery_price'].','.$rs['create_time'].'|';
}
 */

?>