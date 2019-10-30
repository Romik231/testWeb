<?php


namespace controllers;

use models\CatalogAdmin;

class AdminPage extends AdminController
{
    public function action_admin()
    {
        $model = new CatalogAdmin();
        $this->title .= 'Админка';
        $category = $model->getCategory();
        if(isset($_POST['title'])){
            $model->addCategory();
            header('location:'.$_SERVER['REQUEST_URI']);

        }
        if(isset($_POST['count'])){
            $model->addGood();
        }
        $this->content = $this->Template('category', ['category' => $category]);
    }

    public function action_good()
    {
        $this->title = 'Товар';
        $model = new CatalogAdmin();
        $good = $model->getGood();
        $category = $model->getCategory();
        if(!empty($_POST)){
            $model->updateGood();
            header('location:'.$_SERVER['REQUEST_URI']);

        }
        $this->content = $this->Template('good', ['good' => $good, 'category' => $category]);

    }

    public function action_goods()
    {
        $this->title = 'Товары';
        $model = new CatalogAdmin();
        $goods = $model->getGoods();

//        var_dump($count);
        if(!empty($_POST)) {
//            var_dump($_POST);
            $model->updateCategory();

        }
        $this->content = $this->Template('goods', ['goods' => $goods,]);

    }
}