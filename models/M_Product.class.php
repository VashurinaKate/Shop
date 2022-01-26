<?php
class M_Product {
    function getProduct($id) {
        $query = "SELECT * FROM catalog WHERE id=$id";
        $res = M_Pdo::Instance() -> Select($query);
        if ($res) {
            return $res;
        } else {
            // die('Error');
            return false;
        }
    }
}
