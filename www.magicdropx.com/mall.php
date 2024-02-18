<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$cate=runsqld($db,"select * from hm_goods_cate order by id asc");
$goods=runsqld($db,"select * from hm_goods where goods_type='1' order by id asc");
//print_r($box[0]);
?>

<html lang="zh-CN"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>mall</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<link rel="stylesheet" href="./static/index.css">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<link href="./static/css/swiper.min.css?v=2030" rel="stylesheet" />
<script src="./static/js/swiper.min.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<style type="text/css">
::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}
.u-navbar--fixed{position:fixed;left:0;right:0;top:0;z-index:11}
.u-navbar__content{display:flex;flex-direction:row;align-items:center;height:44px;background-color:#9acafc;position:relative;justify-content:center}
.u-navbar__content__left, .u-navbar__content__right{padding:0 13px;position:absolute;top:0;bottom:0;display:flex;flex-direction:row;align-items:center}
.u-navbar__content__left{left:0}
.u-navbar__content__left--hover{opacity:.7}
.u-navbar__content__left__text{font-size:15px;margin-left:3px}
.u-navbar__content__title{text-align:center;font-size:16px;color:#303133}
.u-navbar__content__right{right:0}
.u-navbar__content__right__text{font-size:15px;margin-left:3px}
.container{width:100%;padding:10px;display:flex;flex-wrap:wrap;justify-content:space-between;align-content:flex-start}.goods-item{
width: 49%;
    height: 272px;
    background: #fff;
    margin-top: 10px;

}.goods-item-image{width:100%;height:167px}.goods-type{width:47px;position:relative;top:-165px;font-size:10px;
color:#fff;border-radius:0 0 50px 0;padding-left:4px}.goods-item-name{width:100%;height:40px;padding:0 10px;font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin:5px 0 0 0}.goods-item-price{display:flex;padding-left:10px;font-size:20px;font-family:Abel;font-weight:400;color:#ea6e7a}.goods-item-price uni-text:nth-child(2){font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#ea6e7a}.text-style{font-size:10px;font-family:Source Han Sans CN;font-weight:400;color:#999}.goods-item-rank{padding-left:10px}.market-price{font-size:20px;font-family:Abel;font-weight:400;color:#333;padding-left:10px}.market-price uni-text{font-size:13px;font-family:Source Han Sans CN;font-weight:400;color:#333}.market-hash-coin{padding-left:10px;font-size:14px;font-family:Abel;font-weight:400;color:#ec872e;display:flex;align-items:center;margin-top:5px}.market-hash-coin uni-text{font-size:10px}.money{font-size:12px!important}.money-num{font-size:13px!important}.goods-img{width:100%;height:167px}
.container{background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.body{overflow-y:scroll;display:inline-block;padding-bottom:15px}.padding-container{}.indicator-dot-container{display:flex;justify-content:center;align-items:center}.indicator-dot{width:4px;height:4px;background:#fff;opacity:.5;border-radius:50%;transition:width .2s ease;margin-right:2px}.indicator-dot-active{width:12px;height:5px;background:#fff;border-radius:2px;opacity:1} .u-swiper{margin-top:10px}.kinds-list{width:100%;
/* height: 275rpx; */margin-top:33px;padding:0 0px;display:flex;flex-wrap:wrap}.kinds-list-item{width:47px;height:56px;margin:0 9px;margin-bottom:25px}.kinds-list-item-name{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#333;white-space:nowrap}.kinds-list-item-image{width:32px;height:32px}.image-logo{width:105px;height:23px}.right-logo{width:125px;height:23px}
		</style>
	</head>
<body>
						<div class="container" style="padding-top: 44px;">
							<div class="u-navbar">
								<div class="u-navbar--fixed">
									<div data-v-186edb96="" class="u-status-bar" style="height: 0px; background-color: rgba(0, 0, 0, 0);"></div>
									<div class="u-navbar__content" style="height: 44px; background-color: rgba(0, 0, 0, 0);">
										<div class="u-navbar__content__left">
											<uni-image class="image-logo">
												<div style="background-image: url(&quot;./static/img/logo.3be86277.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
												
												<img src="./static/img/logo.3be86277.png" draggable="false">
											</uni-image>
										</div>
										<uni-text class="u-line-1 u-navbar__content__title" style="width: 200px;">
											<span></span>
										</uni-text>
										<div class="u-navbar__content__right">
											<uni-image alt="" class="right-logo">
												<div style="background-image: url(&quot;static/img/t1.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
												
												<img src="static/img/t1.png" draggable="false">
											</uni-image>
										</div>
									</div>
								</div>
							</div>
							<uni-scroll-view class="body" style="height: calc(100vh - 44px);">
								<div class="uni-scroll-view">
									<div class="uni-scroll-view" style="overflow: hidden auto;">
										<div class="uni-scroll-view-content">
											
											<div class="padding-container">
												
		<div class="swiper-container" style="width: auto;height: 147px;border-radius: 4px;">
			<div class="swiper-wrapper">
<?php
$sql="select * from hm_activity_slider where goods_id>0 order by id desc";
$sql1=mysqli_query($db,$sql);//取得结果
while($rs=mysqli_fetch_array($sql1)){
	if($rs['blindbox_id']>0){//盲盒
		echo '<div class="swiper-slide">
					<a href="./blindbox.php?gid='.$rs['blindbox_id'].'"><img src="'.$rs['pic'].'" alt="" style="width: 100%;height: 147px;"></a>
				</div>';
	}
	if($rs['goods_id']>0){//商品
		echo '<div class="swiper-slide">
					<a href="./goods.php?gid='.$rs['goods_id'].'"><img src="'.$rs['pic'].'" alt="" style="width: 100%;height: 147px;"></a>
				</div>';
	}
}
?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
												
												<div class="kinds-list">
												
<?php
for($i=0;$i<count($cate);$i++){	
	echo '<div class="kinds-list-item column-space-between" onclick="gourl(&quot;list.php?gid='.$cate[$i]['id'].'&quot;)">
			<div class="kinds-list-item-image">
				<div data-v-a75f7a08="" data-v-1428a719="" class="u-transition u-fade-enter-to u-fade-enter-active" style="transition-duration: 1000ms; transition-timing-function: ease-out;">
					<div data-v-1428a719="" class="u-image" style="width: 32px; height: 32px; border-radius: 4px; overflow: visible; background-color: transparent;">
						<uni-image data-v-1428a719="" show-menu-by-longpress="true" class="u-image__image" style="border-radius: 4px; width: 32px; height: 32px;">
							<img src="'.$cate[$i]['icon'].'" draggable="false" style="opacity:1">
						</uni-image>
						
						
					</div>
				</div>
			</div>
			<div class="kinds-list-item-name">'.$cate[$i]['name'].'</div>
		</div>';
}
?>	
												</div>
											</div>
											<div class="container" style="padding: 0px 0px 0px;">
<?php
for($i=0;$i<count($goods);$i++){	
	echo '<div class="goods-item" onclick="gourl(&quot;goods.php?gid='.$goods[$i]['id'].'&quot;)">
			<div class="goods-item-image">
				<uni-image class="goods-img">
					<img src="'.$goods[$i]['image'].'" draggable="false" style="opacity:1">
				</uni-image>
			</div>
			
			<div class="goods-item-name text-ellipsis_2">'.mb_substr($goods[$i]['name'], 0, 24, 'utf-8').'</div>
			
			<div class="market-price">
				<uni-text>
					<span>￥</span>
				</uni-text>'.$goods[$i]['price'].'
			</div>
			<div class="market-hash-coin">'.$goods[$i]['integral_price'].'<uni-text>
					<span>哈希币</span>
				</uni-text>
			</div>
		</div>';
}
?>
											</div>
											<div data-v-6e5fb1c2="" class="u-loadmore" style="background-color: transparent; margin-bottom: 10px; margin-top: 10px; height: auto;">
												
												<div data-v-6e5fb1c2="" class="u-loadmore__content u-more">
													
													<uni-text data-v-6e5fb1c2="" class="u-line-1 u-loadmore__content__text" style="color: rgb(96, 98, 102); font-size: 14px; line-height: 14px; background-color: transparent;">
														<span>没有更多了</span>
													</uni-text>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</uni-scroll-view>
							
						</div>
			<uni-tabbar class="uni-tabbar-bottom" style="">
				<div class="uni-tabbar" style="background-color: rgb(255, 255, 255); backdrop-filter: none;width: 100%;">
					<div class="uni-tabbar-border" style="background-color: rgba(255, 255, 255, 0.33);"></div>
					<div class="uni-tabbar__item" onclick="gourl('./')">
						
						<div class="uni-tabbar__bd" style="height: 60px;">
							<div class="uni-tabbar__icon" style="width: 24px; height: 24px;">
								<img src="./static/image/tab-bar/index.png">
							</div>
							<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> home </div>
							
						</div>
					</div>
					<div class="uni-tabbar__item" onclick="gourl('mall.php')">
						
						<div class="uni-tabbar__bd" style="height: 60px;">
							<div class="uni-tabbar__icon" style="width: 24px; height: 24px;">
								<img src="./static/image/tab-bar/market_selected.png">
							</div>
							<div class="uni-tabbar__label" style="color: rgb(51, 51, 51); font-size: 10px; line-height: normal; margin-top: 3px;"> mall </div>
							
						</div>
					</div>
					<div class="uni-tabbar__item" onclick="gourl('warehouse.php')">
						
						<div class="uni-tabbar__bd" style="height: 60px;">
							<div class="uni-tabbar__icon" style="width: 24px; height: 24px;">
								<img src="./static/image/tab-bar/warehouse.png">
							</div>
							<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> warehouse </div>
							
						</div>
					</div>
					<div class="uni-tabbar__item" onclick="gourl('my.php')">
						
						<div class="uni-tabbar__bd" style="height: 60px;">
							<div class="uni-tabbar__icon" style="width: 24px; height: 24px;">
								<img src="./static/image/tab-bar/my.png">
							</div>
							<div class="uni-tabbar__label" style="color: rgb(153, 153, 153); font-size: 10px; line-height: normal; margin-top: 3px;"> User Center </div>
							
						</div>
					</div>
				</div>
			</uni-tabbar>
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
</script>
</body></html>