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
//        if($_POST){
//            $model->addCategory();
//
//        }
        $this->content = $this->Template('category', ['category' => $category]);
    }

    public function action_good()
    {
        $this->title = 'Товар';
        $model = new CatalogAdmin();
        $good = $model->getGood();
        $this->content = $this->Template('good', ['good' => $good]);

    }

    public function action_goods()
    {
        $this->title = 'Товары';
        $model = new CatalogAdmin();
        $goods = $model->getGoods();
        $this->content = $this->Template('goods', ['goods' => $goods, 'category'=>$category]);

    }
}