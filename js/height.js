$(function(){
	/*师资力量高度适应*/
	var wid = $('.teacher-img').width()*3/4;
	$('.teacher-img').height(wid);
	/*新闻动态高度适应*/
	var newsWidth = $('.news-img').width()*3/4;
	$('.news-img').height(newsWidth);
	
	var wid = 0;
	for(var i=0;i<$('.system-nav a').length;i++){
		var aW = $('.system-nav a').eq(i).innerWidth()
		wid = wid + aW;
	};
	$('.system-nav-scroll').width(wid);
})
