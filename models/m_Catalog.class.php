<?php
class M_Catalog {
    function getGoods() {
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        } else {
            $limit = 3;
        }
        $catalogLimit = "catalog LIMIT $limit";
        $res = M_Pdo::Instance() -> Select($catalogLimit, false, false, true);
        if ($res) {
            return $res;
        } else {
            // die('Error');
            return false;
        }
    }

    function addToCart($userId, $productId) {
        $object = [
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1,
            'order_id' => 1,
            'status' => 'active',
            'date_of_update' => date("Y-m-d"),
            'date_of_create' => date("Y-m-d")
        ];
        $res = M_Pdo::Instance() -> Insert('cart', $object);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    
}
