<?php
// spl_autoload_register(function($name){
//     include_once("../models/$name.class.php");
// });
include_once('../models/m_Catalog.class.php');

class Page extends Base
{
	public function action_index(){
		$this->title .= 'Главная';
		$this->content = $this->Template('views/index.php', array('slogan' => $slogan));
	}
	
    public function action_catalog(){
		$this->title .= 'Каталог';
        $model = new m_Catalog();
		$this->content = $this->Template('views/catalog.php', array('goods' => $model->getGoods()));
		// $this->content = $this->Template('views/catalog.php');

    }
}
