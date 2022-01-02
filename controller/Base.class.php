<?php
//
// Базовый контроллер сайта.
//
abstract class Base extends Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
    protected $keyWords;

    protected function before() {
		$this->title = '';
		$this->content = '';
		$this->keyWords="";
	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content, 'kw' => $this->keyWords);
		$page = $this->Template('views/main.php', $vars);
		echo $page;
	}
}
