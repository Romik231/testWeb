<!--Перебор массива для динамической подгрузки названия раздела-->
<?php foreach ($goods as $key => $value): ?>
<?php endforeach; ?>

<h3><?= $value['name_category'] ?></h3>
<!--Перебор вариантов для покупки, возможности или невозможности заказа-->
<?php foreach ($goods as $key => $value): ?>
    <?php if ($value['count_stock'] == 0 and $value['possibility_of_order'] == 1): ?>
        <? $a = 'К сожалению товар закончился но вы можете заказать его' ?>
    <?php elseif ($value['possibility_of_order'] == 0): ?>
        <? $a = 'К сожалению товар закончился и его нельзя заказать' ?>
    <?php elseif ($value['count_stock'] !== 0): ?>
        <? $a = 'Купить' ?>
    <?php endif; ?>
    <!--Список товаров-->
    <ul>
        <li>
            <a href="index.php?c=page&act=good&id_good=<?=$value['id']?>"><?= $value['title'] ?>
            </a> -
            <span>остаток на складе <b><?= $value['count_stock'] ?> шт.</b>  <a href=""><?= $a ?></a>
                </span>
        </li>
    </ul>
<?php endforeach; ?>

<a href="index.php">Вернуться к списку категорий товаров</a>
