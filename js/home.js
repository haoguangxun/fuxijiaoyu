$(document).ready(function(){
	var banner = new Swiper('.swiper-container', {
	    autoplay: 4000,
	    speed:800,
	    autoplayDisableOnInteraction : false,
	    pagination : '.swiper-pagination',
	    paginationClickable :true,
	    lazyLoading : true,
		lazyLoadingInPrevNext : true,
		loop : true,
	});
	var teachers = new Swiper('.teachers-banner-container', {
	    speed:800,
	    pagination : '.swiper-pagination',
	    paginationClickable :true,
	});
	$('.teachers-banner li').hover(function(){
		$(this).find('.main').slideToggle(200);
	});
	$('#my-video').width(100+'%');
	var videoW = $('#my-video').width();
	$('#my-video,.video-more').height(videoW/2);
});
/*课程体系*/
$(function(){
	var num = 0;
	var showWidth = $('.course-main').width()/4;
	$('.course-main li').width(showWidth)
	var length = $('.course-main li').length;
	$('.course-main ul').width(length*showWidth); 
	$('.arrow-r').click(function(){
		if(!$('.course-main ul').is(':animated')){
			num++;
			if(num<=length-4){
			
				$('.course-main ul').animate({left:-showWidth*num},200);
			}else{
				num=length-4;
			}
		}
	});
	$('.arrow-l').click(function(){
		if(!$('.course-main ul').is(':animated')){
			num--;
			if(num>=0){
				$('.course-main ul').animate({left:-showWidth*num},200);
			}else{
				num=0;
			}
		}
	});
});
/*师资力量*/
$(function(){
	$('.teachers-banner ul').hide();
	$('.teachers-banner ul:first').show();
	var ulNum = $('.teachers-banner ul').length;
	for(var i=0;i<ulNum;i++){
		var span = document.createElement('span');
		$('.pagination').append(span);
	};
	$('.pagination span:first').addClass('active');
	$('.pagination span').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.teachers-banner ul').eq($(this).index()).fadeIn(200).siblings('.teachers-banner ul').fadeOut(200);
	})
});
/*学员*/
$(function(){
	var sNum = 0;
	var sLi = $('.grow-banner-scroll li').length;
	$('.grow-banner-scroll ul').width((sLi*100)+'%');
	$('.grow-banner-scroll li').width((100/sLi)+'%');
	$('.grow-banner-r').click(function(){
		if(!$('.grow-banner-scroll ul').is(':animated')){
			sNum++;
			if(sNum<=sLi-1){
				$('.grow-banner-scroll ul').animate({left:-sNum*100+'%'},200);
				$('.grow').eq(sNum).show().siblings('.grow').hide();
			}else{
				sNum=sLi-1;
			}
		}
	});
	$('.grow-banner-l').click(function(){
		if(!$('.grow-banner-scroll ul').is(':animated')){
			sNum--;
			if(sNum >=0){
				$('.grow-banner-scroll ul').animate({left:-sNum*100+'%'},200);
				$('.grow').eq(sNum).show().siblings('.grow').hide();
			}else{
				sNum=0;
			}
		}
	});
	var growHeight = $('.grow').outerHeight();
	$('.grow-scroll').height(growHeight);
	$('.grow-scroll').css({'overflow':'hidden'});
	$('.grow').hide();
	$('.grow:first').show();
	$('.video-img-show').click(function(){
		$(this).fadeOut(200);
		$(this).siblings('video').trigger('play');
	})
})
/*新闻*/
$(function(){
	var nNum = 0;
	var nLi = $('.news-main li').length;
	$('.news-main ul').width((nLi*100)+'%');
	$('.news-main li').width((100/nLi)+'%');
	$('.news-main-btn-r').click(function(){
		if(!$('.news-main ul').is(':animated')){
			nNum++;
			if(nNum<=nLi-1){
				$('.news-main ul').animate({left:-nNum*100+'%'},200);
			}else{
				nNum=nLi-1;
			}
		}
	});
	$('.news-main-btn-l').click(function(){
		if(!$('.news-main ul').is(':animated')){
			nNum--;
			if(nNum >=0){
				$('.news-main ul').animate({left:-nNum*100+'%'},200);
			}else{
				nNum=0;
			}
		}
	});
})