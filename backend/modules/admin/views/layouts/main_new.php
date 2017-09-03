<?php
/**
 * @var $this yii\web\View
 */
$controller = $this->context;
?>
<?php $this->beginContent($controller->module->mainLayout) ?>
    <div class="box">
        <div class="box-body">
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>