<?php


namespace models;

class CatalogAdmin extends Catalog
{
    protected $title;
    protected $shortDesc;
    protected $descr;
    protected $active;
    protected $goodId;


    protected $name;
    protected $shortDescription;
    protected $description;
    protected $countStock;
    protected $activeGood;
    protected $possible;
    protected $category;

    //Проверяем и получаем свойства для Категорий
    public function getPropertiesCategory()
    {//Делаем проверку введенных данных
        $this->title = trim(strip_tags($_POST['title']));
        $this->shortDesc = trim(strip_tags($_POST['short_description']));
        $this->descr = trim(strip_tags($_POST['description']));
        $this->active = (int)trim(strip_tags($_POST['active_category']));
        $this->goodId = (int)trim(strip_tags($_POST['good_id']));

//        if ($this->title == '' or $this->shortDesc == '' or $this->descr == '' or $this->active == '') {
//            echo 'Параметры не могут быть пустыми';
//            exit;
//
//        }

        $params = [
            'title' => $this->title,
            'short' => $this->shortDesc,
            'desc' => $this->descr,
            'active' => $this->active,
            'good' => $this->goodId,
        ];
        return $params;
    }

//Проверяем и получаем свойства для Товаров
    public function getPropertiesGood()
    {//Делаем проверку введенных данных
        $this->name = trim(strip_tags($_POST['name']));
        $this->shortDescription = trim(strip_tags($_POST['short_description']));
        $this->description = trim(strip_tags($_POST['description']));
        $this->countStock = (int)trim(strip_tags($_POST['count']));
        $this->activeGood = (int)trim(strip_tags($_POST['active']));
        $this->possible = (int)trim(strip_tags($_POST['possible']));
        $this->category = trim(strip_tags($_POST['category_id']));

        $params = [
            'name' => $this->name,
            'shortdesc' => $this->shortDescription,
            'description' => $this->description,
            'count' => $this->countStock,
            'activegood' => $this->activeGood,
            'possible' => $this->possible,
            'category' => $this->category,
        ];
        return $params;
    }

//Добавление новой категории
    public function addCategory()
    {
        $params = $this->getPropertiesCategory();
        $sql = 'INSERT INTO category(title,short_description,description,active_category,good_id)
                        VALUES (:title, :short, :desc, :active, :good)';
        $this->query($sql, $params);

    }

//Обновление категории
    public function updateCategory()
    {
        $id = (int)trim(strip_tags($_GET['cat_id']));
        $params = $this->getPropertiesCategory();
        $sql = 'UPDATE category 
                SET title=:title, short_description=:short, description=:desc, active_category=:active, good_id=:good
                WHERE id=' . $id;
        $this->query($sql, $params);
    }

//Добавление товара
    public function addGood()
    {
        $params = $this->getPropertiesGood();
        $sql = 'INSERT INTO goods (title, short_description, description, count_stock, active_good, possibility_of_order,category_id)
                VALUES(:name, :shortdesc, :description, :count, :activegood, :possible, :category)';
        $this->query($sql, $params);
    }

//Редактирование товара
    public function updateGood()
    {
        $id = $_GET['id_good'];
        $params = $this->getPropertiesGood();
        $sql = 'UPDATE goods SET title=:name, short_description=:shortdesc, description=:description,
                count_stock=:count, active_good=:activegood, possibility_of_order=:possible, category_id=:category
                WHERE id=' . $id;
        $this->query($sql, $params);
    }

    public function redirect($url)
    {
        header(':location: ' . $url);
    }

}