$(function(){
	$('.news-list ul').hide();
	$('.news-list ul:first').show();
	$('.system-nav span').mouseover(function(){
		var index=$(this).index();
		$(this).addClass('active').siblings('span').removeClass('active');
		$('.news-list ul').eq(index).show().siblings('ul').hide();
	});
	$('.news-img').height($('.news-img').width()*2/3);
})