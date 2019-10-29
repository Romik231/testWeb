<?php


namespace models;

use models\Db;


class Catalog extends Db
{
    public function getGood()
    {
        $id = (int)trim(strip_tags($_GET['id_good']));

        $params = [
            'id' => $id,
        ];
        $sql = 'select * from goods where id=:id ';
        $result = $this->rows($sql, $params);
        return $result;
    }

    public function getGoods()
    {
        $id = (int)trim(strip_tags($_GET['cat_id']));
        $params = [
            'category_id' => $id,
        ];


        if ($_GET['desc'] == 1) {
            $sql = 'select goods.*, 
                                category.title 
                                as name_category, category.id 
                                as cat_id, category.short_description 
                                as cat_short, category.description
                                as cat_desc, active_category
                                as cat_act, good_id
                                as cai_good_id
                                from goods 
                                left join category 
                                on goods.category_id = category.id
                                where category.id =:category_id ORDER BY title ASC';
            $result = $this->rows($sql, $params);
        } elseif ($_GET['desc'] == 0) {
            $sql = 'select goods.*, 
                                category.title 
                                as name_category, category.id 
                                as cat_id, category.short_description 
                                as cat_short, category.description
                                as cat_desc, active_category
                                as cat_act, good_id
                                as cai_good_id
                                from goods 
                                left join category 
                                on goods.category_id = category.id
                                where category.id =:category_id ORDER BY title DESC';
            $result = $this->rows($sql, $params);
        } else {
            $sql = 'select goods.*, 
                                category.title 
                                as name_category, category.id 
                                as cat_id, category.short_description 
                                as cat_short, category.description
                                as cat_desc, active_category
                                as cat_act, good_id
                                as cai_good_id
                                from goods 
                                left join category 
                                on goods.category_id = category.id
                                where category.id =:category_id';
            $result = $this->rows($sql, $params);
        }


        return $result;
    }


    public function getCategory()
    {

        $result = $this->rows('select * from category');
        return $result;
    }


}