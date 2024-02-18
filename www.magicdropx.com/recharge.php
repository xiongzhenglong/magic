<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$c=(int)$_REQUEST["c"];
if($c!="2"){
	$c='1';
}
$czjl=runsqld($db,"select * from hm_user_balance_recharge_log where user_id='$uid' order by id desc");
?>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>余额充值订单</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/jquery-1.10.2.js?v=2030"></script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">
.u-tabs__wrapper{display:flex;flex-direction:row;align-items:center}
.u-tabs__wrapper__scroll-view-wrapper{flex:1;overflow:auto hidden}
.u-tabs__wrapper__scroll-view{display:flex;flex-direction:row;flex:1}
.u-tabs__wrapper__nav{display:flex;flex-direction:row;position:relative}
.u-tabs__wrapper__nav__item{padding:0 11px;display:flex;flex-direction:row;align-items:center;justify-content:center}
.u-tabs__wrapper__nav__item--disabled{cursor:not-allowed}
.u-tabs__wrapper__nav__item__text{font-size:15px;color:#606266}
.u-tabs__wrapper__nav__item__text--disabled{color:#c8c9cc!important}
.u-tabs__wrapper__nav__line{height:3px;background:#3c9cff;width:30px;position:absolute;bottom:2px;border-radius:100px;transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;transition-duration:.3s}
.container{background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}
.img{height:100%;width:100%;display:flex;align-items:center;justify-content:center;flex-direction:column;}
.image{width:108px;height:108px}
.content{margin-top:16px;color:#afafaf;font-size:17px}
</style>
	</head>
	<body>
<uni-page-head>
<div class="uni-page-head" style="background-color: rgb(255, 255, 255);color: rgb(0, 0, 0);width: 100%;">
<div class="uni-page-head-hd" onclick="history.go(-1);">
<div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> 余额充值订单 </div>
</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head>
<div>
<div class="head">
<div class="u-tabs">
<div class="u-tabs__wrapper">
<div class="u-tabs__wrapper__scroll-view-wrapper">

<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden;">
<div class="uni-scroll-view-content">
<div class="u-tabs__wrapper__nav">
<div class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-0" style="width: 120px; height: 44px;font-weight: 400; color: rgb(153, 153, 153); flex: 1 1 0%;" onclick="xuanz(1)"><uni-text class="u-tabs__wrapper__nav__item__text" style="color: rgb(96, 98, 102);"><span id="tt1">全部订单</span></uni-text></div>
<div class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-1" style="width: 120px; height: 44px;font-weight: 400; color: rgb(153, 153, 153); flex: 1 1 0%;" onclick="xuanz(2)"><uni-text class="u-tabs__wrapper__nav__item__text" style="color: rgb(96, 98, 102);"><span id="tt2">待支付</span></uni-text></div>
<div class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-2" style="width: 120px; height: 44px;font-weight: 400; color: rgb(153, 153, 153); flex: 1 1 0%;" onclick="xuanz(3)"><uni-text class="u-tabs__wrapper__nav__item__text" style="color: rgb(96, 98, 102);"><span id="tt3">已完成</span></uni-text></div>
<div id="dixian" class="u-tabs__wrapper__nav__line" style=""></div>
</div>
</div>
</div>
</div>
</div>
	</div>
</div>
</div>
<div id="nrk" class="container" style="padding: 10px;">
<!--  -->
</div>
</div>
</body>
<script type="text/javascript">
var czjl=JSON.parse('<?php echo json_encode($czjl);?>');
console.log(czjl);
function zffs(s){
	if(s==1){
		return '微信支付';
	}
	if(s==2){
		return '支付宝支付';
	}
	return '其他支付';
}
function xszt(s){
	if(s==1){
		return '待支付';
	}
	if(s==2){
		return '支付成功';
	}
	if(s==3){
		return '支付失败';
	}
	if(s==4){
		return '过期';
	}
	if(s==5){
		return '取消';
	}
	return '其他错误';
}

function xians(s){
	var str='';
	for(var i=0;i<czjl.length;i++){
		if(1==s){
			str+='<div><div>单号:'+czjl[i]['pay_no']+'</div><div style="display: flex;width: 100%;"><div style="width: 75%;">'+zffs(czjl[i]['pay_way'])+'</div><div style="text-align: right;">额度:'+czjl[i]['amount']+'</div></div><div style="display: flex;width: 100%;"><div style="width: 75%;">时间：'+czjl[i]['update_time']+'</div><div style="text-align: right;">'+xszt(czjl[i]['status'])+'</div></div></div>';
		}
		if(2==s && czjl[i]['status']!=2){
			str+='<div><div>单号:'+czjl[i]['pay_no']+'</div><div style="display: flex;width: 100%;"><div style="width: 75%;">'+zffs(czjl[i]['pay_way'])+'</div><div style="text-align: right;">额度:'+czjl[i]['amount']+'</div></div><div style="display: flex;width: 100%;"><div style="width: 75%;">时间：'+czjl[i]['update_time']+'</div><div style="text-align: right;">'+xszt(czjl[i]['status'])+'</div></div></div>';
		}
		if(3==s && czjl[i]['status']==2){
			str+='<div><div>单号:'+czjl[i]['pay_no']+'</div><div style="display: flex;width: 100%;"><div style="width: 75%;">'+zffs(czjl[i]['pay_way'])+'</div><div style="text-align: right;">额度:'+czjl[i]['amount']+'</div></div><div style="display: flex;width: 100%;"><div style="width: 75%;">时间：'+czjl[i]['update_time']+'</div><div style="text-align: right;">'+xszt(czjl[i]['status'])+'</div></div></div>';
		}
	}
	if(str==''){
		$("#nrk").html('<div class="img"><uni-image class="image"><img src="./static/img/default.44927131.png" draggable="false" style="opacity: 1;"></uni-image><div class="content">暂无信息</div></div>');
	}else{
		$("#nrk").html('<div style="padding: 10px;background-color: #f6fffe;border-radius: 5px;">'+str+'</div>');
	}
}

function xuanz(i){
	var w1=0,w2=0,w3=0;
	var html;
	w1=$("#tt1").position().left+($("#tt1").width()-62)/2;
	w2=$("#tt2").position().left+($("#tt2").width()-62)/2;
	w3=$("#tt3").position().left+($("#tt3").width()-62)/2;
	if(i==1){
		$("#dixian").attr({"style":"width: 62px; transform: translate("+w1+"px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"});
		xians(i);
	}
	if(i==2){
		$("#dixian").attr({"style":"width: 62px; transform: translate("+w2+"px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"});
		xians(i);
	}
	if(i==3){
		$("#dixian").attr({"style":"width: 62px; transform: translate("+w3+"px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"});
		xians(i);
	}
}
xuanz(<?php echo $c;?>);
</script>
</html>