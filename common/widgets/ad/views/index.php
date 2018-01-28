<?php foreach ($data as $val):?>
    <?php if($type == 1){?>
        <?php if($val['linkurl']){?>
            <a href="<?= $val['linkurl'] ?>"><?= $val['title'] ?></a>
        <?php }else{?>
            <?= $val['title'] ?>
        <?php }?>
    <?php }elseif($type == 2){?>
        <?php if($val['linkurl']){?>
            <a href="<?= $val['linkurl'] ?>"><img src="<?= $val['fileurl'] ?>" alt="<?= $val['title'] ?>"></a>
        <?php }else{?>
            <img src="<?= $val['fileurl'] ?>" alt="<?= $val['title'] ?>">
        <?php }?>
    <?php }?>
<?php endforeach;?>
