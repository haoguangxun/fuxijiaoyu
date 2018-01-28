<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '会员注册';
$this->registerCssFile('@web/css/register.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/register.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/bootstrap.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>

<!--内容-->
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="exampleModalLabel">提示</h4>
	  </div>
	  <div class="modal-body">
		<p></p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
	  </div>
	</div>
  </div>
</div>

<div class="main">
	<div class="wrap">
		<div class="main-content">
			<?= Html::beginForm(['login/register'], 'post',['id' => 'register-form']) ?>
			<div class="main-content-title">
				<span>注册</span>
			</div>
			<div class="form-item">
				<label >手机号</label>
				<?= Html::input('text', 'SignupForm[phone]', '', ['id' => 'phone','placeholder'=>'输入手机号码']) ?>
			</div>
			<div class="form-item">
				<label >密码</label>
				<?= Html::input('password', 'SignupForm[password]', '', ['id' => 'pass','placeholder'=>'请输入6-20位密码']) ?>
			</div>
			<div class="form-item">
				<label>验证码</label>
				<div class="yzm">
					<?= Html::input('text', 'verification', '', ['id' => 'yzm','placeholder'=>'输入六位验证码']) ?>
					<span><input type="button" value="获取验证码" onclick="sendCode(this)" /></span>
				</div>
			</div>
			<div class="register-btn">
				<?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
			</div>
			<div class="register-text">
				<span>已有账号？<?= Html::a('登录', ['login/index']) ?></span>
				<span>同意<a href="<?= Url::to(['page/index','cid'=>58])?>">会员条款</a>和<a href="<?= Url::to(['page/index','cid'=>59])?>">免责声明</a></span>
			</div>
			<?= Html::endForm() ?>
		</div>
	</div>
</div>
