<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
$gid=myTrim($_REQUEST['gid']);
$it=runsqld($db,"select * from hm_goods where cate_id='$gid' order by id asc");
$xx=runsql($db,"select * from hm_goods_cate where id='$gid' order by id asc");

//print_r($it);
?>
<html lang="zh-CN" style="--status-bar-height:0px; --top-window-height:0px; --window-left:0px; --window-right:0px; --window-margin:0px; --window-top:calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom:0px;"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $xx['name']?></title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/swiper.min.js?v=2030"></script>
		<script src="./static/js/cmd.js?v=2030"></script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">
@charset "UTF-8";
:not(not){box-sizing:border-box}
.container{width:100%;padding:10px;display:flex;flex-wrap:wrap;justify-content:space-between;align-content:flex-start}
.goods-item{width:49%;height:300px;background:#fff;
margin-top:5px}.goods-item-image{width:100%;height:184px}.goods-type{width:51px;position:relative;top:-182px;font-size:11px;/* background: linear-gradient(-72deg, transparent 9px, #EB5C4A 0); */color:#fff;border-radius:0 0 55px 0;padding-left:4px}.goods-item-name{width:100%;height:44px;padding:0 11px;font-size:15px;font-family:Source Han Sans CN;font-weight:400;color:#333;margin:5px 0 0 0}.goods-item-price{display:flex;padding-left:11px;font-size:22px;font-family:Abel;font-weight:400;color:#ea6e7a}.goods-item-price uni-text:nth-child(2){font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#ea6e7a}.text-style{font-size:11px;font-family:Source Han Sans CN;font-weight:400;color:#999}.goods-item-rank{padding-left:11px}.market-price{font-size:22px;font-family:Abel;font-weight:400;color:#333;padding-left:11px}.market-price uni-text{font-size:14px;font-family:Source Han Sans CN;font-weight:400;color:#333}.market-hash-coin{padding-left:11px;font-size:15px;font-family:Abel;font-weight:400;color:#ec872e;display:flex;align-items:center;margin-top:5px}.market-hash-coin uni-text{font-size:11px}.money{font-size:13px!important}.money-num{font-size:14px!important}.goods-img{width:100%;height:100%}.container{width:100%;min-height:100vh;background:linear-gradient(90deg,#f2f0ff,#edebff,#f3f8ff)}.default{position:fixed;top:0;left:0}</style>
</head>
<body>
<uni-page-head>
<div class="uni-page-head" style="background-color: rgb(248, 248, 248); color: rgb(0, 0, 0);">
<div class="uni-page-head-hd">
				<div class="uni-page-head-btn" onclick="history.go(-1);"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
				<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
				<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> <?php echo $xx['name']?> </div>
				</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head>
<div class="container">
<div class="container" style="padding: 0px 0px 0px;">
<?php
for($i=0;$i<count($it);$i++){	
	echo '<div class="goods-item" onclick="gourl(&quot;goods.php?gid='.$it[$i]['id'].'&quot;)">
<div class="goods-item-image"><uni-image class="goods-img"><img src="'.$it[$i]['image'].'" draggable="false" style="opacity:1"></uni-image></div>
<div class="goods-item-name text-ellipsis_2">'.mb_substr($it[$i]['name'], 0, 24, 'utf-8').'</div>
<div class="market-price"><uni-text data-v-97c3fd1c=""><span>￥</span></uni-text>'.$it[$i]['price'].'</div>
<div class="market-hash-coin">'.$it[$i]['integral_price'].'<uni-text data-v-97c3fd1c=""><span>哈希币</span></uni-text></div>
</div>';
}

?>
				</div>
</div>
				</body></html>