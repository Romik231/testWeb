<?php $url = explode('/', $_SERVER['REQUEST_URI']) ?>
<?php $admin = explode('?', $url[2]) ?>
<?php foreach ($good as $key => $value): ?>
<?php endforeach; ?>

<div class="wrap">
    <div>
        <h3><?= $value['title'] ?></h3>
        <?php foreach ($good as $key => $value): ?>
            <?php if ($value['count_stock'] == 0 and $value['possibility_of_order'] == 1): ?>
                <? $a = 'К сожалению товар закончился но вы можете заказать его' ?>
            <?php elseif ($value['possibility_of_order'] == 0): ?>
                <? $a = 'К сожалению товар закончился и его нельзя заказать' ?>
            <?php elseif ($value['count_stock'] !== 0): ?>
                <? $a = 'Купить' ?>
            <?php endif; ?>
            <span><?= $value['short_description'] ?></span><br>
            <span><?= $value['description'] ?> </span><br>
            <span>остаток на складе <b><?= $value['count_stock'] ?> шт. <a href=""><?= $a ?></a></b><br>
                <a href="index.php">Вернуться к списку категорий товаров</a><br>
                <a href="admin.php?c=page&act=goods&cat_id=<?= $value['id'] ?>">Вернуться к списку товаров</a><br>

    </span>
        <?php endforeach; ?>
    </div>

<?=print_r($value)?>
    <?php if ($admin[0] == 'admin.php'): ?>
        <div class="add-category">
            <h3>Редактировать товар</h3>
            <form id="form-category" action="" method="post">
                <label for="name">Название Товара</label>
                <input type="text" name="name" id="name" value="<?=$value['title']?>" required="required">
                <label for="short_description">Краткое описание товара</label>
                <input type="text" name="short_description" id="short_description" value="<?=$value['short_description']?>" required="required">
                <label for=" description">Полное описание товара</label>
                <textarea name="description" id="description" cols="30" rows="10"><?=$value['description']?></textarea>
                <label for="count">Количество</label>
                <input type="text" name="count" id="count" value="<?=$value['count_stock']?>" required="required">
                <label for="active">Активность товара</label>
                <input type="text" name="active" id="active" value="<?=$value['active_good']?>">
                <label for="possible">Возможность заказа</label>
                <input type="text" name="possible" id="possible" value="<?=$value['possibility_of_order']?>">
                <label for="category_id">Категория товара</label>
                <select name="category_id" id="category_id">
<!--                    <option value="">--><?//=$value['category_id']?><!--</option>-->
                    <?php foreach ($category as $key => $value): ?>
                        <option value="<?=$value['category_id']?>"><?=$value['title']?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn-send">Изменить</button>
            </form>
        </div>
    <?php endif; ?>
</div>