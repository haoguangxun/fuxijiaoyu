$(function(){
	$('.details-tab-content').hide();
	$('.details-tab-content:first').show();
	$('.details-tab-nav li').click(function(){
		$(this).addClass('active').siblings('li').removeClass('active');
		var index = $(this).index();
		$('.details-tab-content').eq(index).show().siblings('.details-tab-content').hide();
	})
})
