<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
?>
<html lang="zh-CN"><head><meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>User Center</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">
::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}.u-navbar--fixed{position:fixed;left:0;right:0;top:0;z-index:11}.u-navbar__content{display:flex;flex-direction:row;align-items:center;height:44px;background-color:#9acafc;position:relative;justify-content:center}.u-navbar__content__title{text-align:center;font-size:16px;color:#303133}.u-avatar--circle{border-radius:100px}.u-avatar__image--circle{border-radius:100px}.u-avatar__image--square{border-radius:4px}.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-space-between{display:flex;align-items:center;justify-content:space-between}.container{width:100%;height:calc(100vh - 60px);padding:0 10px;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.body{overflow-y:scroll;padding-bottom:15px;height:100%}.user-info{height:49px;width:100%;position:relative}.head-img{display:flex}.user-info-text{margin-left:10px}.user-info-text > div:first-child{display:flex;align-items:center;font-size:16px;font-family:PingFang SC-Medium;font-weight:700;color:#000}.column-center-flex {display: flex;flex-direction: column;align-items: center;justify-content: center;}.grow-class{height:22px;margin-top:5px;color:#000;background-color:#fff;border-radius:18px;font-family:PingFang SC-Regular;font-size:11px;line-height:18px;padding-left:5px;padding-right:5px;padding-top:2px}.account-price-container{width:100%;height:75px;margin-top:15px}.level-container{margin-top:15px;width:100%}.level-container .content-class{display:flex;flex-direction:row;justify-content:space-around;align-items:center;height:149px;background-size:cover;background-repeat:no-repeat center;background-image:url(static/image/v-back.png)}.level-container .left-area{width:calc(100% - 120px);padding-left:30px;margin-bottom:60px}.level-container .v_text{font-family:BTH;color:#f0f1ff;font-size:34px}.level-container .v_desc{font-family:PingFang SC-Regular;color:#e1e3ff;font-size:12px}.level-container .right-area{width:79px;height:26px;margin-right:30px;margin-bottom:60px;line-height:26px;color:#885729;background:linear-gradient(180deg,#fae4bf,#edcb9a);border-radius:26px;text-align:center;font-size:12px;font-family:PingFang SC-Medium}.account-price-item{width:167px;height:75px}.account-price-item .balance-text{font-size:20px;font-family:PingFang SC-Semibold,PingFang SC;font-weight:600;color:#000}.account-price-item .desc-text{font-size:14px;font-family:PingFang SC-Regular,PingFang SC;font-weight:400;color:#3d3d3d}.prop-container{display:flex;justify-content:space-between;padding:25px 18px 15px;height:115px;background-size:100% 100%;background-repeat:no-repeat center}.prop-container .prop-center{width:calc((100% - 25px) / 2);padding-left:15px;height:77px;display:flex;border:0;flex-direction:column;justify-content:center;align-items:flex-start;background-size:100% 100%;background-repeat:no-repeat center}.prop-container .text-center{font-size:13px;font-family:PingFang SC-Medium,PingFang SC;font-weight:500;color:#fff}.prop-container .num-center{font-size:20px;font-family:PingFang SC-Semibold,PingFang SC;color:#fff}.order-container{width:100%;height:143px;margin-top:15px;background:#fff}.service-container{width:100%;min-height:180px;margin-top:15px;padding:0;background:#fff}.my-order{margin-left:15px}.order-head,.service-head{height:50px;font-size:16px;font-family:Source Han Sans CN;font-weight:500;color:#333}.service-head{padding:0 15px}.order-detail{height:65px;width:100%;padding:0 9px;display:flex;justify-content:space-between;align-items:flex-start}.order-item{width:25%}.order-item,.service-item{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin-top:5px}.order-item-image{width:37px;height:34px}.order-name{margin-top:9px}.service-item-image{width:24px;height:24px}.service-detail{width:100%;background:#fff;flex-wrap:wrap}.service-item{width:25%;margin-bottom:20px}.service-name{margin-top:10px}.my-service{display:flex;flex-direction:column;justify-content:center;align-items:center}.my-banlance{display:flex;flex-direction:column;padding-left:16px;justify-content:center;align-items:center}.order-icon{width:37px;height:34px}</style>
</head>
<body>
<div class="container" style="padding-top: 44px;">
<div class="u-navbar">
<div class="u-navbar--fixed">
<div class="u-status-bar" style="height: 0px; background-color: rgba(0, 0, 0, 0);"></div>
<div class="u-navbar__content" style="height: 44px; background-color: rgba(0, 0, 0, 0);">
<uni-text class="u-line-1 u-navbar__content__title" style="width: 200px;"><span>User Center</span></uni-text></div>
</div>
</div>
<uni-scroll-view enableflex="true" class="body">
<div class="uni-scroll-view">
<div class="uni-scroll-view" style="overflow: hidden auto;">
<div class="uni-scroll-view-content">
	<div class="user-info main-start-flex">
		<div class="head-img">
			<div class="u-avatar u-avatar--circle" style="background-color: transparent; width: 49px; height: 49px;">
				<uni-image class="u-avatar__image u-avatar__image--circle" style="width: 49px; height: 49px;">
					<div style="background-image: url(&quot;<?php echo $user['avatar']?>&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
					<img src="<?php echo $user['avatar']?>" draggable="false">
				</uni-image>
			</div>
			<div class="user-info-text" onclick="gourl('level.php')">
				<div><uni-text><span><?php echo $user['phone']?></span></uni-text></div>
				<div class="grow-class">Growth Points <?php echo $user['czz']?> &gt;</div>
			</div>
		</div>
	</div>
<div class="account-price-container main-space-between">
<div class="account-price-item my-banlance" style="font-size: 26px;" onclick="gourl('account.php')">
<div class="balance-text"><?php echo $user['balance']?></div>
<div class="desc-text">Account Balance (CNY)</div>
</div>
<div class="account-price-item my-banlance" style="font-size: 26px;">
<div class="balance-text"><?php echo $user['integral']?></div>
<div class="desc-text">Hash Coins</div>
</div>
</div>
<div class="level-container">
<div class="content-class">
<div class="left-area">
<div class="v_text">V1</div>
<div class="v_desc">Unlocked at 1000 Growth Points</div>
</div>
<div class="right-area" onclick="gourl('level.php')">Membership Details &gt;</div>
</div>
</div>
<div class="prop-container" style="margin-top: -58px; background-image: url(&quot;static/image/center/center-back.png&quot;);">
<div class="prop-center" style="background-image: url(&quot;static/image/center/free-center.png&quot;);">
<div class="text-center">Free Order Coupons</div>
<div class="num-center"><?php echo $user['mdj']?></div>
</div>
<div class="prop-center" style="background-image: url(&quot;static/image/center/prop-center.png&quot;);">
<div class="text-center">Prop Cards</div>
<div class="num-center"><?php echo $user['djk']?></div>
</div>
</div>
<div class="order-container">
<div class="order-head main-start-flex my-order">My Orders</div>
<div class="order-detail">
<div class="order-item column-center-flex" onclick="gourl('order.php')">
<div class="order-item-image"><uni-image class="order-icon">
<div style="background-image: url(&quot;./static/img/un_pay.dcb54653.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="./static/img/un_pay.dcb54653.png" draggable="false"></uni-image></div>
<div class="order-name">Pending Payment</div>
</div>
<div class="order-item column-center-flex" onclick="gourl('order.php')">
<div class="order-item-image"><uni-image class="order-icon">
<div style="background-image: url(&quot;./static/img/finish.9f9c99ef.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="./static/img/finish.9f9c99ef.png" draggable="false"></uni-image></div>
<div class="order-name">Awaiting Shipment</div>
</div>
<div class="order-item column-center-flex" onclick="gourl('order.php')">
<div class="order-item-image"><uni-image class="order-icon">
<div style="background-image: url(&quot;./static/img/un_receive.b851eaf4.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="./static/img/un_receive.b851eaf4.png" draggable="false"></uni-image></div>
<div class="order-name">Awaiting Delivery</div>
</div>
</div>
</div>
<div class="service-container">
<div class="service-head main-start-flex">My Services</div>
<div class="service-detail main-start-flex">
<div class="service-item  my-service" onclick="gourl('coupon.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/youhuiquan.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/youhuiquan.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Coupons</div>
</div>
<div class="service-item  my-service" onclick="gourl('open.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/jilu.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/jilu.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Box Opening Records</div>
</div>
<div class="service-item  my-service" onclick="gourl('address.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/dizhi1.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/dizhi1.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Address Management</div>
</div>
<div class="service-item  my-service" onclick="gourl('customer.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/kefu.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/kefu.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Contact Customer Service</div>
</div>
<div class="service-item  my-service" onclick="gourl('setting.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/shezhi.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/shezhi.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Settings</div>
</div>
<div class="service-item  my-service" onclick="gourl('recharge.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/chongzhi-xianxing2-0.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/chongzhi-xianxing2-0.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Balance Recharge Orders</div>
</div>
<div class="service-item  my-service" onclick="gourl('invitations.php')">
<div class="service-item-image">
<div class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
<div class="u-image" style="width: 24px; height: 24px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 24px; height: 24px;">
<div style="background-image: url(&quot;static/image/center/liwu-copy.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/center/liwu-copy.png" draggable="false"></uni-image></div>
</div>
</div>
<div class="service-name">Rewards for Invitations</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="u-popup bg"></div>
</div>

<uni-tabbar class="uni-tabbar-bottom" style="">
<div class="uni-tabbar" style="background-color: rgb(255, 255, 255);backdrop-filter: none;width: 100%;">
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
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/warehouse.png"></div>
<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> warehouse </div>
</div>
</div>
<div class="uni-tabbar__item" onclick="gourl('my.php')">
<div class="uni-tabbar__bd" style="height: 60px;">
<div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/my_selected.png"></div>
<div class="uni-tabbar__label" style="color: rgb(51, 51, 51); font-size: 10px; line-height: normal; margin-top: 3px;"> User Center </div>
</div>
</div>
</div>
<div class="uni-placeholder" style="height: 60px;"></div>

</body>
</html>