<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$gid=myTrim($_REQUEST['gid']);
$s=myTrim($_REQUEST['s']);
$god=runsql($db,"select * from hm_order_record_detail where id='$gid' order by id asc");
/* if(!$god){
	$json=array('code'=>0,'msg'=>'兑换失败');
	echo json_encode($json);
	mysqli_close($db);
	exit;
} */
$dz=runsql($db,"select * from hm_user_address where user_id='$uid' and default_flag='1' order by id asc");
?>
<html lang="zh-CN" style="--status-bar-height:0px; --top-window-height:0px; --window-left:0px; --window-right:0px; --window-margin:0px; --window-top:calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom:0px;">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Confirm Order</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}
.u-line-1{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:1;-webkit-box-orient:vertical!important}.u-line-2{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:2;-webkit-box-orient:vertical!important}.u-line-3{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:3;-webkit-box-orient:vertical!important}.u-line-4{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:4;-webkit-box-orient:vertical!important}.u-line-5{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:5;-webkit-box-orient:vertical!important}.u-border{border-width:.5px!important;border-color:#dadbde!important;border-style:solid}.u-border-top{border-top-width:.5px!important;border-color:#dadbde!important;border-top-style:solid}.u-border-left{border-left-width:.5px!important;border-color:#dadbde!important;border-left-style:solid}.u-border-right{border-right-width:.5px!important;border-color:#dadbde!important;border-right-style:solid}.u-border-bottom{border-bottom-width:.5px!important;border-color:#dadbde!important;border-bottom-style:solid}.u-border-top-bottom{border-top-width:.5px!important;border-bottom-width:.5px!important;border-color:#dadbde!important;border-top-style:solid;border-bottom-style:solid}.u-reset-button{padding:0;background-color:initial;font-size:inherit;line-height:inherit;color:inherit}.u-reset-button::after{border:none}.u-hover-class{opacity:.7}.u-primary-light{color:#ecf5ff}.u-warning-light{color:#fdf6ec}.u-success-light{color:#f5fff0}.u-error-light{color:#fef0f0}.u-info-light{color:#f4f4f5}.u-primary-light-bg{background-color:#ecf5ff}.u-warning-light-bg{background-color:#fdf6ec}.u-success-light-bg{background-color:#f5fff0}.u-error-light-bg{background-color:#fef0f0}.u-info-light-bg{background-color:#f4f4f5}.u-primary-dark{color:#398ade}.u-warning-dark{color:#f1a532}.u-success-dark{color:#53c21d}.u-error-dark{color:#e45656}.u-info-dark{color:#767a82}.u-primary-dark-bg{background-color:#398ade}.u-warning-dark-bg{background-color:#f1a532}.u-success-dark-bg{background-color:#53c21d}.u-error-dark-bg{background-color:#e45656}.u-info-dark-bg{background-color:#767a82}.u-primary-disabled{color:#9acafc}.u-warning-disabled{color:#f9d39b}.u-success-disabled{color:#a9e08f}.u-error-disabled{color:#f7b2b2}.u-info-disabled{color:#c4c6c9}.u-primary{color:#3c9cff}.u-warning{color:#f9ae3d}.u-success{color:#5ac725}.u-error{color:#f56c6c}.u-info{color:#909399}.u-primary-bg{background-color:#3c9cff}.u-warning-bg{background-color:#f9ae3d}.u-success-bg{background-color:#5ac725}.u-error-bg{background-color:#f56c6c}.u-info-bg{background-color:#909399}.u-main-color{color:#303133}.u-content-color{color:#606266}.u-tips-color{color:#909193}.u-light-color{color:#c0c4cc}.u-safe-area-inset-top{padding-top:0;padding-top:constant(safe-area-inset-top);padding-top:env(safe-area-inset-top)}.u-safe-area-inset-right{padding-right:0;padding-right:constant(safe-area-inset-right);padding-right:env(safe-area-inset-right)}.u-safe-area-inset-bottom{padding-bottom:0;padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.u-safe-area-inset-left{padding-left:0;padding-left:constant(safe-area-inset-left);padding-left:env(safe-area-inset-left)}uni-toast{z-index:10090}uni-toast .uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-59765974]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-59765974]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-59765974]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-59765974]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-59765974]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-59765974]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-59765974]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-59765974]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-59765974]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-59765974]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-59765974]::after{border:none}.clear-button[data-v-59765974]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-59765974], uni-scroll-view[data-v-59765974], uni-swiper-item[data-v-59765974]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}.u-icon[data-v-59765974]{display:flex;align-items:center}.u-icon--left[data-v-59765974]{flex-direction:row-reverse;align-items:center}.u-icon--right[data-v-59765974]{flex-direction:row;align-items:center}.u-icon--top[data-v-59765974]{flex-direction:column-reverse;justify-content:center}.u-icon--bottom[data-v-59765974]{flex-direction:column;justify-content:center}.u-icon__icon[data-v-59765974]{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}.u-icon__icon--primary[data-v-59765974]{color:#3c9cff}.u-icon__icon--success[data-v-59765974]{color:#5ac725}.u-icon__icon--error[data-v-59765974]{color:#f56c6c}.u-icon__icon--warning[data-v-59765974]{color:#f9ae3d}.u-icon__icon--info[data-v-59765974]{color:#909399}.u-icon__img[data-v-59765974]{height:auto;will-change:transform}.u-icon__label[data-v-59765974]{line-height:1}</style><style type="text/css">.container{width:100%;min-height:100vh;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.head{padding:16px 16px 0 16px}.head-content{background:#fff;display:flex;align-items:center;text-align:center;justify-content:space-between;padding:0 11px;height:82px}.head-left{display:flex;align-items:center}.head-title{text-align:left}.head-name{font-size:15px;font-weight:600}.number{font-weight:500;font-size:13px}.list-container{width:100%;height:70%;padding:16px;padding-bottom:110px}.list-item{width:100%;background:#fff}.list-body{height:129px;width:100%;padding:16px}.list-body-left{height:100%;width:96px}.list-body-right{height:100%;width:calc(100% - 96px);padding:5px}.exchange{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e;margin-top:16px}.total{width:82px}.list-content{max-height:276px;overflow-y:auto}.fare{background:#fff;border-top:1px solid #e6f1f1;padding:11px;font-size:15px}.fare-item{height:33px;line-height:33px}.fare-bottom{text-align:right}.all-money{font-size:22px;color:#333;font-weight:600}.remarks{color:#a9a9a9}.money{color:red}.pay-type{background:#fff;margin-top:16px;padding:16px}.pay-item{line-height:30px;height:33px;font-size:17px;color:#333;font-weight:600;margin-bottom:16px}.pay-banlance{font-size:15px;font-weight:500}.pay-img{width:17px;height:17px;margin-right:11px}.tip-info{margin-top:11px;font-size:15px;color:grey}.footer{position:fixed;bottom:0;
/* height: 136rpx; */height:10%;display:flex;width:100%;justify-content:space-between;padding:11px;background:#fff;font-size:15px}.pickBtn{border:1px solid grey;text-align:center;height:33px;line-height:33px;font-size:15px;background:grey;color:#fff;width:88px}.goods-price{height:50%;width:100%}.goods-name{font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#333}.goods-price{display:flex;justify-content:space-between;align-items:flex-end}.goods-price>div:first-child{font-size:18px;font-family:Abel;font-weight:400;color:#333}.goods-price>div:first-child uni-text{font-size:11px;font-family:Source Han Sans CN;font-weight:400;color:#333}.goods-price>div:last-child{font-size:11px;font-family:Source Han Sans CN;font-weight:400;color:#999}.list-foot{height:82px;width:100%;padding:16px}.goods-num{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#999}.goods-total-price{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#333;align-items:baseline}.goods-total-price>uni-text:last-child{font-size:22px;font-family:Abel;font-weight:400;color:#333}.cancel-order,
.confirm-receive{border:1px solid #f8f8f8}</style>
<style type="text/css">.container[data-v-5d12bc44]{    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    position: fixed;
    left: 0;
    top: 0;
    background: rgba(0,0,0,.7);}.main[data-v-5d12bc44]{left:0;right:0;top:0;bottom:0;margin:auto}.close[data-v-5d12bc44]{height:46px;width:46px;position:absolute;right:0;top:0}.head[data-v-5d12bc44]{width:100%;height:46px}.body[data-v-5d12bc44]{width: 100%;
    background: #f5f5f5;
    border: 2px solid #ffffff;
    border-radius: 11px;
    padding: 11px;
    position: relative;
    top: -5px;}.content[data-v-5d12bc44]{width:100%;height:100%;background:#fff;border:1px solid #000}.title[data-v-5d12bc44]{width:100%;font-size:18px;font-family:Source Han Sans CN;font-weight:600;color:#333;margin:29px 0 16px 0;padding:0 24px}.content-detail[data-v-5d12bc44]{width:100%;padding:0 24px;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#999;text-align:center;margin-bottom:30px}.button[data-v-5d12bc44]{width:100%;margin-bottom:16px;padding:0 5px}.button_1[data-v-5d12bc44]{width: 288px;
    height: 40px;
    background: #5e5e64;
    font-size: 18px;
    font-family: Source Han Sans CN;
    font-weight: 400;
    color: #fbf8ff;}.icon[data-v-5d12bc44]{position:absolute;top:22px;right:2px;width:33px;height:22px}.iconplus[data-v-5d12bc44]{position:absolute;top:88px;right:50px;width:15px;height:15px}.edit-icon[data-v-5d12bc44]{width:17px;height:17px;position:absolute;top:88px;right:36px}</style>
</head>
<body>
<uni-app>
<uni-page>
<uni-page-head>
<div class="uni-page-head" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
<div class="uni-page-head-hd" onclick="history.go(-1);">
<div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd"><div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> Confirm Order </div>
</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head>
<uni-page-wrapper>
<uni-page-body><div class="container"><div class="head"><div class="head-content"><div class="head-left">


<div>
<div class="u-icon u-icon--right"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-map" style="font-size: 28px; line-height: 28px; font-weight: normal; top: 0px; color: rgb(41, 121, 255);"><span></span></uni-text>
</div>
</div>
<?php 
if($dz){
	echo '<div class="head-title"><div class="head-name">'.$dz['receiver'].'<uni-text class="number"><span>'.$dz['phone'].'</span></uni-text></div><div class="number">'.$dz['province_name'].$dz['city_name'].$dz['area_name'].$dz['address'].'</div></div>';
}else{
	echo '<div class="head-title"><div class="head-name">Please Add Address First</div></div>';
}
?>
</div>
<div><div class="u-icon u-icon--right" onclick="gourl('address.php')"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-arrow-right" style="font-size: 28px; line-height: 28px; font-weight: normal; top: 0px; color: gray;"><span></span></uni-text></div>
</div>
</div>
</div>
<div class="list-container"><div class="list-content"><div class="list-item"><div class="list-body main-space-between"><div class="list-body-left main-center-flex"><div data-v-a75f7a08="" data-v-1428a719="" class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;"><div data-v-1428a719="" class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image data-v-1428a719="" show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><div style="background-image: url(&quot;<?php echo $god['goods_image']?>&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="<?php echo $god['goods_image']?>" draggable="false"></uni-image></div>
</div>
</div>
<div class="list-body-right"><div class="goods-name text-ellipsis_2"><?php echo $god['goods_name']?></div>
<div class="exchange">Can be decomposed into<uni-text><span><?php echo $god['recovery_price']?></span></uni-text>Hash Coins</div>
</div>
</div>
</div>
</div>
<div class="fare"><div class="main-space-between fare-item"><div>Shipping Fee</div>
<div class="money">￥0</div>
</div>
<div class="fare-item fare-bottom">Total 1 Item | Total：<uni-text class="all-money"><span>￥0</span></uni-text></div>
</div>
<div class="tip-info"><div>Completing the transaction means you agree to the following terms：</div>
<div>1、Delivery is not available to Hong Kong, Macau, Taiwan, and some remote areas .</div>
<div>2、Due to the pandemic and other factors, the order acceptance and delivery by logistics companies in many places are affected, leading to extended delivery times. Please understand and feel free to contact online customer service for inquiries .</div>
<div>3、Color deviation may occur during the display, photographing, and image processing stages. Please refer to the actual product !</div>
</div>
</div>
<div class="footer main-center-flex"><div class="left main-center-flex"></div>
<div class="right main-center-flex"><div class="total"></div>
<div class="pickBtn" onclick="tihuo(<?php echo $gid?>)">Confirm Pickup</div>
</div>
</div>

</div>
<div class="u-popup" id="fj" style="display: ;"></div>
<uni-toast id="msg" style="display: none;"><div class="uni-sample-toast"><p class="uni-simple-toast__text" id="msgtxt"> Insufficient Balance </p></div>
</uni-toast>
</uni-page-body></uni-page-wrapper></uni-page></uni-app></body></html>