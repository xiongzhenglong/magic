<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$xz=myTrim($_REQUEST['xz']);
if($xz<=0){
	$xz='1';
}
function getxs($a,$b){
	if($a==$b){
		return 'block';
	}else{
		return 'none';
	}
}

//print_r($user);
?>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Invite and Earn Rewards</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<link rel="stylesheet" href="./static/index.css">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script type="text/javascript" src="rwm/jquery.qrcode.min.js"></script>

<script src="./static/js/cmd.js?v=2030"></script>
<style type="text/css">
ul {
list-style: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0px;
}

.daohan{
	width: 80px;
    height: 25px;
    background: #1571c8;
    border: 0.5px solid #d4d4d4;
    color: #fbf8ff;
    text-align: center;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
table
{
	border-collapse: collapse;
	border-spacing: 0;
	border-left: 1px solid #d5d5d5;
	border-top: 1px solid #d5d5d5;
	background: #ffffff;
}
th, td
{
	border-right: 1px solid #d5d5d5;
	border-bottom: 1px solid #d5d5d5;
	padding: 5px 15px;
}
th
{
	font-weight: bold;
	background: #efefef;
}


.pagination {
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
</style>
</head>
<body style="background: linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff);">
<div>
<div style="width: 100%;height: 44px;display: flex;line-height: 44px;">
	<div onclick="gourl('my.php');">
		<div style="padding-top: 9px;padding-left: 9px;">
			<i style="color: rgb(0, 0, 0); font: normal normal normal 27px/1 unibtn;"></i>
		</div>
	</div>
	<div style="width: 100%;text-align: center;">
		<div style="font-size: 16px;"> Invite and Earn Rewards </div>
	</div>
</div>

<div style="border-bottom: 1px solid #b7b7b7;padding-top: 10px;">
	<ul>
	<li><div class="daohan" onclick="xze(1)">Home</div></li>
	<li><div class="daohan" onclick="xze(2)">Promotion Records</div></li>
	<li><div class="daohan" onclick="xze(3)">Promoted Users</div></li>
	 </ul>
</div>
<div id="xz1" style="padding: 10px 10px 0px;background-color: #ffffff;display: <?php echo getxs('1',$xz)?>;">
	<div style="height: 30px;line-height: 30px;">Account:<?php echo $uname?></div>
<?
$sql="select * from tgjl where name='$uname' order by id desc";
$conn=mysqli_query($db,$sql);
$nums=mysqli_num_rows($conn);//取得总记录数

?>
		<div style="height: 30px;line-height: 30px;">Total Performance: <?php echo $nums?>Transactions</div>

		<div style="height: 30px;line-height: 30px;">Coins Available for Collection:<?php echo $user['jl']?> <a href="Account/js.php?act=lq">Claim</a></div>

	<div style="">
		<p style="height: 30px;line-height: 30px;">
			1、Promotion Code <input id="myurl" name="myurl" readonly="readonly" style="" type="text" value="<?echo 'http://'.$_SERVER['HTTP_HOST'].'?'.$uid;?>" />
			<button id="copy" title="Copy to Clipboard" data-clipboard-target="myurl" onclick="copyText('myurl')"><b>Copy Link</b></button>
		</p>
		<div id="d_debug" style="height: 30px;line-height: 30px;text-align: center;display: none;"></div>
		<p style="height: 30px;line-height: 30px;">
			2、Promotion QR Code,You can save the image below to send to others<br />
			<div id="output" style="text-align: center;padding: 10px;"></div>
		</p>
	</div>

</div>
<div id="xz2" style="padding: 5px 5px 0px 5px;display: <?php echo getxs('2',$xz)?>;">

</div>
<div id="xz3" style="padding: 10px 10px 0px 10px;display: <?php echo getxs('3',$xz)?>;">


</div>

</div>
<script id="clipboard" src="static/js/clipboard.min.js" type="text/javascript"></script>
<script>
jQuery(function(){
	var url=$("#myurl").val();
	jQuery('#output').qrcode(url);
})
var yxz='1';
function xze(i){
	if(yxz!=""){
		$("#xz"+yxz).hide();
	}
	$("#xz"+i).show();
	yxz=i;
	
	if(i==2){
		gettgjl(0);
	}
	if(i==3){
		gettgyh(0);
	}
}
function copyText(id){
  var copyTarget = document.getElementById(id);
  copyTarget.select();
  document.execCommand("copy");
  $("#d_debug").text('Copied Successfully');
  $("#d_debug").show();
  //alert("已复制到剪贴板");
}
</script>
</body>
</html>