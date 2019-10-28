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
}