<?php


namespace controllers;


class AdminController extends Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы

    protected function before()
    {
        $this->title = '';
        $this->content = '';
    }
    protected function render()
    {
        $vars = ['title'=>$this->title, 'content'=>$this->content];
        $pageAdmin = $this->Template('mainadmin',$vars);
        echo $pageAdmin;
    }

}