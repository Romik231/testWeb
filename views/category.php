<?php $url = explode('/', $_SERVER['REQUEST_URI']) ?>
<?php $admin = explode('?', $url[2]) ?>
<h3>Категории товаров</h3>
<!--Вывод категорий товаров-->
<div class="wrap">
    <div class="category">
        <?php foreach ($category as $key => $value): ?>
            <ul>
                <li><a href="?c=page&act=goods&cat_id=<?= $value['id'] ?>"><?= $value['title'] ?></a></li>
            </ul>
        <?php endforeach; ?>
    </div>

    <?php if ($admin[0] == 'admin.php'): ?>
        <div class="add-category">
            <h3>Добавить новую категорию</h3>
            <form id="form-category" action="" method="post">
                <label for="title">Название категории</label>
                <input type="text" name="title" id="title" required="required">
                <label for="short_description">Краткое описание</label>
                <input type="text" name="short_description" id="short_description" required="required">
                <label for=" description">Полное описание</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <label for="active_category">Активность категории</label>
                <input type="text" name="active_category" id="active_category" required="required">
                <label for=" good_id">Идентификатор товара</label>
                <input type="text" name="good_id" id="good_id">
                <button type="submit" class="btn-send">Добавить</button>
            </form>
        </div>


    <div class="add-category">
        <h3>Добавить новый товар</h3>
        <form id="form-category" action="" method="post">
            <label for="name">Название Товара</label>
            <input type="text" name="name" id="name" required="required">
            <label for="short_description">Краткое описание товара</label>
            <input type="text" name="short_description" id="short_description" required="required">
            <label for=" description">Полное описание товара</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <label for="count">Количество</label>
            <input type="text" name="count" id="count" required="required">
            <label for="active">Активность товара</label>
            <input type="text" name="active" id="active">
            <label for="possible">Возможность заказа</label>
            <input type="text" name="possible" id="possible">
            <label for="category_id">Категория товара</label>
            <select name="category_id" id="category_id">
                <?php foreach ($category as $key => $value): ?>
                <option value="<?=$value['id']?>"><?=$value['title']?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn-send">Добавить</button>
        </form>
    </div>
    <?php endif; ?>
</div>
