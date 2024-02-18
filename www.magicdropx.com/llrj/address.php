<?php
include("../cfg/config.php"); //包含文件
if($uid<=0){
	mysqli_close($db);
    exit;
}
$lx=$_REQUEST["lx"];
$gid=$_REQUEST["gid"];
if($lx=="edit"){
	$s1=$_REQUEST["s1"];
	$s2=$_REQUEST["s2"];
	$s3=$_REQUEST["s3"];
	$s4=$_REQUEST["s4"];
	$s5=$_REQUEST["s5"];
	$s6=$_REQUEST["s6"];
	$s7=$_REQUEST["s7"];
	$s8=$_REQUEST["s8"];
	$s9=$_REQUEST["s9"];
	$flag=$_REQUEST["flag"];

	if(empty($s1)){
		echo ("1");
		mysqli_close($db);
		exit;
	}
	if(empty($s2)){
		echo ("2");
		mysqli_close($db);
		exit;
	}
	if(empty($s3)){
		echo ("3");
		mysqli_close($db);
		exit;
	}
	if(empty($s4)){
		echo ("4");
		mysqli_close($db);
		exit;
	}
	if(empty($s5)){
		echo ("5");
		mysqli_close($db);
		exit;
	}
	if(empty($s6)){
		echo ("6");
		mysqli_close($db);
		exit;
	}
	if(empty($s6)){
		echo ("6");
		mysqli_close($db);
		exit;
	}
	if(empty($s7)){
		echo ("7");
		mysqli_close($db);
		exit;
	}
	if(empty($s8)){
		echo ("8");
		mysqli_close($db);
		exit;
	}
	if(empty($s9)){
		echo ("9");
		mysqli_close($db);
		exit;
	}
	$time=date("Y-m-d H:i:s");
	
			//echo "ok";
	$sql="update hm_user_address set receiver='$s1',phone='$s2',province_code='$s4',province_name='$s3',city_code='$s6',city_name='$s5',area_code='$8',area_name='$s7',address='$s9',default_flag='$flag',update_time='$time' where id='$gid' and user_id='$uid'";
	mysqli_query($db,$sql);
	echo 1;


	
	mysqli_close($db);
	exit;
}
?>

