<?php


namespace models;

class CatalogAdmin extends Catalog
{
    public function addCategory()
    {
        $title = trim(strip_tags($_POST['title']));
        $shortDesc = trim(strip_tags($_POST['short_description']));
        $descr = trim(strip_tags($_POST['description']));
        $active = (int)trim(strip_tags($_POST['active_category']));
        $goodId = (int)trim(strip_tags($_POST['good_id']));

        if($title == '' or $shortDesc =='' or $descr== '' or $active== ''){
            return false;
        }
        $params = [
            'title'=>$title,
            'short'=>$shortDesc,
            'desc'=>$descr,
            'active'=>$active,
            'good'=>$goodId
        ];

        $this->query('INSERT INTO category(title,short_description,description,active_category,good_id)
                        VALUES (:title, :short, :desc, :active, :good)', $params);
    }
}