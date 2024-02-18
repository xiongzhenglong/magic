<?php
include "cfg/config.php";
if($uid==""){
	echo "<script>location.href='login.html';</script>";
    exit;
}
//$uid=1;
$bid=myTrim($_REQUEST['gid']);
$oid=myTrim($_REQUEST['o']);
//$box=getblindbox($db,$bid);
$od=runsql($db,"select * from hm_order where blindbox_id='$bid' and user_id='$uid' and id='$oid' order by id desc limit 1");//订单信息

if(!$od){
	echo '订单不存在';
	exit;
}
$box=runsqld($db,"select * from hm_blindbox_detail where blindbox_id='$bid' order by id asc");//盲盒里的商品
$jp=runsqld($db,"select * from hm_order_record_detail where order_id='$oid' and user_id='$uid' order by id asc");
$box_lx=runsqld($db,"select * from hm_blindbox_tag order by id asc");

//print_r($box[0]);
?>
<html lang="zh-CN" style="--status-bar-height:0px; --top-window-height:0px; --window-left:0px; --window-right:0px; --window-margin:0px; --window-top:calc(var(--top-window-height) + 0px); --window-bottom:0px;"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<script>
var list='<?php echo json_encode($box);?>';
var jp=JSON.parse('<?php echo json_encode($jp);?>');
var splx=JSON.parse('<?php echo json_encode($box_lx);?>');
jisuan(list,jp[0]['goods_id']);
//alert(window.screen.width);
</script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}
.u-line-1{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:1;-webkit-box-orient:vertical!important}.u-line-2{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:2;-webkit-box-orient:vertical!important}.u-line-3{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:3;-webkit-box-orient:vertical!important}.u-line-4{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:4;-webkit-box-orient:vertical!important}.u-line-5{display:-webkit-box!important;overflow:hidden;text-overflow:ellipsis;word-break:break-all;-webkit-line-clamp:5;-webkit-box-orient:vertical!important}.u-border{border-width:.5px!important;border-color:#dadbde!important;border-style:solid}.u-border-top{border-top-width:.5px!important;border-color:#dadbde!important;border-top-style:solid}.u-border-left{border-left-width:.5px!important;border-color:#dadbde!important;border-left-style:solid}.u-border-right{border-right-width:.5px!important;border-color:#dadbde!important;border-right-style:solid}.u-border-bottom{border-bottom-width:.5px!important;border-color:#dadbde!important;border-bottom-style:solid}.u-border-top-bottom{border-top-width:.5px!important;border-bottom-width:.5px!important;border-color:#dadbde!important;border-top-style:solid;border-bottom-style:solid}.u-reset-button{padding:0;background-color:initial;font-size:inherit;line-height:inherit;color:inherit}.u-reset-button::after{border:none}.u-hover-class{opacity:.7}.u-primary-light{color:#ecf5ff}.u-warning-light{color:#fdf6ec}.u-success-light{color:#f5fff0}.u-error-light{color:#fef0f0}.u-info-light{color:#f4f4f5}.u-primary-light-bg{background-color:#ecf5ff}.u-warning-light-bg{background-color:#fdf6ec}.u-success-light-bg{background-color:#f5fff0}.u-error-light-bg{background-color:#fef0f0}.u-info-light-bg{background-color:#f4f4f5}.u-primary-dark{color:#398ade}.u-warning-dark{color:#f1a532}.u-success-dark{color:#53c21d}.u-error-dark{color:#e45656}.u-info-dark{color:#767a82}.u-primary-dark-bg{background-color:#398ade}.u-warning-dark-bg{background-color:#f1a532}.u-success-dark-bg{background-color:#53c21d}.u-error-dark-bg{background-color:#e45656}.u-info-dark-bg{background-color:#767a82}.u-primary-disabled{color:#9acafc}.u-warning-disabled{color:#f9d39b}.u-success-disabled{color:#a9e08f}.u-error-disabled{color:#f7b2b2}.u-info-disabled{color:#c4c6c9}.u-primary{color:#3c9cff}.u-warning{color:#f9ae3d}.u-success{color:#5ac725}.u-error{color:#f56c6c}.u-info{color:#909399}.u-primary-bg{background-color:#3c9cff}.u-warning-bg{background-color:#f9ae3d}.u-success-bg{background-color:#5ac725}.u-error-bg{background-color:#f56c6c}.u-info-bg{background-color:#909399}.u-main-color{color:#303133}.u-content-color{color:#606266}.u-tips-color{color:#909193}.u-light-color{color:#c0c4cc}.u-safe-area-inset-top{padding-top:0;padding-top:constant(safe-area-inset-top);padding-top:env(safe-area-inset-top)}.u-safe-area-inset-right{padding-right:0;padding-right:constant(safe-area-inset-right);padding-right:env(safe-area-inset-right)}.u-safe-area-inset-bottom{padding-bottom:0;padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.u-safe-area-inset-left{padding-left:0;padding-left:constant(safe-area-inset-left);padding-left:env(safe-area-inset-left)}uni-toast{z-index:10090}uni-toast .uni-toast{z-index:10090}::-webkit-scrollbar{display:none;width:0!important;height:0!important;-webkit-appearance:none;background:transparent}:not(not){box-sizing:border-box}</style><style type="text/css">@charset "UTF-8";
.main-center-flex{display:flex;align-items:center;justify-content:center}
.main-start-flex{display:flex;align-items:center;justify-content:flex-start}.main-align-start-flex{display:flex;align-items:flex-start;justify-content:center}.main-start-align-start-flex{display:flex;align-items:flex-start;justify-content:flex-start}.main-start-align-end-flex{display:flex;align-items:flex-end;justify-content:flex-start}.main-end-flex{display:flex;align-items:center;justify-content:flex-end}.main-space-between{display:flex;align-items:center;justify-content:space-between}.main-space-around{display:flex;align-items:center;justify-content:space-around}.main-center-align-end{display:flex;align-items:flex-end;justify-content:center}.column-start-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.column-end-flex{display:flex;flex-direction:column;align-items:center;justify-content:flex-end}.column-align-start-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:center}.column-align-end-flex{display:flex;flex-direction:column;align-items:flex-end;justify-content:center}.column-align-start-space-flex{display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between}.column-center-flex{display:flex;flex-direction:column;align-items:center;justify-content:center}.column-space-between{display:flex;flex-direction:column;align-items:center;justify-content:space-between}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.text-ellipsis_2{display:-webkit-box;overflow:hidden;
  /*! autoprefixer: off; */-webkit-box-orient:vertical;-webkit-line-clamp:2}.box-grow-0{
min-width:0;flex-grow:0;flex-shrink:0}.box-grow-1{
min-width:0;flex-grow:1;flex-shrink:1}.dir-left-nowrap{
display:flex;flex-direction:row;flex-wrap:nowrap}.clear-button::after{border:none}.clear-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;box-sizing:border-box;text-align:center;text-decoration:none;line-height:1.35;-webkit-tap-highlight-color:transparent;overflow:hidden;color:#000;background-color:#fff;width:100%;height:100%;border-radius:0}.wrap{width:100%;height:100%;background-size:100% 100%}.luckbox{width:100vw;height:100vh;overflow:hidden;background-size:100% 100%}.head{width:100%;text-align:center;background-position:50%;background-size:311px 46px;display:flex;justify-content:center}.head-image{background-size:100% 100%;text-align:center;color:#fff;font-size:49px;line-height:49px;font-family:BTH}.ranks{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;padding:0 11px;width:100%;height:58px}.ranks .list{width:51px;height:52px;border-radius:6px;opacity:1;border:1px solid #f7daff;position:relative;padding:5px;margin:5px}.ranks .list uni-image{width:100%;height:100%}.ranks .list uni-text{position:absolute;right:-3px;top:-17px;color:#f7daff;font-family:BTH;font-size:17px}.di{margin-top:55px}.di .stoppic{text-align:center;position:relative}.di .stoppic uni-image{width:331px}.di .stoppic uni-text{color:#fff;font-size:55px;font-family:myfont;position:absolute;left:126px;top:2px}.kai{padding:5px 11px;border-radius:8px;border:0.5px solid #fff;color:#fff;display:inline-block;margin-left:16px;font-size:16px}.item_contents{width:100%;height:372px;background-size:100% 100%;box-sizing:border-box;position:relative;overflow:hidden}.cons_title{font-size:32px;font-family:BTH;font-weight:400;color:#fff;text-align:center;height:55px;line-height:55px}.cons_list{display:inline-block;height:281px;box-sizing:border-box;padding-top:22px}.scroll_list{width:100%;height:100%}.top-rect{width:100%;display:flex;justify-content:center}.top{height:100%;border:10px solid transparent;border-bottom:12px solid #fff}.lists_cons{display:flex;align-items:center;flex-wrap:nowrap}.count-class{width:100%;height:50px;margin-top:20px;display:flex;justify-content:center;align-items:center}.count-class .count-view{width:140px;height:100%;text-align:center;font-size:26px;color:#fff;font-family:BTH;background:linear-gradient(260deg,rgba(162,39,244,.31),#bc58ff);border-radius:10px;opacity:1;border:1px solid #fff;display:flex;justify-content:center;align-items:center}.receive{border:1px solid #fff}.once-more{background:linear-gradient(90deg,#8f09e6,#b546ff)}.common{width:160px;height:55px;line-height:55px;color:#fbf8ff;font-size:15px;text-align:center}.detalis{width:170px;height:242px;margin-left:12px;display:flex;flex-direction:column;justify-content:center;position:relative;background-size:100% 100%!important;background-repeat:no-repeat;text-align:center}.detalis .tit{display:-webkit-box;text-overflow:ellipsis;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-top:5px;color:#fff;font-size:13px;padding:0 8px}.detalis .goods-type{width:100%;height:44px;padding:5px 11px;display:flex;justify-content:flex-end}.detalis .goods-title{width:72px;height:24px;background-size:100% 100%;font-size:22px;font-family:BTH;text-align:right;font-weight:400;color:#fff;line-height:23px}.detalis .goods-img{width:100%;padding:11px;height:132px;display:flex;justify-content:center;align-items:center;background-color:initial}.detalis .goods-img uni-image{width:110px;height:110px}.detalis .goods-detail{color:#242424;font-size:13px;width:100%;height:calc(100% - 44px - 132px);text-align:center;display:flex;flex-direction:column;justify-content:center;padding:0 13px}.detalis .goods-name{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;text-align:center;font-family:Source Han Sans CN;font-size:12px;font-family:PingFang SC-Regular,PingFang SC;color:#fff}.detalis .goods-price{color:#fff;margin-top:5px;font-size:20px;font-family:BTH;font-weight:400}.guarant-res{width:276px;height:331px;box-shadow:0 0 70px 0 #e779fc;background-color:rgba(124,78,255,.37);border-radius:10px;border:1px solid #f7cfff;display:flex;flex-direction:column;justify-content:center}.guarant-res .top-area{width:100%;height:44px;display:flex;justify-content:space-evenly;align-items:center}.guarant-res .star-class{width:9px;height:9px;background-color:hsla(0,0%,100%,.7);-webkit-clip-path:polygon(48% 0,58% 30%,98% 35%,58% 45%,49% 77%,38% 44%,2% 35%,38% 30%);clip-path:polygon(48% 0,58% 30%,98% 35%,58% 45%,49% 77%,38% 44%,2% 35%,38% 30%)}.guarant-res .guarant-title{font-family:BTH;font-size:22px;color:#fff}.guarant-res .res-area{width:100%;height:calc(100% - 44px)}.out-guarant_box{width:100vw;max-height:100vh;background-color:rgba(0,0,0,.5);display:flex;justify-content:center;align-items:center}.guarant_box{width:90vw;max-height:60vh;padding:5px 11px;background-size:100% 100%;-webkit-filter:drop-shadow(0 0 70px #e779fc);filter:drop-shadow(0 0 70px #e779fc)}.guarant_box .inner_box{width:100%;height:100%;display:flex;flex-direction:column;justify-content:center}.guarant_box .top-area{width:100%;height:44px}.guarant_box .star-class{width:9px;height:9px;background-color:hsla(0,0%,100%,.7);-webkit-clip-path:polygon(48% 0,58% 30%,98% 35%,58% 45%,49% 77%,38% 44%,2% 35%,38% 30%);clip-path:polygon(48% 0,58% 30%,98% 35%,58% 45%,49% 77%,38% 44%,2% 35%,38% 30%)}.guarant_box .guarant-title{width:121px;text-align:center;font-family:BTH;font-size:26px;color:#fff}.guarant_box .res-area{width:100%;height:calc(100% - 110px);margin-top:22px;overflow-y:auto;display:flex;justify-content:center;align-items:center;flex-wrap:wrap}.guarant_box .bottom-area{height:44px;text-align:center;line-height:33px;font-size:16px;color:#fff}.guarant_box .bottom-area div{padding:0 2px;font-size:26px;font-family:BTH}.guarant_box .normal{margin-bottom:11px;margin-right:11px;width:131px;height:182px;text-align:center;background-size:100% 100%!important}.guarant_box .normal .goods-img{width:100%;padding:11px;height:88px;display:flex;justify-content:center;align-items:center;background-color:initial}.guarant_box .normal .goods-img uni-image{width:77px;height:77px}.guarant_box .normal .goods-detail{width:100%;height:calc(100% - 38px - 88px);color:#242424;font-size:13px;text-align:center;display:flex;flex-direction:column;justify-content:center;padding:0 13px}.guarant_box .normal2{margin-bottom:11px;margin-right:11px;width:118px;height:163px;text-align:center;background-size:100% 100%!important}.guarant_box .normal2 .goods-img{width:100%;padding:11px;height:71px;display:flex;justify-content:center;align-items:center;background-color:initial}.guarant_box .normal2 .goods-img uni-image{width:60px;height:60px}.guarant_box .normal2 .goods-detail{width:100%;height:calc(100% - 38px - 71px);color:#242424;font-size:13px;text-align:center;display:flex;flex-direction:column;justify-content:center;padding:0 13px}.guarant_box .goods-type{width:100%;height:38px;padding:5px 11px;display:flex;justify-content:flex-end}.guarant_box .goods-title{width:72px;height:24px;background-size:100% 100%;font-size:25px;font-family:BTH;text-align:right;font-weight:400;color:#fff;line-height:26px}.guarant_box .goods-name{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;text-align:center;font-family:Source Han Sans CN;font-size:12px;font-family:PingFang SC-Regular,PingFang SC;color:#fff}.guarant_box .goods-price{color:#fff;margin-top:5px;font-size:20px;font-family:BTH;font-weight:400}.result{width:100vw;height:100vh;background-size:100% 100%}.result .rbox{position:relative;display:flex;justify-content:center;flex-direction:column;padding-top:99px;height:calc(100% - 66px)}.result .tit{position:relative;width:100%;height:55px;background-size:100% 100%;text-align:center;font-size:28px;font-family:BTH;font-weight:400;color:#fff;text-shadow:0 0 28px rgba(244,190,255,.72)}.result .tit .close-img{position:absolute;width:24px;height:24px;right:23px;top:5px}.result .goodsBox{display:flex;align-items:center;justify-content:center;width:100%;height:calc(100% - 22px);overflow-y:auto;padding:22px 0;box-sizing:border-box}.result .footer{width:100%;height:55px;margin-top:50px;display:flex;justify-content:space-around}.result .cbox{width:100%;display:flex;justify-content:center;align-items:center;flex-wrap:wrap}.result .cbox-1{height:100%}.result .cbox-3{height:394px}.result .cbox-5{height:369px}.result .cbox2{width:100%;height:100%}.result .cbox2-item{display:flex;justify-content:center;align-items:center}.result .cbox2-item2{display:flex;justify-content:center;align-items:center;flex-wrap:wrap}.result .normal{/* margin-bottom:11px;margin-right:11px; */width:131px;height:182px;text-align:center;background-size:100% 100%!important}.result .normal .goods-img{width:100%;padding:11px;height:88px;display:flex;justify-content:center;align-items:center;background-color:initial}.result .normal .goods-img uni-image{width:77px;height:77px}.result .normal .goods-detail{width:100%;height:calc(100% - 38px - 88px);color:#242424;font-size:13px;text-align:center;display:flex;flex-direction:column;justify-content:center;padding:0 13px}.result .normal2{margin-bottom:11px;margin-right:11px;width:118px;height:163px;text-align:center;background-size:100% 100%!important}.result .normal2 .goods-img{width:100%;padding:11px;height:71px;display:flex;justify-content:center;align-items:center;background-color:initial}.result .normal2 .goods-img uni-image{width:60px;height:60px}.result .normal2 .goods-detail{width:100%;height:calc(100% - 38px - 71px);color:#242424;font-size:13px;text-align:center;display:flex;flex-direction:column;justify-content:center;padding:0 13px}.result .guarant-log{width:35px;height:35px;background-size:100% 100%;display:flex}.result .guarant-log div{padding-left:2px;font-size:11px;font-family:PingFang SC-Semibold,PingFang SC;color:#fff}.result .empty-view{width:20%;height:100%}.result .goods-type{width:100%;height:38px;padding:1px 11px 5px 4px;display:flex;justify-content:space-between}.result .goods-title{width:72px;height:24px;margin-top:4px;background-size:100% 100%;font-size:24px;font-family:BTH;text-align:right;font-weight:400;color:#fff;line-height:26px}.result .goods-name{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;text-align:center;font-family:Source Han Sans CN;font-size:12px;font-family:PingFang SC-Regular,PingFang SC;color:#fff}.result .goods-price{color:#fff;margin-top:5px;font-size:20px;font-family:BTH;font-weight:400}.result .bottom{width:414px;font-family:myfont;text-align:center;position:absolute;left:0;bottom:22px}.result .bottom .btit{color:#fff;font-size:19px}.result .bottom .btn{padding:11px 33px;background-color:#fff;border-radius:11px;font-size:20px;display:inline-block;margin-top:11px}
/* ::-webkit-scrollbar {
	width: 0;
	height: 0;
	color: transparent;
} */.cons_list_mask{width:100%;height:365px;position:absolute;top:0;left:0;z-index:99999;background-color:transparent}</style>
</head>
<body>
<div class="wrap" style="background-image: url(&quot;static/image/goods/lottery-back2.png&quot;);">
<div class="luckbox">
<div class="head">
<div class="head-image" style="background-image: url(&quot;static/image/goods/reward-bg.png&quot;);">恭喜获得</div>
</div>
<div class="ranks">
<?php 
	for($i=1;$i<=$od['total_num'];$i++){
		echo '<div class="list" id="jp'.$i.'"><uni-text><span>'.$i.'</span></uni-text><uni-image><img id="jp'.$i.'img" src="https://cdn.kitego.cn/local/20230309/216fd40642a2a3a8d4ab4c3e9fccde49.png"></uni-image></div>';
	}
?>
</div>
<div class="cbox1" style="margin-top: 49px;">
<div class="item_contents" style="background-image: url(&quot;static/image/goods/goods-pool-back.png&quot;);">
<div class="cons_title">商品池</div>
<div class="cons_list">
<uni-scroll-view class="scroll_list">
<div class="uni-scroll-view"><div class="uni-scroll-view" style="overflow: auto hidden;">
<div class="uni-scroll-view-content">
<div id="lists_cons" class="lists_cons" style="transform: translateX(0px); transition: all 5s ease-in-out 0s;">

<!-- <div class="detalis" style="background-image: url(&quot;https://pro.hashmart.com.cn/static/images/goods/rare.png&quot;);"><div class="goods-type"><div class="goods-title" style="background-image: url(&quot;https://pro.hashmart.com.cn/static/images/goods/rare-icon.png&quot;);">稀有款</div>
</div>
<div class="goods-img"><uni-image><div style="background-image: url(&quot;https://cdn.kitego.cn/local/20230309/3b9847caac01bdec0a751c57a3bcf64e.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="https://cdn.kitego.cn/local/20230309/3b9847caac01bdec0a751c57a3bcf64e.png" draggable="false"></uni-image></div>
<div class="goods-detail"><div class="goods-name">荣耀X40 GT 8GB+256GB 竞速黑 双卡 全网通版 骁龙888 144Hz高刷电竞屏 66W超级快充 满帧战神</div>
<div class="goods-price">￥13999</div>
</div>
</div> -->

</div>

</div>
</div>
</div>
</uni-scroll-view></div>
<div class="top-rect"><div class="top"></div>
</div>
</div>
</div>
<div class="count-class"><div class="count-view"><uni-text><span id="djs">0停止滚动</span></uni-text></div>
</div>
<div class="kai">一键开启</div>
</div>
<div data-v-30282a05="" class="u-popup"></div>

<div class="uni-popup center" style="display: ;" id="zjk">
<div>
<div class="" name="mask" style="opacity: 1; position: fixed; inset: 0px; background-color: rgba(0, 0, 0, 0.4); transition: opacity 300ms ease 0ms, -webkit-transform 300ms ease 0ms, transform 300ms ease 0ms; transform-origin: 50% 50%;"></div>
<div id="zjknr" class="" name="content" style="transform: scale(0); opacity: 1; position: fixed; display: flex; flex-direction: column; inset: 0px; justify-content: center; align-items: center; transition: opacity 300ms ease 0ms, -webkit-transform 300ms ease 0ms, transform 300ms ease 0ms; transform-origin: 50% 50%;top:0px"><div class="uni-popup__wrapper center" style="background-color: transparent;"><div class="result" style="background-image: url(&quot;static/image/goods/result-back.png&quot;);"><div class="rbox"><div class="tit" style="background-image: url(&quot;static/image/goods/result-title.png&quot;);">恭喜获得<uni-image class="close-img" onclick="gourl('./')"><div style="background-image: url(&quot;static/image/goods/share-close.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<img src="static/image/goods/share-close.png" draggable="false"></uni-image></div>
<div class="goodsBox"><div class="cbox cbox-1">
<?php
for($i=0;$i<count($jp);$i++){
	$lxname=getlxname($box_lx,$jp[$i]['tag_id']);
	$lximg=getlximg($jp[$i]['tag_id']);
	echo '<div class="normal" style="background-image: url(&quot;static/image/goods/'.$lximg.'.png&quot;);margin: 5px;"><div class="goods-type"><div class="empty-view"></div>
<div class="goods-title" style="background-image: url(&quot;static/image/goods/'.$lximg.'-icon.png&quot;);">'.$lxname.'</div>
</div>
<div class="goods-img"><uni-image><img src="'.$jp[$i]['goods_image'].'" draggable="false" style="opacity:1"></uni-image></div>
<div class="goods-detail"><div class="goods-name">'.$jp[$i]['goods_name'].'</div>
<div class="goods-price">￥'.$jp[$i]['goods_price'].'</div>
</div>
</div>';
}

?>
<!-- <div class="normal" style="background-image: url(&quot;static/image/goods/normal.png&quot;);"><div class="goods-type"><div class="empty-view"></div>
<div class="goods-title" style="background-image: url(&quot;static/image/goods/normal-icon.png&quot;);">普通款</div>
</div>
<div class="goods-img"><uni-image><div style="background-image: url(&quot;https://cdn.kitego.cn/local/20230309/216fd40642a2a3a8d4ab4c3e9fccde49.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
<img src="https://cdn.kitego.cn/local/20230309/216fd40642a2a3a8d4ab4c3e9fccde49.png" draggable="false"></uni-image></div>
<div class="goods-detail"><div class="goods-name">HobbyBox 漫威正版授权 美国队长 无线蓝牙音响</div>
<div class="goods-price">￥60</div>
</div>
</div> -->

</div>
</div>
<div class="footer"><div class="receive common" onclick="gourl('warehouse.php')">去仓库查收</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</body>
<script>
//csgo();
</script>
</html>