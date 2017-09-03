<aside class="main-sidebar">
	<section class="sidebar">
		<?php
        use  backend\modules\admin\components\MenuHelper;
        $callback = function ($menu) {
            $data = json_decode($menu['data'], true);
            $items = $menu['children'];
            $return = [
                'label' => $menu['name'],
                'url' => [
                    $menu['route'] ? $menu['route'] : '#'
                ]
            ];
            if ($data) {
                isset($data['visible']) && $return['visible'] = $data['visible']; // visible
                isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon']; // icon
                                                                                          // other attribute e.g. class...
                $return['options'] = $data;
            }
            // 没配置图标的显示默认图标
            (! isset($return['icon']) || ! $return['icon']) && $return['icon'] = 'fa fa-angle-double-right';
            $items && $return['items'] = $items;
            return $return;
        };
        
        echo dmstr\widgets\Menu::widget([
            'options' => [
                'class' => 'sidebar-menu'
            ],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->identity->roleid, 0, $callback, false)
        ]);
        ?>
    </section>
</aside>
