<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.qrcode.min.js"></script>
<input id="myurl" name="myurl" readonly="readonly" style="width:400px" type="hidden" value="<?echo 'http://'.$_SERVER['HTTP_HOST'].'?'.$name;?>" />
<div id="output"></div>
<img id="output1" src="">
<script type="text/javascript">
jQuery(function(){
	var url=$("#myurl").val();
	jQuery('#output').qrcode(url);
	//$('#output').text($('#output').find('canvas')[0].toDataURL("image/png"));
	//$('#output1').src = $('#output').find('canvas')[0].toDataURL("image/png");
	$("#output1").attr('src',$('#output').find('canvas')[0].toDataURL("image/png")); 
});
</script>