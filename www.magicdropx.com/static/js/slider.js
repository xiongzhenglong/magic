var sliderContainer=document.getElementById('sliderItem');
var sliderItem= document.getElementById('sliderItem').getElementsByTagName('li');
var imglen=j=sliderItem.length;
var posEm=document.getElementById('slideNav').getElementsByTagName('em');
var slideMotion,deltaoffset,startx,nowx,distance;
var ifmove=false;
var nowImg=0,distance=0;
var slidetime=0;
var moveDist=document.body.clientWidth;

var mdown=function(event){
	//alert(nowImg)
	  clearInterval(slideMotion);
	  //event.preventDefault();
	  var touch=event.touches[0];
	  startx=touch.pageX;
	  ifmove=true;
	  deltaoffset=sliderContainer.offsetLeft;
	}
var mmove=function(event){
	 event.preventDefault();
	 if(ifmove){
		 var touch=event.touches[0];
		 nowx=touch.pageX;
	     distance=nowx-startx;
		 sliderContainer.style.MozTransitionDuration = sliderContainer.style.webkitTransitionDuration =sliderContainer.style.TransitionDuration = '0ms';
		 sliderContainer.style.MozTransform = sliderContainer.style.webkitTransform = sliderContainer.style.Transform = 'translate3d(' + (- nowImg * moveDist+distance) + 'px,0,0)';
		 }
	}
var mup=function(event){
	 //event.preventDefault();
	 ifmove=false;
	 if(distance>60){ 
		   nowImg= nowImg-- > 0?nowImg:0;
		   SlideImg(nowImg, imglen);
	  }
	 else if(distance<-60){
		   nowImg=nowImg++<imglen-1?nowImg:0;
		   SlideImg(nowImg, imglen);
	 }
	 else{
		  //nowImg=nowImg-- > 0?nowImg:0;
		  
		  //alert(slidetime);
		  sliderContainer.style.MozTransitionDuration = sliderContainer.style.webkitTransitionDuration =sliderContainer.style.TransitionDuration = '50ms';
		  
		  sliderContainer.style.MozTransform = sliderContainer.style.webkitTransform = sliderContainer.style.Transform = 'translate3d(' + (- nowImg* moveDist) + 'px,0,0)';  

		 }
	 
	 slideMotion=setInterval(function(){SlideImg(nowImg=nowImg++<imglen-1?nowImg:0 , imglen);},5000);
	 
	}

var SlideImg=function(curImg,imgNum){
		for(k=0;k<imgNum;k++){
			sliderItem[k].style.display='block';
			posEm[k].className=' ';
			}
		posEm[curImg].className='on';		
		sliderContainer.style.MozTransitionDuration = sliderContainer.style.webkitTransitionDuration =sliderContainer.style.TransitionDuration = '500ms';
		sliderContainer.style.MozTransform = sliderContainer.style.webkitTransform = sliderContainer.style.Transform = 'translate3d(' + (- curImg * moveDist) + 'px,0,0)';
		distance=0;
		//slidetime=slidetime++ <= imglen ? slidetime:0;
	}

