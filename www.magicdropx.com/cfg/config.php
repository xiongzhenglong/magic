<?php 
//常规参数设置
error_reporting(0);

$servername="127.0.0.1";  //主机名
$sqlservername="root"; //mysql数据库用户名
$sqlserverpws="0536ccc148502735"; //mysql数据库密码
$bianma="utf8";

$sqlname="hashmart";              //数据库名

$admin_name="ming";               //管理员用户名
$admin_pws="ming";                      //管理员密码

$title="幸运乐园";

$qq1="4525861";                     //QQ1

$qq2="5583842";                     //QQ2

$qq3="4525861";                     //QQ3

$qq4="5583842";                     //QQ4

$tel="13967960240";                 //电话

$email="4525861@qq.com";             //E-MAIL


$xzcs="0";               //新注册送多少游戏币
$mrdaili="admin"; //默认代理

//时间处理//时间戳
function times(){
	$date=new DateTime();
	return $date->format("U");
}
//dates('Y-m-d');
function dates($s){
	$date=new DateTime();
	return $date->format($s);
}
//1、Unix时间戳转日期 unixtime_to_date('Y-m-d',$rs["time"]);unixtime_to_date('Y-m-d H:i:s',$sys["qystime"])
function unixtime_to_date($gs,$unixtime,$timezone = 'PRC') {
	if($unixtime<=0){
		return"";
	}
    $datetime = new DateTime("@$unixtime"); //DateTime类的bug，加入@可以将Unix时间戳作为参数传入unixtime_to_date('Y-m-d H:i:s',$sys["tdstime"])
    $datetime->setTimezone(new DateTimeZone($timezone));
    return $datetime->format($gs);
}
 
//2、日期转Unix时间戳 date_to_unixtime($_REQUEST["btime"])
function date_to_unixtime($date, $timezone = 'PRC') {
	if($date!=""){
		$datetime= new DateTime($date, new DateTimeZone($timezone));
		return $datetime->format('U');
	}else{
		return "0";
	}
}

function getuser($db_,$name){
	$sql="select * from hm_user where phone=$name";
	$sql1=mysqli_query($db_,$sql);//取得结果
	$rs=mysqli_fetch_array($sql1);
	return $rs;
}
function getuserid($db,$id){
	$sql="select * from users where id=$id";
	$sql1=mysqli_query($db,$sql);//取得结果
	$rs=mysqli_fetch_array($sql1);
	return $rs;
}
function getblindbox($db_,$id){
	$sql="select * from hm_blindbox where id=$id";
	$sql1=mysqli_query($db_,$sql);//取得结果
	$rs=mysqli_fetch_array($sql1);
	return $rs;
}
function getgoods_id($db_,$id){
	$sql="select * from hm_goods where id=$id";
	$sql1=mysqli_query($db_,$sql);//取得结果
	$rs=mysqli_fetch_array($sql1);
	return $rs;
}

function myTrim($str){//替换空格特殊符号
	$search = array(" ","　","\n","\r","\t","（","）","or","and","true","-","+");
	$replace = array("","","","","","(",")","","","","","");
	return str_replace($search, $replace, $str);
}
function cutstr($str,$cutleng){
	$str = $str; //要截取的字符串
	$cutleng = $cutleng; //要截取的长度
	$strleng = strlen($str); //字符串长度
	if($cutleng>$strleng)return $str;//字符串长度小于规定字数时,返回字符串本身
	$notchinanum = 0; //初始不是汉字的字符数
	for($i=0;$i<$cutleng;$i++){
		if(ord(substr($str,$i,1))<=128)
		{
			$notchinanum++;
		}
	}
	if(($cutleng%2==1)&&($notchinanum%2==0))//如果要截取奇数个字符，所要截取长度范围内的字符必须含奇数个非汉字，否则截取的长度加一
	{
		$cutleng++;
	}
	if(($cutleng%2==0)&&($notchinanum%2==1))//如果要截取偶数个字符，所要截取长度范围内的字符必须含偶数个非汉字，否则截取的长度加一
	{
		$cutleng++;
	}
	return substr($str,0,$cutleng);
}
function getsql($s,$s1){
	if($s==""){
		$s.="where ".$s1;
	}else{
		$s.=" and ".$s1;
	}
	return $s;
}
function getxz($i,$j){
	if($i==$j){
		return 'selected';
	}
}
function getxbeiimg($i,$j){
	if($i==$j){
		return 'checked';
	}
}

function runsql($db,$sql){//
	$conn=mysqli_query($db,$sql);//取得结果
	$rs=mysqli_fetch_array($conn);
	return $rs;
}
function runsqld($db,$sql){//
	$i=0;
	$xx=array();
	$conn=mysqli_query($db,$sql);//取得结果
	while($rs=mysqli_fetch_array($conn)){
		array_push($xx,$rs);
		//$xx[$i]=$rs;
		//$i++;
	}
	return $xx;
}
function getlxname($sz,$s){
	for($i=0;$i<count($sz);$i++){
		if($sz[$i]['id']==$s){
			return $sz[$i]['name'];
		}
	}
}
function getlximg($id){
	if($id==4){
		return 'normal';
	}
	if($id==3){
		return 'legend';
	}
	if($id==2){
		return 'epic';
	}
	if($id==1){
		return 'rare';
	}
}




$db=mysqli_connect($servername,$sqlservername,$sqlserverpws);
mysqli_select_db($db,$sqlname);
//mysqli_query($db,"set names '$bianma'");
session_start(); //一定要的
if($_SESSION["name"]!=""){
	$uname=$_SESSION["name"];
	$user=getuser($db,$uname);
	$uid=$user['id'];
}else{
	
	//echo "<script>location.href='./login.php';</script>";
	//exit;
}
//代理
if($_SERVER['QUERY_STRING']!=""){
	$str=strstr($_SERVER['QUERY_STRING'],"=");
	if($str==""){
		$duser=getuserid($_SERVER['QUERY_STRING']);
		$_SESSION["daili"]=$duser['phone'];
	}
}
$daili=$_SESSION["daili"];
header("Content-type: text/html; charset=utf-8");
?>
