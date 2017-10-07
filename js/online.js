$(function(){
	$('.system-nav span').mouseover(function(){
		var index=$(this).index();
		$(this).addClass('active').siblings('span').removeClass('active');
		$('.online ul').eq(index).show().siblings('ul').hide();
	})
})
