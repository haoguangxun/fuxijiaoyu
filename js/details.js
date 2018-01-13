$(function(){
	$('.details-tab-content').hide();
	$('.details-tab-content:first').show();
	$('.details-tab-nav li').click(function(){
		$(this).addClass('active').siblings('li').removeClass('active');
		var index = $(this).index();
		$('.details-tab-content').eq(index).show().siblings('.details-tab-content').hide();
	})

	//收藏
	$('.shoucang').click(function(){
		var id = $(this).attr('id');
		var action = $(this).attr('action');
		var num = parseInt($('.shoucang em').text());
		var that = $(this);
		$.ajax({
			url: '/course/collection.html',
			type: 'get',
			data: { id: id, action: action},
			success: function (data) {
				if(data.code == 10000) {
					that.find('em').text(num + 1);
					that.attr('action','2');
				} else if(data.code == 10001) {;
					that.find('em').text(num - 1);
					that.attr('action','1');
				} else if(data.code == 10003) {
					/*window.location.href='/login/index.html'*/
				}else {
					$('.modal-body p').text("网络繁忙，请稍后再试");
					return false;
				}
			},
			error: function() {
				$('.modal-body p').text("网络繁忙，请稍后再试");
				return false;
			}
		});
	});
})
