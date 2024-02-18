<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>账户余额</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<link rel="stylesheet" href="./static/index.css">
<script src="./static/js/cmd.js?v=2030"></script>
<style type="text/css">.uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}
@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}
.u-icon__icon{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}

.container{width:100%;min-height:100vh;padding:15px;background:#fff}
.head{width:100%;height:176px;padding:15px;background:linear-gradient(#4e4e51,#262628);border-radius:10px;background-repeat:no-repeat;background-size:100% 176px;color:#fff}.head-title{display:flex;justify-content:space-between;align-items:center}.head-left{color:#fff;width:228px}.banlance{font-size:12px}.banlan-num{font-size:35px;margin-top:3px}.total-rech{margin-top:12px}.all-con{position:absolute;
left:-49px}.recharge{width:76px;height:27px;background-color:#fff0cd;text-align:center;line-height:27px;font-size:12px;color:#2a2a2c;border-radius:13px;font-weight:600}.total-con{margin-top:46px}.total-cons{margin-top:55px}.history{margin-top:24px}.his-log{font-size:16px;color:#333}.date{color:#999;font-size:12px}.common{display:flex;justify-content:space-between;align-items:center}.head-right{color:#fff;position:relative;right:7px;width:117px}.tab{margin-top:12px}.tab-list{width:100%;height:30px;background:#f3f3f3;padding:4px;color:grey;display:flex;border-radius:4px}.com{width:110px;height:22px;text-align:center;line-height:22px;font-size:12px}.activeAll{background:#fff;color:#333;border-radius:2px}.list-item{height:60px}.opera{font-size:14px;color:#333;height:30px;line-height:30px}.time{font-size:12px;color:#999}.item-right{font-size:16px}.del-num{color:#22ac38}.add-num{color:#e60012}</style></head><body><uni-app><uni-page><uni-page-head>
<div class="uni-page-head" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);width: 100%;">
<div class="uni-page-head-hd" onclick="history.go(-1);">
<div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> 账户余额 </div>
</div>

<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head><uni-page-wrapper><uni-page-body>
<div class="app-layout">
<div class="container">
<div class="head" style="background-image: url(&quot;front/banlance-bg.png&quot;);">
<div class="head-title">
<div class="banlance">账户余额（元）</div>
<div class="recharge" onclick="gourl('banlan.php')">充值</div>
</div>
<div class="head-content">
<div class="banlan-num">0.00</div>
</div>
<div class="head-title">
<div class="banlance total-rech">
<div>累计充值（元 ）</div>
<div class="banlan-num">0</div>
</div>
<div class="banlance total-rech">
<div>累计消费(元)</div>
<div class="banlan-num">0</div>
</div>
</div>
</div>
<div class="history common">
<div class="his-log">历史记录</div>
<div class="common date"><uni-text><span>2023-09</span></uni-text>
<div class="u-popup"></div>
<div class="u-icon u-icon--right"><uni-text hover-class="" class="u-icon__icon uicon-arrow-right" style="font-size: 16px; line-height: 16px; font-weight: normal; top: 0px; color: rgb(96, 98, 102);"><span></span></uni-text></div>
</div>
</div>
<div class="tab">
<div class="tab-list">
<div class="tab-all com activeAll">全部</div>
<div class="tab-all com">充值</div>
<div class="tab-all com">消费</div>
</div>
</div>
<div class="list"></div>
</div>
</div>
</uni-page-body></uni-page-wrapper></uni-page></uni-app></body></html>