<?php


namespace models;

use models\Db;


class Catalog extends Db
{
    public function getGood()
    {
        $id = (int)trim(strip_tags($_GET['id_good']));

        $params = [
            'id'=> $id,
        ];

        $result = $this->rows('select * from goods where id=:id ', $params);
        return $result;
    }

    public function getGoods()
    {
        $id = (int)trim(strip_tags($_GET['cat_id']));
        $params = [
            'category_id' => $id,
        ];
        $result = $this->rows('select goods.*, 
                                category.title 
                                as name_category, category.id 
                                as cat_id 
                                from goods 
                                left join category 
                                on goods.category_id = category.id
                                where category.id =:category_id;', $params);
        return $result;
    }


    public function getCategory()
    {

        $result = $this->rows('select * from category');
        return $result;
    }




}