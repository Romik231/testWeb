<?php

namespace models;

class Catalog extends Db
{
    //Получить конкретный товар
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

    //Получить все товары
    public function getGoods()
    {
        $id = (int)trim(strip_tags($_GET['cat_id']));
        $params = [
            'category_id' => $id,
        ];

        $countShow = 3; //Количество записей которое нужно выводить на странице
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];//Номер страницы
        } else {
            $pageNumber = 1;
        }
        $numberWrite = ($pageNumber * $countShow) - $countShow;//С какой записи выводить
        $countRowSql = 'SELECT COUNT(*) from goods WHERE category_id=' . $id;
        $countRow = $this->query($countRowSql);
        foreach ($countRow as $key => $value) {
            $total = $value['COUNT(*)'];
        }

        $strPage = ceil($total / $countShow);//Сколько всего будет страниц
        //Не могу никак передать на главную страницу этот параметр

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
                                where category.id =:category_id ORDER BY title ASC LIMIT ' . $numberWrite . ',' . $countShow;
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
                                where category.id =:category_id ORDER BY title DESC LIMIT ' . $numberWrite . ',' . $countShow;
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
                                where category.id =:category_id LIMIT ' . $numberWrite . ',' . $countShow;
            $result = $this->rows($sql, $params);
        }
        return $result;
    }

    //Получить все категории
    public function getCategory()
    {

        $result = $this->rows('select * from category');
        return $result;
    }


}