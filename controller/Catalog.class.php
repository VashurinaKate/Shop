<?php
include_once('../models/m_Catalog.class.php');
class Catalog extends Base
{
	public function action_index(){
	    $model = new m_Catalog;
		$this->title .= 'Каталог';
		$this->content = $this->Template('views/catalog.php', array('goods' => $model->getGoods()));
	}
}
