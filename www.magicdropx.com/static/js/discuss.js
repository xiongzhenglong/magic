 window.onload=function()
	 {
	   //  var detailecommentitem=document.getElementById("detailecommentitem").getElementsByTagName("li");
	   //  var clickmore=document.getElementById("clickmore");
	   //  if(detailecommentitem.length<=3)
	   //  {
	   // 	 clickmore.style.display="none";
       //detailecommentitem.className="debom";
	   //  }
	   //  if(detailecommentitem.length>3)
	   //  {
	   // 	 clickmore.style.display="block";
	   //  for(var i=3;i<detailecommentitem.length;i++)
	   //   {
	   // 	 detailecommentitem[i].style.display="none";
	   //   }
	   //  }
	 }
	function repcancel()
	{
		var repbtn=document.getElementById("repbtn");
		repbtn.style.display="none";
	}
	function report()
	{
		var repbtn=document.getElementById("repbtn");
		repbtn.style.display="block";
	}
   function more(){
       if (aa.classList.contains("as")) {
           aa.className = "de";
           aa.style.display = "block";
         
           bb.className = "no";
           $("#more").html("收起");
       }
       else if (aa.classList.contains("de")) {
           aa.className = "as";
           aa.style.display = "none";
           
           bb.className = "";
           $("#more").html("更多");
       }
  }
	function morecomment()
	{
		var detailecommentitem=document.getElementById("detailecommentitem").getElementsByTagName("li");
		var clickmore=document.getElementById("clickmore");
		var clickless=document.getElementById("clickless");
		clickless.style.display="block";
		clickmore.style.display="none";
		for(var i=3;i<detailecommentitem.length;i++)
		 {
			 detailecommentitem[i].style.display="block";
		 }
	}
	function lesscomment()
	{
		var detailecommentitem=document.getElementById("detailecommentitem").getElementsByTagName("li");
		var clickmore=document.getElementById("clickmore");
		var clickless=document.getElementById("clickless");
		clickless.style.display="none";
		for(var i=3;i<detailecommentitem.length;i++)
		 {
			 detailecommentitem[i].style.display="none";
		 }
		clickmore.style.display="block";
	}
    function commount()
    {
     var publishbox=document.getElementById("publishbox");
     publishbox.style.display="block";
	  var tabframe= document.createElement("div");
      tabframe.id = "lockscreen";
      tabframe.name = "lockscreen";
      tabframe.style.top = '0px';
      tabframe.style.left = '0px';
      tabframe.style.height = '100%';
      tabframe.style.width = '100%';
      tabframe.style.position = "fixed";
      tabframe.style.opacity="0.1";
      tabframe.style.backgroundColor="#000000";
      tabframe.style.zIndex = "998";
      document.body.appendChild(tabframe);
      tabframe.style.display = "block";
    }
    function publish()
    {
      var publishbox=document.getElementById("publishbox");
      publishbox.style.display="block";
	  var tabframe= document.createElement("div");
      tabframe.id = "lockscreen";
      tabframe.name = "lockscreen";
      tabframe.style.top = '0px';
      tabframe.style.left = '0px';
      tabframe.style.height = '100%';
      tabframe.style.width = '100%';
      tabframe.style.position = "fixed";
      tabframe.style.opacity="0.2";
      tabframe.style.backgroundColor="#000000";
      tabframe.style.zIndex = "998";
      document.body.appendChild(tabframe);
      tabframe.style.display = "block";
	  
    }
   function publishcancel()
   {
     var publishbox=document.getElementById("publishbox");
     publishbox.style.display="none";
	 var tabframe=document.getElementById("lockscreen");
     tabframe.style.display = "none";
     document.body.removeChild(tabframe);
   }
  //  function more(){
	 // var text=document.getElementById("text");
	 // if(text.classList.contains("hidden")){
	 // text.className="open";
	 // text.style.overflow="auto";
	 // text.style.height="auto";
	 // text.style.padding="10px 10px 0px 10px";  
	 // text.style.fontSize="0.8em"; 
	 // text.style.lineHeight="20px";
	 // }
	 // else if(text.classList.contains("open")){
	 // text.className="hidden";

	 // text.style.overflow="hidden";
	 // text.style.padding="10px 10px 0px 10px";
	 // text.style.fontSize="0.8em";
	 // text.style.lineHeight="20px";
	 // }
   // }
   function get(){
     var get=document.getElementById("get");
	 var giftbtn=document.getElementById("giftbtn");
	 giftbtn.innerHTML="查看";
     get.style.display="block";
	 var tabframe= document.createElement("div");
      tabframe.id = "lockscreen";
      tabframe.name = "lockscreen";
      tabframe.style.top = '0px';
      tabframe.style.left = '0px';
      tabframe.style.height = '100%';
      tabframe.style.width = '100%';
      tabframe.style.position = "fixed";
      tabframe.style.opacity="0.2";
      tabframe.style.backgroundColor="#000000";
      tabframe.style.zIndex = "998";
      document.body.appendChild(tabframe);
      tabframe.style.display = "block";
    }
   function giftclose(){
     var get=document.getElementById("get");
     get.style.display="none";
	 var tabframe=document.getElementById("lockscreen");
tabframe.style.display = "none";
document.body.removeChild(tabframe);
   }
   function support()
   {
   }
   function gamecomment()
   {
     var gameinttext=document.getElementById("gameinttext");
     var gamecomment=document.getElementById("gamecomment");
     var detailbox=document.getElementById("detailbox");
     var gamecomtext=document.getElementById("gamecomtext");
     gamecomment.style.display="block";
     gameinttext.style.backgroundColor="#eee";
     gamecomtext.style.backgroundColor="#fff";
     detailbox.style.display="none";
   }
   function gameintroduce()
   {
     var gameinttext=document.getElementById("gameinttext");
     var gamecomment=document.getElementById("gamecomment");
     var detailbox=document.getElementById("detailbox");
     var gamecomtext=document.getElementById("gamecomtext");
     gamecomment.style.display="none";
     gameinttext.style.backgroundColor="#fff";
     gamecomtext.style.backgroundColor="#eee";
     detailbox.style.display="block";
   }