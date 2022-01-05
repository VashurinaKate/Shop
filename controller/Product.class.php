<?php
include_once('models/M_Product.class.php');
include_once('models/M_Catalog.class.php');

class Product extends Base
{
	public function action_product(){
	    $product = new M_Product;
        $catalog = new M_Catalog;
        $id = (int)$_GET['id'];
		$productData = $product->getProduct($id);
        $catalogData = $catalog->getGoods(3);
		$this->title .= 'Продукт';
		$this->content = $this->Template('views/product.php', array('productData' => $productData, 'goods' => $catalogData));
	}
}
