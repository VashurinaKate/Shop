<?php
class Page extends Base
{
	public function action_index() {
		$this->title .= 'Главная';
        $slogan = "The Brand Of Lux Fashion";
        $model = new M_Catalog;
        $catalog = new M_Catalog();
		$goods = $catalog->getGoods();

		$loader = new Twig_Loader_Filesystem('views');
        $twig = new Twig_Environment($loader); 
        // $twig = new Twig_Environment($loader, [
        //     'cache' => 'tcc','debug' => true,
        // ]);
        // $twig->addExtension(new DebugExtension());
        $template = $twig -> loadTemplate('index.twig');
        $vars = array(
            'slogan' => $slogan,
			'goods' => $goods,
			'count' => count($goods)
        );
        echo $template -> renderBlock('body', $vars);
        // echo $twig->render('index.twig', $vars);
	}
}
