$(document).ready(function(){
	var banner = new Swiper('#ban', {
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
	console.log(1)
});
