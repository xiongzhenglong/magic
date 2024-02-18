<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$gid=myTrim($_REQUEST['gid']);
//$box=getblindbox($db,$bid);
$item=runsql($db,"select * from hm_goods where id='$gid' order by id asc");
?>
<html lang="zh-CN" style="--status-bar-height:0px; --top-window-height:0px; --window-left:0px; --window-right:0px; --window-margin:0px; --window-top:calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom:0px;"><head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>商品详情</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
		<link rel="stylesheet" href="./static/index.css">
		<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
		<script src="./static/js/cmd.js?v=2030"></script>
		<style type="text/css">
			@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}
.u-line-1{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:1;-webkit-box-orient:vertical!important}.u-line-2{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:2;-webkit-box-orient:vertical!important}.u-line-3{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:3;-webkit-box-orient:vertical!important}.u-line-4{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:4;-webkit-box-orient:vertical!important}.u-line-5{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:5;-webkit-box-orient:vertical!important}.u-border{border-width:.5px!important;border-color:#dadbde!important;border-style:solid}.u-border-top{border-top-width:.5px!important;border-color:#dadbde!important;border-top-style:solid}.u-border-left{border-left-width:.5px!important;border-color:#dadbde!important;border-left-style:solid}.u-border-right{border-right-width:.5px!important;border-color:#dadbde!important;border-right-style:solid}.u-border-bottom{border-bottom-width:.5px!important;border-color:#dadbde!important;border-bottom-style:solid}.u-border-top-bottom{border-top-width:.5px!important;border-bottom-width:.5px!important;border-color:#dadbde!important;border-top-style:solid;border-bottom-style:solid}.u-reset-button{padding:0;background-color:initial;font-size:inherit;line-height:inherit;color:inherit}.u-reset-button::after{border:none}.u-hover-class{opacity:.7}.u-primary-light{color:#ecf5ff}.u-warning-light{color:#fdf6ec}.u-success-light{color:#f5fff0}.u-error-light{color:#fef0f0}.u-info-light{color:#f4f4f5}.u-primary-light-bg{background-color:#ecf5ff}.u-warning-light-bg{background-color:#fdf6ec}.u-success-light-bg{background-color:#f5fff0}.u-error-light-bg{background-color:#fef0f0}.u-info-light-bg{background-color:#f4f4f5}.u-primary-dark{color:#398ade}.u-warning-dark{color:#f1a532}.u-success-dark{color:#53c21d}.u-error-dark{color:#e45656}.u-info-dark{color:#767a82}.u-primary-dark-bg{background-color:#398ade}.u-warning-dark-bg{background-color:#f1a532}.u-success-dark-bg{background-color:#53c21d}.u-error-dark-bg{background-color:#e45656}.u-info-dark-bg{background-color:#767a82}.u-primary-disabled{color:#9acafc}.u-warning-disabled{color:#f9d39b}.u-success-disabled{color:#a9e08f}.u-error-disabled{color:#f7b2b2}.u-info-disabled{color:#c4c6c9}.u-primary{color:#3c9cff}.u-warning{color:#f9ae3d}.u-success{color:#5ac725}.u-error{color:#f56c6c}.u-info{color:#909399}.u-primary-bg{background-color:#3c9cff}.u-warning-bg{background-color:#f9ae3d}.u-success-bg{background-color:#5ac725}.u-error-bg{background-color:#f56c6c}.u-info-bg{background-color:#909399}.u-main-color{color:#303133}.u-content-color{color:#606266}.u-tips-color{color:#909193}.u-light-color{color:#c0c4cc}.u-safe-area-inset-top{padding-top:0;padding-top:constant(safe-area-inset-top);padding-top:env(safe-area-inset-top)}.u-safe-area-inset-right{padding-right:0;padding-right:constant(safe-area-inset-right);padding-right:env(safe-area-inset-right)}.u-safe-area-inset-bottom{padding-bottom:0;padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.u-safe-area-inset-left{padding-left:0;padding-left:constant(safe-area-inset-left);padding-left:env(safe-area-inset-left)}uni-toast{z-index:10090}uni-toast .uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}
		</style>
		<style type="text/css">
			@charset "UTF-8";
.main-center-flex[data-v-d4342702]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-d4342702]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-d4342702]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-d4342702]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-d4342702]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-d4342702]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-d4342702]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-d4342702]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-d4342702]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-d4342702]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-d4342702]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-d4342702]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-d4342702]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-d4342702]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-d4342702]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-d4342702]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-d4342702]::after{border:none}.clear-button[data-v-d4342702]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-d4342702], uni-scroll-view[data-v-d4342702], uni-swiper-item[data-v-d4342702]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-swiper[data-v-d4342702]{display:flex;flex-direction:row;justify-content:center;align-items:center;position:relative;overflow:hidden}.u-swiper__wrapper[data-v-d4342702]{flex:1}.u-swiper__wrapper__item[data-v-d4342702]{flex:1}.u-swiper__wrapper__item__wrapper[data-v-d4342702]{display:flex;flex-direction:row;position:relative;overflow:hidden;transition:-webkit-transform .3s;transition:transform .3s;transition:transform .3s,-webkit-transform .3s;flex:1}.u-swiper__wrapper__item__wrapper__image[data-v-d4342702]{flex:1}.u-swiper__wrapper__item__wrapper__video[data-v-d4342702]{flex:1}.u-swiper__wrapper__item__wrapper__title[data-v-d4342702]{position:absolute;background-color:rgba(0,0,0,.3);bottom:0;left:0;right:0;font-size:15px;padding:6px 13px;color:#fff;flex:1}.u-swiper__indicator[data-v-d4342702]{position:absolute;bottom:10px}
		</style>
		<style type="text/css">
			.container{width:100%;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)} .u-swiper{width:100%}.indicator-dot-container{display:flex;justify-content:center;align-items:center;width:43px;height:23px;background:hsla(0,0%,67.1%,.6);font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#fff}.market-info{width:100%;background:#fff;padding:16px}.market-price{width:100%}.market-price>uni-text:first-child{font-size:19px;font-family:Source Han Sans CN;font-weight:400;color:#333}.market-price>uni-text:nth-child(2){font-size:32px;font-family:Abel;font-weight:400;color:#333}.market-price>uni-text:nth-child(3){font-size:18px;font-family:Abel;font-weight:400;color:#ec872e;margin-left:9px}.market-price>uni-text:last-child{font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e}.market-name{height:46px;font-size:16px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin-top:27px}.market-detail{margin-top:16px;width:100%;padding-bottom:calc(71px + env(safe-area-inset-bottom));background:#fff}.market-detail-title{width:100%;height:55px;font-size:16px;font-family:Source Han Sans CN;font-weight:400;color:#0c0d18;padding-left:16px;background:#fff}.market-footer{width:100%;height:calc(71px + env(safe-area-inset-bottom));background:#fff;box-shadow:0.5px -2px 8px 0 rgba(30,30,30,.15);padding:0 16px env(safe-area-inset-bottom) 16px;position:fixed;bottom:0;left:0}.market-footer-button{width:380px;height:54px;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff}.market-footer>div:last-child{background:linear-gradient(99deg,#8f09e6,#b546ff)}
			
			/* 	.market-footer>view:last-child {
				background: #3F3F42;
			} */.market-change{display:flex;align-items:center;justify-content:center}.market-detail-image{width:100%}.buy-container{width:100%;background:#fff;padding:10px}.buy-info{width:100%}.buy-goods-image{width:88px;height:88px}.buy-goods-detail{width:calc(100% - 88px);height:88px;padding:0 55px 0 16px}.buy-goods-detail>div:first-child{width:100%;height:50%;font-size:15px;font-family:Source Han Sans CN;font-weight:500;color:#333}.buy-goods-detail>div:last-child{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e;margin-top:11px}.goods-specifications{width:100%;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#666;margin-top:55px}.specifications-contianer{width:100%;display:flex;flex-wrap:wrap;margin-top:16px}.specifications-item{padding:0 16px;height:33px;margin-right:16px;font-size:13px;font-family:Source Han Sans CN;font-weight:400;margin-bottom:16px}.specifications-selected{border:0.5px solid #98b9dc;color:#85addd;background:rgba(133,173,221,.2)}.specifications-unselect{border:0.5px solid #0c0d18;color:#0c0d18}.buy-num{width:100%;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#666;margin-top:27px}.confirm-buy{width:100%;height:54px;
				/* background: #3F3F42; */font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff;margin:44px 0 0 0}.rule-container{margin-top:16px
  <style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-44254ce5]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-44254ce5]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-44254ce5]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-44254ce5]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-44254ce5]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-44254ce5]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-44254ce5]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-44254ce5]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-44254ce5]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-44254ce5]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-44254ce5]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-44254ce5]::after{border:none}.clear-button[data-v-44254ce5]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-44254ce5], uni-scroll-view[data-v-44254ce5], uni-swiper-item[data-v-44254ce5]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-number-box[data-v-44254ce5]{display:flex;flex-direction:row;align-items:center}.u-number-box__slot[data-v-44254ce5]{touch-action:none}.u-number-box__plus[data-v-44254ce5], .u-number-box__minus[data-v-44254ce5]{width:35px;display:flex;flex-direction:row;justify-content:center;align-items:center;touch-action:none}.u-number-box__plus--hover[data-v-44254ce5], .u-number-box__minus--hover[data-v-44254ce5]{background-color:#e6e6e6!important}.u-number-box__plus--disabled[data-v-44254ce5], .u-number-box__minus--disabled[data-v-44254ce5]{color:#c8c9cc;background-color:#f7f8fa}.u-number-box__plus[data-v-44254ce5]{border-top-right-radius:4px;border-bottom-right-radius:4px}.u-number-box__minus[data-v-44254ce5]{border-top-left-radius:4px;border-bottom-left-radius:4px}.u-number-box__input[data-v-44254ce5]{position:relative;text-align:center;font-size:15px;padding:0;margin:0 2px;display:flex;flex-direction:row;align-items:center;justify-content:center}.u-number-box__input--disabled[data-v-44254ce5]{color:#c8c9cc;background-color:#f2f3f5}</style>
  <style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-59765974]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-59765974]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-59765974]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-59765974]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-59765974]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-59765974]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-59765974]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-59765974]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-59765974]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-59765974]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-59765974]::after{border:none}.clear-button[data-v-59765974]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-59765974], uni-scroll-view[data-v-59765974], uni-swiper-item[data-v-59765974]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}.u-icon[data-v-59765974]{display:flex;align-items:center}.u-icon--left[data-v-59765974]{flex-direction:row-reverse;align-items:center}.u-icon--right[data-v-59765974]{flex-direction:row;align-items:center}.u-icon--top[data-v-59765974]{flex-direction:column-reverse;justify-content:center}.u-icon--bottom[data-v-59765974]{flex-direction:column;justify-content:center}.u-icon__icon[data-v-59765974]{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}.u-icon__icon--primary[data-v-59765974]{color:#3c9cff}.u-icon__icon--success[data-v-59765974]{color:#5ac725}.u-icon__icon--error[data-v-59765974]{color:#f56c6c}.u-icon__icon--warning[data-v-59765974]{color:#f9ae3d}.u-icon__icon--info[data-v-59765974]{color:#909399}.u-icon__img[data-v-59765974]{height:auto;will-change:transform}.u-icon__label[data-v-59765974]{line-height:1}</style>
  <style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-44254ce5]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-44254ce5]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-44254ce5]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-44254ce5]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-44254ce5]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-44254ce5]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-44254ce5]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-44254ce5]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-44254ce5]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-44254ce5]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-44254ce5]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-44254ce5]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-44254ce5]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-44254ce5]::after{border:none}.clear-button[data-v-44254ce5]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-44254ce5], uni-scroll-view[data-v-44254ce5], uni-swiper-item[data-v-44254ce5]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-number-box[data-v-44254ce5]{display:flex;flex-direction:row;align-items:center}.u-number-box__slot[data-v-44254ce5]{touch-action:none}.u-number-box__plus[data-v-44254ce5], .u-number-box__minus[data-v-44254ce5]{width:35px;display:flex;flex-direction:row;justify-content:center;align-items:center;touch-action:none}.u-number-box__plus--hover[data-v-44254ce5], .u-number-box__minus--hover[data-v-44254ce5]{background-color:#e6e6e6!important}.u-number-box__plus--disabled[data-v-44254ce5], .u-number-box__minus--disabled[data-v-44254ce5]{color:#c8c9cc;background-color:#f7f8fa}.u-number-box__plus[data-v-44254ce5]{border-top-right-radius:4px;border-bottom-right-radius:4px}.u-number-box__minus[data-v-44254ce5]{border-top-left-radius:4px;border-bottom-left-radius:4px}.u-number-box__input[data-v-44254ce5]{position:relative;text-align:center;font-size:15px;padding:0;margin:0 2px;display:flex;flex-direction:row;align-items:center;justify-content:center}.u-number-box__input--disabled[data-v-44254ce5]{color:#c8c9cc;background-color:#f2f3f5}</style>
	</head>
	<body>
		<uni-app>
			<uni-page>
				<uni-page-head>
					<div class="uni-page-head" style="background-color: rgb(248, 248, 248); color: rgb(0, 0, 0);width: 100%;">
						<div class="uni-page-head-hd">
							<div class="uni-page-head-btn" style="white-space: initial;" onclick="history.go(-1);">
								<i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i>
							</div>
							<div class="uni-page-head-ft"></div>
						</div>
						<div class="uni-page-head-bd">
							<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;">
								 商品详情 </div>
						</div>
						
						<div class="uni-page-head-ft"></div>
					</div>
					<div class="uni-placeholder"></div>
				</uni-page-head>
				
				<uni-page-wrapper>
					<uni-page-body>
						<div>
							<div style="display: none;"></div>
							<div data-v-05688efe="" class="container">
<div data-v-d4342702="" data-v-05688efe="" class="u-swiper" style="background-color: rgb(243, 244, 246); height: 340px; border-radius: 0px;"><uni-swiper data-v-d4342702="" easingfunction="default" class="u-swiper__wrapper" style="height: 340px;">
<div class="uni-swiper-wrapper">
<div class="uni-swiper-slides" style="inset: 0px;">
<div class="uni-swiper-slide-frame" style="width: 100%; height: 100%; transform: translate(0%, 0px) translateZ(0px);"><uni-swiper-item data-v-d4342702="" class="u-swiper__wrapper__item" style="position: absolute; width: 100%; height: 100%; transform: translate(0%, 0px) translateZ(0px);">
<div data-v-d4342702="" class="u-swiper__wrapper__item__wrapper" style="text-align: center;"><uni-image data-v-d4342702="" class="u-swiper__wrapper__item__wrapper__image" style="height: 340px; border-radius: 0px;">
<div style="background-image: url(&quot;<?php echo $item['image'];?>&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="<?php echo $item['image'];?>" draggable="false"></uni-image></div>
</uni-swiper-item></div>
</div>
</div>
</uni-swiper>
<div data-v-d4342702="" class="u-swiper__indicator" style="right: 15px; bottom: 11px;">
<div data-v-05688efe="" class="indicator-dot-container">1/1</div>
</div>
</div>
<div data-v-05688efe="" class="market-info">
<div data-v-05688efe="" class="market-price"><uni-text data-v-05688efe=""><span>￥</span></uni-text><uni-text data-v-05688efe=""><span><?php echo $item['price'];?></span></uni-text><uni-text data-v-05688efe=""><span><?php echo $item['integral_price'];?></span></uni-text><uni-text data-v-05688efe=""><span>哈希币</span></uni-text></div>
<div data-v-05688efe="" class="market-name text-ellipsis_2"><?php echo $item['name'];?></div>
</div>
<div data-v-05688efe="" class="market-detail">
<div data-v-05688efe="" class="market-detail-title main-start-flex">商品详情</div>
<div data-v-05688efe=""><uni-rich-text data-v-05688efe="">
<div style="position: relative;"><p data-v-05688efe=""><img data-v-05688efe="" style="max-width: 100%;" src="<?php echo $item['image'];?>"></p><uni-resize-sensor>
<div>
<div></div>
</div>
<div>
<div></div>
</div>
</uni-resize-sensor></div>
</uni-rich-text></div>
</div>
<div data-v-05688efe="" class="market-footer market-change" onclick="xsgm()">
<div data-v-05688efe="" class="market-footer-button main-center-flex">哈希币分解</div>
</div>

</div>
						</div>
						
<div id="mask" class="u-popup" style="display: none;">
<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);" onclick="rwux()"></div>
<div id="gmkn" style="z-index: 10075; position: fixed; display: flex; inset: 0px 0px 0px; transform: translateY(0px);">
<div style="width: 100%;">
<div class="buy-container">
<div class="buy-info main-start-flex">
<div class="buy-goods-image">
<div data-v-a75f7a08="" data-v-1428a719="" class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div data-v-1428a719="" class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image data-v-1428a719="" show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;">
<img src="<?php echo $item['image'];?>" draggable="false" style="opacity:1"></uni-image></div>
</div>
</div>
<div class="buy-goods-detail">
<div class="text-ellipsis_2"><?php echo $item['name'];?></div>
<div>￥<?php echo $item['price'];?></div>
<div><?php echo $item['integral_price'];?>
						哈希币</div>
</div>
</div>
<div class="goods-specifications"></div>
<div class="buy-num main-space-between">
<div>购买数量</div>
<div>
<div data-v-44254ce5="" class="u-number-box">
<div data-v-44254ce5="" class="u-number-box__minus u-number-box__minus--disabled" style="background-color: rgb(247, 248, 250); height: 30px; color: rgb(50, 50, 51);"><div data-v-59765974="" data-v-44254ce5="" class="u-icon u-icon--right"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-minus" style="font-size: 15px; line-height: 15px; font-weight: bold; top: 0px; color: rgb(200, 201, 204);" onclick="jians()"><span></span></uni-text></div></div>
<uni-input data-v-44254ce5="" class="u-number-box__input" style="color: rgb(50, 50, 51); background-color: rgb(235, 236, 238); height: 30px; width: 35px;">
<div class="uni-input-wrapper">
<div class="uni-input-placeholder input-placeholder" data-v-44254ce5="" data-v-a75f7a08="" style="display: none;"></div>
<input id="sl" maxlength="140" enterkeyhint="done" value="1" pattern="[0-9]*" autocomplete="off" type="number" class="uni-input-input"></div>
</uni-input>
<div data-v-44254ce5="" class="u-number-box__plus" style="background-color: rgb(235, 236, 238); height: 30px; color: rgb(50, 50, 51);">
<div data-v-59765974="" data-v-44254ce5="" class="u-icon u-icon--right"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-plus" style="font-size: 15px; line-height: 15px; font-weight: bold; top: 0px; color: rgb(50, 50, 51);" onclick="jias()"><span></span></uni-text></div>
</div>
</div>
</div>
</div>
	<div class="confirm-buy main-center-flex" style="background: rgb(63, 63, 66);" onclick="pay()">确定</div>
</div>
</div>
</div>
</div>
						
						
					</uni-page-body>
				</uni-page-wrapper>
			</uni-page>
		</uni-app>


<script> 
var gid=<?php echo $gid;?>;
function jias(){
	var s=$("#sl").val();
	s++;
	$("#sl").val(s);
}
function jians(){
	var s=$("#sl").val();
	if(s>1){
		s--;
	}
	$("#sl").val(s);
}
function pay(){
	var s=$("#sl").val();
	var s=
	gourl('pay.php?gid='+gid+"&s="+s)
}
window.onload = function () {

}

</script>
</body></html>