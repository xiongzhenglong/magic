<?php
include "cfg/config.php";
if($uid==""){
	mysqli_close($db);
	echo "<script>location.href='login.html';</script>";
    exit;
}
mysqli_close($db);
?>

<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Settings</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
<script src="./static/js/cmd.js?v=2030"></script>
<link rel="stylesheet" href="./static/index.css">
<style type="text/css">
@font-face{font-family:uicon-iconfont;src:url(https://at.alicdn.com/t/font_2225171_8kdcwk4po24.ttf) format("truetype")}
.u-icon__icon{font-family:uicon-iconfont;position:relative;display:flex;flex-direction:row;align-items:center}
.u-cell__body{display:flex;flex-direction:row;box-sizing:border-box;padding:10px 15px;font-size:15px;color:#303133;align-items:center}
.u-cell__body__content{display:flex;flex-direction:row;align-items:center;flex:1}
.container{min-height:100vh;background:#f3f3f3;padding:10px}.cell-slot{font-size:12px;font-family:Source Han Sans CN;font-weight:400;color:#999} .u-cell__body{min-height:52px!important}.cell-container{position:relative;width:100%}.line-container{position:absolute;bottom:0;width:100%;height:1px;padding:0 15px}.line{height:100%;width:100%;background:#f8f8f8}
.head-img{width:34px;height:34px}.list-content{background:#fff;padding:12px}.list-items{display:flex;justify-content:space-between;height:64px;line-height:64px;align-items:center;font-size:14px;color:#333;background:#fff;border-bottom:1px solid #f8f8f8}.list-items-last{display:flex;justify-content:space-between;height:64px;line-height:64px;align-items:center;font-size:14px;color:#333;background:#fff}.list-button{height:33px;width:115px;line-height:33px;background:#fff;
}
</style></head>
<body>
<uni-page-head>
<div class="uni-page-head" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);width: 100%;">
<div class="uni-page-head-hd" onclick="history.go(-1);">
<div class="uni-page-head-btn"><i class="uni-btn-icon" style="color: rgb(0, 0, 0); font-size: 27px;"></i></div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-page-head-bd">
<div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> Settings </div>
</div>
<div class="uni-page-head-ft"></div>
</div>
<div class="uni-placeholder"></div>
</uni-page-head>
<div class="container">
<div class="list-content">
<div>
<div class="list-items"><uni-text><span>Avatar</span></uni-text><uni-image class="head-img">
<img src="<?php echo $user['avatar']?>" draggable="false" style="opacity: 1;"></uni-image></div>
</div>
<div>
<div class="list-items"><uni-text><span>Nickname</span></uni-text><uni-text><span><?php echo $user['nickname']?></span></uni-text></div>
</div>
<div>
<div class="list-items"><uni-text><span>Mobile Number</span></uni-text>

<div class="uni-cover-view"><uni-text><span><?php echo $user['phone']?></span></uni-text></div>

</div>
</div>
<div>
<div class="list-items-last"><uni-text><span>User ID</span></uni-text><uni-text><span><?php echo $uid;?></span></uni-text></div>
</div>
<div>
<div class="list-items-last" onclick="gourl('llrj/login_out.php')"><uni-text><span>Log Out (Clear Local Cache)</span></uni-text></div>
</div>
</div>
<div class="u-cell-group ugroup" style="margin-top: 15px; background: rgb(255, 255, 255); font-size: 14px; font-family: &quot;Source Han Sans CN&quot;; font-weight: 400; color: rgb(51, 51, 51);">
<div class="u-cell-group__wrapper">
<div class="u-line" style="margin: 0px; border-bottom: 1px solid rgb(214, 215, 217); width: 100%; transform: scaleY(0.5); border-top-color: rgb(214, 215, 217); border-right-color: rgb(214, 215, 217); border-left-color: rgb(214, 215, 217);"></div>
<div class="cell-container">
<div class="u-cell">
<div class="u-cell__body">
<div class="u-cell__body__content">
<div class="u-cell__title"><uni-text class="u-cell__title-text"><span>User Agreement</span></uni-text></div>
</div>
<div class="cell-slot"></div>
<div class="u-cell__right-icon-wrap u-cell__right-icon-wrap--">
<div class="u-icon u-icon--right"><uni-text hover-class="" class="u-icon__icon uicon-arrow-right u-icon__icon--info" style="font-size: 16px; line-height: 16px; font-weight: normal; top: 0px;"><span></span></uni-text></div>
</div>
</div>
</div>
<div class="line-container">
<div class="line"></div>
</div>
</div>
<div class="cell-container">
<div class="u-cell">
<div class="u-cell__body">
<div class="u-cell__body__content">
<div class="u-cell__title"><uni-text class="u-cell__title-text"><span>Privacy Policy</span></uni-text></div>
</div>
<div class="cell-slot"></div>
<div class="u-cell__right-icon-wrap u-cell__right-icon-wrap--">
<div class="u-icon u-icon--right"><uni-text hover-class="" class="u-icon__icon uicon-arrow-right u-icon__icon--info" style="font-size: 16px; line-height: 16px; font-weight: normal; top: 0px;"><span></span></uni-text></div>
</div>
</div>
</div>
<div class="line-container">
<div class="line"></div>
</div>
</div>
</div>
</div>
<div class="u-popup"></div>
<div class="u-popup bg"></div>
</div>
</body></html>