<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">管理</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

        
              	<li class="user user-menu">
                    <a href="#" >
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    </a>
                  
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <?= Html::a( 
                            ' 登出',
                            ['/admin/user/logout'],
                            ['data-method' => 'post', 'class' => 'fa fa-power-off']
                    ) ?>
                   
                </li>
            </ul>
        </div>
    </nav>
</header>
