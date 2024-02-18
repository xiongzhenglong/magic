<?php
include "../cfg/config.php";
$name=$_REQUEST['username'];
$code=$_REQUEST['code'];
$pwd=$_REQUEST['passwd'];
$act=$_REQUEST['act'];
$pwd=md5($pwd);
$pwd=substr($pwd,6,16);

$sql="select * from hm_user where phone='$name'";
$reg=mysqli_fetch_row(mysqli_query($db,$sql));
if($reg){
	$code_time=times();
	if($reg[20]+300>$code_time){
		//$str='验证码还在有效期';
		if($code==$reg[19]){
			//print_r($reg);
			//echo ('Account exists');
			$sql="update hm_user set password='$pwd' where phone='$name'";
			mysqli_query($db,$sql) or die(mysqli_error($db));//奖品状态
			session_start();//只要用到SESSION就必须要session_start
			$_SESSION["name"]=$name;
			echo (1);
		}else{
			echo ('Verification code error');
		}
	}else{
		echo ('Verification code expired');
	}
	
	
}
else{
	echo ('Enter your phone number to obtain the verification code');
/* 	$create_time=date('Y-m-d H:i:s');
	$nickname=$name;//'用户昵称',
	$hash_key='我的种子';//'用户hashkey',
	$phone=$name;//'用户手机号',
	$openid='';//'微信openid',
	$avatar='static/images/avatar-2.png';//'用户头像',
	$password=$pwd;//'密码',
	$integral='0';//'哈希币',
	$balance='0';//'余额',
	$czz='0';//'成长值',
	$mdj='0';//'面单卷',
	$djk='0';//'道具卡',
	$jl='0';//'奖励',
	$source_type='3';//'注册来源 1:微信 2:后台 3:app',
	$status='1';//'状态 1:正常 2:禁用',
	$daili='';//'代理',
	$create_time=$create_time;//'创建时间',
	$update_time='';//'更新时间',
	$dltime='';//'代理日期',
	$code='';//'验证码',
	$code_time='';//'验证码时间',

	$sql="INSERT INTO hm_user (nickname,hash_key,phone,openid,avatar,password,integral,balance,czz,mdj,djk,jl,source_type,status,daili,create_time,update_time,dltime,code,code_time) VALUES ('$nickname','$hash_key','$phone','$openid','$avatar','$password','$integral','$balance','$czz','$mdj','$djk','$jl','$source_type','$status','$daili','$create_time','$update_time','$dltime','$code','$code_time')";
	mysqli_query($db,$sql) or die(mysqli_error($db));
	session_start();//只要用到SESSION就必须要session_start
	$_SESSION["name"]=$name;
	echo (1); */
}
mysqli_close($db);
?>