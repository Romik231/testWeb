<h3>Категории товаров</h3>
<!--Вывод категорий товаров-->
<div class="wrap">
    <div class="category">
        <?php foreach ($category as $key => $value): ?>
            <ul>
                <li><a href="index.php?c=page&act=goods&cat_id=<?= $value['id'] ?>"><?= $value['title'] ?></a></li>
            </ul>
        <?php endforeach; ?>
    </div>

    <?php if ($_GET['c'] == 'admin'): ?>
        <div class="add-category">
            <h3>Добавить новую категорию</h3>
            <form id="form-category" action="" method="post">
                <label for="title">Название категории</label>
                <input type="text" name="title" id="title">
                <label for="short_description">Краткое описание</label>
                <input type="text" name="short_description" id="short_description">
                <label for="description">Полное описание</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <label for="active_category">Активность категории</label>
                <input type="text" name="active_category" id="active_category">
                <label for="good_id">Идентификатор товара</label>
                <input type="text" name="good_id" id="good_id">
                <button type="submit" class="btn-send">Добавить</button>
            </form>
        </div>
    <?php endif; ?>
</div>
