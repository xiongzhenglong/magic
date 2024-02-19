<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$bid=myTrim($_REQUEST['gid']);
$boxd=getblindbox($db,$bid);

$box=runsqld($db,"select * from hm_blindbox_detail where blindbox_id='$bid' order by price asc");
$box_lx=runsqld($db,"select * from hm_blindbox_tag order by id asc");


$xswb='';
$xsjg=$boxd['price'];
$hdsm="";
$sl=1;
$hj=0;
if($boxd['wfsm']!=""){
	$xswb='<div class="buy-back" style="background-image: url(&quot;static/image/home/buy-one-back.png&quot;);">'.$boxd['wfsm'].'</div>';
}
if($boxd['wanfa']==1){
	$xsjg='0.01';
	$sl=3;
	$hdsm='<div data-v-717eca78="" class="new-class main-space-between"><uni-text data-v-717eca78="" class="new-first"><span>New User First Order Discount</span></uni-text><div data-v-717eca78="" class="new-calc"><div data-v-717eca78="">First Order'.$xsjg.'RMB</div><div data-v-717eca78="">-￥'.($boxd['price']-$xsjg).'</div></div></div><div class="xian"></div>';
	$hj=2*$boxd['price']+0.01;
}
if($boxd['wanfa']==2){
	$sl=2;
	$hdsm='<div data-v-717eca78="" class="new-class main-space-between"><uni-text data-v-717eca78="" class="new-first"><span>Buy One Get One Free Offer</span></uni-text><div data-v-717eca78="" class="new-calc"><div data-v-717eca78="">-￥'.($boxd['price']).'</div></div></div><div class="xian"></div>';
	$hj=2*$boxd['price']-$boxd['price'];
}
//print_r($box[0]);
?>
<html lang="zh-CN" style="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Product Details</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<link rel="stylesheet" href="./static/index.css">
<link href="./static/css/swiper.min.css?v=2030" rel="stylesheet" />
<script src="./static/js/swiper.min.js?v=2030"></script>
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}
.u-line-1{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:1;-webkit-box-orient:vertical!important}.u-line-2{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:2;-webkit-box-orient:vertical!important}.u-line-3{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:3;-webkit-box-orient:vertical!important}.u-line-4{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:4;-webkit-box-orient:vertical!important}.u-line-5{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:5;-webkit-box-orient:vertical!important}.u-border{border-width:.5px!important;border-color:#dadbde!important;border-style:solid}.u-border-top{border-top-width:.5px!important;border-color:#dadbde!important;border-top-style:solid}.u-border-left{border-left-width:.5px!important;border-color:#dadbde!important;border-left-style:solid}.u-border-right{border-right-width:.5px!important;border-color:#dadbde!important;border-right-style:solid}.u-border-bottom{border-bottom-width:.5px!important;border-color:#dadbde!important;border-bottom-style:solid}.u-border-top-bottom{border-top-width:.5px!important;border-bottom-width:.5px!important;border-color:#dadbde!important;border-top-style:solid;border-bottom-style:solid}.u-reset-button{padding:0;background-color:initial;font-size:inherit;line-height:inherit;color:inherit}.u-reset-button::after{border:none}.u-hover-class{opacity:.7}.u-primary-light{color:#ecf5ff}.u-warning-light{color:#fdf6ec}.u-success-light{color:#f5fff0}.u-error-light{color:#fef0f0}.u-info-light{color:#f4f4f5}.u-primary-light-bg{background-color:#ecf5ff}.u-warning-light-bg{background-color:#fdf6ec}.u-success-light-bg{background-color:#f5fff0}.u-error-light-bg{background-color:#fef0f0}.u-info-light-bg{background-color:#f4f4f5}.u-primary-dark{color:#398ade}.u-warning-dark{color:#f1a532}.u-success-dark{color:#53c21d}.u-error-dark{color:#e45656}.u-info-dark{color:#767a82}.u-primary-dark-bg{background-color:#398ade}.u-warning-dark-bg{background-color:#f1a532}.u-success-dark-bg{background-color:#53c21d}.u-error-dark-bg{background-color:#e45656}.u-info-dark-bg{background-color:#767a82}.u-primary-disabled{color:#9acafc}.u-warning-disabled{color:#f9d39b}.u-success-disabled{color:#a9e08f}.u-error-disabled{color:#f7b2b2}.u-info-disabled{color:#c4c6c9}.u-primary{color:#3c9cff}.u-warning{color:#f9ae3d}.u-success{color:#5ac725}.u-error{color:#f56c6c}.u-info{color:#909399}.u-primary-bg{background-color:#3c9cff}.u-warning-bg{background-color:#f9ae3d}.u-success-bg{background-color:#5ac725}.u-error-bg{background-color:#f56c6c}.u-info-bg{background-color:#909399}.u-main-color{color:#303133}.u-content-color{color:#606266}.u-tips-color{color:#909193}.u-light-color{color:#c0c4cc}.u-safe-area-inset-top{padding-top:0;padding-top:constant(safe-area-inset-top);padding-top:env(safe-area-inset-top)}.u-safe-area-inset-right{padding-right:0;padding-right:constant(safe-area-inset-right);padding-right:env(safe-area-inset-right)}.u-safe-area-inset-bottom{padding-bottom:0;padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.u-safe-area-inset-left{padding-left:0;padding-left:constant(safe-area-inset-left);padding-left:env(safe-area-inset-left)}uni-toast{z-index:10090}uni-toast .uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-59765974]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-59765974]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-59765974]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-59765974]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-59765974]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-59765974]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-59765974]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-59765974]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-59765974]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-59765974]{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-59765974]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-59765974]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-59765974]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-59765974]::after{border:none}.clear-button[data-v-59765974]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-59765974], uni-scroll-view[data-v-59765974], uni-swiper-item[data-v-59765974]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}.u-icon[data-v-59765974]{display:flex;align-items:center}.u-icon--left[data-v-59765974]{flex-direction:row-reverse;align-items:center}.u-icon--right[data-v-59765974]{flex-direction:row;align-items:center}.u-icon--top[data-v-59765974]{flex-direction:column-reverse;justify-content:center}.u-icon--bottom[data-v-59765974]{flex-direction:column;justify-content:center}.u-icon__icon[data-v-59765974]{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}.u-icon__icon--primary[data-v-59765974]{color:#3c9cff}.u-icon__icon--success[data-v-59765974]{color:#5ac725}.u-icon__icon--error[data-v-59765974]{color:#f56c6c}.u-icon__icon--warning[data-v-59765974]{color:#f9ae3d}.u-icon__icon--info[data-v-59765974]{color:#909399}.u-icon__img[data-v-59765974]{height:auto;will-change:transform}.u-icon__label[data-v-59765974]{line-height:1}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-5302c461]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-5302c461]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-5302c461]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-5302c461]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-5302c461]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-5302c461]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-5302c461]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-5302c461]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-5302c461]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-5302c461]{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-5302c461]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-5302c461]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-5302c461]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-5302c461]::after{border:none}.clear-button[data-v-5302c461]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-5302c461], uni-scroll-view[data-v-5302c461], uni-swiper-item[data-v-5302c461]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-navbar--fixed[data-v-5302c461]{position:fixed;left:0;right:0;top:0;z-index:11}.u-navbar__content[data-v-5302c461]{display:flex;flex-direction:row;align-items:center;height:44px;background-color:#9acafc;position:relative;justify-content:center}.u-navbar__content__left[data-v-5302c461], .u-navbar__content__right[data-v-5302c461]{padding:0 13px;position:absolute;top:0;bottom:0;display:flex;flex-direction:row;align-items:center}.u-navbar__content__left[data-v-5302c461]{left:0}.u-navbar__content__left--hover[data-v-5302c461]{opacity:.7}.u-navbar__content__left__text[data-v-5302c461]{font-size:15px;margin-left:3px}.u-navbar__content__title[data-v-5302c461]{text-align:center;font-size:16px;color:#303133}.u-navbar__content__right[data-v-5302c461]{right:0}.u-navbar__content__right__text[data-v-5302c461]{font-size:15px;margin-left:3px}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-97c3fd1c]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-97c3fd1c]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-97c3fd1c]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-97c3fd1c]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-97c3fd1c]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-97c3fd1c]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-97c3fd1c]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-97c3fd1c]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-97c3fd1c]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-97c3fd1c]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-97c3fd1c]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-97c3fd1c]{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-97c3fd1c]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-97c3fd1c]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-97c3fd1c]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-97c3fd1c]::after{border:none}.clear-button[data-v-97c3fd1c]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}.container[data-v-97c3fd1c]{width:100%;padding:15px;display:flex;flex-wrap:wrap;justify-content:space-between;align-content:flex-start}.goods-item[data-v-97c3fd1c]{width:167px;height:272px;background:#fff;
  /* margin: 0 5rpx; */margin-top:10px}.goods-item-image[data-v-97c3fd1c]{width:100%;height:167px}.goods-type[data-v-97c3fd1c]{width:47px;position:relative;top:-165px;font-size:10px;
  /* background: linear-gradient(-72deg, transparent 9px, #EB5C4A 0); */color:#fff;border-radius:0 0 50px 0;padding-left:4px}.goods-item-name[data-v-97c3fd1c]{width:100%;height:40px;padding:0 10px;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin:5px 0 0 0}.goods-item-price[data-v-97c3fd1c]{display:flex;padding-left:10px;font-size:20px;font-family:Abel;font-weight:400;color:#ea6e7a}.goods-item-price uni-text[data-v-97c3fd1c]:nth-child(2){font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#ea6e7a}.text-style[data-v-97c3fd1c]{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#999}.goods-item-rank[data-v-97c3fd1c]{padding-left:10px}.market-price[data-v-97c3fd1c]{font-size:20px;font-family:Abel;font-weight:400;color:#333;padding-left:10px}.market-price uni-text[data-v-97c3fd1c]{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#333}.market-hash-coin[data-v-97c3fd1c]{padding-left:10px;font-size:14px;font-family:Abel;font-weight:400;color:#ec872e;display:flex;align-items:center;margin-top:5px}.market-hash-coin uni-text[data-v-97c3fd1c]{font-size:10px}.money[data-v-97c3fd1c]{font-size:12px!important}.money-num[data-v-97c3fd1c]{font-size:13px!important}.goods-img[data-v-97c3fd1c]{width:167px;height:167px}</style>
  
  <style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-717eca78]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-717eca78]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-717eca78]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-717eca78]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-717eca78]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-717eca78]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-717eca78]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-717eca78]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-717eca78]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-717eca78]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-717eca78]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-717eca78]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-717eca78]{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-717eca78]{
  /* flex 子元素固定宽度*/min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-717eca78]{
  /* flex 子元素等分 */min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-717eca78]{
  /* 主轴 排列方式从左侧开始 不换行*/display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-717eca78]::after{border:none}.clear-button[data-v-717eca78]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}.container[data-v-717eca78]{width:375px;height:100%;padding:18px 15px 15px;padding-bottom:calc(95px + env(safe-area-inset-bottom));background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff);z-index:1000}.scroll-view[data-v-717eca78]{height:calc(100% - 95px)}.head-title[data-v-717eca78]{text-align:center;margin-bottom:10px}.pay-head[data-v-717eca78]{width:100%;height:40px;line-height:40px;background:#d88d54;text-align:center;padding:0 15px;font-size:20px;font-family:BTH;font-weight:400;color:#fff;margin-top:15px}.pay-info[data-v-717eca78]{background:#fff;padding:15px;padding-bottom:5px}.pay-info_1[data-v-717eca78]{width:100%;height:78px}.pay-info-detail_1[data-v-717eca78]{width:calc(100% - 78px);padding-left:11px}.pay-info-detail_1 > div[data-v-717eca78]:first-child{width:100%}.pay-info-name[data-v-717eca78]{width:70%;display:flex;flex-direction:column;align-items:flex-start}.pay-info-name div[data-v-717eca78]:first-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-name .newer-back[data-v-717eca78]{width:69px;height:18px;padding:2px;background-size:100% 100%;background-color:#e44f4f;color:#fff;font-size:10px;border-radius:2px;margin-top:5px}.pay-info-price[data-v-717eca78]{font-size:17px;font-family:Abel;font-weight:400;color:#333}.pay-info-price uni-text[data-v-717eca78]{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-tip[data-v-717eca78]{width:-webkit-max-content;width:max-content;padding:0 5px;height:16px;background:#d76474;font-size:13px;font-family:BTH;font-weight:400;color:#fff;margin-top:6px}.pay-info-item[data-v-717eca78],
.pay-type-item[data-v-717eca78]{width:100%;height:40px}.pay-info-item > uni-text[data-v-717eca78]:first-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-info-item > uni-text[data-v-717eca78]:last-child{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.new-class[data-v-717eca78]{width:100%;height:40px}.new-first[data-v-717eca78]{color:#e44f4f;font-size:14px;font-family:Source Han Sans CN;font-weight:400}.new-calc[data-v-717eca78]{display:flex;align-items:center;max-width:calc(100% - 110px)}.new-calc div[data-v-717eca78]{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;font-family:Source Han Sans CN}.new-calc > div[data-v-717eca78]:first-child{background-color:#f8e8d6;font-size:11px;font-weight:400;color:#dcae78;padding:3px;border-radius:4px}.new-calc > div[data-v-717eca78]:last-child{padding-left:3px;font-size:14px;font-weight:400;color:#e44f4f}.coupon-view[data-v-717eca78]{display:flex;align-items:center}.coupon-text[data-v-717eca78]{font-size:12px;font-family:Abel-Regular,Abel;font-weight:400;color:#ea5947;padding-right:10px;opacity:.9}.select-img[data-v-717eca78]{width:9px;height:13px}.pay-info-item-price[data-v-717eca78]{font-size:17px;font-family:Abel;font-weight:400;color:#333}.pay-info-item-price uni-text[data-v-717eca78]{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-reduce[data-v-717eca78]{color:#e60012!important}.pay-icon[data-v-717eca78]{color:#d3d3d3!important}.pay-type[data-v-717eca78]{width:100%;background:#fff;padding:15px 15px 5px 15px;margin-top:15px}.pay-type-head[data-v-717eca78]{width:100%;font-size:15px;font-family:Source Han Sans CN;font-weight:500;color:#333}.pay-type-name[data-v-717eca78]{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin-left:5px;line-height:4px;display:flex}.ban-integ[data-v-717eca78]{margin-left:5px;font-size:12px;color:#999}.pay-remark[data-v-717eca78]{margin-top:15px;font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-confirms[data-v-717eca78]{width:100%;height:calc(95px + env(safe-area-inset-bottom));padding-bottom:env(safe-area-inset-bottom)}.pay-confirm[data-v-717eca78]{width:100%;height:calc(95px + env(safe-area-inset-bottom));padding:10px;padding-bottom:env(safe-area-inset-bottom);background:#fff;box-shadow:0.5px -2px 8px 0 rgba(30,30,30,.15);position:fixed;bottom:0;left:0}.pay-adult[data-v-717eca78]{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-adult uni-text[data-v-717eca78]{color:#333}.pay-detail[data-v-717eca78]{margin-top:17px}.pay-detail-left[data-v-717eca78]{height:40px}.pay-detail-left > div[data-v-717eca78]:first-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333}.pay-detail-left > div:first-child uni-text[data-v-717eca78]{font-size:21px;font-family:Abel;font-weight:400;color:#333}.pay-detail-left > div[data-v-717eca78]:last-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.pay-button[data-v-717eca78]{width:105px;height:40px;background:#3f3f42;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#fff;margin-left:14px;margin-top:5px}.pop-main[data-v-717eca78]{padding:10px}.head-pop[data-v-717eca78]{height:45px;display:flex;align-items:center;justify-content:space-between}.head-title[data-v-717eca78]{font-size:18px;line-height:45px}.title_num[data-v-717eca78]{font-size:14px}.chose_type[data-v-717eca78]{padding:10px;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.footer-sure[data-v-717eca78]{width:340px;line-height:34px;font-size:14px;text-align:center;color:#fff;background:#333;left:0;right:0;margin:auto;margin:15px 0}.icon-img[data-v-717eca78]{width:16px;height:16px}.chose-icon[data-v-717eca78]{border-radius:50%;border:1px solid #999}.goods-img[data-v-717eca78]{width:78px;height:78px}</style>
<style type="text/css">.container[data-v-5d12bc44]{height:100vh;width:100%;padding:0px;display:flex;align-items:center;flex-direction:column;position:fixed;left:0;top:0;background:rgba(0,0,0,.7)}.main[data-v-5d12bc44]{left:0;right:0;top:0;bottom:0;margin:auto}.close[data-v-5d12bc44]{height:42px;width:42px;position:absolute;right:0;top:0}.head[data-v-5d12bc44]{width:100%;height:42px}.body[data-v-5d12bc44]{width:100%;background:#fff;border:2px solid #000;border-radius:0 0 10px 10px;padding:10px;position:relative;top:-5px}.content[data-v-5d12bc44]{width:100%;height:100%;background:#fff;border:1px solid #000}.title[data-v-5d12bc44]{width:100%;font-size:17px;font-family:Source Han Sans CN;font-weight:600;color:#333;margin:27px 0 14px 0;padding:0 22px}.content-detail[data-v-5d12bc44]{width:100%;padding:0 22px;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#999;text-align:center;margin-bottom:27px}.button[data-v-5d12bc44]{width:100%;margin-bottom:15px;padding:0 5px}.button_1[data-v-5d12bc44]{width:261px;height:37px;background:#3f3f42;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#fbf8ff}.icon[data-v-5d12bc44]{position:absolute;top:20px;right:2px;width:30px;height:20px}.iconplus[data-v-5d12bc44]{position:absolute;top:80px;right:46px;width:14px;height:14px}.edit-icon[data-v-5d12bc44]{width:16px;height:16px;position:absolute;top:80px;right:33px}</style>
  <style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}.container{height:100vh;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff);z-index:1;padding-bottom:calc(65px + env(safe-area-inset-bottom))}.body{overflow-y:scroll;height:100%}.swiper{width:100%;pointer-events:none}.swiper .item-image{width:167px;height:167px}.page-background{position:absolute;top:0;left:0;width:100%;}.barrage-class{width:100%;position:fixed;top:75px;z-index:999;pointer-events:none} .u-navbar__content{
  /* background: none !important; */
  /* background: #fff; */}.goods-swiper{width:100%;position:relative;margin-top:7px;height:375px}.goods-swiper{width:100%;z-index:3;mix-blend-mode:darken}.goods-background{width:100%;z-index:2;position:absolute}.goods-info{width:100%;height:125px}.goods-info-kinds-container{position:relative}.goods-info-kinds{width:187px;height:21px;background:#edc9d7;-webkit-clip-path:polygon(0 0,100% 0,calc(100% - 20px) 100%,20px 100%);clip-path:polygon(0 0,100% 0,calc(100% - 20px) 100%,20px 100%)}.goods-info-kinds_1{width:167px;height:21px;background:#ea6e7a;position:relative;-webkit-clip-path:polygon(0 0,100% 0,calc(100% - 20px) 100%,20px 100%);clip-path:polygon(0 0,100% 0,calc(100% - 20px) 100%,20px 100%)}.goods-info-kinds_1 uni-image{width:16px;height:8px}.arrow-reversal{-webkit-transform:rotate(180deg);transform:rotate(180deg);margin-right:90px}.info-kinds-name{font-size:29px;font-family:BTH;font-weight:400;color:#fff;-webkit-text-stroke:1px #e96d79;text-stroke:1px #e96d79;position:absolute;z-index:1;top:-15px}.goods-info-text{width:100%;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333;text-align:center;padding:0 20px;margin-top:12px}.goods-info-price{font-size:20px;font-family:Abel;font-weight:900;color:#333;margin-top:14px}.goods-info-price uni-text{font-size:13px;font-family:Source Han Sans CN;font-weight:600;color:#333}.goods-tip{height:62px;width:100%;background:#fff}.goods-tip uni-text:first-child{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#333}.goods-tip uni-text:last-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999;margin-top:10px}.goods-remain{width:100%;height:35px;background:#3f3f42;padding:0 15px;position:relative}.goods-remain uni-text{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#fff}.goods-remain-detail{font-size:11px;font-family:Source Han Sans CN;font-weight:400;color:#fff} .goods-remain-detail uni-image{margin-left:7px}.goods-remain-tip{position:absolute;font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#dedbdb;left:65px}.goods-rate-container{height:100px;background:#fff;margin:10px 10px 10px 10px;padding:10px;padding-bottom:5px}.goods-rate-head{width:100%;height:47px}.rate-head-title{font-size:13px;font-family:BTH;font-weight:400;color:#333;min-width:10%}.rate-item-scroll{width:90%;height:100%;padding:0 7px;display:flex;overflow-x:scroll}.rate-item{min-width:63px;height:47px;
  /* background: #D76474; */margin-right:10px;padding:1px;flex:1}.rate-item-head{width:100%;height:30px;background:#fff;font-size:14px;font-family:BTH;font-weight:400;color:#d45567}.rate-item-footer{width:100%;height:15px;font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#fff}.goods-rate-fotter{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#999;width:100%;height:calc(100% - 47px);white-space: break-spaces;}.buy-button{position:fixed;bottom:0;left:0;padding-bottom:env(safe-area-inset-bottom);width:100%;height:calc(65px + env(safe-area-inset-bottom));background:#fff;box-shadow:0.5px -2px 8px 0 rgba(30,30,30,.15)}.buy-back{position:absolute;top:9px;right:7px;width:91px;height:29px;background-size:100% 100%;text-align:center;font-size:12px;color:#fff;line-height:24px}.buy-button-detail{width:345px;height:49px;font-size:19px;font-family:BTH;font-weight:400;color:#fbf8ff;text-shadow:0 1px 0 rgba(28,28,27,.33);background:linear-gradient(99deg,#eb5c4a,#f6ca7c);display:flex;flex-direction:column;align-items:center;justify-content:space-evenly}.buy-button-detail .free-text{margin-left:5px;height:20px;text-align:center;line-height:20px;padding:0 3px;background-color:#ea7416;opacity:.9;font-size:11px;font-family:Source Han Sans CN;color:#fff}.buy-modal-content{width:100%;background:linear-gradient(0deg,#fff,#cad0ff)}.buy-head{width:100%;height:115px;position:relative}.buy-head-bk-1{width:100%;height:33px;position:absolute;right:0;top:0}.buy-head-bk-2{width:159px;height:164px;position:absolute;right:0;top:-50px}.buy-head-title{font-size:37px;font-family:BTH;font-weight:400;color:#503b33;position:absolute;top:0;z-index:1;padding-left:15px}.buy-modal-num{font-size:56px;font-family:BTH;font-weight:400;color:#fff;background:linear-gradient(0deg,#d83c1b,#f0762f);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.buy-head-tip{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999}.buy-head-title div:first-child{height:44px;margin-top:10px}.buy-body{width:100%;padding:0 15px}.buy-num-item{width:100%;height:72px;background:linear-gradient(0deg,#fbf7ff,#f8e2ff);margin-bottom:15px}.buy-item-left{width:97px;height:100%;background:linear-gradient(99deg,#eb5c4a,#8f09e6 0,#b546ff);-webkit-clip-path:polygon(0 0,100% 0,calc(100% - 10px) 100%,0 100%);clip-path:polygon(0 0,100% 0,calc(100% - 10px) 100%,0 100%);padding-right:10px}.buy-item-left div{width:44px;font-size:22px;font-family:BTH;font-weight:400;color:#fff}.buy-item-right{height:100%;width:calc(100% - 97px);position:relative}.buy-item-right uni-text:first-child{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333}
/* .buy-item-right text:nth-child(2) {
		font-size: 36rpx;
		font-family: Abel;
		font-weight: 400;
		color: #333333;
		line-height: 40rpx;
	}
 */
/* .buy-item-right text:last-child {
		font-size: 24rpx;
		font-family: Abel;
		font-weight: 400;
		text-decoration: line-through;
		color: #333333;
		opacity: 0.6;
		margin-left: 10rpx;
	} */.buy-item-right-top{position:absolute;top:0;right:0;width:64px;height:18px;background:#ea6e7a;font-size:11px;font-family:Source Han Sans CN;font-weight:400;color:#fff;-webkit-clip-path:polygon(2px 0,100% 0,100% 100%,0 100%,2px 70%);clip-path:polygon(2px 0,100% 0,100% 100%,0 100%,2px 70%);padding-left:2px}.fair-open{width:33px;height:95px;position:fixed;right:0;top:289px;z-index:200}.music{position:fixed;right:5px;top:125px;width:40px;height:43px;z-index:200}.music-img{width:40px;height:43px;-webkit-animation:rotateVbtn-data-v-6dd1a41e 5s linear infinite .8s 0 ease;animation:rotateVbtn-data-v-6dd1a41e 5s linear infinite .8s 0 ease;-webkit-animation:rotateVbtn-data-v-6dd1a41e 5s linear infinite;animation:rotateVbtn-data-v-6dd1a41e 5s linear infinite}.stop-music{width:40px;height:43px}.right-menu{width:50px;position:fixed;right:0;top:175px;z-index:200}.right-menu .item-class{width:100%;height:63px;margin-bottom:15px}.right-menu .menu-img{width:40px;height:43px}.right-menu .menu-img2{width:43px;height:46px}.right-menu .menu-text{margin-top:-8px;width:100%;height:22px;background-color:#8d01e6;border-radius:22px;opacity:.8;font-size:11px;font-family:PingFang SC-Medium,PingFang SC;color:#fff;font-weight:400;text-align:center;line-height:22px}.free{width:51px;height:58px;position:fixed;right:0;top:160px;z-index:200}@-webkit-keyframes rotateVbtn-data-v-6dd1a41e{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.goods-item-image{width:250px;height:250px}.box-k{position:fixed;z-index:1000;height:20%;width:100%;top:0;background:rgba(0,0,0,.7)}.order-view{width:100%;height:80vh;z-index:1000}.text-margin{margin:0px 0 0 0px}.openBox{position:fixed;z-index:500;top:0;height:100%;background:rgba(0,0,0,.7)}.reward{width:100%;height:100%;background-size:100% 100%;position:fixed;z-index:500;top:0;left:0;background:rgba(0,0,0,.7)}.lottery-view{width:100%;height:100%;background-size:100% 100%;position:fixed;z-index:500;top:0;left:0;background:rgba(0,0,0,.7)}.fair{padding:15px}.fair-title{font-size:24px;color:#333}.seed{background:#faf9f9;margin-top:20px;padding:16px}.seed-title{font-size:14px;font-weight:600;height:20px;line-height:20px;color:#333}.seed-body{display:flex;align-items:center;margin:7px 0}.seed-content{width:228px;height:35px;line-height:35px;padding-left:12px;font-size:14px;background:#eaeaea;color:#333}.seed-change{font-size:14px;width:85px;background:#3f3f42;color:#fff;text-align:center;height:35px;line-height:35px
  /* position: relative;
		left: -22rpx; */}.seed-time{font-size:14px;color:#333;width:313px;border:1px solid #eaeaea;height:36px;line-height:36px;padding-left:12px;margin-top:6px;display:flex}.seed-num{margin-left:10px}.seed-rule{font-size:14px;color:#8d01e6;margin-top:20px}.last-title{width:168px;height:18px;line-height:18px}.rule-text{font-size:12px;color:#666;margin-top:14px}.know{width:345px;height:49px;background:#3f3f42;text-align:center;line-height:49px;font-size:14px;color:#fff;margin-top:20px}.change-seed{height:132px;width:250px;text-align:center;padding:10px;background:#faf9f9}.change-title{font-size:15px;color:#333;height:30px;line-height:30px;font-weight:600}.change-sure{line-height:25px;width:150px;background:#333;color:#fff;font-size:14px;height:25px;left:0;right:0;margin:auto;margin-top:19px}.model-bg{z-index:1000;background:rgba(0,0,0,.7)}.icon-img{width:159px;height:164px}.head-img{width:100%;height:33px}.fair-img{width:33px;height:65px}.back1-img{width:100%;height:251px}.back-img{width:310px;height:310px}.arrow-img{width:16px;height:8px}.xuanz1 {background-color: rgb(235, 92, 74)!important; border-color: rgb(235, 92, 74)!important;}.xuanz {
    -webkit-appearance: none;
    appearance: none;
    margin-right: 5px;
    outline: 0;
    border: 1px solid #d1d1d1;
    background-color: #fff;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    position: relative;
}.checked:before{
    font: normal normal normal 14px/1 uni;
    content: "\EA08";
    color: #fff;
    font-size: 18px;
	transform: translate(-50%,-48%) scale(.73);
    -webkit-transform: translate(-50%,-48%) scale(.73);
}</style>
		</head>
		<body>
		<div>
		<div class="container" style="padding-top: 44px;">
		<div class="page-background"><img src="front/back_1.png" alt="" class="back1-img">
		</div>
<div>




<div data-v-5302c461="" class="u-navbar--fixed"><div data-v-186edb96="" data-v-5302c461="" class="u-status-bar" style="height: 0px; background-color: rgba(0, 0, 0, 0);"></div><div data-v-5302c461="" class="u-navbar__content" style="height: 44px; background-color: rgba(0, 0, 0, 0);"><div data-v-5302c461="" class="u-navbar__content__left"><div data-v-59765974="" data-v-5302c461="" class="u-icon u-icon--right" onclick="history.go(-1);"><uni-text data-v-59765974="" hover-class="" class="u-icon__icon uicon-arrow-left" style="font-size: 20px; line-height: 20px; font-weight: normal; top: 0px; color: rgb(48, 49, 51);"><span></span></uni-text></div></div><uni-text data-v-5302c461="" class="u-line-1 u-navbar__content__title" style="width: 200px;"><span>Product Details</span></uni-text></div></div>

</div>
<div class="music"><img src="static/image/goods/music-bg.png" alt="" class="music-img"></div>
<div class="right-menu column-center-flex">
<div class="item-class column-center-flex"><img src="static/image/goods/fair-open.png" alt="" class="menu-img">
<div class="menu-text">Fair Unboxing</div>
</div>
<div class="item-class column-center-flex"><img src="static/image/goods/share.png" alt="" class="menu-img">
<div class="menu-text">Share</div>
</div>
</div>
<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden auto;">
<div class="uni-scroll-view-content">
 		<div class="goods-swiper">
		<div class="goods-background main-center-flex"><img src="static/image/back_2.png" alt="" class="back-img"></div>
		<uni-swiper class="goods-swiper">
<div class="uni-swiper-wrapper">
<div class="uni-swiper-slides">
<div class="uni-swiper-slide-frame" style="width: 100%; height: 100%; transform: translate(0%, 0px) translateZ(0px);overflow: scroll;">
<?php
$gl1=0;$gl2=0;$gl3=0;$gl4=0;
for($i=0;$i<count($box);$i++){
	if($box[$i]['tag_id']==1){
		$gl1+=$box[$i]['probability'];$ys='background: rgb(228, 93, 140);';
	}
	if($box[$i]['tag_id']==2){
		$gl2+=$box[$i]['probability'];$ys='background: rgb(234, 147, 81);';
	}
	if($box[$i]['tag_id']==3){
		$gl3+=$box[$i]['probability'];$ys='background: rgb(248, 92, 114);';
	}
	if($box[$i]['tag_id']==4){
		$gl4+=$box[$i]['probability'];$ys='background: rgb(149, 36, 221);';
	}
	$bl=$i*100;
	$lxname=getlxname($box_lx,$box[$i]['tag_id']);
	echo '<uni-swiper-item class="column-center-flex" style="position: absolute; width: 100%; height: 100%; transform: translate('.$bl.'%, 0px) translateZ(0px);">
<div class="goods-item-image">
<div data-v-1428a719="" class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div data-v-1428a719="" class="u-image" style="width: 250px; height: 250px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image data-v-1428a719="" show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 250px; height: 250px;">
<div style="background-image: url(&quot;'.$box[$i]['goods_image'].'&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="'.$box[$i]['goods_image'].'" draggable="false"></uni-image></div>
</div>
</div>
<div class="goods-info column-center-flex">
<div class="goods-info-kinds-container main-center-flex">
<div class="info-kinds-name">'.$lxname.'</div>
<div class="goods-info-kinds main-center-flex">
<div class="goods-info-kinds_1 main-center-flex" style="'.$ys.'"><img src="static/image/z.png" alt="" class="arrow-img arrow-reversal"><img src="static/image/y.png" alt="" class="arrow-img"></div>
</div>
</div>
<div class="goods-info-text text-ellipsis_2">'.$box[$i]['goods_name'].'</div>
<div class="goods-info-price"><uni-text><span>￥</span></uni-text>'.$box[$i]['price'].'</div>
</div>
</uni-swiper-item>';
}
?>	
		</div>
</div>
</div>
		</uni-swiper>
		</div>
		
		<div class="goods-tip column-center-flex"><uni-text><span>You may get one of the following items or prizes.</span></uni-text></div>
<div class="goods-rate-container">
<div class="goods-rate-head main-start-flex">
<div class="rate-head-title column-center-flex">
<div>Get</div>
<div>%</div>
</div>
<div class="rate-item-scroll">
<div class="rate-item" style="background: rgb(149, 36, 221);">
<div class="rate-item-head main-center-flex" style="color: rgb(149, 36, 221);">original</div>
<div class="rate-item-footer main-center-flex"><?php echo $gl4;?>%</div>
</div>
<div class="rate-item" style="background: rgb(234, 147, 81);">
<div class="rate-item-head main-center-flex" style="color: rgb(234, 147, 81);">Epic</div>
<div class="rate-item-footer main-center-flex"><?php echo $gl3;?>%</div>
</div>
<div class="rate-item" style="background: rgb(248, 92, 114);">
<div class="rate-item-head main-center-flex" style="color: rgb(248, 92, 114);">legend</div>
<div class="rate-item-footer main-center-flex"><?php echo $gl2;?>%</div>
</div>
<div class="rate-item" style="background: rgb(228, 93, 140);">
<div class="rate-item-head main-center-flex" style="color: rgb(228, 93, 140);">limited</div>
<div class="rate-item-footer main-center-flex"><?php echo $gl1;?>%</div>
</div>
</div>
</div>
<div class="goods-rate-fotter text-margin text-ellipsis">Due to rounding probability, there is a possibility that the total may not equal 100%.</div>
</div>
<div data-v-97c3fd1c="" class="container" style="padding: 0px 10px 10px;">
		
<?php
for($i=0;$i<count($box);$i++){
	$lxname=getlxname($box_lx,$box[$i]['tag_id']);
	if($box[$i]['tag_id']==1){
		$ys='background: rgb(228, 93, 140);';
	}
	if($box[$i]['tag_id']==2){
		$ys='background: rgb(234, 147, 81);';
	}
	if($box[$i]['tag_id']==3){
		$ys='background: rgb(248, 92, 114);';
	}
	if($box[$i]['tag_id']==4){
		$ys='background: rgb(149, 36, 221);';
	}
	echo '<div data-v-97c3fd1c="" class="goods-item">
<div data-v-97c3fd1c="" class="goods-item-image"><uni-image data-v-97c3fd1c="" class="goods-img">
<div style="background-image: url(&quot;'.$box[$i]['goods_image'].'&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="'.$box[$i]['goods_image'].'" draggable="false"></uni-image></div>
<div data-v-97c3fd1c="" class="goods-type" style="'.$ys.'">'.$lxname.'</div>
<div data-v-97c3fd1c="" class="goods-item-name text-ellipsis_2">'.$box[$i]['goods_name'].'</div>
<div data-v-97c3fd1c="" class="goods-item-price main-start-flex"><uni-text data-v-97c3fd1c="" class="text-style"><span>Reference Price</span></uni-text><uni-text data-v-97c3fd1c="" class="money"><span>PHP<uni-text data-v-97c3fd1c="" class="money-num"><span>'.$box[$i]['price'].'</span></uni-text></span></uni-text></div>
<div data-v-97c3fd1c="" class="goods-item-rank text-style">Draw Range：0~10486</div>
</div>';
}
?>	
		</div>
</div>
</div>
</div>

<div class="buy-button main-center-flex" onclick="xsgmk()"><?php echo $xswb;?>
<div class="buy-button-detail">
<div class="main-center-flex">
<div>open now</div>
</div>
<div class="main-center-flex">
<div>¥<?php echo $xsjg;?></div>
</div>
</div>
</div>
		
<div id="gmk" class="u-popup" style="display: none;">
<div onclick="ycdog('gmk')" style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);"></div>
<div style="z-index: 10075; position: fixed; display: flex; bottom: 0px; left: 0px; right: 0px;">
<div class="u-popup__content" style="flex: 1 1 0%;">
<div class="buy-modal-content">
<div class="buy-head">
<div class="buy-head-title">
<div>Fair Unboxing</div>
<div style="font-size: 25px;">Selected Products, Hurry to Draw</div>
<div class="buy-head-tip">Satisfied to Ship, Unsatisfied to Cancel</div>
</div>
<div class="buy-head-bk-1"><uni-image class="head-img">
<img src="static/image/t5.png" draggable="false" style="opacity: 1;"></uni-image></div>
<div class="buy-head-bk-2"><uni-image class="icon-img">
<img src="static/image/buy_head_bk_1.png" draggable="false" style="opacity: 1;"></uni-image></div>
</div>
<div class="buy-body">
<div class="buy-num-item main-start-flex" onclick="kaiqi(1)">
<div class="buy-item-left column-center-flex" style="background: linear-gradient(99deg, rgb(235, 92, 74) 0%, rgb(143, 9, 230) 0%, rgb(181, 70, 255) 100%);">
<div>One Shot, One Soul</div>
</div>
<div class="buy-item-right main-center-flex" style="background: linear-gradient(0deg, rgb(251, 247, 255) 0%, rgb(248, 226, 255) 100%);">
<div class="main-center-align-end"><uni-text><span>￥</span></uni-text><uni-text><span><?php echo $boxd['price']*1;?></span></uni-text></div>
</div>
</div>
<div class="buy-num-item main-start-flex" onclick="kaiqi(3)">
<div class="buy-item-left column-center-flex" style="background: linear-gradient(99deg, rgb(235, 92, 74) 0%, rgb(143, 9, 230) 0%, rgb(181, 70, 255) 100%);">
<div>European Style Triple</div>
</div>
<div class="buy-item-right main-center-flex" style="background: linear-gradient(0deg, rgb(251, 247, 255) 0%, rgb(248, 226, 255) 100%);">
<div class="main-center-align-end"><uni-text><span>￥</span></uni-text><uni-text><span><?php echo $boxd['price']*3;?></span></uni-text></div>
</div>
</div>
<div class="buy-num-item main-start-flex" onclick="kaiqi(5)">
<div class="buy-item-left column-center-flex" style="background: linear-gradient(99deg, rgb(235, 92, 74) 0%, rgb(143, 9, 230) 0%, rgb(181, 70, 255) 100%);">
<div>Domineering Five in a Row</div>
</div>
<div class="buy-item-right main-center-flex" style="background: linear-gradient(0deg, rgb(251, 247, 255) 0%, rgb(248, 226, 255) 100%);">
<div class="main-center-align-end"><uni-text><span>￥</span></uni-text><uni-text><span><?php echo $boxd['price']*5;?></span></uni-text></div>
</div>
</div>
<div class="buy-num-item main-start-flex" onclick="kaiqi(10)" style="margin-bottom: -1px;">
<div class="buy-item-left column-center-flex" style="background: linear-gradient(99deg, rgb(255, 255, 255) 0%, rgb(235, 92, 74) 0%, rgb(246, 202, 124) 100%);">
<div>Luxury Ten in a Row</div>
</div>
<div class="buy-item-right main-center-flex" style="background: linear-gradient(0deg, rgb(255, 252, 247) 0%, rgb(247, 216, 184) 100%);">
<div class="main-center-align-end"><uni-text><span>￥</span></uni-text><uni-text><span><?php echo $boxd['price']*10;?></span></uni-text></div>
</div>
</div>
</div>
</div>
<div data-v-eca591a4="" class="u-safe-bottom u-safe-area-inset-bottom"></div>
</div>
</div>
</div>
		
<div id="ddxq" class="u-popup" style="display: none;">
<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);" onclick="ycdog('ddxq')"></div>
<div style="z-index: 10075; position: fixed; display: flex; bottom: 0px; left: 0px; right: 0px;">
<div class="u-popup__content" style="flex: 1 1 0%;">
<div class="container order-view" data-v-6dd1a41e="">
<div class="head-title" data-v-717eca78="">Order Confirmation</div>
<uni-scroll-view enableflex="true" class="scroll-view" data-v-717eca78="">
<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden auto;">
<div class="uni-scroll-view-content">
<div data-v-717eca78="" class="pay-info">
<div data-v-717eca78="" class="pay-info_1 main-start-flex"><uni-image data-v-717eca78="" class="goods-img">
<img src="<?php echo $boxd['pic'];?>" draggable="false" style="opacity: 1;"></uni-image>
<div data-v-717eca78="" class="pay-info-detail_1">
<div data-v-717eca78="" class="main-space-between">
<div data-v-717eca78="" class="pay-info-name text-ellipsis">
<div data-v-717eca78=""><?php echo $boxd['name'];?></div>
<div data-v-717eca78="" class="main-center-flex newer-back" style="background-image: url(&quot;static/image/home/newer-back.png&quot;);"><?php echo $boxd['wfsm'];?></div>
</div>
<div class="pay-info-price"><uni-text data-v-717eca78=""><span>￥</span></uni-text><?php echo $boxd['price'];?></div>
</div>
</div>
</div>
<div data-v-717eca78="" class="pay-info-item main-space-between"><uni-text><span>Quantity</span></uni-text>
<div id="sl">x<?php echo $sl;?></div></div>
<div class="xian"></div>
<?php echo $hdsm;?>
<div data-v-717eca78="" class="pay-info-item main-space-between"><uni-text ><span>Total</span></uni-text>
<div id="hj">￥<?php echo $hj;?></div></div>
</div>
<div data-v-717eca78="" class="pay-type">
<div data-v-717eca78="" class="pay-type-head main-start-flex">Payment Method</div>
<uni-radio-group data-v-717eca78="">
		<uni-label data-v-717eca78="" class="pay-type-item main-space-between uni-label-pointer">
<div data-v-717eca78="" class="main-start-flex"><uni-image data-v-717eca78="" class="icon-img">
<img src="static/image/zfb.png" draggable="false" style="opacity: 1;"></uni-image>
<div data-v-717eca78="" class="pay-type-name">Alipay</div>
</div>
<uni-radio data-v-717eca78="" style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div id="zf1" onclick="xzzf(1)" class="uni-radio-input"></div>
</div>
</uni-radio></uni-label>
		<uni-label data-v-717eca78="" class="pay-type-item main-space-between uni-label-pointer">
<div data-v-717eca78="" class="main-start-flex"><uni-image data-v-717eca78="" class="icon-img">
<img src="static/image/wx.png" draggable="false" style="opacity: 1;"></uni-image>
<div data-v-717eca78="" class="pay-type-name">WeChat</div>
</div>
<uni-radio data-v-717eca78="" style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div id="zf2" onclick="xzzf(2)" class="uni-radio-input"></div>
</div>
</uni-radio></uni-label>
		<uni-label data-v-717eca78="" class="pay-type-item main-space-between uni-label-pointer">
<div data-v-717eca78="" class="main-start-flex"><uni-image data-v-717eca78="" class="icon-img">
<img src="static/image/zf1.png" draggable="false" style="opacity: 1;"></uni-image>
<div data-v-717eca78="" class="pay-type-name">Account Balance<uni-text data-v-717eca78="" class="ban-integ"><span><?php echo $user['balance'];?></span></uni-text></div>
</div>
<uni-radio data-v-717eca78="" style="transform: scale(0.8);">
<div class="uni-radio-wrapper">
<div id="zf4" onclick="xzzf(4)" class="uni-radio-input uni-radio-input-checked xuanz1"></div>
</div>
</uni-radio></uni-label></uni-radio-group>
		</div>
<div data-v-717eca78="" class="pay-remark">Completing the transaction means you agree to the following terms:<br data-v-717eca78="">1、Underage consumption is prohibited on this platform<br data-v-717eca78="">2、Due to the special nature of blind box products, refunds are not supported after opening<br data-v-717eca78="">3、Hong Kong, Macao, Taiwan and some remote areas may not be deliverable<br data-v-717eca78=""></div>
</div>
</div>
</div>
</uni-scroll-view>
<div data-v-717eca78="" class="pay-confirm column-align-end-flex">
<div data-v-717eca78="" class="pay-adult main-start-flex">
<div data-v-717eca78="" class="xuanz" id="xy" onclick="xzxy()"></div>
<div data-v-717eca78=""><uni-text data-v-717eca78=""><span> I am over 18, have read, and agree to the</span></uni-text><uni-text data-v-717eca78=""><span>"User Agreement"</span></uni-text></div>
</div>
<div data-v-717eca78="" class="pay-detail main-start-flex">
<div data-v-717eca78="" class="pay-detail-left">
<div data-v-717eca78="">合计:￥<uni-text data-v-717eca78=""><span id="hj1"><?php echo $hj;?></span></uni-text></div>
<div data-v-717eca78="" class="main-end-flex" id="sl1">Total<?php echo $sl;?>Items</div>
</div>
<div data-v-717eca78="" class="pay-button main-center-flex" onclick="xsqr()">Confirm Payment</div>
</div>
</div>
<div data-v-5d12bc44="" data-v-717eca78="" class="u-popup bg"></div>
</div>
<div data-v-eca591a4="" class="u-safe-bottom u-safe-area-inset-bottom"></div>
</div>
</div>
</div>
		
		
		
<div id="qrzf" style="z-index: 10075; position: fixed; display: none; align-items: center; justify-content: center; inset: 0px;">
	<div class="u-popup__content" style="background-color: transparent;">
		<div class="container" data-v-5d12bc44="">
			<div data-v-5d12bc44="" class="main">
				<div data-v-5d12bc44="" class="close" onclick="xsqr()"></div>
				<uni-image data-v-5d12bc44="" class="head" onclick="xsqr()">
					<img src="./static/img/modal-head.6afc4824.png" draggable="false" style="opacity: 1;">
				</uni-image>
				<div data-v-5d12bc44="" class="body main-center-flex">
					<div data-v-5d12bc44="" class="content">
						<div data-v-5d12bc44="" class="title main-center-flex">Payment Confirmation</div>
						<div data-v-5d12bc44="" class="content-detail"><uni-text data-v-5d12bc44=""><span id="hj2">Total Price is<?php echo $hj;?></span></uni-text></div>
						<div data-v-5d12bc44="" class="button main-center-flex">
<div data-v-5d12bc44="" class="button_1 main-center-flex" onclick="pay()">Confirm</div>
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<uni-toast id="msg" style="display: none;">
<div class="uni-sample-toast"><p class="uni-simple-toast__text" id="msgtxt"> Insufficient Balance </p></div>
</uni-toast>
		
		</div>
</div>
		<script>
		var gid=<?php echo $bid;?>;
		var wf=<?php echo $boxd['wanfa']?>;
		var dj=<?php echo $boxd['price'];?>;
		var hj=0;
		var sl=0;
		var zf="4";
		function ycdog(m){
			$("#"+m).hide();
		}
		function xsgmk(){
			if(wf==0){
				if($("#gmk").is(":visible")==false){
					$("#gmk").show();
				}else{
					$("#gmk").hide();
				}
			}else{
				if($("#ddxq").is(":visible")==false){
					$("#ddxq").show();
				}else{
					$("#ddxq").hide();
				}
			}
		}
		function kaiqi(i){
			sl=i;
			hj=sl*dj;
			$("#sl").text(sl);
			$("#hj").text(hj);
			$("#sl1").text("Total"+sl+"Items");
			$("#hj1").text(hj);
			$("#hj2").text("Total Price is"+hj);
			$("#gmk").hide();
			if($("#ddxq").is(":visible")==false){
				$("#ddxq").show();
			}else{
				$("#ddxq").hide();
			}
		}
		
		function xzzf(d){
			if(zf!=""){
				$("#zf"+zf).attr('class','uni-radio-input');
				$("#zf"+d).attr('class','uni-radio-input uni-radio-input-checked xuanz1');
			}else{
				$("#zf"+d).attr('class','uni-radio-input uni-radio-input-checked xuanz1');
			}
			zf=d;
		}
		var xy=0;
		function xzxy(){
			if(xy==0){
				$("#xy").attr('class','xuanz checked xuanz1');
				xy=1;
			}else{
				$("#xy").attr('class','xuanz');
				xy=0;
			}
		}
		function xsqr(){
			if($("#qrzf").is(":visible")==false){
				if(xy!=1){
					msg("Please review the User Agreement");
					return false;
				}
				$("#qrzf").show();
			}else{
				$("#qrzf").hide();
			}
		}
		</script>
		</body></html>