<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>

		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
		<link rel="stylesheet" href="./static/index.css">
		<link rel="stylesheet" href="./static/cssa.css">
		<script src="./static/js/jquery-1.7.2.js?v=2030"></script>
		<script src="./static/js/cmd.js?v=2030"></script>
		<script>
function preloadImage(url) {
    var img = new Image(); // 创建新的 <img> 对象
    img.style.display = 'none'; // 设置 display 为 none，确保图片不会被显示出来
    img.onload = function() {
        console.log('Image successfully loaded');
    };
    img.onerror = function() {
        console.log('Unable to load image');
    };
    img.src = url; // 设置图片地址
}

preloadImage('static/image/goods/result-back.png');
</script>
	</head>
	<body class="uni-body plugins-result-box-index">
		<div class="div--maxwidth">
			<div>
				<div-wrapper>
					<div-body>
						<div class="wrap" style="background-image: url(&quot;static/image/goods/lottery-back2.png&quot;);">
							<div class="luckbox">
								<div class="head">
									<div class="head-image" style="background-image: url(&quot;static/image/goods/reward-bg.png&quot;);">Congratulations on obtaining</div>
								</div>
								<!---->
								<div class="cbox1" style="margin-top: 45px;">
									<div class="item_contents" style="background-image: url(&quot;static/image/goods/goods-pool-back.png&quot;);">
										<div class="cons_title">Product Pool</div>
										<div class="cons_list">
											<div class="scroll_list">
												<div class="div">
													<div class="div" style="overflow: auto hidden;">
														<div class="div-content">
															<!---->
															<div id="lists_cons" class="lists_cons" style="transform: translateX(0px); transition: all 5s ease-in-out 0s;">
																
																
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="top-rect">
											<div class="top"></div>
										</div>
									</div>
								</div>
								<div class="count-class">
									<div class="count-view">
										<uni-text>
											<span id="djs">5 Stop scrolling</span>
										</uni-text>
									</div>
								</div>
								<div class="kai" style="display: none;">One-click Start</div>
							</div>
							<div class="u-popup">
							</div>
						</div>
					</div-body>
				</div-wrapper>
			</div>
		</div>
		
		
<div class="uni-popup center" id="zjk" style="display: ;">
<div>
<div class="" name="mask" style="opacity: 1; position: fixed; inset: 0px; background-color: rgba(0, 0, 0, 0.4); transition: opacity 300ms ease 0ms, -webkit-transform 300ms ease 0ms, transform 300ms ease 0ms; transform-origin: 50% 50%;display:none"></div>
<div id="zjknr" class="" name="content" style="transform: scale(0);opacity: 1;position: fixed;display: flex;flex-direction: column;justify-content: center;align-items: center;transition: opacity 300ms ease 0ms, -webkit-transform 300ms ease 0ms, transform 300ms ease 0ms;transform-origin: 50% 50%;top:0px">
<div class="uni-popup__wrapper center" style="background-color: transparent;">
<div class="result" style="background-image: url(&quot;static/image/goods/result-back.png&quot;);">
<div class="rbox">
<div class="tit" style="background-image: url(&quot;static/image/goods/result-title.png&quot;);">Congratulations you got<uni-image class="close-img"  onclick="gourl('./')">
<div style="background-image: url(&quot;static/image/goods/share-close.png&quot;); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
<!----><img src="static/image/goods/share-close.png" draggable="false"></uni-image></div>
<div class="goodsBox">
<div class="cbox cbox-1" id="jpk">

</div>
</div>
<div class="footer"><!---->
<div class="once-more common" onclick="gourl('./')">Play again</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!----></div>
<script>
yssjsc();
yscsgo();
</script>
	</body>
</html>