﻿<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$gid=myTrim($_REQUEST['gid']);
$dz=runsql($db,"select * from hm_user_address where id='$gid' order by id asc");

//print_r($dz);
?>
<html lang="zh-CN" style="--status-bar-height:0px; --top-window-height:0px; --window-left:0px; --window-right:0px; --window-margin:0px; --window-top:calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom:0px;"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Address Management</title><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover"><script src="./static/js/jquery-1.7.2.js?v=2030"></script><script src="./static/js/cmd.js?v=2030"></script><link rel="stylesheet" href="./static/index.css">
<style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}
.u-line-1{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:1;-webkit-box-orient:vertical!important}.u-line-2{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:2;-webkit-box-orient:vertical!important}.u-line-3{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:3;-webkit-box-orient:vertical!important}.u-line-4{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:4;-webkit-box-orient:vertical!important}.u-line-5{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:5;-webkit-box-orient:vertical!important}.u-border{border-width:.5px!important;border-color:#dadbde!important;border-style:solid}.u-border-top{border-top-width:.5px!important;border-color:#dadbde!important;border-top-style:solid}.u-border-left{border-left-width:.5px!important;border-color:#dadbde!important;border-left-style:solid}.u-border-right{border-right-width:.5px!important;border-color:#dadbde!important;border-right-style:solid}.u-border-bottom{border-bottom-width:.5px!important;border-color:#dadbde!important;border-bottom-style:solid}.u-border-top-bottom{border-top-width:.5px!important;border-bottom-width:.5px!important;border-color:#dadbde!important;border-top-style:solid;border-bottom-style:solid}.u-reset-button{padding:0;background-color:initial;font-size:inherit;line-height:inherit;color:inherit}.u-reset-button::after{border:none}.u-hover-class{opacity:.7}.u-primary-light{color:#ecf5ff}.u-warning-light{color:#fdf6ec}.u-success-light{color:#f5fff0}.u-error-light{color:#fef0f0}.u-info-light{color:#f4f4f5}.u-primary-light-bg{background-color:#ecf5ff}.u-warning-light-bg{background-color:#fdf6ec}.u-success-light-bg{background-color:#f5fff0}.u-error-light-bg{background-color:#fef0f0}.u-info-light-bg{background-color:#f4f4f5}.u-primary-dark{color:#398ade}.u-warning-dark{color:#f1a532}.u-success-dark{color:#53c21d}.u-error-dark{color:#e45656}.u-info-dark{color:#767a82}.u-primary-dark-bg{background-color:#398ade}.u-warning-dark-bg{background-color:#f1a532}.u-success-dark-bg{background-color:#53c21d}.u-error-dark-bg{background-color:#e45656}.u-info-dark-bg{background-color:#767a82}.u-primary-disabled{color:#9acafc}.u-warning-disabled{color:#f9d39b}.u-success-disabled{color:#a9e08f}.u-error-disabled{color:#f7b2b2}.u-info-disabled{color:#c4c6c9}.u-primary{color:#3c9cff}.u-warning{color:#f9ae3d}.u-success{color:#5ac725}.u-error{color:#f56c6c}.u-info{color:#909399}.u-primary-bg{background-color:#3c9cff}.u-warning-bg{background-color:#f9ae3d}.u-success-bg{background-color:#5ac725}.u-error-bg{background-color:#f56c6c}.u-info-bg{background-color:#909399}.u-main-color{color:#303133}.u-content-color{color:#606266}.u-tips-color{color:#909193}.u-light-color{color:#c0c4cc}.u-safe-area-inset-top{padding-top:0;padding-top:constant(safe-area-inset-top);padding-top:env(safe-area-inset-top)}.u-safe-area-inset-right{padding-right:0;padding-right:constant(safe-area-inset-right);padding-right:env(safe-area-inset-right)}.u-safe-area-inset-bottom{padding-bottom:0;padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.u-safe-area-inset-left{padding-left:0;padding-left:constant(safe-area-inset-left);padding-left:env(safe-area-inset-left)}uni-toast{z-index:10090}uni-toast .uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-7dab6260]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-7dab6260]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-7dab6260]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-7dab6260]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-7dab6260]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-7dab6260]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-7dab6260]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-7dab6260]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-7dab6260]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-7dab6260]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-7dab6260]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-7dab6260]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-7dab6260]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-7dab6260]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-7dab6260]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-7dab6260]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-7dab6260]::after{border:none}.clear-button[data-v-7dab6260]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-7dab6260], uni-scroll-view[data-v-7dab6260], uni-swiper-item[data-v-7dab6260]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-input[data-v-7dab6260]{display:flex;flex-direction:row;align-items:center;justify-content:space-between;flex:1}.u-input--radius[data-v-7dab6260], .u-input--square[data-v-7dab6260]{border-radius:4px}.u-input--no-radius[data-v-7dab6260]{border-radius:0}.u-input--circle[data-v-7dab6260]{border-radius:100px}.u-input__content[data-v-7dab6260]{flex:1;display:flex;flex-direction:row;align-items:center;justify-content:space-between}.u-input__content__field-wrapper[data-v-7dab6260]{position:relative;display:flex;flex-direction:row;margin:0;flex:1}.u-input__content__field-wrapper__field[data-v-7dab6260]{line-height:26px;text-align:left;color:#303133;height:24px;font-size:15px;flex:1}.u-input__content__clear[data-v-7dab6260]{width:20px;height:20px;border-radius:100px;background-color:#c6c7cb;display:flex;flex-direction:row;align-items:center;justify-content:center;-webkit-transform:scale(.82);transform:scale(.82);margin-left:4px}.u-input__content__subfix-icon[data-v-7dab6260]{margin-left:4px}.u-input__content__prefix-icon[data-v-7dab6260]{margin-right:4px}</style><style type="text/css">@charset "UTF-8";
.main-center-flex[data-v-03e1ba13]{display:flex;align-items:center;justify-content:center}
.main-start-flex[data-v-03e1ba13]{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex[data-v-03e1ba13]{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex[data-v-03e1ba13]{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex[data-v-03e1ba13]{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex[data-v-03e1ba13]{display:flex;align-items:center;justify-content:flex-end}.main-space-between[data-v-03e1ba13]{display:flex;align-items:center;justify-content:space-between}.main-space-around[data-v-03e1ba13]{display:flex;align-items:center;justify-content:space-around}.main-center-align-end[data-v-03e1ba13]{display:flex;align-items:flex-end;justify-content:center}.column-start-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between[data-v-03e1ba13]{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis[data-v-03e1ba13]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2[data-v-03e1ba13]{display:-webkit-box;overflow:hidden;
-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0[data-v-03e1ba13]{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1[data-v-03e1ba13]{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap[data-v-03e1ba13]{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button[data-v-03e1ba13]::after{border:none}.clear-button[data-v-03e1ba13]{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}div[data-v-03e1ba13], uni-scroll-view[data-v-03e1ba13], uni-swiper-item[data-v-03e1ba13]{display:flex;flex-direction:column;flex-shrink:0;flex-grow:0;flex-basis:auto;align-items:stretch;align-content:flex-start}.u-form-item[data-v-03e1ba13]{display:flex;flex-direction:column;font-size:14px;color:#303133}.u-form-item__body[data-v-03e1ba13]{display:flex;flex-direction:row;padding:10px 0}.u-form-item__body__left[data-v-03e1ba13]{display:flex;flex-direction:row;align-items:center}.u-form-item__body__left__content[data-v-03e1ba13]{position:relative;display:flex;flex-direction:row;align-items:center;padding-right:5px;flex:1}.u-form-item__body__left__content__icon[data-v-03e1ba13]{margin-right:4px}.u-form-item__body__left__content__required[data-v-03e1ba13]{position:absolute;left:-9px;color:#f56c6c;line-height:20px;font-size:20px;top:3px}.u-form-item__body__left__content__label[data-v-03e1ba13]{display:flex;flex-direction:row;align-items:center;flex:1;color:#303133;font-size:15px}.u-form-item__body__right[data-v-03e1ba13]{flex:1}.u-form-item__body__right__content[data-v-03e1ba13]{display:flex;flex-direction:row;align-items:center;flex:1}.u-form-item__body__right__content__slot[data-v-03e1ba13]{flex:1;display:flex;flex-direction:row;align-items:center}.u-form-item__body__right__content__icon[data-v-03e1ba13]{margin-left:5px;color:#c0c4cc;font-size:15px}.u-form-item__body__right__message[data-v-03e1ba13]{font-size:12px;line-height:12px;color:#f56c6c}</style><style type="text/css">.container{padding:0 15px} .u-form-item__body{padding:20px 0!important} .u-form-item__body__right__message{margin-left:0!important;-webkit-transform:translateY(-80%);transform:translateY(-80%);text-align:end}.region-select{width:100%;height:100%;display:flex;justify-content:flex-end}.region-unselect{font-size:14px;color:#b0b0b0}.address-detail{width:100%;position:relative}.address-detail-title{font-size:14px;color:#b0b0b0;position:absolute;top:-17px;right:0}.save-address{height:44px;/* width:330px; */margin:0 auto;font-size:14px;margin-top:70px}.invalid-save{background:#f1f1f1;color:#b0b0b0}.valid-save{background:#3f3f42;color:#fff}.picker-container{width:100%;height:100%;position:relative}
.uni-radio-input.uni-radio-input-checked:before {
    font: normal normal normal 14px/1 uni;
    content: "\EA08";
    color: #fff;
    font-size: 18px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-48%) scale(.73);
    -webkit-transform: translate(-50%,-48%) scale(.73);
}
.uni-radio-input {
    -webkit-appearance: none;
    appearance: none;
    margin-right: 5px;
    outline: 0;
    border: 1px solid #d1d1d1;
    background-color: #fff;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    position: relative;
}.xuanz1 {background-color: rgb(235, 92, 74)!important; border-color: rgb(235, 92, 74)!important;}.shuru {
    border: none;
    width: 85px;text-align: right;background-color: white;
}</style>
</head><body><uni-app><uni-page><uni-page-head><div class="uni-page-head" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"><div class="uni-page-head-hd" onclick="history.go(-1);"><div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div><div class="uni-page-head-ft"></div></div><div class="uni-page-head-bd"><div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> Address Management </div></div><div class="uni-page-head-ft"></div></div><div class="uni-placeholder"></div></uni-page-head><uni-page-wrapper><uni-page-body><div class="container">

<div data-v-d782867e="" class="u-form">
<div data-v-03e1ba13="" class="u-form-item">
<div data-v-03e1ba13="" class="u-form-item__body" style="flex-direction: row;"><div data-v-03e1ba13="" class="u-form-item__body__left" style="width: 100px; margin-bottom: 0px;"><div data-v-03e1ba13="" class="u-form-item__body__left__content"><uni-text data-v-03e1ba13="" class="u-form-item__body__left__content__label" style="justify-content: flex-start; font-size: 14px; color: rgb(51, 51, 51);"><span>Recipient:</span></uni-text></div></div><div data-v-03e1ba13="" class="u-form-item__body__right"><div data-v-03e1ba13="" class="u-form-item__body__right__content"><div data-v-03e1ba13="" class="u-form-item__body__right__content__slot"><div data-v-7dab6260="" class="u-input u-input--square" style="padding: 0px;"><div data-v-7dab6260="" class="u-input__content"><div data-v-7dab6260="" class="u-input__content__field-wrapper"><uni-input data-v-7dab6260="" class="u-input__content__field-wrapper__field" style="color: rgb(176, 176, 176); font-size: 14px; text-align: right;"><div class="uni-input-wrapper"><input id="txt1" value="<?php echo $dz['receiver'];?>" placeholder="Please enter recipient's name" maxlength="8" step="" enterkeyhint="done" autocomplete="off" type="" class="uni-input-input"></div></uni-input></div></div></div></div></div></div></div><div data-v-2f0e5305="" data-v-03e1ba13="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div></div>

<div data-v-03e1ba13="" class="u-form-item"><div data-v-03e1ba13="" class="u-form-item__body" style="flex-direction: row;"><div data-v-03e1ba13="" class="u-form-item__body__left" style="width: 100px; margin-bottom: 0px;"><div data-v-03e1ba13="" class="u-form-item__body__left__content"><uni-text data-v-03e1ba13="" class="u-form-item__body__left__content__label" style="justify-content: flex-start; font-size: 14px; color: rgb(51, 51, 51);"><span>Mobile Number:</span></uni-text></div></div><div data-v-03e1ba13="" class="u-form-item__body__right"><div data-v-03e1ba13="" class="u-form-item__body__right__content"><div data-v-03e1ba13="" class="u-form-item__body__right__content__slot"><div data-v-7dab6260="" class="u-input u-input--square" style="padding: 0px;"><div data-v-7dab6260="" class="u-input__content"><div data-v-7dab6260="" class="u-input__content__field-wrapper"><uni-input data-v-7dab6260="" class="u-input__content__field-wrapper__field" style="color: rgb(176, 176, 176); font-size: 14px; text-align: right;"><div class="uni-input-wrapper"><input id="txt2" value="<?php echo $dz['phone'];?>" placeholder="Please enter mobile number" maxlength="-1" step="" enterkeyhint="done" autocomplete="off" type="" class="uni-input-input"></div></uni-input></div></div></div></div></div></div></div><div data-v-2f0e5305="" data-v-03e1ba13="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div></div><div data-v-03e1ba13="" class="u-form-item"><div data-v-03e1ba13="" class="u-form-item__body" style="flex-direction: row;"><div data-v-03e1ba13="" class="u-form-item__body__left" style="width: 100px; margin-bottom: 0px;"><div data-v-03e1ba13="" class="u-form-item__body__left__content"><uni-text data-v-03e1ba13="" class="u-form-item__body__left__content__label" style="justify-content: flex-start; font-size: 14px; color: rgb(51, 51, 51);"><span>Region:</span></uni-text></div></div><div data-v-03e1ba13="" class="u-form-item__body__right"><div data-v-03e1ba13="" class="u-form-item__body__right__content"><div data-v-03e1ba13="" class="u-form-item__body__right__content__slot"><div class="picker-container main-end-flex"><div data-v-44f7fe39=""><uni-picker data-v-44f7fe39="" class="address-picker"><div><div class="region-select">
<div>
<uni-text style="margin-left: 1px;"><span><select name="provice" id="provice" onchange="getshi('<?php $dz['city_code']?>')" class="shuru">
                <option value="">Province</option>
              </select> </span></uni-text>
<uni-text style="margin-left: 1px;"><span> <select name="city" id="city" onchange="getqu('<?php $dz['area_code']?>')" class="shuru">
<?php
if($dz['city_code']!=''){
	echo '<option value="'.$dz['city_code'].'">'.$dz['city_name'].'</option>';
}else{
	echo '<option value="">City</option>';
}
?>
              </select></span></uni-text>
<uni-text style="margin-left: 1px;"><span> <select name="county" id="county" onchange="" class="shuru">
<?php
if($dz['area_code']!=''){
	echo '<option value="'.$dz['area_code'].'">'.$dz['area_name'].'</option>';
}else{
	echo '<option value="">District</option>';
}
?>
                
              </select></span></uni-text>

</div>
<?php
/* if($dz['province_name'].$dz['city_name'].$dz['area_name']!=''){
	echo '<div><uni-text style="margin-left: 1px;"><span><input id="txt3" value="'.$dz['province_name'].'" maxlength="-1" step="" enterkeyhint="done" autocomplete="off" type="" class="shuru"></span></uni-text><uni-text style="margin-left: 1px;"><span><input id="txt3" value="'.$dz['city_name'].'" maxlength="-1" step="" enterkeyhint="done" autocomplete="off" type="" class="shuru"></span></uni-text><uni-text style="margin-left: 1px;"><span><input id="txt3" value="'.$dz['area_name'].'" maxlength="-1" step="" enterkeyhint="done" autocomplete="off" type="" class="shuru"></span></uni-text></div>';
}else{
	echo '<uni-text class="region-unselect"><span>点击选择地区</span></uni-text>';
} */
?>
</div></div></uni-picker></div></div></div></div></div></div><div data-v-2f0e5305="" data-v-03e1ba13="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div></div><div data-v-03e1ba13="" class="u-form-item"><div data-v-03e1ba13="" class="u-form-item__body" style="flex-direction: column;"><div data-v-03e1ba13="" class="u-form-item__body__left" style="width: 100px; margin-bottom: 0px;"><div data-v-03e1ba13="" class="u-form-item__body__left__content"><uni-text data-v-03e1ba13="" class="u-form-item__body__left__content__label" style="justify-content: flex-start; font-size: 14px; color: rgb(51, 51, 51);"><span>Detailed Address:</span></uni-text></div></div><div data-v-03e1ba13="" class="u-form-item__body__right"><div data-v-03e1ba13="" class="u-form-item__body__right__content"><div data-v-03e1ba13="" class="u-form-item__body__right__content__slot"><div class="address-detail"><div class="address-detail-title">E.g., road, house number, community, etc.</div><div data-v-7dab6260="" class="u-input u-input--square" style="padding: 0px; margin-top: 15px;"><div data-v-7dab6260="" class="u-input__content"><div data-v-7dab6260="" class="u-input__content__field-wrapper"><uni-input data-v-7dab6260="" class="u-input__content__field-wrapper__field" style="color: rgb(176, 176, 176); font-size: 14px; text-align: right;"><div class="uni-input-wrapper"><input id="txt4" value="<?php echo $dz['address'];?>" placeholder="Please enter detailed address" maxlength="-1" step="" enterkeyhint="done" autocomplete="off" type="" class="uni-input-input"></div></uni-input></div></div></div></div></div></div></div></div><div data-v-2f0e5305="" data-v-03e1ba13="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div></div><div data-v-03e1ba13="" class="u-form-item"><div data-v-03e1ba13="" class="u-form-item__body" style="flex-direction: row;"><div data-v-03e1ba13="" class="u-form-item__body__left" style="width: 300px; margin-bottom: 0px;"><div data-v-03e1ba13="" class="u-form-item__body__left__content"><uni-text data-v-03e1ba13="" class="u-form-item__body__left__content__label" style="justify-content: flex-start; font-size: 14px; color: rgb(51, 51, 51);"><span>Set as default shipping address:</span></uni-text></div></div>

<?php 

if($dz['default_flag']==1){
	echo '<div data-v-03e1ba13="" class="u-form-item__body__right"><div id="xz0" class="uni-radio-input uni-radio-input-checked xuanz1" onclick="btn()"></div></div>';
}else{
	echo '<div data-v-03e1ba13="" class="u-form-item__body__right"><div id="xz0" class="uni-radio-input uni-radio-input-checked" onclick="btn()"></div></div>';
}
?>


</div><div data-v-2f0e5305="" data-v-03e1ba13="" class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div></div></div>
<div id="msg" style="text-align: center;"></div>
<div class="save-address main-center-flex invalid-save" onclick="editadd()">Save Address</div></div></uni-page-body></uni-page-wrapper></uni-page></uni-app></body>
<script>
var gid=<?php echo $gid?>;
var flag=<?php echo $dz['default_flag']?>;
function btn(){
	if(flag==2){
		$('#xz0').attr('class','uni-radio-input uni-radio-input-checked xuanz1');
		flag=1;
	}else{
		$('#xz0').attr('class','uni-radio-input uni-radio-input-checked');
		flag=2;
	}
}
</script>
<?php echo "<script>getshen('".$dz['province_code']."')</script>";?>
</html>