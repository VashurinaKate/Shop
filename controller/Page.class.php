<?php
include_once('models/M_Catalog.class.php');

class Page extends Base
{
	public function action_index() {
		$this->title .= 'Главная';
        $slogan = "The Brand Of Lux Fashion";
        $model = new M_Catalog;
        $goods = $model->getGoods(15);
		$this->content = $this->Template('views/index.php', array('slogan' => $slogan, 'goods' => $goods, 'count' => count($goods)));
	}
}
