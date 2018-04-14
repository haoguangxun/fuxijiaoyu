$(function(){
	/*师资力量高度适应*/
	var wid = $('.teacher-img').width()*3/4;
	$('.teacher-img').height(wid);
	/*新闻动态高度适应*/
	var newsWidth = $('.news-img').width()*3/4;
	$('.news-img').height(newsWidth);
	
	var leg = $('.system-nav a').length;
	var wid = $('.system-nav a').innerWidth();
	$('.system-nav-scroll').width(wid*leg);
})
