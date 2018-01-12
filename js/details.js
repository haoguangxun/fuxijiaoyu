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
		var id = $(this).attr('id').val();
		var num = $('.shoucang em').html();
		$.ajax({
			url: '/course/collection',
			type: 'get',
			data: { id: id},
			success: function (data) {
				if(data.code == 10000) {
					$('.shoucang em').html(num+1)
				} else {
					$('.shoucang em').html(num-1)
					return false;
				}
			},
			error: function() {
				$('.modal-body p').text("网络繁忙，请稍后再试");
				$('#alert').modal();
				return false;
			}
		});
	});
})
