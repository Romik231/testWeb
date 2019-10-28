<?php $url = explode('/',$_SERVER['REQUEST_URI'])?>
<?php $admin = explode('?',$url[2])?>
<?php foreach ($good as $key=>$value):?>
<?php endforeach;?>

<div>
<h3><?=$value['title']?></h3>
<?php foreach ($good as $key=>$value):?>
    <?php if ($value['count_stock'] == 0 and $value['possibility_of_order'] == 1): ?>
        <? $a = 'К сожалению товар закончился но вы можете заказать его' ?>
    <?php elseif ($value['possibility_of_order'] == 0): ?>
        <? $a = 'К сожалению товар закончился и его нельзя заказать' ?>
    <?php elseif ($value['count_stock'] !== 0): ?>
        <? $a = 'Купить' ?>
    <?php endif; ?>
    <span><?=$value['short_description']?></span><br>
    <span><?=$value['description']?> </span><br>
    <span>остаток на складе <b><?= $value['count_stock'] ?> шт.</b>
        <a href=""><?= $a ?></a>
    </span>
<?php endforeach;?>
</div>
<a href="index.php">Вернуться к списку категорий товаров</a><br>
<a href="admin.php?c=page&act=goods&cat_id=<?=$value['id'] ?>">Вернуться к списку товаров</a>
