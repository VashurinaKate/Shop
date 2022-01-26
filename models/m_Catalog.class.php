<?php
class M_Catalog {
    function getGoods() {
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        } else {
            $limit = 3;
        }
        // $query = "SELECT * FROM catalog LIMIT $limit ";
        $res = M_Pdo::Instance() -> Select('catalog', false, false, true);
        if ($res) {
            return $res;
        } else {
            // die('Error');
            return false;
        }
    }
}
