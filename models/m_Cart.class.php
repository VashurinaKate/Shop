<?php
class M_Cart {
    function getCart($userId) {
        $res = M_Pdo::Instance() -> Select('cart', 'user_id', $userId, true);
        if ($res) {
            $data = M_Pdo::Instance() -> Select('cart INNER JOIN catalog ON cart.product_id = catalog.id', 'user_id', $userId, true);
            return $data;
        } else {
            return false;
        }
    }

    function removeFromCart($userId, $productId) {
        $whereVal = "user_id=$userId AND product_id";
        $res = M_Pdo::Instance() -> Delete('cart', $whereVal, $productId);
        if ($res) {
            return true;
        } else {
            // die('error');
            return false;
        }
    }

    function clearCart($userId) {
        $res = M_Pdo::Instance() -> Delete('cart', 'user_id', $userId);
        if ($res) {
            return true;
        } else {
            // die('error');
            return false;
        }
    }
}
