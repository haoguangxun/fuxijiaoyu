<?php
/**
 * @see Yii中文网  http://www.yii-china.com
 * @author Xianan Huang <Xianan_huang@163.com>
 * 图片上传组件
 * 如何配置请到官网（Yii中文网）查看相关文章
 */
 
use yii\helpers\Html;
var_dump($config);
var_dump($inputValue);
?>
<label class="personal-form-portrait">头像</label>
<div class="fileStyle per_upload_con" data-url="<?=$config['serverUrl']?>">
    <!--<div class="per_real_img" domain-url = "<?/*=$config['domain_url']*/?>"><?/*=isset($inputValue)?'<img src="'.$config['domain_url'].$inputValue.'">':''*/?></div>-->
    <label for="uploaderInput" class="per_upload_img">
        <img class="per_real_img choose_btn" domain-url = "<?=$config['domain_url']?>" src="<?=!empty($inputValue)?$config['domain_url'].$inputValue:'/img/default-photo.png'?>"/>
        <!--<img src="<?/*= $model['photo'] ? $model['photo'] : '/img/default-photo.png'*/?>" id="user_img"/>-->
    </label>
    <input up-id="<?=$inputName?>" type="hidden" name="<?=$inputName?>" upname='<?=$config['fileName']?>' value="<?=!empty($inputValue)?$inputValue:''?>" filetype="img" />
    <!--<input class="personal-input" name="photo" type="hidden"/>
    <input id="uploaderInput" type="file" accept="image/*" multiple="" onchange='openFile(this)'>-->
</div>
