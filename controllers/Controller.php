<?php
namespace controllers;

abstract class Controller
{

	protected abstract function render();
	

	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();
		$this->$action();   //$this->action_index
		$this->render();
	}
	

	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}


	protected function Template($fileName, $vars = [])
	{
        extract($vars);

		ob_start();
		include '../views/'.$fileName.'.php';
		return ob_get_clean();	
	}	
	

	public function __call($name, $params){
        die('Запрашиваемая страница не найдена');
	}
}
