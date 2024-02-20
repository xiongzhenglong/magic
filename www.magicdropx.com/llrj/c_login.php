<?php
include "../cfg/config.php";
$name=$_REQUEST['username'];
$pwd=$_REQUEST['passwd'];
$act=$_REQUEST['act'];
$pwd=md5($pwd);
$pwd=substr($pwd,6,16);

$sql="select * from hm_user where phone='$name' and password='$pwd'";
$reg=mysqli_fetch_row(mysqli_query($db,$sql));
if($reg){
	session_start();//只要用到SESSION就必须要session_start
	$_SESSION["name"]=$name;
	echo (1);
}
else{
	echo ("Login failed! Incorrect account or password!");
}
mysqli_close($db);
?>