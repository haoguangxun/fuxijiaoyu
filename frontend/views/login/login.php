<?php

use yii\helpers\Html;

$this->title = '会员登录';
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
		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	  </div>
	</div>
  </div>
</div>

<div class="main">
	<div class="wrap">
		<div class="main-content">
			<div class="main-content-title">
				<span>登陆</span>
			</div>
			<div class="login-head">
				<div class="account active">帐号登陆</div>
				<div class="quick">快捷登陆</div>
			</div>
			<div class="account-main">
				<?= Html::beginForm(['login/index'], 'post',['id' => 'login-form']) ?>
				<div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><span class="iconfont icon-cus"></span></div>
						<?= Html::input('text', 'LoginForm[phone]', '', ['id' => 'cus','placeholder'=>'请输入手机号']) ?>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><span class="iconfont icon-mm"></span></div>
						<?= Html::input('password', 'LoginForm[password]', '', ['id' => 'loginMm','placeholder'=>'请输入登陆密码']) ?>
					</div>
				</div>
				<div class="forget">
					<div class="checkbox">
						<label>
							<?= Html::checkbox('LoginForm[rememberMe]', false, ['label' => '记住我']);?>
						</label>
						<?= Html::a('忘记密码', ['login/request-password-reset']) ?>
					</div>
				</div>
				<div class="login-btn">
					<?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
				</div>
				<div class="go-register">没有账号？<?= Html::a('立即注册', ['login/register']) ?></div>
				<?= Html::endForm() ?>
			</div>
			<div class="quick-main">
				<?= Html::beginForm(['login/quick-login'], 'post',['id' => 'quick-login-form']) ?>
				<div class="form-item">
					<label >手机号</label>
					<?= Html::input('text', 'LoginForm[phone]', '', ['id' => 'phone','placeholder'=>'输入手机号码']) ?>
				</div>
				<div class="form-item">
					<label>验证码</label>
					<div class="yzm">
						<?= Html::input('text', 'verification', '', ['id' => 'yzm','placeholder'=>'输入六位验证码']) ?>
						<span><input type="button" value="获取验证码" onclick="sendCode(this)" /></span>
					</div>
				</div>
				<div class="forget">
					<div class="checkbox">
						<label>
							<?= Html::checkbox('LoginForm[rememberMe]', false, ['label' => '记住我']);?>
						</label>
					</div>
				</div>
				<div class="login-btn">
					<?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
				</div>
				<div class="go-register">没有账号？<?= Html::a('立即注册', ['login/register']) ?></div>
				<?= Html::endForm() ?>
			</div>
		</div>
	</div>
</div>
