<?phpnamespace controllers;//// Базовый контроллер сайта.//abstract class C_Base extends C_Controller{	protected $title;		// заголовок страницы	protected $content;		// содержание страницы			protected function before()	{		$this->title = '';		$this->content = '';	}		//	// Генерация базового шаблонаы	//		public function render()	{		$vars = array('title' => $this->title, 'content' => $this->content);			$page = $this->Template('v_main', $vars);		echo $page;	}	}