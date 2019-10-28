<?php foreach ($goods as $key=>$value):?>
<?=var_dump($value);?>
<?php endforeach;?>

<h3><?=$value['name_category']?></h3>
<?php foreach ($goods as $key=>$value):?>
    <ul>
        <li><a href=""><?=$value['title']?></a> - <span>остаток на складе <?=$value['count_stock']?> шт.</span></li>
    </ul>
<?php endforeach;?>

