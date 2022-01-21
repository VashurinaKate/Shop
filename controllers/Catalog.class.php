<?php
class Catalog extends Base
{
	public function action_index(){
		$this->title .= 'Каталог';
	    $catalog = new M_Catalog();
		$goods = $catalog->getGoods();

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

	public function action_add() {
		$this->title .= 'Каталог';
        $userId = $_SESSION['user_id'];
        $productId = $_GET['id'];
	    $catalog = new M_Catalog();
		// $goods = $catalog->getGoods();

        $loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('catalog.twig');// ???????

        if ($catalog->addToCart($userId, $productId)) {
            $info = "Товар успешно добавлен!";
            echo $template -> render(
                array(
                    // 'goods' => $goods,
                    'info' => $info
                )
            );
        } else {
            $info = "Что-то пошло не так";
            echo $template -> render(
                array(
                    'info' => $info
                )
            );
        }
	}
}
