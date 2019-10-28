<h3>Категории товаров</h3>
<?php foreach ($category as $key=>$value):?>
    <ul>
        <li><a href="index.php?c=page&act=good?id="<?=$_GET['id']?>><?=$value['title']?></a></li>
    </ul>

<?php endforeach;?>
