<?php
include("../cfg/config.php"); //包含文件
if($uid==""){
	echo "<script>location.href='./login.html';</script>";
	exit;
}
function getztai($i){
	//1:待发货  2:已发货 3:已签收  4:异常',
	if($i=="1"){
		return '待发货';
	}
	if($i=="2"){
		return '待收货';
	}
	if($i=="3"){
		return '已签收';
	}
	if($i=="4"){
		return '异常';
	}
}
function getozt($i){
	//1 盒子中 2 已兑换 3 已提货
	if($i=="1"){
		return '盒子中';
	}
	if($i=="2"){
		return '已兑换';
	}
	if($i=="3"){
		return '已提货';
	}
}
$lx=(int)$_REQUEST["lx"];
$page=(int)$_REQUEST["page"];

$sl=20;
$ks=$page*$sl;
$str='';
if($lx>0){
	$str=getsql($str,"status='".$lx."'");
}
$str=getsql($str,"user_id='".$uid."'");
$list=array();
$html='';
if($lx=='1'){
	$sql="select id,goods_image,goods_name,recovery_price,create_time from hm_order_record_detail $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
}
if($lx=='2'){
	$sql="select id,goods_image,goods_name,recovery_price,update_time from hm_order_record_detail $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
	for($i=0;$i<count($jp);$i++){
		$update_time=$jp[$i]['update_time'];
		$box=runsql($db,"select * from hm_user_box_exchange where user_id='$uid' and create_time='$update_time' order by id asc");
		$jp[$i]['exchange_no']=$box['exchange_no']; 
		
	}
}
if($lx=='3'){
	$sql="select id,goods_image,goods_name,recovery_price,update_time from hm_order_record_detail $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
	for($i=0;$i<count($jp);$i++){
		$update_time=$jp[$i]['update_time'];
		$box=runsql($db,"select deliver_no,status from hm_user_box_deliver where user_id='$uid' and create_time='$update_time' order by id asc");
		$jp[$i]['deliver_no']=$box['deliver_no']; 
		$jp[$i]['status']=getztai($box['status']); 
		
	}
}
if($lx=='0'){
	$sql="select id,goods_image,goods_name,recovery_price,update_time,status from hm_order_record_detail $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
	for($i=0;$i<count($jp);$i++){
		$jp[$i]['status']=getozt($jp[$i]['status']);
	}
}
if($lx=='4'){
	$lx='2';
	$str='';
	$str=getsql($str,"status='".$lx."'");
	$str=getsql($str,"user_id='".$uid."'");
	$str=getsql($str,"type='1'");
	$sql="select id,order_no,create_time from hm_order $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
	for($i=0;$i<count($jp);$i++){
		$create_time=$jp[$i]['create_time'];
		$it=runsql($db,"select goods_name,goods_image from hm_order_detail where user_id='$uid' and create_time='$create_time' order by id asc");
		$jp[$i]['goods_name']=$it['goods_name'];
		$jp[$i]['goods_image']=$it['goods_image'];
	}
	
	
	//print_r($sql);
}
if($lx=='5'){
	$lx='3';
	$str='';
	$str=getsql($str,"status='".$lx."'");
	$str=getsql($str,"user_id='".$uid."'");
	$str=getsql($str,"type='1'");
	$sql="select id,goods_image,goods_name,recovery_price,update_time,status from hm_order $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
}
if($lx=='6'){
	$lx='5';
	$str='';
	$str=getsql($str,"status='".$lx."'");
	$str=getsql($str,"user_id='".$uid."'");
	$str=getsql($str,"type='1'");
	$sql="select id,goods_image,goods_name,recovery_price,update_time,status from hm_order $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
}
if($lx=='7'){
	$lx='0';
	$str='';
	//$str=getsql($str,"status='".$lx."'");
	$str=getsql($str,"user_id='".$uid."'");
	$str=getsql($str,"type='1'");
	$sql="select id,goods_image,goods_name,recovery_price,update_time,status from hm_order $str order by id asc LIMIT $ks, $sl";
	$jp=runsqld($db,$sql);
}
echo json_encode($jp);
//echo $html;
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