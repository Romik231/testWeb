<?php
$url = explode('/', $_SERVER['REQUEST_URI']);
$admin = explode('?', $url[2]);
?>
<!--Перебор массива для динамической подгрузки названия раздела-->
<?php foreach ($goods as $key => $value): ?>
<?=var_dump($value)?>

<?php endforeach;?>

<?//=var_dump($count);?>
<div class="wrap">
    <div>

        <h3><?= $value['name_category'] ?></h3>
        <!--Перебор вариантов для покупки, возможности или невозможности заказа-->
        <div>
            <span>Сортировать по наименованию:  <a href="?c=page&act=goods&cat_id=<?= $_GET['cat_id'] . '&desc=1' ?>">&#8593</a>
              <a href="?c=page&act=goods&cat_id=<?= $_GET['cat_id'] . '&desc=0' ?>">&#8595</a>
            </span>

        </div>
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
                    <a href="?c=page&act=good&id_good=<?= $value['id'] ?>"><?= $value['title'] ?>
                    </a> -
                    <span>остаток на складе <b><?= $value['count_stock'] ?> шт.</b>  <a href=""><?= $a ?></a>
                </span>
                </li>
            </ul>
        <?php endforeach; ?>

        <a href="<?=$_SERVER['PHP_SELF']?>">Вернуться к списку категорий товаров</a><br>
        <a href="<?=$_SERVER['REQUEST_URI'].'&page=1'?>">dasdasdsad</a>
    </div>
    <?php if ($admin[0] == 'admin.php'): ?>

        <div class="add-category">
            <h3>Редактировать категорию <?= $value['name_category']; ?></h3>
            <form id="form-category" action="" method="post">
                <label for="title">Название категории</label>
                <input type="text" name="title" id="title" value="<?= $value['name_category'] ?>" required="required">
                <label for="short_description">Краткое описание</label>
                <input type="text" name="short_description" id="short_description" value="<?= $value['cat_short'] ?>">
                <label for="description">Полное описание</label>
                <textarea name="description" id="description" cols="30" rows="10"><?= $value['cat_desc'] ?></textarea>
                <label for="active_category">Активность категории</label>
                <select name="active_category" id="v">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
<!--                <input type="text" name="active_category" id="active_category" value="--><?//= $value['cat_act'] ?><!--"-->
<!--                       required="required">-->
                <label for="good_id">Идентификатор товара</label>
                <input type="text" name="good_id" id="good_id" value="<?= $value['cai_good_id'] ?>">
                <button type="submit" class="btn-send">Изменить</button>
            </form>
        </div>
    <?php endif; ?>




</div>

