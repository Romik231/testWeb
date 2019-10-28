<?php


namespace models;

use models\Db;
require 'Db.php';

class Catalog extends Db
{
    public function getGood()
    {
        $id = htmlspecialchars($_GET['id']);

        $params = [
            'id'=> $id];
        $result = $this->rows('select * from cities where id=:id',$params);
        return $result;
    }

    public function getCategory()
    {

        $result = $this->rows('select * from category');
        return $result;
    }

    public function addUser()
    {
        $name = trim(strip_tags($_POST['name']));

        $age = ($_POST['age']);
        $city = trim(strip_tags($_POST['city']));

        if (strlen($name) > 30 or strlen($name) < 3) {
            echo 'Имя должно содержать от 3 до 30 символов';
        }
        if ($age < 0) {
            echo 'Возраст не может быть отрицательным';
        }var_dump($_POST);
        $params = [
            'name' => $name,

        ];

        $result = $this->query('insert into users(name) values(:name)', $params);


        var_dump($result);
        return $result;


    }


}