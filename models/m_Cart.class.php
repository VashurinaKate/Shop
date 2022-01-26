<?php
class M_Cart {
    function getCart($userId) {
        $query = "SELECT * FROM cart WHERE user_id=$userId";
        $res = M_Pdo::Instance() -> Select($query);
        if ($res) {
            return $res;
        } else {
            // die($userId);
            return false;
        }
    }

    function addToCart($userId, $goodId) {
        $sql = "INSERT INTO cart (`good_id`, `order_id`, `user_id`, `amount`, `date_of_create`, `date_of_update`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $res = $db->prepare($sql);

        $date = date("Y-m-d");
        $data = $res->execute([$goodId, 1, $userId, 1, $date, $date, 'active']);
        if ($data) {
            return $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // return false;
            die($res->fetchAll(PDO::FETCH_ASSOC));
        }
    }

    function removeFromCart($userId, $goodId) {
        $sql = "UPDATE cart SET amount=$amount WHERE good_id=$id";
        $res = $db->prepare($sql);
        $data = $res->execute();
        if ($data) {
            return $res->fetchAll(PDO::FETCH_ASSOC); // true
        } else {
            die('error');
        }
    }
}
