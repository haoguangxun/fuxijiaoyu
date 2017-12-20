//留言
$(function(){
	$('#feedback-form').on('submit', function(e){
		e.preventDefault();
		var form = $('#feedback-form');
		var name = $('#name').val();
		if(name==''){
			$('.modal-body p').text("姓名不得为空");
			$('#alert').modal();
			return false;
		};
		var  phone = $('#phone').val();
		if(phone==''){
			$('.modal-body p').text("手机号不得为空");
			$('#alert').modal();
			return false;
		};
		if(!(/^1[34578]\d{9}$/.test(phone))){
			$('.modal-body p').text("手机号码有误，请重新输入");
			$('#alert').modal();
			$('#phone').val("");
			return false;
		};
		var email = $('#email').val();
		if(email=='') {
			$('.modal-body p').text("请输入邮箱");
			$('#alert').modal();
			return false;
		};
		var content = $('#content').val();
		if(content=='') {
			$('.modal-body p').text("请输入留言内容");
			$('#alert').modal();
			return false;
		};

		$.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				if(data.code == 10000) {
					$('.modal-body p').text(data.msg);
					$('#alert').modal();
				} else {
					$('.modal-body p').text(data.msg);
					$('#alert').modal();
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
});