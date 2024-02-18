<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$gid=myTrim($_REQUEST['gid']);
$s=myTrim($_REQUEST['s']);
$item=runsql($db,"select * from hm_goods where id='$gid' order by id asc");
$dz=runsql($db,"select * from hm_user_address where user_id='$uid' and default_flag='1' order by id asc");
?>
<html lang="zh-CN"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>订单确认</title>
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
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-59765974]::after{border:none}.clear-button[data-v-59765974]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-59765974], uni-scroll-view[data-v-59765974], uni-swiper-item[data-v-59765974]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}.u-icon[data-v-59765974]{display:flex;align-items:center}.u-icon--left[data-v-59765974]{flex-direction:row-reverse;align-items:center}.u-icon--right[data-v-59765974]{flex-direction:row;align-items:center}.u-icon--top[data-v-59765974]{flex-direction:column-reverse;justify-content:center}.u-icon--bottom[data-v-59765974]{flex-direction:column;justify-content:center}.u-icon__icon[data-v-59765974]{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}.u-icon__icon--primary[data-v-59765974]{color:#3c9cff}.u-icon__icon--success[data-v-59765974]{color:#5ac725}.u-icon__icon--error[data-v-59765974]{color:#f56c6c}.u-icon__icon--warning[data-v-59765974]{color:#f9ae3d}.u-icon__icon--info[data-v-59765974]{color:#909399}.u-icon__img[data-v-59765974]{height:auto;will-change:transform}.u-icon__label[data-v-59765974]{line-height:1}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-5302c461]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-5302c461]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-5302c461]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-5302c461]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-5302c461]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-5302c461]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-5302c461]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-5302c461]{display:-webkit-box;overflow:hidden;-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-5302c461]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-5302c461]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-5302c461]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-5302c461]::after{border:none}.clear-button[data-v-5302c461]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-5302c461], uni-scroll-view[data-v-5302c461], uni-swiper-item[data-v-5302c461]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-navbar--fixed[data-v-5302c461]{position:fixed;left:0;right:0;top:0;z-index:11}.u-navbar__content[data-v-5302c461]{display:flex;flex-direction:row;align-items:center;height:44px;background-color:#9acafc;position:relative;justify-content:center}.u-navbar__content__left[data-v-5302c461], .u-navbar__content__right[data-v-5302c461]{padding:0 13px;position:absolute;top:0;bottom:0;display:flex;flex-direction:row;align-items:center}.u-navbar__content__left[data-v-5302c461]{left:0}.u-navbar__content__left--hover[data-v-5302c461]{opacity:.7}.u-navbar__content__left__text[data-v-5302c461]{font-size:15px;margin-left:3px}.u-navbar__content__title[data-v-5302c461]{text-align:center;font-size:16px;color:#303133}.u-navbar__content__right[data-v-5302c461]{right:0}.u-navbar__content__right__text[data-v-5302c461]{font-size:15px;margin-left:3px}</style><style type="text/css">.container{height:100vh;padding:15px;padding-bottom:calc(110px + env(safe-area-inset-bottom));background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.head{margin-bottom:15px}.head-content{background:#fff;display:flex;align-items:center;text-align:center;justify-content:space-between;padding:0 10px;height:75px}.head-left{display:flex;align-items:center}.head-title{text-align:left}.head-name{font-size:14px;font-weight:600}.number{font-weight:500;font-size:12px}.pay-head{width:100%;height:40px;line-height:40px;background:#d88d54;text-align:center;padding:0 15px;font-size:20px;font-family:BTH;font-weight:400;color:#fff;margin-top:15px}.pay-info{background:#fff;padding:15px;padding-bottom:5px}.pay-info_1{width:100%;height:78px}.pay-info-detail_1{width:calc(100% - 78px);padding-left:11px}.pay-info-detail_1>div:first-child{width:100%}.pay-info-name{width:70%;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-price{font-size:17px;font-family:Abel;font-weight:400;color:#333}.pay-info-price uni-text{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-tip{width:-webkit-max-content;width:max-content;padding:0 5px;height:16px;background:#d76474;font-size:13px;font-family:BTH;font-weight:400;color:#fff;margin-top:6px}.pay-info-item,
.pay-type-item{width:100%;height:40px}.pay-info-item>uni-text:first-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-item>uni-text:last-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-item-price{font-size:17px;font-family:Abel;font-weight:400;color:#ec872e}.pay-info-item-price uni-text{font-size:17px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e}.pay-type{width:100%;background:#fff;padding:15px 15px 5px 15px;margin-top:15px}.pay-type-head{width:100%;font-size:15px;font-family:Source Han Sans CN;font-weight:500;color:#333}.pay-type-name{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin-left:5px;line-height:4px}.pay-remark{margin-top:15px;font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-confirm{width:100%;height:calc(95px + env(safe-area-inset-bottom));padding:10px;padding-bottom:env(safe-area-inset-bottom);background:#fff;box-shadow:0.5px -2px 8px 0 rgba(30,30,30,.15);position:fixed;bottom:0;left:0}.pay-adult{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-adult uni-text{color:#333}.pay-detail{margin-top:17px}.pay-detail-left{height:40px}.pay-detail-left>div:first-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-detail-left>div:first-child uni-text{font-size:21px;font-family:Abel;font-weight:400;color:#333}.pay-detail-left>div:last-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-button{width:105px;height:40px;background:#3f3f42;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#fff;margin-left:14px;margin-top:5px}.user-rule{color:#8d01e6!important}.img-icon{width:28px;height:32px;margin-right:5px}.img-goods{width:78px;height:78px}.icon-img{width:17px;height:17px}.chose-icon{border-radius:50%;border:1px solid #999}
.xuanz {background-image: url(static/image/t4.png);background-size: contain;    border: none;    border-radius: 0;}
</style>
<style type="text/css">.container[data-v-5d12bc44]{height:100vh;width:100%;padding:0px;display:flex;align-items:center;flex-direction:column;position:fixed;left:0;top:0;background:rgba(0,0,0,.7)}.main[data-v-5d12bc44]{left:0;right:0;top:0;bottom:0;margin:auto}.close[data-v-5d12bc44]{height:46px;width:46px;position:absolute;right:0;top:0}.head[data-v-5d12bc44]{width:100%;height:46px}.body[data-v-5d12bc44]{width:100%;background:#fff;border:2px solid #000;border-radius:10px;padding:11px;position:relative;top:-5px}.content[data-v-5d12bc44]{width:100%;height:100%;background:#fff;border:1px solid #000}.title[data-v-5d12bc44]{width:100%;font-size:18px;font-family:Source Han Sans CN;font-weight:600;color:#333;margin:29px 0 16px 0;padding:0 24px}.content-detail[data-v-5d12bc44]{width:100%;padding:0 24px;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#999;text-align:center;margin-bottom:30px}.button[data-v-5d12bc44]{width:100%;margin-bottom:16px;padding:0 5px}.button_1[data-v-5d12bc44]{width:288px;height:40px;background:#3f3f42;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff}.icon[data-v-5d12bc44]{position:absolute;top:22px;right:2px;width:33px;height:22px}.iconplus[data-v-5d12bc44]{position:absolute;top:88px;right:50px;width:15px;height:15px}.edit-icon[data-v-5d12bc44]{width:17px;height:17px;position:absolute;top:88px;right:36px}</style>

</head>
<body>
<uni-app>
<uni-page><uni-page-wrapper><uni-page-body>
<div class="container" style="padding-top: 44px;">
<div class="u-navbar">
<div data-v-5302c461="" class="u-navbar--fixed">
<div data-v-186edb96="" data-v-5302c461="" class="u-status-bar" style="height: 0px; background-color: rgba(0, 0, 0, 0);"></div>
<div data-v-5302c461="" class="u-navbar__content" style="height: 44px; background-color: rgba(0, 0, 0, 0);">
<div data-v-5302c461="" onclick="history.go(-1);" class="u-navbar__content__left">
<div data-v-59765974="" data-v-5302c461="" class="u-icon u-icon--right"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-arrow-left" style="font-size: 20px; line-height: 20px; font-weight: normal; top: 0px; color: rgb(48, 49, 51);"><span></span></uni-text></div>
</div>
<uni-text data-v-5302c461="" class="u-line-1 u-navbar__content__title" style="width: 200px;"><span>订单确认</span></uni-text></div>
</div>
</div>
<div class="head">
<div class="head-content">
<div class="head-left">
<div><uni-image class="img-icon">
<div style="background-image: url(&quot;static/image/t1.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="static/image/t1.png" draggable="false"></uni-image></div>
<?php 
if($dz){
	echo '<div class="head-title">
<div class="head-name">'.$dz['receiver'].'<uni-text class="number"><span>'.$dz['phone'].'</span></uni-text></div>
<div class="number">'.$dz['province_name'].$dz['city_name'].$dz['area_name'].$dz['address'].'</div>
</div>';
}else{
	echo '<div class="head-title">
<div class="head-name">请先添加地址</div>
</div>';
}
?>
</div>
<div><uni-image class="img-icon" onclick="gourl(&quot;address.php&quot;)">
<div style="background-image: url(&quot;static/image/t2.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="static/image/t2.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="pay-info">
<div class="pay-info_1 main-start-flex"><uni-image class="img-goods">
<div style="background-image: url(&quot;<?php echo $item['image'];?>&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="<?php echo $item['image'];?>" draggable="false"></uni-image>
<div class="pay-info-detail_1">
<div class="main-space-between">
<div class="pay-info-name text-ellipsis"><?php echo $item['name'];?></div>
<div class="pay-info-price"><uni-text><span>￥</span></uni-text><?php echo $item['price'];?></div>
</div>
</div>
</div>
<div class="pay-info-item main-space-between"><uni-text><span>数量</span></uni-text><uni-text><span>x<?php echo $s;?></span></uni-text></div>
<div data-v-2f0e5305="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgba(0, 0, 0, 0.1); width: 100%; transform: scaleY(0.5); border-top-color: rgba(0, 0, 0, 0.1); border-right-color: rgba(0, 0, 0, 0.1); border-left-color: rgba(0, 0, 0, 0.1);"></div>
<div class="pay-info-item main-space-between"><uni-text><span>合计</span></uni-text>
<div class="pay-info-item-price"><?php echo round($item['integral_price']*$s,2);?><uni-text class="text-color"><span>哈希币</span></uni-text></div>
</div>
</div>
<div class="pay-type">
<div class="pay-type-head main-start-flex">支付方式</div>
<uni-radio-group><uni-label class="pay-type-item main-space-between uni-label-pointer">
<div class="main-start-flex"><uni-image class="icon-img">
<div style="background-image: url(&quot;static/image/t3.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="static/image/t3.png" draggable="false"></uni-image>
<div class="pay-type-name">哈希币</div>
</div>
<uni-radio style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div class="uni-radio-input uni-radio-input-checked" style="background-color: rgb(235, 92, 74); border-color: rgb(235, 92, 74);"></div>
</div>
</uni-radio></uni-label></uni-radio-group></div>
<div class="pay-remark">若完成交易代表您已同意以下约定：<br>1、商品的实时价格会因市场波动而产生变化，具体成交价以平台为准。<br>2、由于显示器，拍照和做图的过程中，产品可能发生颜色偏差，具体请以实物为准！<br></div>
<div class="pay-confirm column-align-end-flex">
<div class="pay-adult main-start-flex">
<div id="xz" class="icon-img chose-icon" onclick="btn1()"></div>
<div>我已满18岁，已阅读并同意<uni-text class="user-rule"><span>《用户协议》</span></uni-text></div>
</div>
<div class="pay-detail main-start-flex">
<div class="pay-detail-left">
<div>合计:￥<uni-text><span><?php echo round($item['integral_price']*$s,2);?></span></uni-text></div>
<div class="main-end-flex">共<?php echo $s;?>件</div>
</div>
<div class="pay-button main-center-flex" onclick="payw()">确认支付</div>
</div>
</div>
<div class="u-popup bg" id="dialog" style="display: none;">
<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);"></div><div style="z-index: 10075; position: fixed; display: flex; align-items: center; justify-content: center; inset: 0px;"><div><div class="container" data-v-5d12bc44=""><div data-v-5d12bc44="" class="main"><div data-v-5d12bc44="" class="close"></div><div data-v-5d12bc44="" class="body main-center-flex"><div data-v-5d12bc44="" class="content"><div data-v-5d12bc44="" class="title main-center-flex">操作成功，正在为您准备发货</div><div data-v-5d12bc44="" class="content-detail"><uni-text data-v-5d12bc44=""><span></span></uni-text></div><div data-v-5d12bc44="" class="button main-center-flex"><div data-v-5d12bc44="" class="button_1 main-center-flex" onclick="gourl('warehouse.php?c=2');">确定</div></div></div></div></div></div></div></div>
</div>


<uni-toast id="msg" style="display: none;">
<div class="uni-sample-toast"><p class="uni-simple-toast__text" id="msgtxt"> 余额不足 </p></div>
</uni-toast>
</div>
</uni-page-body></uni-page-wrapper></uni-page></uni-app>
</body><script>
var gid=<?php echo $gid;?>;
var xy=0;
var sl=<?php echo $s;?>;
var zf="3";
function btn1(){
	if(xy==0){
		$('#xz').attr('class','icon-img xuanz');
		xy=1;
	}else{
		$('#xz').attr('class','icon-img chose-icon');
		xy=0;
	}
}
</script></html>