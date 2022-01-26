<?php
class Product extends Base
{
	public function action_product() {
		$this->title .= 'Product';
	    $product = new M_Product();
        $catalog = new M_Catalog();
        $id = (int)$_GET['id'];
		$productData = $product->getProduct($id);
        $goods = $catalog->getGoods();

		$loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
		$template = $twig -> loadTemplate('product.twig');
		echo $template -> render(
			array(
				'productData' => $productData,
				'goods' => $goods,
				'count' => count($goods)
			)
		);
	}
}
