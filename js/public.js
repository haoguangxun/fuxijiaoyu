$(function(){
		/*搜索*/
		$('.header .function .seach').click(function(){
			$('.seach-main').show();
		});
		$('.sea_close').click(function(){
			$('.seach-main').hide();
		});
		/*返回顶部*/
		$('.returnTop').click(function(){
			$('body,html').animate({scrollTop:0},300);
		});
		//pc导航
		$(window).scroll(function(){
			if($(document).scrollTop()>170){
				$('.topNav').stop().fadeIn(200);
			}else{
				$('.topNav').stop().fadeOut(200);
			}
		});
		/*微信*/
		$('.right-fdd2 li:eq(2)').click(function(){
			$('.weixin-content').show();
			 event.stopPropagation();
		});
		$(document).click(function(){
			$('.weixin-content').hide();
		});
		/*手机端导航*/
		var navFlag = true;
	    $('.ghh').click(function(){
	        if(navFlag){
	            $(this).find('.gh').addClass('selected');
	            $('.gb_bg').fadeIn(200);
	            navFlag=false;
	        }else{
	            $(this).find('.gh').removeClass('selected');
	            $('.gb_bg').fadeOut(200);
	            navFlag=true;
	        }
	    });
	    /*动态加导航样式*/
	   var myNav = document.getElementById("nav").getElementsByTagName("a");
		for(var i=0;i<myNav.length;i++){
		    var links = myNav[i].getAttribute("href");
		    var myURL = document.location.href;
		    if(myURL.indexOf(links) != -1){
		        myNav[i].className="active";
		    }
		}
})
