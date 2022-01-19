<?php
class Catalog extends Base
{
	public function action_index(){
	    $catalog = new M_Catalog();
		$goods = $catalog->getGoods();
		$this->title .= 'Каталог';
		$loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
		$template = $twig -> loadTemplate('catalog.twig');
		echo $template -> render(
			array(
				'goods' => $goods,
				'count' => count($goods)
			)
		);
	}
}
