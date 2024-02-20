<?php
include("../cfg/config.php"); //包含文件
$name=$_REQUEST['username'];
$qy=$_REQUEST['qy'];

    /*****************
     * 非加密请求 示例代码
     ******************/
    //appid参数 appkey参数在     国际短信-创建/管理AppID中获取
    //手机号支持单个
    //国际短信内容：签名+正文    详细规则查看国际短信-模板管理
    $appid = '63369';                                                               //appid参数
    $appkey = 'b3782be6f1a610bda4aabffc39a7aed1';                                   //appkey参数
    //$to = '+8617758061831';                                                            //收信人 手机号码
	$to = $qy.$name;  
	$str='';
	$code = rand(100000, 999999);    //随机生成短信验证码
    $content = 'Your verification code for Magicdrop is:['.$code.']';                                     //内容
	$code_time=times();
	$sql="select * from hm_user where phone='$name'";
	$reg=mysqli_fetch_row(mysqli_query($db,$sql));
	if($reg){
		
		if($reg[20]+300>$code_time){
			//print_r($reg);
			$str='Verification code is still valid';
		}else{
			$sql="update hm_user set code='$code',code_time='$code_time' where phone='$name'";
			mysqli_query($db,$sql) or die(mysqli_error($db));//奖品状态
			$str='1';
		}
	}
	else{
		$create_time=date('Y-m-d H:i:s');
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
		$update_time=$create_time;//'更新时间',
		$dltime='';//'代理日期',
		//$code=$code;//'验证码',
		$code_time=$code_time;//'验证码时间',

		$sql="INSERT INTO hm_user (nickname,hash_key,phone,openid,avatar,password,integral,balance,czz,mdj,djk,jl,source_type,status,daili,create_time,update_time,code,code_time) VALUES ('$nickname','$hash_key','$phone','$openid','$avatar','$password','$integral','$balance','$czz','$mdj','$djk','$jl','$source_type','$status','$daili','$create_time','$update_time','$code','$code_time')";
		
		//echo $sql;
		mysqli_query($db,$sql) or die(mysqli_error($db));
		$str='1';
	}
    $post_data = array(
        "appid"     => $appid,
        "signature" => $appkey,
        "to"        => $to,
        "content"   => $content,
    );

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL            => 'https://api-v4.mysubmail.com/internationalsms/send.json',
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST           => 1,
        CURLOPT_POSTFIELDS     => $post_data
    ));
	if($str=='1'){
		$output = curl_exec($ch);
		curl_close($ch);
	}
	

    echo json_encode($output);
	
?>