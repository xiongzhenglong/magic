<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>home</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
		<link rel="stylesheet" href="static/css.css">
		<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
		<link href="./static/css/swiper.min.css?v=2030" rel="stylesheet" />
		<script src="./static/js/swiper.min.js?v=2030"></script>
		<script src="./static/js/cmd.js?v=2030"></script>
    </head>
    
    <body class="uni-body pages-index-index" style="overflow: visible;background: linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff);margin:0">
	<div style="padding: 10px 10px 10px 10px;">
		<div class="u-navbar" style="height: 78px; background-color: rgba(0, 0, 0, 0);">
			<div class="image-logo">
					<img src="static/img/logo.3be86277.png" draggable="false" style="width:100%">
			</div>
			<span></span>
		</div>
		
		<div class="swiper-container" style="width: auto;height: 147px;border-radius: 4px;">
			<div class="swiper-wrapper">
<?php
$sql="select * from hm_activity_slider order by id desc";
$sql1=mysqli_query($db,$sql);//取得结果
while($rs=mysqli_fetch_array($sql1)){
	if($rs['blindbox_id']>0){//盲盒
		echo '<div class="swiper-slide">
					<a href="./blindbox.php?gid='.$rs['blindbox_id'].'"><img src="'.$rs['pic'].'" alt="" style="width: 100%;height: 147px;"></a>
				</div>';
	}
	if($rs['goods_id']>0){//商品
		echo '<div class="swiper-slide">
					<a href="./goods.html?gid='.$rs['goods_id'].'"><img src="'.$rs['pic'].'" alt="" style="width: 100%;height: 147px;"></a>
				</div>';
	}
}
?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		
		
		
		<div style="padding-top: 10px;">
			<div style="background-image: url('static/image/home/all-back.png');background-repeat: round;height: 84px;display: flex;">
				<div id="rwu" class="daily-view" onclick="rwus()">
					<div class="daily-title">
						<div class="d-view">daily</div>
						<div class="t-view">task</div>
					</div>
					<div class="progress">
						<div class="progress-line">
							<div class="progress-inner" style="width: 0%;">
							</div>
							<text class="progress-text"><span>0</span></text>
						</div>
					</div>
				</div>
				<div id="phb" class="list-view" onclick="phbs()">
					<div class="list-text">
						<div class="hl-view">
							<div class="h-view">honor</div>
							<div class="l-view">list</div>
						</div>
						<div class="ls-view">
							<div class="limit-view">daily</div>
							<div class="sprint-view">Winning Gifts</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="newer">
			<div class="new-title main-start-flex">
				<div class="head_decorate_1">
				</div>
				<div class="head_decorate_2">
				</div>
				<div class="head_title">
					<uni-text class="head_title_1">
						<span>
							Novice
						</span>
					</uni-text>
					<uni-text class="head_title_2">
						<span>
							NEW USER SPECIFIC
						</span>
					</uni-text>
				</div>
			</div>
			<div class="new-content">
				<div class="new-item" style="background-image: url(&quot;static/image/home/new-must-back.png&quot;);" onclick="gourl('blindbox.php?gid=1')">
					<div class="left main-start-flex">
						<div class="new-icon">
							<div style="background-image: url(&quot;static/image/home/new-must-icon.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 158px;height: 145px;">
							</div>
						</div>
					</div>
					<div class="right">
						<div class="top-area">
							<div class="top-text">
								<div class="title_1">Newcomer blind box</div>
								<div class="title_2">Products above epic level</div>
							</div>
							
						</div>
						<div>
							<div class="middle-view main-center-flex" style="background-image: url(&quot;static/image/home/must-btn.png&quot;);">
								<div>PHP 0.01</div>
								<div class="column-center-flex">
									<uni-text class="title_3">
										<span>Buy Now</span>
									</uni-text>
									<uni-text class="title_4">
										<span>62 SV</span>
									</uni-text>
								</div>
							</div>
						</div>
						<div class="bottom-area">
								<div style="background-image: url(&quot;static/image/home/bottom-back.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 195px;height: 35px;">
								</div>
						</div>
					</div>
					<div class="limit-class" style="background-image: url(&quot;static/image/home/limit-num.png&quot;);">
								<div>Only</div>
								<div>Once</div>
							</div>
				</div>
				<div class="new-item" style="background-image: url(&quot;static/image/home/buy-back.png&quot;);" onclick="gourl('blindbox.php?gid=2')">
					<div class="left main-start-flex">
							<div style="background-image: url(&quot;static/image/home/buy-icon.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 158px;height: 145px;">
							</div>
					</div>
					<div class="right">
						<div class="top-area">
							<div class="top-text">
								<div class="title_1_newer main-space-around">
									<div class="new-tag">
										NG
									</div>Newcomers buy one get one free</div>
								<div class="title_2">Newcomer benefits</div>
							</div>
						</div>
						<div>
							<div class="middle-view main-center-flex" style="background-image: url(&quot;static/image/home/present-btn.png&quot;);">
								<div>
									PHP 299.00
								</div>
								<div class="column-center-flex">
									<uni-text class="title_3">
										<span>Buy Now</span>
									</uni-text>
									<uni-text class="title_4">
										<span>70 SV</span>
									</uni-text>
								</div>
							</div>
						</div>
						<div class="bottom-area">
								<div style="background-image: url(&quot;static/image/home/bottom-back.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 195px;height: 35px;">
								</div>
						</div>
						
					</div>
					<div class="limit-class" style="background-image: url(&quot;static/image/home/limit-num2.png&quot;);">
								<div>Only</div>
								<div>3 times</div>
							</div>
				</div>
				<div class="free-item-free" style="background-image: url(&quot;static/image/home/freeloader.png&quot;);" onclick="gourl('blindbox.php?gid=3')">
					<div class="free-limit-view column-center-flex"
					style="background-image: url(&quot;static/image/home/freeloader-icon.png&quot;);">
						<div class="quota">Quota</div>
						<div class="quota">2 times</div>
					</div>
					<div class="top-view">
						<div class="title-text">Free Zone</div>
					</div>
					<div class="bottom-view">
						<div class="left main-start-flex">
								<div style="background-image: url(&quot;static/image/home/freeloader-img.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 158px;height: 145px;">
								</div>
						</div>
						<div class="free-right">
							<div class="free-text-area">
								<div class="text_1">Lucky Free Blind Box</div>
								<div class="text_1">50% chance of free</div>
							</div>
							<div class="free-btn-area">
								<div class="free-btn" style="background-image: url(&quot;static/image/home/freeloader-btn.png&quot;);">
									<div class="btn-left">
										<div>
											PHP 0
										</div>
										<div>20 people get it for free</div>
									</div>
									<div class="btn-right">rob</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="weekly-container" style="background-image: url(&quot;static/image/weekly/saturday_back.png&quot;);">
					<div class="limit-class" style="background-image: url(&quot;static/image/weekly/sat_icon.png&quot;);">
						<div style="color: rgb(131, 92, 0);">
							限购 5 次
						</div>
						<div style="color: rgb(131, 92, 0);">
							已购 0/5 次
						</div>
					</div>
					<div class="top">
						周六限定
					</div>
					<div class="bottom">
						<div class="bottom-area" style="background: linear-gradient(rgb(255, 252, 244) 100%, rgb(255, 255, 255) 100%);">
							<div class="left main-start-flex">
								<uni-image>
									<div style="background-image: url(&quot;static/image/weekly/weekly_icon.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
									</div>
									<img src="static/image/weekly/weekly_icon.png"
									draggable="false">
								</uni-image>
							</div>
							<div class="right">
								<div class="title-area">
									<div class="title_1" style="color: rgb(131, 92, 0);">
										买2送1
									</div>
									<div class="title_2" style="color: rgb(147, 112, 31);">
										买2送1干干干
									</div>
								</div>
								<div class="btn-area">
									<div class="btn main-center-flex" style="background-image: url(&quot;https://pro.hashmart.com.cn/static/images/weekly/saturday_btn.png&quot;);">
										<div class="btn-left">
											<div class="btn-title-1">
												￥210.00
											</div>
											<div class="btn-title-2">
												距结束: 06 : 39 : 34
											</div>
										</div>
										<div class="btn-right column-center-flex">
											<uni-text class="title_3">
												<span>
													马上买
												</span>
											</uni-text>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="weekly-container" style="background-image: url(&quot;static/image/weekly/monday_back.png&quot;);" onclick="gourl('mzxd.html')">
					<div class="limit-class" style="background-image: url(&quot;static/image/weekly/mon_icon.png&quot;);">
						<div style="color: rgb(127, 86, 255);">限购 5 次</div>
						<div style="color: rgb(34, 34, 34);">已购 0/5 次</div>
					</div>
					<div class="top">周一限定</div>
					<div class="bottom">
						<div class="bottom-area" style="background: linear-gradient(rgb(214, 238, 255) 100%, rgb(255, 255, 255) 100%);">
							<div class="left main-start-flex">
								<div style="background-image: url(&quot;static/image/weekly/weekly_icon.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 158px;height: 145px;">
								</div>
							</div>
							<div class="right">
								<div class="title-area">
									<div class="title_1" style="color: rgb(30, 129, 232);">买3送1</div>
									<div class="title_2" style="color: rgb(66, 158, 255);">买3送1抽抽抽</div>
								</div>
								<div class="btn-area">
									<div class="btn main-center-flex" style="background-image: url(&quot;static/image/weekly/monday_btn.png&quot;);">
										<div class="btn-left"><div class="btn-title-1">￥210.00</div><div class="btn-title-2">距结束: 04 : 06 : 37</div></div>
										<div class="btn-right column-center-flex">
											<uni-text class="title_3"><span>马上买</span></uni-text>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				
				
				
				<div class="list-container">
					<div class="head main-start-flex">
						<div class="head_decorate_1">
						</div>
						<div class="head_decorate_2">
						</div>
						<div class="head_title">
							<uni-text class="head_title_1">
								<span>Hot selling blind box</span>
							</uni-text>
							<uni-text class="head_title_2">
								<span>
									HOT SALE BOX
								</span>
							</uni-text>
						</div>
					</div>
					<div class="body">
<?php
$sql="select * from hm_blindbox where wanfa='0' order by sort desc";
$sql1=mysqli_query($db,$sql);//取得结果
while($rs=mysqli_fetch_array($sql1)){
	$str='';
	$bid=$rs['id'];
	$da=runsql($db,"select price from hm_blindbox_detail where blindbox_id='$bid' order by price desc limit 1");//大
	$xiao=runsql($db,"select price from hm_blindbox_detail where blindbox_id='$bid' order by price asc limit 1");//小
	
	$img=runsqld($db,"select goods_image from hm_blindbox_detail where blindbox_id='$bid' order by price asc limit 4");//小
	
	//print_r($img);
	for($i=0;$i<count($img);$i++){
		$str.='<div class="type_2_image_item">
											<div class="u-transition u-fade-enter-to u-fade-enter-active"
											style="transition-duration: 1000ms; transition-timing-function: ease-out;">
												<div class="u-image" style="width: 32px; height: 32px; border-radius: 0px; overflow: visible; background-color: transparent;">
														<div style="background-image: url(&quot;'.$img[$i][0].'&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 32px; height: 32px;">
														</div>
												</div>
											</div>
										</div>';
	}
	
	echo '<div class="body-item" onclick="gourl(&quot;blindbox.php?gid='.$rs['id'].'&quot;)">
							<div class="body-item-image">
								<div class="u-transition u-fade-enter-to u-fade-enter-active"
								style="transition-duration: 1000ms; transition-timing-function: ease-out;">
									<div class="u-image" style="width: 138px; height: 138px; border-radius: 0px; overflow: visible; background-color: transparent;">
											<div style="background-image: url(&quot;'.$rs['pic'].'&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 138px; height: 138px;">
											</div>
									</div>
								</div>
							</div>
							<div class="body-item-right">
								<div class="body-item-title">
									'.$rs['name'].'
								</div>
								<div class="body-item-remark text-ellipsis">
									'.$rs['desc'].'
								</div>
								<div class="body-item-type_2">
									<div class="type_2_price">
										<uni-text data-v-606918eb="">
											<span>PHP</span>
										</uni-text>
										'.$rs['price'].'
									</div>
									<div class="type_2_price_rank main-start-flex">
										<div class="main-center-flex type_2_price_rank_title">price</div>
										<div class="main-center-flex type_2_price_rank_detail">
											'.$xiao[0].' - '.$da[0].'php
										</div>
									</div>
									<div class="type_2_image">
										'.$str.'
									</div>
								</div>
							</div>
						</div>';
}
?>
					</div>
				</div>
			
			</div>
		</div>
		<div class="movable-area" style="width: 100%;">
					<div class="movable-view"style="position: absolute;right: 0px;margin-top: 50%;top: 220px;">
						<div class="free-play column-center-flex" onclick="swxs()">
							<div style="background-image: url(&quot;static/image/goods/free-play.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 55px;height: 58px;"></div>
							<div class="menu-text">free trial</div>
						</div>
					</div>
		</div>
		<div style="height: 60px;"></div>

	</div>
	
	<div id="mask" style="position: fixed;background-color: rgba(0, 0, 0, 0.4);display: none;width: 100%;height: 100%;top: 0px;z-index: 9;" onclick="rwux()"></div>
	<div id="task" class="popup-class" name="content" style="opacity: 1; position: fixed; left: 0px; right: 0px; bottom: 0px; padding-bottom: 0px; background-color: transparent; transition: -webkit-transform 300ms ease 0ms, transform 300ms ease 0ms; transform-origin: 50% 50%;z-index: 10075;">
			<div id="taskn" class="uni-popup__wrapper bottom" style="background-color: transparent;">
				<div class="popup-content" style="background-image: url(&quot;static/image/daily-popup.png&quot;);">
					<div class="daily-receive">
						<div class="left-area">
							<uni-text class="daily-text1">
								<span>每日必领</span>
							</uni-text>
							<uni-text class="daily-text2">
								<span>单日消费满198元，即可领取相关权益</span>
							</uni-text>
						</div>
						<div class="rules column-center-flex">活动规则</div>
					</div>
					<div class="content-class">
						<div class="task-progress">
							<div class="time-class">
									<div style="background-image: url(&quot;static/image/clock.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 18px;height: 21px;"></div>
								<uni-text class="text">
									<span>14 : 08 : 00</span>
								</uni-text>
								<uni-text class="text">
									<span>后重置</span>
								</uni-text>
							</div>
							<div class="consume-class">
								<div class="phone">
									<div class="phone-view">
											<div style="background-image: url(&quot;static/image/298.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 40px;height: 41px;"></div>
										<div class="price-text no-price">198</div>
									</div>
									<div class="phone-view">
											<div style="background-image: url(&quot;static/image/298.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 40px;height: 41px;"></div>
										<div class="price-text no-price">598</div>
									</div>
									<div class="phone-view">
											<div style="background-image: url(&quot;static/image/298.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 40px;height: 41px;"></div>
										<div class="price-text no-price">998</div>
									</div>
								</div>
								<div class="price-class">
									<div class="common-consume">已消费0元</div>
								</div>
							</div>
							<div class="consume-view no-consume" style="background-image: url(&quot;static/image/no-consume.png&quot;);">
								<div class="inner-consume">
									<uni-text >
										<span>还差</span>
									</uni-text>
									<uni-text class="has-text">
										<span>198.00</span>
									</uni-text>
									<uni-text >
										<span>元即可领取奖励</span>
									</uni-text>
								</div>
							</div>
						</div>
						<div class="">
							<div >
								<div class="coupons-class">
									<div class="title-view">
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
										<div class="title-view-class">
											<uni-text class="title-class">
												<span>达到</span>
											</uni-text>
											<uni-text class="title-class amount-class">
												<span>198</span>
											</uni-text>
											<uni-text class="title-class">
												<span>元领取</span>
											</uni-text>
										</div>
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
									</div>
									<div class="coupons-view-content">
										<div class="coupons-item">
												<div style="background-image: url(&quot;static/image/coupons/coupons1.png&quot;); background-position: center center; background-size: contain; background-repeat: no-repeat;width: 77px;height: 55px;"></div>
											<div class="coupons-text">
												<uni-text class="coupons-text1">
													<span>每日任务8元游优惠券*1</span>
												</uni-text>
												<uni-text class="coupons-detail">
													<span>查看详情&gt;</span>
												</uni-text>
											</div>
											<div class="lock-img lock-class other-img" style="background-image: url(&quot;static/image/coupons/lock-back.png&quot;);">未解锁</div>
										</div>
									</div>
								</div>
								<div class="coupons-class">
									<div class="title-view">
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
										<div class="title-view-class">
											<uni-text class="title-class">
												<span>达到</span>
											</uni-text>
											<uni-text class="title-class amount-class">
												<span>598</span>
											</uni-text>
											<uni-text class="title-class">
												<span>元领取</span>
											</uni-text>
										</div>
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
									</div>
									<div class="coupons-view-content">
										<div class="coupons-item">
												<div style="background-image: url(&quot;static/image/coupons/coupons2.png&quot;); background-position: center center; background-size: contain; background-repeat: no-repeat;width: 77px;height: 55px;"></div>
											<div class="coupons-text">
												<uni-text class="coupons-text1">
													<span>重抽卡*2</span>
												</uni-text>
												
											</div>
											<div class="lock-img lock-class other-img" style="background-image: url(&quot;static/image/coupons/lock-back.png&quot;);">未解锁</div>
										</div>
									</div>
								</div>
								<div class="coupons-class">
									<div class="title-view">
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
										<div class="title-view-class">
											<uni-text class="title-class">
												<span>达到</span>
											</uni-text>
											<uni-text class="title-class amount-class">
												<span>998</span>
											</uni-text>
											<uni-text class="title-class">
												<span>元领取</span>
											</uni-text>
										</div>
											<div style="background-image: url(&quot;static/image/star.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;width: 7px;height: 9px;"></div>
									</div>
									<div class="coupons-view-content">
										<div class="coupons-item">
												<div style="background-image: url(&quot;static/image/coupons/balance.png&quot;); background-position: center center; background-size: contain; background-repeat: no-repeat;width: 77px;height: 55px;"></div>
											<div class="coupons-text">
												<uni-text class="coupons-text1">
													<span>余额*19</span>
												</uni-text>
												
											</div>
											<div class="lock-img lock-class other-img" style="background-image: url(&quot;static/image/coupons/lock-back.png&quot;);">未解锁</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
			</div>
		</div>
		
		<div id="phblist" class="u-transition u-slide-up-enter-to u-slide-up-enter-active" style="transition-duration: 300ms; transition-timing-function: ease-out; z-index: 10075; position: fixed; display: ; bottom: 0px; left: 0px; right: 0px;">
			<div id="phblistn" class="u-popup__content" style="flex: 1 1 0%;">
				
				<div class="list-container">
					<div class="top-area" style="background-image: url(&quot;static/image/home/daily-back.png&quot;);">
						<div class="u-tabs" inactive-color="#9A71BA" bar-width="150" bar-height="6">
							<div class="u-tabs__wrapper">
								<div class="u-tabs__wrapper__scroll-view-wrapper">
									<uni-scroll-view class="u-tabs__wrapper__scroll-view">
										<div class="uni-scroll-view">
											<div class="uni-scroll-view" style="overflow: auto hidden;">
												<div class="uni-scroll-view-content">
													
													<div class="u-tabs__wrapper__nav">
														<div class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-0" style="width: 50%; height: 44px; font-size: 15px; font-family: &quot;Source Han Sans CN&quot;; font-weight: 400; color: rgb(34, 18, 60);">
															<uni-text class="u-tabs__wrapper__nav__item__text" style="font-family: &quot;Source Han Sans CN&quot;; font-weight: 500; color: rgb(34, 18, 60);">
																<span>日榜</span>
															</uni-text>
															
														</div>
														<div class="u-tabs__wrapper__nav__item u-tabs__wrapper__nav__item-1" style="width: 50%; height: 44px; font-size: 15px; font-family: &quot;Source Han Sans CN&quot;; font-weight: 400; color: rgb(34, 18, 60);">
															<uni-text class="u-tabs__wrapper__nav__item__text" style="color: rgb(96, 98, 102);">
																<span>周榜</span>
															</uni-text>
															
														</div>
														<div class="u-tabs__wrapper__nav__line" style="width: 20px; transform: translate(93.5px); transition-duration: 300ms; height: 3px; background:  0% 0% / cover rgb(159, 110, 255);"></div>
													</div>
												</div>
											</div>
										</div>
									</uni-scroll-view>
								</div>
							</div>
						</div>
						<div class="period"><div class="title">上期TOP3</div><div class="content"><div class="rank-container column-center-flex second-view"><div class="rank-img" style="background-image: url(&quot;static/image/home/two.png&quot;);">
						<img src="static/image/avatar-2.png" draggable="false">
						
						<div>2</div></div><div class="rank-text text-2"><div>42001荣誉值</div><div>13103711111</div></div></div><div class="rank-container column-center-flex first-view"><div class="rank-img" style="background-image: url(&quot;static/image/home/one.png&quot;);">
						<img src="static/image/avatar-3.png" draggable="false">
						
						<div>1</div></div><div class="rank-text text-1"><div>148600荣誉值</div><div>hjk</div></div></div><div class="rank-container column-center-flex third-view"><div class="rank-img" style="background-image: url(&quot;static/image/home/three.png&quot;);">
						<img src="static/image/avatar-3.png" draggable="false">
						<div>3</div></div><div class="rank-text text-3"><div>42001荣誉值</div><div>15696586164</div></div></div></div></div>
					</div>
					<div class="bottom-area">
						<uni-scroll-view class="scroll-view"><div class="uni-scroll-view"><div class="uni-scroll-view" style="overflow: hidden auto;"><div class="uni-scroll-view-content"><div class="">
						<div class="rank-list" style="background-color: rgb(250, 241, 255);"><div class="bk-rank" style="color: rgb(244, 225, 255);">TOP1</div><div class="rank-item"><div class="left-area main-center-flex"><div class="avatar-class" style="background-image: url(&quot;static/image/home/one-rank.png&quot;);"><uni-text class="first"><span>1</span></uni-text></div></div><div class="middle-area"><uni-image class="avatar"><img src="static/image/avatar-3.png" draggable="false"></uni-image><div class="user-name">hjk</div></div><div class="right-area"><uni-text><span>荣誉值</span></uni-text><uni-text><span>148600</span></uni-text></div></div></div>
						<div class="rank-list" style="background-color: rgb(235, 249, 255);"><div class="bk-rank" style="color: rgb(212, 242, 255);">TOP2</div><div class="rank-item"><div class="left-area main-center-flex"><div class="avatar-class" style="background-image: url(&quot;static/image/home/two-rank.png&quot;);"><uni-text class="second"><span>2</span></uni-text></div></div><div class="middle-area"><uni-image class="avatar"><img src="static/image/avatar-2.png" draggable="false"></uni-image><div class="user-name">13103711111</div></div><div class="right-area"><uni-text><span>荣誉值</span></uni-text><uni-text><span>42001</span></uni-text></div></div></div>
						<div class="rank-list" style="background-color: rgb(255, 249, 249);"><div class="bk-rank" style="color: rgb(255, 241, 245);">TOP3</div><div class="rank-item"><div class="left-area main-center-flex"><div class="avatar-class" style="background-image: url(&quot;static/image/home/three-rank.png&quot;);"><uni-text class="third"><span>3</span></uni-text></div></div><div class="middle-area"><uni-image class="avatar"><img src="static/image/avatar-3.png" draggable="false"></uni-image><div class="user-name">15696586164</div></div><div class="right-area"><uni-text><span>荣誉值</span></uni-text><uni-text><span>42001</span></uni-text></div></div></div>
						</div></div></div></div></uni-scroll-view>
						<div class="item-view">
							<div class="rank-item-self">
								<div class="left-area column-center-flex">
									<uni-text class="title_1">
										<span>我的排名:</span>
									</uni-text>
									<uni-text class="rank-title"><span>未上榜</span></uni-text>
									
								</div>
								<div class="middle-area">
									<uni-image class="avatar">
										<img src="static/image/avatar-2.png" draggable="false">
									</uni-image>
									<div class="user-name"></div>
								</div>
								<div class="right-area">
									<uni-text>
										<span>荣誉值</span>
									</uni-text>
									<uni-text>
										<span>0</span>
									</uni-text>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	
		<div id="swmb" class="u-transition u-fade-zoom-enter-to u-fade-zoom-enter-active" style="position: fixed;background-color: rgba(0, 0, 0, 0.4);z-index: 9;width: 100%;display: block;height: 100%;visibility: hidden;top: 0px;">
		<div name="mask1" style="position: fixed;background-color: rgba(0, 0, 0, 0.4);z-index: 9;width: 100%;display: block;height: 100%;" onclick="rwux()"></div>
		<div class="u-popup__content" style="border-radius: 14px;z-index: 10;margin-top: 50%;margin-left: 50%;left: -174px;"><div class="play-container" style="background-image: url(&quot;static/image/home/free-play-back.png&quot;);"><uni-image class="free-img"><div style="background-image: url(&quot;static/image/home/free-play-img.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div><img src="static/image/home/free-play-img.png" draggable="false"></uni-image><div class="free-title column-center-flex" style="background-image: url(&quot;static/image/home/free-play-title.png&quot;);"><div data-v-16458fbc="">demo</div><div data-v-16458fbc="">HASHMART</div></div><div class="top-area">trendy products</div><div class="middle-area"><div class="list-content"><div class="option-class main-center-flex" style="background-image: url(&quot;static/image/home/free-play-options.png&quot;);"><div class="option-text" onclick="gourl('play.php')">Open a blind box</div></div><div class="option-class main-center-flex" style="background-image: url(&quot;static/image/home/free-play-options.png&quot;);display: none;"><div class="option-text">欧气三连</div></div><div class="option-class main-center-flex" style="background-image: url(&quot;static/image/home/free-play-options.png&quot;);display: none;"><div class="option-text">霸气五连</div></div><div class="option-class main-center-flex" style="background-image: url(&quot;static/image/home/free-play-options.png&quot;);display: none;"><div class="option-text">豪气十连</div></div></div></div><div class="bottom-area main-center-flex">Game trial, results for reference only</div></div></div></div>
	
	
	
	<uni-tabbar class="uni-tabbar-bottom" style=""><div class="uni-tabbar" style="background-color: rgb(255, 255, 255); backdrop-filter: none;"><div class="uni-tabbar-border" style="background-color: rgba(255, 255, 255, 0.33);"></div>
	<div class="uni-tabbar__item" onclick="gourl('./')"><div class="uni-tabbar__bd" style="height: 60px;"><div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/index_selected.png"></div><div class="uni-tabbar__label" style="color: rgb(51, 51, 51); font-size: 10px; line-height: normal; margin-top: 3px;"> home </div></div></div>
	<div class="uni-tabbar__item" onclick="gourl('mall.php')"><div class="uni-tabbar__bd" style="height: 60px;"><div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/market.png"></div><div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> mall </div></div></div>
	<div class="uni-tabbar__item" onclick="gourl('warehouse.php')"><div class="uni-tabbar__bd" style="height: 60px;"><div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/warehouse.png"></div><div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> warehouse </div></div></div>
	<div class="uni-tabbar__item" onclick="gourl('my.php')"><div class="uni-tabbar__bd" style="height: 60px;"><div class="uni-tabbar__icon" style="width: 24px; height: 24px;"><img src="./static/image/tab-bar/my.png"></div><div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> User Center </div></div></div></div><div class="uni-placeholder" style="height: 60px;"></div></uni-tabbar>
	
	<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',//水平布局
        loop: true,//循环
        autoplay: 2500,//自动走
        autoHeight: true,
        autoplayDisableOnInteraction: false,//控制后继续自动走
        // 分页器
        pagination: '.swiper-pagination',

    })
    //$("#hiddenPage").val("1");
    /* var canScroll = true;
    window.onload = function () {
        getMyPlayGame(1);
		window.onscroll = function () {
            loadingData();
        };
    } */
      
	  
	
    function csh(){
		$("#task").css({'top':window.innerHeight});
		$("#phblist").css({'top':window.innerHeight});
	}
	csh();
</script>
    </body>

</html>