<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use backend\modules\admin\AutocompleteAsset;
use backend\modules\admin\models\AdminPermission;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AdminPermission */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'routes' => AdminPermission::getSavedRoutes(),
    ]);


$js = <<<JS
    $('#route').autocomplete({
        source: _opts.routes,
    });
JS;
$this->registerJs("var _opts = $opts;");
$this->registerJs($js);
?>


<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'id', ['id' => 'perm_id']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
        </div>
        <div class="col-sm-6">
         	<?= $form->field($model, 'data')->textInput(['maxlength' => 128]) ?>
        </div>
    </div>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>