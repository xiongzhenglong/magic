<!DOCTYPE html>
<html lang="zh-CN"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>账户充值</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<link rel="stylesheet" href="./static/index.css">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=1001"></script>
<style type="text/css">
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}
.main-space-between{display:flex;align-items:center;justify-content:space-between}
::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}
:not(not){box-sizing:border-box}
.container{width:100%;height:100vh;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.head{width:100%;height:202px;display:flex;justify-content:center;align-items:center;background:linear-gradient(180deg,#4e4e51,#262628)}.text{width:266px;text-align:center;color:#fff;display:flex;flex-direction:column}.text-name{font-size:12px}.text-num{font-size:42px}.content{background:#fff;padding:16px;width:100%;border-radius:26px 26px 0 0;position:relative;top:-26px}.content-title{display:flex}.span{width:4px;height:22px;background:#8d01e6}.title{color:#333;font-size:17px;height:22px;line-height:22px;border-left:2px solid #8d01e6;width:85px;text-align:center;margin-left:2px;margin-bottom:10px}.list{margin-top:21px;display:flex;flex-wrap:wrap}.list-item{background:#f4f4f4;border-radius:13px;width:100px;height:60px;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;margin:4px}.active{background:#333;color:#fff}.money{font-size:18px;color:#999}.give{font-size:12px;color:#999}.rech-type{margin-top:10px}.type-title{margin-bottom:10px}.rech{font-size:14px;color:#fff;height:44px;line-height:44px;text-align:center;margin:26px 0;background:#333}.info-title{color:#333;font-size:14px}.info-content{color:#999;font-size:12px}.pay-type-item{height:42px}.pay-type-name{margin-left:5px;font-size:14px}.xuanz1 {background-color: rgb(235, 92, 74)!important; border-color: rgb(235, 92, 74)!important;}</style>
</head>
<body>
<uni-app><uni-page><uni-page-head>
<div class="uni-page-head" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);width: 100%;">
<div class="uni-page-head-hd" onclick="history.go(-1);">
<div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> 账户充值 </div>
</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head><uni-page-wrapper><uni-page-body>
<div class="app-layout">
<div class="container">
<div class="head">
<div class="text"><uni-text class="text-name"><span>账户余额（元）</span></uni-text><uni-text class="text-num"><span><?php echo $user['balance']?></span></uni-text></div>
</div>
<div class="content">
<div class="content-title">
<div class="span"></div>
<div class="title">账户充值</div>
</div>
<div class="list">
<div id="p20" class="list-item active" onclick="xze(this)">
<div class="money">20PHP</div>
</div>
<div id="p50" class="list-item" onclick="xze(this)">
<div class="money">50PHP</div>
</div>
<div id="p100" class="list-item" onclick="xze(this)">
<div class="money">100PHP</div>
</div>
<div id="p200" class="list-item" onclick="xze(this)">
<div class="money">200PHP</div>
</div>
<div id="p500" class="list-item" onclick="xze(this)">
<div class="money">500PHP</div>
</div>
<div id="pn" class="list-item" onclick="xze(this)">
<div class="money">其他</div>
<input id="pn1" maxlength="9" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入金额" autocomplete="off" type="number" class="uni-input-input" style="color: aliceblue;">
</div>
</div>
<div class="rech-type">
<div class="content-title type-title">
<div class="span"></div>
<div class="title">充值方式</div>
</div>
<uni-radio-group value="1">

<uni-label class="pay-type-item main-space-between uni-label-pointer">
<div class="main-start-flex">
<div class="u-image" style="width: 17px; height: 17px; border-radius: 0px; overflow: visible; background-color: transparent;"><img src="static/image/kitego/ali_pay.png" draggable="false" style="opacity: 1;border-radius: 0px; width: 17px; height: 17px;"></div>
<div class="pay-type-name">gcash</div>
</div>
<uni-radio style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div id="zf2" onclick="xzzf(1)" class="uni-radio-input uni-radio-input-checked xuanz1"></div>
</div>
</uni-radio></uni-label>

<uni-label class="pay-type-item main-space-between uni-label-pointer">
<div class="main-start-flex">
<div class="u-image" style="width: 17px; height: 17px; border-radius: 0px; overflow: visible; background-color: transparent;"><img src="static/image/kitego/ali_pay.png" draggable="false" style="opacity: 1;border-radius: 0px; width: 17px; height: 17px;"></div>
<div class="pay-type-name">paypal</div>
</div>
<uni-radio style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div id="zf1" onclick="xzzf(2)" class="uni-radio-input"></div>
</div>
</uni-radio></uni-label>

</uni-radio-group>
</div>
<div class="rech" onclick="pays()">立即充值</div>
<div class="info">
<div class="info-title">充值说明</div>
<div class="info-content">1、充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容</div>
<div class="info-content">2、充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容充值说明内容</div>
</div>
</div>
<div class="u-popup bg"></div>
</div>
</div>
</uni-page-body></uni-page-wrapper></uni-page><uni-modal style="display: none;">
<div class="uni-mask"></div>
<div class="uni-modal">
<div class="uni-modal__bd"></div>
<div class="uni-modal__ft">
<div class="uni-modal__btn uni-modal__btn_default" style="color: rgb(0, 0, 0);"> Cancel </div>
<div class="uni-modal__btn uni-modal__btn_primary" style="color: rgb(0, 122, 255);"> OK </div>
</div>
</div>
</uni-modal></uni-app>
<script>
var zzds='p20';
var je=20;
function xze(ds){
	if(zzds!=null){
		$("#"+zzds).attr('class','list-item');
	}
	$("#"+ds.id).attr('class','list-item active');
	zzds=ds.id;
	if(zzds=="p20"){je=20;}
	if(zzds=="p50"){je=50;}if(zzds=="p100"){je=100;}
	if(zzds=="p200"){je=200;}if(zzds=="p500"){je=500;}
	if(zzds=="pn"){je=$("#pn1").val();}
}

var zf="1";
function xzzf(d){
	if(zf!=""){
		$("#zf"+zf).attr('class','uni-radio-input');
		$("#zf"+d).attr('class','uni-radio-input uni-radio-input-checked xuanz1');
	}else{
		$("#zf"+d).attr('class','uni-radio-input uni-radio-input-checked xuanz1');
	}
	zf=d;
}
</script>
<script src="https://unpkg.com/vconsole/dist/vconsole.min.js"></script>
<script>
	var vConsole = new window.VConsole();
</script>
</body>
</html>