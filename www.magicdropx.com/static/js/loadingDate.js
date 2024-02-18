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
		canScroll=false;
		setTimeout(function(){	
			getcku();//追加数据
			},1000);
	   }
　　}
	}
	

	
	
	
	
/* var tabList=document.getElementById("tabList");
var canScroll=true;
window.onscroll = function(e) {
	getcku(1);
	loadingData("theList");
    };
     */