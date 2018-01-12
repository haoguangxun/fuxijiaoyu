<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Alert;

$this->title = '学员中心';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
if( Yii::$app->getSession()->hasFlash('success') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-success',
		],
		'body' => Yii::$app->getSession()->getFlash('success'),
	]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-error',
		],
		'body' => Yii::$app->getSession()->getFlash('error'),
	]);
}
?>
<!--内容-->
<div class="personal-title">个人资料</div>
<div class="personal-form">
	<div class="personal-form-title"><span>基本信息</span></div>
	<form name="form" action="<?= Url::to(['member/index'])?>" method="post" enctype="multipart/form-data">
		<input name="_csrf-frontend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
	<div class="personal-form-item">
		<label class="personal-form-portrait">头像</label>
		<div class="fileStyle">
			<label for="uploaderInput">
				<img src="<?= $model['photo'] ? $model['photo'] : '/img/default-photo.png'?>" id="user_img"/>
			</label>
			<input class="personal-input" name="photo" type="hidden"/>
			<input id="uploaderInput" type="file" accept="image/*" multiple="" onchange='openFile(this)'>
			<?php
			//use common\widgets\file_upload\FileUpload;   //引入扩展
			//echo FileUpload::widget(['value'=>$model['photo']]);
			?>
		</div>
	</div>
	<!--<div class="personal-form-item">
		<span>用户名2122</span>
		<a href="javascript:;" class="changeName">修改用户名</a>
	</div>-->
	<div class="personal-form-item">
		<label class="personal-form-name">真实姓名</label>
		<input class="personal-input" name="realname" type="text" value="<?=$model['realname']?>"/>
		<!--<span>仅用户自己可见</span>-->
	</div>
	<div class="personal-form-item">
		<label class="personal-form-name">性别</label>
		<select class="personal-input" name="sex">
			<option value="1" <?php if($model['sex']==1)echo 'selected';?>>男</option>
			<option value="2" <?php if($model['sex']==2)echo 'selected';?>>女</option>
		</select>
	</div>
	<!--<div class="personal-form-item">
		<label class="personal-form-name">学习类型</label>
		<input class="personal-input" type="text" />
	</div>-->
	<div class="personal-form-item">
		<label class="personal-form-name">个人爱好</label>
		<textarea onKeyUp="javascript:checkWord(this,200);" onMouseDown="javascript:checkWord(this,200);" name="hobby"><?=$data_model['hobby']?></textarea>
		<div class="surplus">还可以输入<span id="wordCheck200">200</span>个字符 </div>
	</div>
	<button type="submit" class="personal-btn">保存</button>
	</form>
</div>