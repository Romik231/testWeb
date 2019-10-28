<h3>Категории товаров</h3>
<?php foreach ($category as $key=>$value):?>
    <ul>
        <li><a href="index.php?c=page&act=goods&cat_id=<?=$value['id']?>"><?=$value['title']?></a></li>
    </ul>
<?php endforeach;?>
