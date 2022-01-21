<?php
class M_Cart {
    function getCart($userId) {
        $res = M_Pdo::Instance() -> Select('cart', 'user_id', $userId, true);
        // $cart[] = $res;
        $id = $res['product_id'];
        if ($res) {
            // return $res;
            // foreach ($cart as $cartGood) {
                // $id = $cartGood['product_id'];
                $data = M_Pdo::Instance() -> Select('catalog', 'id', $id);
                return $data;
            // }
        } else {
            // die($userId);
            return false;
        }
    }

    function removeFromCart($userId, $goodId) {
        $res = M_Pdo::Instance() -> Delete('cart', 'user_id', $id);
        if ($res) {
            return true;
        } else {
            // die('error');
            return false;
        }
    }
}
