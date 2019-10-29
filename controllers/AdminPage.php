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

        }
        if(isset($_POST['count'])){
            print_r($_POST);
            exit;
//            $model->addGood();
        }
        $this->content = $this->Template('category', ['category' => $category]);
    }

    public function action_good()
    {
        $this->title = 'Товар';
        $model = new CatalogAdmin();
        $good = $model->getGood();
        $category = $model->getCategory();
        if(isset($_POST)){
            $model->getPropertiesGood();
//            $model->updateGood();
//            print_r($_POST);
        }
        $this->content = $this->Template('good', ['good' => $good, 'category' => $category]);

    }

    public function action_goods()
    {
        $this->title = 'Товары';
        $model = new CatalogAdmin();
        $goods = $model->getGoods();
        if($_POST) {
            $model->updateCategory();
        }
        $this->content = $this->Template('goods', ['goods' => $goods, 'category'=>$category]);

    }
}