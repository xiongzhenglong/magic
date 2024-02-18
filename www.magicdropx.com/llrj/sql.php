<?php
include("../cfg/config.php"); //包含文件



function escape($str) {//编码转换GB2312	unescape()使用
   preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$r);  
   $ar = $r[0];  
   foreach($ar as $k=>$v) {  
     if(ord($v[0]) < 128)  
       $ar[$k] = rawurlencode($v);  
     else 
       $ar[$k] = "%u".bin2hex(iconv("GB2312","UCS-2",$v));  
   }  
   return join("",$ar);  
}



$fid=(int)$_REQUEST["fid"];
$zid=(int)$_REQUEST["zid"];
$xzdj=(int)$_REQUEST["xzdj"];
$typ=(int)$_REQUEST["typ"];
$lv=(int)$_REQUEST["lv"];


if($xzdj>0){
	$sql="select * from hm_sys_city where pid=0 order by id asc";
	$conn=mysqli_query($db,$sql) or die(mysqli_error($db));
	$str;
	while($rs=mysqli_fetch_array($conn)){
		echo $rs['name']."|".$rs['id']."|";

		//$str=$rs['name']."|".$rs['fid']."|".$str;
	}
	echo $str;
}
if($fid>0 && $zid==0){
	$sql="select * from hm_sys_city where pid=$fid order by id asc";
	$conn=mysqli_query($db,$sql) or die(mysqli_error($db));
	$str;
	while($rs=mysqli_fetch_array($conn)){
		echo $rs['name']."|".$rs['id']."|";
		//$str=$rs['nr']."|".$rs['fid']."|".$str;
	}
	echo $str;
}
if($fid>0 && $zid==1){
	$sql="select * from hm_sys_city where pid=$fid order by id asc";
	$conn=mysqli_query($db,$sql) or die(mysqli_error($db));
	$str;
	while($rs=mysqli_fetch_array($conn)){
		echo $rs['name']."|".$rs['id']."|";
		//$str=$rs['nr']."|".$rs['fid']."|".$str;
	}
	echo $str;
}
if($typ>0){
	$sql="select * from kuaidi where id=$typ";
	$conn=mysqli_query($db,$sql) or die(mysqli_error($db));
	$str;
	while($rs=mysqli_fetch_array($conn)){
		if($lv==0){
			$str=$rs['jg'];
		}
		if($lv==1){
			$str=$rs['vipjg'];
		}
		if($lv==2){
			$str=$rs['dljg'];
		}
		
	}
	echo escape($str);
}

mysql_close();
?>