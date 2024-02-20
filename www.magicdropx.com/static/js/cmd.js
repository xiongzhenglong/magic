function checklogin(){
	if(document.getElementById("tel1").value=="") {
		document.getElementById("msg1").innerHTML="Username cannot be empty, please re-enter";
		document.getElementById("tel1").focus();
		return false;
	}
	if(document.getElementById("pwd1").value=="")
	{
		document.getElementById("msg1").innerHTML="Password cannot be empty, please re-enter";
		document.getElementById("pwd1").focus();
		return false;
	}
	document.getElementById("msg1").innerHTML="";
	loginpost();
}
function checkloginreg(){
	if(document.getElementById("tel2").value=="") {
		document.getElementById("msg2").innerHTML="Username cannot be empty, please re-enter";
		document.getElementById("tel2").focus();
		return false;
	}
	if(document.getElementById("pwd2").value=="")
	{
		document.getElementById("msg2").innerHTML="Password cannot be empty, please re-enter";
		document.getElementById("pwd2").focus();
		return false;
	}
	document.getElementById("msg2").innerHTML="";
	loginpost2();
}
function loginpost2(){
	var username=document.getElementById("tel2").value;
	var password=document.getElementById("pwd2").value;
	$('#msg').text("Logging in, please wait..");
		$.post("llrj/c_login.php",{username:username,password:password},function(data){
			//alert(data);
			if(data==1){
				$('#msg2').text("Login successful, entering the system..");
				window.setTimeout(show,1000);
			}else{
				$('#msg2').text(data);
			}
			//alert(data);
		},
		"text");//这里返回的类型有：json,html,xml,text
}
function loginpost(){
	var username=document.getElementById("tel1").value;
	var password=document.getElementById("pwd1").value;
	$('#msg').text("Logging in, please wait..");
		$.post("llrj/c_login.php",{username:username,password:password},function(data){
			//alert(data);
			if(data==1){
				$('#msg1').text("Login successful, entering the system..");
				window.setTimeout(show,1000);
			}else{
				$('#msg1').text(data);
			}
			//alert(data);
		},
		"text");//这里返回的类型有：json,html,xml,text
}
function reg(){
	if(document.getElementById("tel2").value=="") {
		document.getElementById("msg2").innerHTML="Phone cannot be empty";
		document.getElementById("tel2").focus();
		return false;
	}
	if(document.getElementById("code2").value=="")
	{
		document.getElementById("msg2").innerHTML="verification code cannot be empty";
		document.getElementById("code2").focus();
		return false;
	}
	if(document.getElementById("pwd2").value=="")
	{
		document.getElementById("msg2").innerHTML="Password cannot be empty";
		document.getElementById("pwd2").focus();
		return false;
	}
	document.getElementById("msg2").innerHTML="";
	var qy=document.getElementById("qy").value;
	var username=document.getElementById("tel2").value;
	var code=document.getElementById("code2").value;
	var password=document.getElementById("pwd2").value;
	
	$.post("llrj/c_reg.php",{username:username,password:password,code:code},function(data){
			//alert(data);
			if(data==1){
				$('#msg2').text("Registration successful");
				window.setTimeout(show,1000);
			}else{
				$('#msg2').text(data);
			}
			//alert(data);
		},
		"text");//这里返回的类型有：json,html,xml,text
	
}
function sendsms(){
	if(document.getElementById("tel2").value==""){
		document.getElementById("msg2").innerHTML="Phone cannot be empty";
		document.getElementById("tel2").focus();
		return false;
	}
	
	var qy=document.getElementById("qy").value;
	var username=document.getElementById("tel2").value;
	var code=document.getElementById("code2").value;
	$.post("llrj/sms.php",{username:username,code:code,qy:qy},function(data){
		if(data==1){
			$('#msg2').text("Registration successful");
			window.setTimeout(show,1000);
		}else{
			$('#msg2').text(data);
		}
		//alert(data);
	},"text");//这里返回的类型有：json,html,xml,text
}
function show(){
	location.href='index.php';
}
function start(link,gid){
	$.post("user/login_cl.php",{gid:gid},function(data){
		//window.location.href = link;
		window.location.href = "./GameLogin.php?gid="+gid;
	},"text");
}
function gourl(url){
	location.href=url;
}


//* 取窗口滚动条高度 
function getScrollTop(){
　　var scrollTop = 0, bodyScrollTop = 0, documentScrollTop = 0;
　　if(document.body){
　　　　bodyScrollTop = document.body.scrollTop;
　　}
　　if(document.documentElement){
　　　　documentScrollTop = document.documentElement.scrollTop;
　　}
　　scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;
　　return scrollTop;
}
//文档的总高度
function getScrollHeight(){
　　var scrollHeight = 0, bodyScrollHeight = 0, documentScrollHeight = 0;
　　if(document.body){
　　　　bodyScrollHeight = document.body.scrollHeight;
　　}
　　if(document.documentElement){
　　　　documentScrollHeight = document.documentElement.scrollHeight;
　　}
　　scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
　　return scrollHeight;
}
//取窗口可视范围的高度 
function getWindowHeight(){
　　var windowHeight = 0;
　　if(document.compatMode == "CSS1Compat"){
　　　　windowHeight = document.documentElement.clientHeight;
　　}else{
　　　　windowHeight = document.body.clientHeight;
　　}
　　return windowHeight;
}
function loadingData(obj){
	prodlist= document.getElementById(obj);
	if(getScrollTop() + getWindowHeight() == getScrollHeight() ){
	   if(canScroll){
		var loadingitem=document.getElementById("loading");
		loadingStr='<div class="spinner"></div>';
		loadingitem.innerHTML=loadingStr;
		setTimeout(function(){
			if(canScroll==true){
				canScroll=false;
				getcanku();//追加数据
			}
		},100);
	   }
　　}
}
var ckxx='';
function getcanku(){
	var loadingitem = document.getElementById("loading");
	var page = $("#hiddenPage").val();
	var lx = $("#lx").val();
	$.post("llrj/getcanku.php",{lx:lx,page:page},function(msg){
		//console.log(msg);
		if(msg!=""){
			ckxx=msg;
            var html = "";
            var Cont = document.getElementById("theList");
			for(var i=0;i<msg.length;i++){
				if(lx==1){
					html+='<div class="list-item-container"><div class="tipInfo">ID:'+msg[i]['id']+'</div><div class="list-item"><div class="list-item-image main-center-flex"><div class="u-transition u-fade-enter-to u-fade-enter-active"><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+msg[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="list-item-info"><div class="list-item-info-name text-ellipsis_2">'+msg[i]['goods_name']+'</div><div class="list-item_0">Can be decomposed into<uni-text><span>'+msg[i]['recovery_price']+'</span></uni-text>Hash coins</div><div class="list-item-style" style="margin-top: 13px;">Purchase time：'+msg[i]['create_time']+'</div><div class="status-box"></div></div></div><div class="list-operation"><div class="main-center-flex" onclick="ycfj('+i+')">Decompose</div><div class="main-center-flex" onclick="gourl(&quot;tihuo.php?gid='+msg[i]['id']+'&quot;)">Pick up</div></div></div>';
				}
				if(lx==2){					
					html+='<div class="list-item-container"><div class="tipInfo">Order number:'+msg[i]['exchange_no']+'</div><div class="list-item"><div class="list-item-image main-center-flex"><div class="u-transition u-fade-enter-to u-fade-enter-active"><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+msg[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="list-item-info"><div class="list-item-info-name text-ellipsis_2">'+msg[i]['goods_name']+'</div><div class="list-item-style" style="margin-top: 13px;">Decomposition time：'+msg[i]['update_time']+'</div><div class="status-box"></div></div></div><div class="list-operation"><div class="main-center-flex">Completed</div></div></div>';
				}
				if(lx==3){
					html+='<div class="list-item-container"><div class="tipInfo">ID:'+msg[i]['deliver_no']+'</div><div class="list-item"><div class="list-item-image main-center-flex"><div class="u-transition u-fade-enter-to u-fade-enter-active" ><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+msg[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="list-item-info"><div class="list-item-info-name text-ellipsis_2">'+msg[i]['goods_name']+'</div><div class="list-item-style" style="margin-top: 13px;">Purchase time：'+msg[i]['update_time']+'</div><div class="opera-status">'+msg[i]['status']+'</div><div class="main-center-flex view-logistics"><div class="opera-change first-opera">View logistics</div><div class="opera-change">Confirm receipt</div></div></div></div></div>';
				}
				if(lx==0){
					html+='<div class="list-item-container"><div class="tipInfo">ID:'+msg[i]['id']+'</div><div class="list-item"><div class="list-item-image main-center-flex"><div class="u-transition u-fade-enter-to u-fade-enter-active"><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+msg[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="list-item-info"><div class="list-item-info-name text-ellipsis_2">'+msg[i]['goods_name']+'</div><div class="list-item_0">Can be decomposed into<uni-text><span>'+msg[i]['recovery_price']+'</span></uni-text>Hash coins</div><div class="main-center-flex opera-status">'+msg[i]['status']+'</div><div class="status-box"></div></div></div></div>';
				}
				if(lx==4){
					html+='<div class="list-item-container"><div class="tipInfo">Order number:'+msg[i]['order_no']+'</div><div class="list-item"><div class="list-item-image main-center-flex"><div class="u-transition u-fade-enter-to u-fade-enter-active"><div class="u-image" style="width: 88px; height: 88px; border-radius: 0px; overflow: visible; background-color: transparent;"><uni-image show-menu-by-longpress="true" class="u-image__image" style="border-radius: 0px; width: 88px; height: 88px;"><img src="'+msg[i]['goods_image']+'" draggable="false" style="opacity: 1;"></uni-image></div></div></div><div class="list-item-info"><div class="list-item-info-name text-ellipsis_2">'+msg[i]['goods_name']+'</div><div class="list-item-style" style="margin-top: 13px;">Purchase time：'+msg[i]['create_time']+'</div><div class="status-box"></div></div></div><div class="list-operation"><div class="main-center-flex">Completed</div></div></div>';
				}
				
			}
            Cont.innerHTML = Cont.innerHTML + html;
            $("#hiddenPage").val(parseInt($("#hiddenPage").val()) + 1);
			loadingitem.innerHTML = '';
        }else {
            loadingitem.innerHTML = '<div style="text-align: center;"><div><uni-text><span>No more items</span></uni-text></div></div>';
        }
		canScroll = true; 
	},"json");
}
function fenjie(i){
	$.post("llrj/getfenjie.php",{id:i},function(data){
		if(data.code==1){
			var html='<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);"></div><div style="z-index: 10075; position: fixed; display: flex; align-items: center; justify-content: center; inset: 0px;"><div><div class="container" data-v-5d12bc44=""><div data-v-5d12bc44="" class="main"><div data-v-5d12bc44="" class="close"></div><div data-v-5d12bc44="" class="body main-center-flex"><div data-v-5d12bc44="" class="content"><div data-v-5d12bc44="" class="title main-center-flex">Exchange Successful</div><div data-v-5d12bc44="" class="content-detail"><uni-text data-v-5d12bc44=""><span></span></uni-text></div><div data-v-5d12bc44="" class="button main-center-flex"><div data-v-5d12bc44="" class="button_1 main-center-flex" onclick="ycfj()">Confirm</div></div></div></div></div></div></div></div>';
			$("#fj").html(html);
			$("#hiddenPage").val("0");
			$("#theList").html("");
			getcanku();
			
		}else{
			msg(data.msg);
		}
	},"json");
}
function tihuo(i){
	$.post("llrj/gettihuo.php",{id:i},function(data){
		//console.log(data);
		if(data.code==1){
			var html='<div style="position: fixed; inset: 0px; z-index: 10070; background-color: rgba(0, 0, 0, 0.5);"></div><div style="z-index: 10075; position: fixed; display: flex; align-items: center; justify-content: center; inset: 0px;"><div><div class="container" data-v-5d12bc44=""><div data-v-5d12bc44="" class="main"><div data-v-5d12bc44="" class="close"></div><div data-v-5d12bc44="" class="body main-center-flex"><div data-v-5d12bc44="" class="content"><div data-v-5d12bc44="" class="title main-center-flex">Pick-up Successful, Shipping in Progress</div><div data-v-5d12bc44="" class="content-detail"><uni-text data-v-5d12bc44=""><span></span></uni-text></div><div data-v-5d12bc44="" class="button main-center-flex"><div data-v-5d12bc44="" class="button_1 main-center-flex" onclick="gourl(&quot;warehouse.php&quot;)">Confirm</div></div></div></div></div></div></div></div>';
			$("#fj").html(html);
			//$("#hiddenPage").val("0");
			//$("#theList").html("");
			//getcanku();
			
		}else{
			msg(data.msg);
		}
	},"json");
}


var mrhz='1';
function xzck(i){
	$('#hz'+mrhz).attr('class','sort-item main-center-flex');
	$('#hz'+i).attr('class','sort-item main-center-flex sort-item-active');
	mrhz=i;
	
	$("#hiddenPage").val("0");
	$("#lx").val(i);
	$("#theList").html("");
	getcanku();
}
var xsdx;
function rwus(){//任务上
	var moveDiv = $("#task");
	xsdx="task";
	var pyl=$("#taskn").height();
	var offset = moveDiv.offset();
	var top = offset.top-pyl; //上移50像素
	moveDiv.animate({top:top}, 300, function(){//完成动画后回调函数
		$("#mask").show();
	});
}
function phbs(){//排行榜上
	var moveDiv = $("#phblist");
	xsdx="phblist";
	var pyl=$("#phblistn").height();
	var offset = moveDiv.offset();
	//console.log(offset.top);
	var top = offset.top - pyl; //上移50像素
	moveDiv.animate({top:top}, 300, function(){//完成动画后回调函数
		$("#mask").show();
	});
}
function swxs(){
	var moveDiv = $("#swmb");
	xsdx="swmb";
	moveDiv.css({ visibility: 'visible' });
/* 	moveDiv.toggle(300,function(){//完成动画后回调函数
		$("#mask").show();
	}) */
/* 	var offset = moveDiv.offset();
	var top = offset.top - 1340; //上移50像素
	moveDiv.animate({top:top}, 300, ); */
}
function rwux(){//任务下
	var moveDiv = $("#"+xsdx);
	if(xsdx=="swmb"){
		//console.log(1);
		moveDiv.css({visibility: 'hidden' });
		$("#mask").hide();
		return;
	}

	
	var offset = moveDiv.offset();
	var top = window.innerHeight ; //下移50像素
	moveDiv.animate({top:top}, 300, function(){//完成动画后回调函数
		$("#mask").hide();
	});
}
function getRandomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

var t = 5;
var countdown;
function djsc(){
	t--;
	if (t == 0) {
		clearInterval(countdown);
		if (jcs < jp.length) {
			setTimeout(function(){
				//console.log(jp[jcs]['goods_id']);
				$("#jp"+(jcs+1)+"img").attr('src',jp[jcs]['goods_image']);
				$("#jp"+(jcs+1)+"img").css('opacity','1');
				$("#lists_cons").html("");
				$("#lists_cons").css('transition','');
				$("#lists_cons").css('transform','translateX(0px)');
				$("#lists_cons").css('margin-left','0px');
				setTimeout(function(){
					if (jcs < jp.length-1) {
						jcs++;
						jisuan(list,jp[jcs]['goods_id']);
						
					}else{
						setTimeout(function(){
							$("#zjk").show();
							$("#zjknr").css('transform','scale(1)');
						}, 100);
					}
				}, 100);
				
				//transition: all 5s ease-in-out 0s;
				//jisuan(list,jp[jcs]['goods_id']);
				//jcs++;

			}, 1500);
			
		}
		
	}
	
	
	
	
	$("#djs").text(t+"Stop Scrolling");
}



function daluan(a,b) {//打乱
    return Math.random()>.5 ? -1 : 1;
    //用Math.random()函数生成0~1之间的随机数与0.5比较，返回-1或1
}
function getspz(s,d){
	for(var i=0;i<s.length;i++){
		if(s[i]['goods_id']==d){
			return s[i];
		}
	}
}
var yxdsq;
var jcs=0;

function getlxname(sz,s){
	for(var i=0;i<sz.length;i++){
		if(sz[i]['id']==s){
			return sz[i]['name'];
		}
	}
}
function getlximg(id){
	if(id==4){
		return 'normal';
	}
	if(id==3){
		return 'legend';
	}
	if(id==2){
		return 'epic';
	}
	if(id==1){
		return 'rare';
	}
	if(id=="普通款"){
		return 'normal';
	}
	if(id=="传说款"){
		return 'legend';
	}
	if(id=="史诗款"){
		return 'epic';
	}
	if(id=="稀有款"){
		return 'rare';
	}
}




function jisuan(s,d){
	$("#lists_cons").css('transition','all 5s ease-in-out 0s');
	var data=JSON.parse(s);
	var sz=new Array();
	var j=0;
	var str='';
	for(var i=0;i<60;i++){
		j=i%data.length;
		sz.push(data[j]);
	}
	sz.sort(daluan);
	sz[55]=getspz(data,d);
	//console.log(sz[55]);
	for(var i=0;i<60;i++){
		str+='<div id="item'+i+'" class="detalis" style="background-image: url(&quot;static/image/goods/'+getlximg(sz[i]['tag_id'])+'.png&quot;);"><div class="goods-type"><div class="goods-title" style="background-image: url(&quot;static/image/goods/'+getlximg(sz[i]['tag_id'])+'-icon.png&quot;);">'+getlxname(splx,sz[i]['tag_id'])+'</div></div><div class="goods-img"><uni-image><div style="background-image: url(&quot;'+sz[i]['goods_image']+'&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div><img src="'+sz[i]['goods_image']+'" draggable="false"></uni-image></div><div class="goods-detail"><div class="goods-name">'+sz[i]['goods_name']+'</div><div class="goods-price">￥'+sz[i]['price']+'</div></div></div>';
	}
	setTimeout(function(){
		$("#lists_cons").html(str);
		t = 5;
		csgo();
	}, 1000);
	
	//console.log(str);
	//csgo();
}
function csgo(){
	//var sl=getRandomInteger(50,60);
	var py=window.screen.width/2;
	var jl=55*182-py+90;
	//console.log(sl);
	var moveDiv = $("#lists_cons");
	var offset = moveDiv.offset();
	//console.log(offset.left);
	var left = offset.left - jl; //上移50像素
	countdown = setInterval("djsc()",1000);
	moveDiv.animate({'margin-left':left},300,function(){//完成动画后回调函数
		//$("#mask").show();
		//console.log(23);
	});
}
function xsgm(){
	var moveDiv = $("#gmkn");
	xsdx="gmkn";
	var offset = moveDiv.offset();
	//console.log(offset.top);
	var top =window.innerHeight-291; //上移50像素
	//var top =offset.top+303; //上移50像素
	moveDiv.animate({top:top}, 300, function(){//完成动画后回调函数
		$("#mask").show();
	});
}

function editadd(){
	//var id=gid;
	if(document.getElementById("txt1").value.length < 1){
		$('#msg').text("Please enter the recipient's name");
		document.getElementById("txt1").focus();
		return false;
	}
	if(document.getElementById("txt2").value.length < 1){
		$('#msg').text("Please enter the phone number");
		document.getElementById("txt2").focus();
		return false;
	}
	if(document.getElementById("provice").value.length < 1){
		$('#msg').text("Select Region");
		document.getElementById("provice").focus();
		return false;
	}
	if(document.getElementById("city").value.length < 1){
		$('#msg').text("Select Region");
		document.getElementById("city").focus();
		return false;
	}
	if(document.getElementById("county").value.length < 1){
		$('#msg').text("Select Region");
		document.getElementById("county").focus();
		return false;
	}
	
	if(document.getElementById("txt4").value.length < 1){
		$('#msg').text("Please enter the detailed address");
		document.getElementById("txt4").focus();
		return false;
	}
	var s1=document.getElementById("txt1").value;
	var s2=document.getElementById("txt2").value;
	var s3=$("#provice Option:selected").text();
	var s4=$("#provice").val();
	var s5=$("#city Option:selected").text();
	var s6=$("#city").val();
	var s7=$("#county Option:selected").text();
	var s8=$("#county").val();
	var s9=document.getElementById("txt4").value;
	$.post("./llrj/address.php",{lx:'edit',gid:gid,s1:s1,s2:s2,s3:s3,s4:s4,s5:s5,s6:s6,s7:s7,s8:s8,s9:s9,flag:flag},function(data){
		if(data==1){
			$('#msg1').text("Modification Successful");
			window.setTimeout(gourl('?gid='+gid),0);
		}else{
			$('#msg').text(data);
		}
	},"text");//这里返回的类型有：json,html,xml,text
}
/** 
 * 设置select控件选中 
 * @param selectId select的id值 
 * @param checkValue 选中option的值  
*/  
function set_select_checked(selectId, checkValue){  
    var select = document.getElementById(selectId);  
 
    for (var i = 0; i < select.options.length; i++){  
        if (select.options[i].value == checkValue){  
            select.options[i].selected = true;  
            break;  
        }  
    }  
}
 
function getshen(v){
	$("#provice").html("");
	$.post("llrj/sql.php",{xzdj:1},function(data){
		
		var strs= new Array(); //定义一数组
		strs=data.split("|"); //字符分割
		//strs=unescape(data).split("|"); //字符分割
		document.getElementById("provice").add(new Option("Province",""));
		for (i=0;i<strs.length ;i+=2 )
		{
			if(strs[i]!=""){
			document.getElementById("provice").add(new Option(strs[i],strs[i+1]));
			}
		}
		set_select_checked('provice',v);
	},
	"text");//这里返回的类型有：json,html,xml,text
}
function getshi(v){
	fid=document.getElementById("provice").value;
	$("#city").html("");
	if(fid==0){
		return;
	}
	$.post("llrj/sql.php",{fid:fid},function(data){
		
		var strs= new Array(); //定义一数组
		strs=data.split("|"); //字符分割
		document.getElementById("city").add(new Option("City",""));
		for (i=0;i<strs.length ;i+=2 )
		{
			if(strs[i]!=""){
			document.getElementById("city").add(new Option(strs[i],strs[i+1]));
			}
		}
		set_select_checked('city',v);
	},
	"text");//这里返回的类型有：json,html,xml,text
//getdz();
}
function getqu(v){
	fid=document.getElementById("city").value;
	$("#county").html("");
	if(fid==0){
		return;
	}
	$.post("llrj/sql.php",{fid:fid,zid:1},function(data){
		
		var strs= new Array(); //定义一数组
		strs=data.split("|"); //字符分割
		document.getElementById("county").add(new Option("District",""));
		for (i=0;i<strs.length ;i+=2 )
		{
			if(strs[i]!=""){
			document.getElementById("county").add(new Option(strs[i],strs[i+1]));
			}
		}
		set_select_checked('county',v);
	},
	"text");//这里返回的类型有：json,html,xml,text
//getdz();
}
function getdz(){
	var id=document.addressform.provice.selectedIndex;
	var str;
	if(id>0){
		str=document.addressform.provice.options[id].text+" ";
		document.addressform.dz1.value=document.addressform.provice.options[id].text+" ";
	}
	id=document.addressform.city.selectedIndex;
	if(id>0){
		str=str+document.addressform.city.options[id].text+" ";
		document.addressform.dz2.value=document.addressform.city.options[id].text+" ";
	}
	id=document.addressform.county.selectedIndex;
	if(id>0){
		str=str+document.addressform.county.options[id].text+" ";
		document.addressform.dz3.value=document.addressform.county.options[id].text+" ";
	}
	//document.addressform.street.value=str;
}
function msg(s){
	$("#msgtxt").text(s);
	$("#msg").show();
	setTimeout(function(){
		$("#msgtxt").text("");
		$("#msg").hide();
	}, 1500);
}
function pay(){
	if(xy!=1){
		msg("Please read the user agreement");
		return false;
	}
	if(gid<=0){
		msg("Product error");
		return false;
	}
	$.post("llrj/pay.php",{gid:gid,zf:zf,sl:sl},function(data){
		if(data.code==1){
			gourl('plays.php?gid='+gid+"&o="+data.od);
		}else{
			msg(data.msg);
		}
		//console.log(data);
	},
	"json");//这里返回的类型有：json,html,xml,text
}
function pays(){
	if(zf==1){
		gourl('pay?amount='+je);
	}
	if(zf==2){
		sendpay1(je);
	}
}
function sendpay(s){
	$.post("pay",{amount:s},function(data){
		console.log(data);
	},
	"text");//这里返回的类型有：json,html,xml,text
}
function sendpay1(s){
	$.post("paypal",{amount:s},function(data){
		console.log(data);
	},
	"text");//这里返回的类型有：json,html,xml,text
}
function payw(){
	if(xy!=1){
		msg("Please read the user agreement");
		return false;
	}
	if(gid<=0){
		msg("Product error");
		return false;
	}
	$.post("llrj/pays.php",{gid:gid,zf:zf,sl:sl},function(data){
		//console.log(data);
		if(data.code==1){
			$("#dialog").show();
			//gourl('warehouse.php?c=2');
		}else{
			msg(data.msg);
		}
		//console.log(data);
	},
	"json");//这里返回的类型有：json,html,xml,text
}
//var yxxx= new Array(); //定义一数组 
//xx=msg.split("|"); //字符分割 


function ysdjsc(){//演示倒计时
	t--;
	if (t == 0) {
		clearInterval(countdown);
		setTimeout(function(){
			setTimeout(function(){
				$("#zjk").show();
				$("#zjknr").css({'transform':'scale(1)'});
			}, 500);
		}, 1500);
	}
	$("#djs").text(t+" Stop scrolling");
}
var yssjj=new Array(); //定义一数组
function yssjsc(){//演示数据
	var str='';
	yssjj =[['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'],
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'],
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'],
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'],
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'],
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'],
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'],
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'],
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'], 
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'], 
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'],
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'], 
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'], 
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'], 
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'],
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'], 
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'],
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'], 
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'], 
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206'],
			['普通款','local/20230309/ffe5c4469ad9d3a554ee1e0817f497e2.png','HobbyBox 漫威正版授权 钢铁侠 无线蓝牙音响','60'], 
			['史诗款','local/20230309/0e41aedb12f6fbdff0ee367468627071.png','米狗多功能眼部按摩仪MKG22','1399'], 
			['史诗款','local/20230309/33dc9e2da68e1b0b886ba29798861026.png','富士 instax立拍立得 数模一次成像相机 mini Liplay','1234'], 
			['传说款','local/20230309/179908900f204ba2748b3d0e91e7a187.png','小米 米家口袋照片打印机','349'], 
			['传说款','local/20230309/d1e160b3e8cd9e7ad58fd6d576c90820.png','任天堂 Switch Joy-Con 体感震动手柄 红蓝配色一对','450'], 
			['传说款','local/20230309/3a9973f5d025a650848dd59dfd8b7c7a.png','汉印 无线蓝牙 三英寸彩色照片打印机','499'],
			['普通款','local/20230309/9e2093dbadcdc3c3548c612c1122f80f.png','电动牙刷','99'],
			['普通款','local/20230309/df602202f493579c7cecaed41222b09f.png','颈椎按摩仪','199'],
			['稀有款','local/20230309/5f226cc7f88c51e6ee8b76e6d394d8fe.png','SONY 索尼PS5 PlayStation 5 光驱版双手柄套装','4206']];

	yssjj.sort(daluan);
	for(var i=0;i<yssjj.length;i++){
		str+='<div class="detalis" data="'+i+'" style="background-image: url(&quot;static/image/goods/'+getlximg(yssjj[i][0])+'.png&quot;);"><div class="goods-type"><div class="goods-title" style="background-image: url(&quot;static/image/goods/'+getlximg(yssjj[i][0])+'-icon.png&quot;);">'+yssjj[i][0]+'</div></div><div class="goods-img"><uni-image><img src="'+yssjj[i][1]+'" draggable="false" style="opacity: 1;"></uni-image></div><div class="goods-detail"><div class="goods-name">'+yssjj[i][2]+'</div><div class="goods-price">￥'+yssjj[i][3]+'</div></div></div>';
	}
	$("#lists_cons").html(str);
	//console.log(yssjj);
	
}
function yscsgo(){
	var py=window.screen.width/2;
	//console.log(py);
	var jl=(54)*159-py+80;
	var moveDiv = $("#lists_cons");
	var offset = moveDiv.offset();
	//console.log(offset.left);
	var left = offset.left - jl; //上移50像素
	countdown = setInterval("ysdjsc()",1000);
	
	var str='<div class="detalis" style="background-image: url(&quot;static/image/goods/'+getlximg(yssjj[54][0])+'.png&quot;);"><div class="goods-type"><div class="empty-view"></div><div class="goods-title" style="background-image: url(&quot;static/image/goods/'+getlximg(yssjj[54][0])+'-icon.png&quot;);">'+yssjj[54][0]+'</div></div><div class="goods-img"><uni-image><img src="'+yssjj[54][1]+'" draggable="false" style="opacity: 1;"></uni-image></div><div class="goods-detail"><div class="goods-name">'+yssjj[54][2]+'</div><div class="goods-price">￥'+yssjj[54][3]+'</div></div></div>';
			$("#jpk").html(str);
	
	moveDiv.animate({'margin-left':left},300,function(){//完成动画后回调函数
		//$("#mask").show();
		//console.log(23);
	});
}

function gettgjl(page){
	//var xssl=document.getElementById("xssl").value;
	$.post("llrj/gettgjl.php",{page:page},function(data){
		$('#xz2').html(data);
			//alert(data);
	},"html");//这里返回的类型有：json,html,xml,text
}
function gettgyh(page){
	$.post("llrj/gettgyh.php",{page:page},function(data){
		$('#xz3').html(data);
			//alert(data);
	},"html");//这里返回的类型有：json,html,xml,text
}