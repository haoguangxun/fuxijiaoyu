$(function(){
	$('.kc li').click(function(){
		var kcText = $(this).find('a').text();
		$('.kc button .contain').text(kcText);
	});
	$('.bj li').click(function(){
		var kcText = $(this).find('a').text();
		$('.bj button .contain').text(kcText);
	});
	//注册
	$('#register-form').on('submit', function(e){
		e.preventDefault();
		var form = $('#register-form');
		var phone = $('#phone').val();
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
	    var pass = $('#pass').val();
	    if(pass.length < 6 || pass.length > 20) {
	   		$('.modal-body p').text("请输入6-20位密码");
			$('#alert').modal();
			$('#pass').val("");
			return false; 
	    };
	    /*var kc = $('.kc button .contain').text();
	    if(kc=='选择课程'){
	   		$('.modal-body p').text("请选择课程");
			$('#alert').modal();
			return false; 
	    }
	    var bj = $('.bj button .contain').text();
	    if(bj=='选择班级'){
	   		$('.modal-body p').text("请选择班级");
			$('#alert').modal();
			return false; 
	    };*/
	    var yzm = $('#yzm').val();
	    if(yzm==''){
	    	$('.modal-body p').text("验证码不得为空");
			$('#alert').modal();
			return false; 
	    }

		$.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				if(data.code == 10000) {
					location.href = data.url;
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

	/*登陆*/
	$('#login-form').on('submit', function(e){
		e.preventDefault();
		var form = $('#login-form');
		var cus = $('#cus').val();
		if(cus==''){
			$('.modal-body p').text("手机号不得为空");
			$('#alert').modal();
			return false;
		};
		if(!(/^1[34578]\d{9}$/.test(cus))){
			$('.modal-body p').text("手机号码有误，请重新输入");
			$('#alert').modal();
	        $('#cus').val("");
	        return false; 
	    };
	    var loginMm = $('#loginMm').val();
		if(loginMm==''){
			$('.modal-body p').text("密码不得为空");
			$('#alert').modal();
			return false;
		};

		$.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				if(data.code == 10000) {
					location.href = data.url;
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

	//快捷登录
	$('#quick-login-form').on('submit', function(e){
		e.preventDefault();
		var form = $('#quick-login-form');
		var phone = $('#phone').val();
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
		var yzm = $('#yzm').val();
		if(yzm==''){
			$('.modal-body p').text("验证码不得为空");
			$('#alert').modal();
			return false;
		}
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				if(data.code == 10000) {
					location.href = data.url;
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


	$('.login-head .account').click(function(){
		$(this).addClass('active').siblings('.quick').removeClass('active');
		$('.account-main').show().siblings('.quick-main').hide();
	});
	$('.login-head .quick').click(function(){
		$(this).addClass('active').siblings('.account').removeClass('active');
		$('.quick-main').show().siblings('.account-main').hide();
	})
});
/*获取验证码倒计时*/
var clock = '';
var nums = 30;
var btn;
function sendCode(thisBtn){
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

	btn = thisBtn;
	btn.disabled = true; //将按钮置为不可点击
	$.ajax({
		url: '/login/send-msg.html',
		type: 'get',
		data: { phone: phone},
		success: function (data) {
			if(data.code == 10000) {
				btn.value = nums+'秒后重获取';
				clock = setInterval(doLoop, 1000); //一秒执行一次
			} else {
				btn.disabled = false;
				$('.modal-body p').text(data.msg);
				$('#alert').modal();
				return false;
			}
		},
		error: function() {
			btn.disabled = false;
			$('.modal-body p').text("网络繁忙，请稍后再试");
			$('#alert').modal();
			return false;
		}
	});
}
function doLoop(){
	nums--;
	if(nums > 0){
	btn.value = nums+'秒后重获取';
	}else{
  		clearInterval(clock); //清除js定时器
  		btn.disabled = false;
  		btn.value = '获取验证码';
  		nums = 30; //重置时间
 	}
}

