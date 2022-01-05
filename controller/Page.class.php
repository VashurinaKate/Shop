<?php
include_once('models/M_Catalog.class.php');

class Page extends Base
{
	public function action_index() {
		$this->title .= 'Главная';
        $slogan = "The Brand Of Lux Fashion";
        $model = new M_Catalog;
        $goods = $model->getGoods(3);
		$this->content = $this->Template('views/index.php', array('slogan' => $slogan, 'goods' => $goods));
	}
    public function action_cart() {
		$this->title .= 'Корзина';
		$this->content = $this->Template('views/cart.php', array());
	}
    // public function action_registration() {
	// 	$this->title .= 'Регистрация';
	// 	$this->content = $this->Template('views/registration.php', array());
	// }
}
