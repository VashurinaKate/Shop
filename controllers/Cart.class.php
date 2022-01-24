<?php
class Cart extends Base
{
    public function action_index() {
		$this->title .= 'Cart';
        $cart = new M_Cart();
        $catalog = new M_Catalog(); // ????
        $userId = $_GET['id'];
        $cartGoods = $cart->getCart($userId);

        $loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('cart.twig');
        if ($cartGoods) {
            $info = "Your cart";
            echo $template -> render(
                array(
                    'cartGoods' => $cartGoods,
                    // 'goods' => $goods,
                    'info' => $info
                )
            );
        } else {
            $info = "Your cart is empty";
            echo $template -> render(array('info' => $info));
        }
	}

    public function action_remove() {
		$this->title .= 'Корзина';
        $cart = new M_Cart();
        $productId = (int)$_GET['id'];
        $userId = $_SESSION['user_id'];

        $loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('cart.twig');

        if ($cart->removeFromCart($productId)) {
            $cartGoods = $cart->getCart($userId);
            echo $template -> render(
                array(
                    'cartGoods' => $cartGoods
                )
            );
        } else {
            $info = 'Что-то пошло не так';
            echo $template -> render(
                array(
                    'info' => $info
                )
            );
        };
	}

    public function action_clear() {
		$this->title .= 'Корзина';
        $cart = new M_Cart();
        $userId = $_SESSION['user_id'];
        $cart->clearCart($userId);

        $loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('cart.twig');

        $info = "Your cart is empty";
        echo $template -> render(array('info' => $info));
	}
}
