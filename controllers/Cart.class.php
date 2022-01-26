<?php
class Cart extends Base
{
    public function action_index() {
		$this->title .= 'Cart';
        $cart = new M_Cart();
        $catalog = new M_Catalog();
        $userId = $_GET['id'];
        $cartGoods = $cart->getCart($userId);
        $goods = $catalog->getGoods();

        $loader = new Twig_Loader_Filesystem('views'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('cart.twig');
        if ($cartGoods) {
            $info = "Your cart";
            echo $template -> render(
                array(
                    'cartGoods' => $cartGoods,
                    'goods' => $goods,
                    'info' => $info
                )
            );
        } else {
            $info = "Your cart is empty";
            echo $template -> render(array('info' => $info));
        }
	}

    public function action_add_to_cart() {
		$this->title .= 'Корзина';
        $cart = new M_Cart();
        $user = new M_User();
        $userId = $user->getUserId();
        $goodId = (int)$_GET['id'];
        if ($cart->addToCart($userId, $goodId)) {
            $addition_info = "Товар успешно добавлен!";
            $this->content = $this->Template('views/cart.php', array('addition_info' => $addition_info));
        } else {
            $addition_info = "Что-то пошло не так";
            $this->content = $this->Template('views/cart.php', array('addition_info' => $addition_info));
        }
	}

    public function action_remove_from_cart($id) {
		$this->title .= 'Корзина';
        $cart = new Cart;
        $id = (int)$_GET['id'];
        $cart->removeFromCart($id);
		$this->content = $this->Template('views/cart.php', array('cartGoods' => $cartGoods));
	}

}
