<?php
class M_Product {
    function getProduct($id) {
        $res = M_Pdo::Instance() -> Select('catalog', 'id', $id, true);
        if ($res) {
            return $res;
        } else {
            // die('Error');
            return false;
        }
    }
}
