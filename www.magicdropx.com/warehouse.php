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
//$jp=runsqld($db,"select * from hm_order_record_detail where status='1' and user_id='$uid' order by id asc");
?>
<!DOCTYPE html>
<html lang="zh-CN" style="--status-bar-height:0px;--top-window-height:0px;--window-left:0px;--window-right:0px;--window-margin:0px;--window-top:calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top)));--window-bottom:calc(60px + env(safe-area-inset-bottom));"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>warehouse</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
		<script src="./static/js/jquery-1.10.2.js?v=2030"></script>
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
.main-center-flex[data-v-7a78d4df]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-7a78d4df]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-7a78d4df]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-7a78d4df]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-7a78d4df]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-7a78d4df]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-7a78d4df]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-7a78d4df]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-7a78d4df]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-7a78d4df]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-7a78d4df]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-7a78d4df]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-7a78d4df]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-7a78d4df]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-7a78d4df]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-7a78d4df]::after{border:none}.clear-button[data-v-7a78d4df]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-7a78d4df], uni-scroll-view[data-v-7a78d4df], uni-swiper-item[data-v-7a78d4df]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-tabs__wrapper[data-v-7a78d4df]{display:flex;flex-direction:row;align-items:center}.u-tabs__wrapper__scroll-view-wrapper[data-v-7a78d4df]{flex:1;overflow:auto hidden}.u-tabs__wrapper__scroll-view[data-v-7a78d4df]{display:flex;flex-direction:row;flex:1}.u-tabs__wrapper__nav[data-v-7a78d4df]{display:flex;flex-direction:row;position:relative}.u-tabs__wrapper__nav__item[data-v-7a78d4df]{padding:0 11px;display:flex;flex-direction:row;align-items:center;justify-content:center}.u-tabs__wrapper__nav__item--disabled[data-v-7a78d4df]{cursor:not-allowed}.u-tabs__wrapper__nav__item__text[data-v-7a78d4df]{font-size:15px;color:#606266}.u-tabs__wrapper__nav__item__text--disabled[data-v-7a78d4df]{color:#c8c9cc!important}.u-tabs__wrapper__nav__line[data-v-7a78d4df]{height:3px;background:#3c9cff;width:30px;position:absolute;bottom:2px;border-radius:100px;transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;transition-duration:.3s}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-6e5fb1c2]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-6e5fb1c2]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-6e5fb1c2]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-6e5fb1c2]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-6e5fb1c2]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-6e5fb1c2]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-6e5fb1c2]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-6e5fb1c2]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-6e5fb1c2]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-6e5fb1c2]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-6e5fb1c2]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-6e5fb1c2]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-6e5fb1c2]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-6e5fb1c2]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-6e5fb1c2]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-6e5fb1c2]::after{border:none}.clear-button[data-v-6e5fb1c2]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-6e5fb1c2], uni-scroll-view[data-v-6e5fb1c2], uni-swiper-item[data-v-6e5fb1c2]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-loadmore[data-v-6e5fb1c2]{display:flex;flex-direction:row;align-items:center;justify-content:center;flex:1}.u-loadmore__content[data-v-6e5fb1c2]{margin:0 15px;display:flex;flex-direction:row;align-items:center;justify-content:center}.u-loadmore__content__icon-wrap[data-v-6e5fb1c2]{margin-right:8px}.u-loadmore__content__text[data-v-6e5fb1c2]{font-size:14px;color:#606266}.u-loadmore__content__dot-text[data-v-6e5fb1c2]{font-size:15px;color:#909193}</style><style type="text/css">.container{height:100vh;position:relative;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)
	/* overflow-y: hidden; */}.empty{width:100%;background:#fbf8ff;height:40px}.head{width:100%;height:50px;background:#fbf8ff;
}.sort-container{width:100%;padding:0 15px;margin:15px 0 25px 0;
}.sort-item{width:65px;height:25px;background:#2e2e31;border:0.5px solid #d4d4d4;opacity:.3;font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff}.sort-item-active{opacity:1}.list{width:100%;padding:0 15px 15px 15px;
	/* height: calc(100vh - 80rpx - 130rpx); */overflow-y:scroll;
}.list-item-container{margin-bottom:15px;position:relative}.list-item{width:100%;height:140px;background:#fff;display:flex;align-items:center;text-align:center}.check-box{margin-left:10px}.list-item-image{width:110px;height:120px}.list-item-info{text-align:left;width:calc(100% - 110px);height:140px;padding:20px 15px 20px 0;position:relative}.view-logistics{position:absolute;bottom:5px;right:18px}.list-item-info-name{font-size:14px;font-family:Source Han Sans CN;font-weight:500;color:#333;margin-top:10px}.list-item-style{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#b0b0b0;margin-top:5px}.status-box{margin-top:7px;font-size:12px;text-align:right;display:flex;justify-content:flex-end;position:absolute;bottom:10px;right:15px}.status-opera{display:flex;justify-content:flex-end}.opera-status{font-size:12px;position:absolute;top:6px;right:16px;color:#ea6e7a}.opera-change{width:73px;height:28px;border:1px solid #f1f1f1;font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333;text-align:center;line-height:28px}.first-opera{margin:0 10px}.list-item_0{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e;margin-top:9px}.list-item_0 uni-text{font-size:17px;font-family:Abel;font-weight:400;color:#ec872e}.list-operation{height:40px;width:100%;background:#fff;display:flex;justify-content:flex-end;align-items:flex-start}.list-operation>div{width:73px;height:28px;border:1px solid #f1f1f1;font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin-right:15px}.operation-container{width:100%;padding:15px;background:#fff}.operation-head{height:80px}.give-head{height:205px;text-align:center}.give-title{font-size:15px;color:#333;margin-top:20px;font-weight:600}.give-image{display:flex;justify-content:center;margin-top:45px}.give-name{margin-top:35px;font-size:14px;color:#333;font-weight:600}.agreement{color:#999;font-size:12px;margin-top:20px}.operation-image{width:80px;height:80px}.operation-info{width:calc(100% - 80px);height:80px;padding:0 50px 0 15px}.operation-info>div:first-child{width:100%;height:50%;font-size:14px;font-family:Source Han Sans CN;font-weight:500;color:#333}.operation-info>div:last-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#ec872e}.operation-info>div:last-child uni-text{font-size:17px}.operation-body{width:345px;padding:15px 10px;
	/* background: #FAF9F9; */margin-top:15px}.operation-body>div:first-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#666}.operation-body>uni-text{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999;margin-top:13px}.operation-foot{width:100%;height:49px;background:#3f3f42;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff;margin:31px 0 7px 0}.footer{position:fixed;bottom:0;height:60px;display:flex;width:100%;justify-content:space-between;padding:10px;background:#fff;font-size:14px;border-bottom:1px solid #f3f3f3}.footers{position:fixed;bottom:0;height:60px;display:flex;width:100%;align-items:center;padding:10px;background:#fff;font-size:14px;border-bottom:1px solid #f3f3f3;justify-content:center;box-shadow:3px 2px 5px 5px #e2e2e2;border-top:1px solid #f3f3f3}.footer-item{width:120px;height:34px;background:#333;color:#fff;line-height:34px;text-align:center;font-size:14px}.item1{margin-right:45px}.total{color:#999;margin-left:10px;font-size:11px}.change-num{color:#ec872e}.pickBtn{text-align:center;height:30px;line-height:30px;font-size:14px;background:grey;color:#fff;width:80px}.sure-opera{background:silver}.sure-operas{background:#ec872e}.btn-common{text-align:center;width:90px;height:34px;line-height:34px;margin-left:10px}.cancel{color:#999;font-size:14px}.goods-list{height:100%}.tipInfo{position:absolute;top:5px;left:10px;color:#b0b0b0;font-size:12px}</style>
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
	<div class="uni-page-head" style="background-color: rgb(251, 248, 255); color: rgb(0, 0, 0);">
	<div class="uni-page-head-hd">
	<div class="uni-page-head-btn" style="display: none;">
	<i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> warehouse </div>
</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head>
<uni-page-wrapper>
<uni-page-body>
<div class="container">
<div class="head">
<div data-v-7a78d4df="" class="u-tabs">
<div data-v-7a78d4df="" class="u-tabs__wrapper">
<div data-v-7a78d4df="" class="u-tabs__wrapper__scroll-view-wrapper">
<uni-scroll-view data-v-7a78d4df="" class="u-tabs__wrapper__scroll-view">
<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden;">
<div class="uni-scroll-view-content">
<div data-v-7a78d4df="" class="u-tabs__wrapper__nav">
<div data-v-7a78d4df="" class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-0" style="width: 50%; height: 40px; font-size: 18px; font-family: &quot;Source Han Sans CN&quot;; font-weight: 400; color: rgb(176, 176, 176); flex: 1 1 0%;"><uni-text data-v-7a78d4df="" class="u-tabs__wrapper__nav__item__text" style="font-family: &quot;Source Han Sans CN&quot;; font-weight: bold;" onclick="xuanz(1)"><span id="tt1">box</span></uni-text></div>
<div data-v-7a78d4df="" class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-1" style="width: 50%; height: 40px; font-size: 18px; font-family: &quot;Source Han Sans CN&quot;; font-weight: 400; color: rgb(176, 176, 176); flex: 1 1 0%;"><uni-text data-v-7a78d4df="" class="u-tabs__wrapper__nav__item__text" style="color: rgb(96, 98, 102);" onclick="xuanz(2)"><span id="tt2">goods</span></uni-text></div>
<div id="dixian" data-v-7a78d4df="" class="u-tabs__wrapper__nav__line" style="width: 86px; transform: translate(-86px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"></div>
</div>
</div>
</div>
</div>
</uni-scroll-view></div>
</div>
</div>
</div>
<div class="sort-container main-space-between" id="ck">
	<div class="sort-item main-center-flex sort-item-active" onclick="xzck(1)" id="hz1">In the box</div>
	<div class="sort-item main-center-flex" onclick="xzck(2)" id="hz2">Decomposed</div>
	<div class="sort-item main-center-flex" onclick="xzck(3)" id="hz3">Picked Up</div>
	<div class="sort-item main-center-flex" onclick="xzck(0)" id="hz0">All</div>
</div>
<uni-scroll-view class="list" style="height: calc(100vh - 140px);">
<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden auto;">
<input type="hidden" id="hiddenPage" value="0">
<input type="hidden" id="lx" value="1">
<div id="theList">
<?php 
//class="uni-scroll-view-content" 
?>
</div>
<div class="pull" id="loading" style="font-size: 0.6em; display: block;height: 45px;">
<div class="spinner"></div></div>
</div>
</div>
</uni-scroll-view>

<div class="u-popup"></div>
<div class="u-popup" id="fj" style="display: none;"></div>
<div class="u-popup bg"></div>
<!-- <div class="u-popup bg">
<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);"></div>
<div style="z-index: 10075; position: fixed; display: flex; align-items: center; justify-content: center; inset: 0px;">
<div>
<div class="container" data-v-5d12bc44="">
<div data-v-5d12bc44="" class="main">
<div data-v-5d12bc44="" class="close"></div>
<div data-v-5d12bc44="" class="body main-center-flex">
<div data-v-5d12bc44="" class="content">
<div data-v-5d12bc44="" class="title main-center-flex">兑换成功</div>
<div data-v-5d12bc44="" class="content-detail"><uni-text data-v-5d12bc44=""><span></span></uni-text></div>
<div data-v-5d12bc44="" class="button main-center-flex">
<div data-v-5d12bc44="" class="button_1 main-center-flex">确定</div></div></div></div></div></div></div></div></div> -->
<uni-toast id="msg" style="display: none;">
<div class="uni-sample-toast"><p class="uni-simple-toast__text" id="msgtxt"> Insufficient Balance </p></div>
</uni-toast>
</div>
</uni-page-body>
</uni-page-wrapper>
</uni-page>

<uni-tabbar class="uni-tabbar-bottom" style="">
<div class="uni-tabbar" style="background-color: rgb(255, 255, 255); backdrop-filter: none;">
<div class="uni-tabbar-border" style="background-color: rgba(255, 255, 255, 0.33);"></div>
	<div class="uni-tabbar__item" onclick="gourl('./')">
<div class="uni-tabbar__bd" style="height: 60px;">
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/index.png"></div>
<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> home </div>
</div>
</div>
	<div class="uni-tabbar__item" onclick="gourl('mall.php')">
<div class="uni-tabbar__bd" style="height: 60px;">
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/market.png"></div>
<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> mall </div>
</div>
</div>
	<div class="uni-tabbar__item" onclick="gourl('warehouse.php')">
<div class="uni-tabbar__bd" style="height: 60px;">
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/warehouse_selected.png"></div>
<div class="uni-tabbar__label" style="color: rgb(51, 51, 51); font-size: 10px; line-height: normal; margin-top: 3px;"> warehouse </div>
</div>
</div>
	<div class="uni-tabbar__item" onclick="gourl('my.php')">
<div class="uni-tabbar__bd" style="height: 60px;">
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/my.png"></div>
<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> User Center </div>
</div>
</div>
	</div>
<div class="uni-placeholder" style="height: 60px;"></div>
</uni-tabbar>
</uni-app>
<script type="text/javascript">
function ycfj(i){
	if($("#fj").is(":visible")==false){
		if(i>-1){
			var html='<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);" onclick="ycfj(0)"></div><div style="z-index: 10075; position: fixed; display: flex; bottom: 0px; left: 0px; right: 0px;"><div><div class="operation-container"><div class="operation-head main-start-flex"><div class="operation-image"><div><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+ckxx[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="operation-info column-align-start-flex"><div class="text-ellipsis_2">'+ckxx[i]['goods_name']+'</div><div>Decompose Hash Coins<uni-text><span>'+ckxx[i]['recovery_price']+'</span></uni-text></div></div></div><div class="operation-body" style="background: rgb(250, 249, 249);"><div>Decomposition Instructions</div><uni-text><span>1、Unwanted items can be decomposed into platform Hash Coins (Hash Coins are used as a medium for decomposing items on the platform)<br>					2、Once Hash Coins are decomposed, they cannot be transferred or withdrawn<br>					3、The right to interpret Hash Coins belongs to the platform，If you have questions, please contact customer service<br>					4、The number of Hash Coins obtained from decomposition varies with the real-time market cost of the product</span></uni-text></div><div class="operation-foot main-center-flex" onclick="fenjie('+ckxx[i]['id']+')">Confirm Decomposition</div></div><div class="u-popup__content__close u-popup__content__close--top-right"></div></div></div>';
			$("#fj").html(html);
		}
		$("#fj").show();
	}else{
		$("#fj").hide();
	}
}
function xuanz(i){
	var w1=0,w2=0;
	var html;
	w1=$("#tt1").position().left-28;
	w2=$("#tt2").position().left-22;
	if(i==1){
		mrhz='1';
		$("#dixian").attr({"style":"width: 86px; transform: translate("+w1+"px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"});
		html='<div class="sort-item main-center-flex sort-item-active" onclick="xzck(1)" id="hz1">In the box</div><div class="sort-item main-center-flex" onclick="xzck(2)" id="hz2">decompose</div><div class="sort-item main-center-flex" onclick="xzck(3)" id="hz3">Picked up</div><div class="sort-item main-center-flex" onclick="xzck(0)" id="hz0">ALL</div>';
		$("#ck").html(html);
		xzck(1);
	}else{
		mrhz='4';
		$("#dixian").attr({"style":"width: 86px; transform: translate("+w2+"px); transition-duration: 300ms; height: 2px; background:  0% 0% / cover rgb(51, 51, 51);"})
		html='<div class="sort-item main-center-flex sort-item-active" onclick="xzck(4)" id="hz4">to ship</div><div class="sort-item main-center-flex" onclick="xzck(5)" id="hz5">shipped</div><div class="sort-item main-center-flex" onclick="xzck(6)" id="hz6">Completed</div><div class="sort-item main-center-flex" onclick="xzck(7)" id="hz7">ALL</div>';
		$("#ck").html(html);
		xzck(4);
	}
	
}
xuanz(<?php echo $c;?>);
$("#hiddenPage").val("0");
var canScroll = true;
window.onload = function () {
	//getcanku();
	window.onscroll = function () {
		loadingData("theList");
	};
}
</script>
</body></html>