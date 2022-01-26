<?php
class M_User {
    public function setPass($email, $password) {
	    return strrev(md5($email)) . md5($password);
    }

    public function getUserData($id) {
        $res = M_Pdo::Instance() -> Select('users', 'id', $id);
        return $res;
    }

	function auth($email, $password) {
        $res = M_Pdo::Instance() -> Select('users', 'email', $email);
        if ($res) {
            if ($res['password'] == $this -> setPass($email, $password)) {
                $_SESSION['user_id'] = $res['id'];
                $_SESSION['user_name'] = $res['name'];
                return true;
            } else {
                return false;
            }
        } 
        else {
            // return 'Пользователь с таким логином не зарегистрирован!';
            return false;
        }
    }

    function logout() {
        $_SESSION = array();
        session_destroy();
    }

    function regUser($name, $surname, $email, $password) {
        $res = M_Pdo::Instance() -> Select('users', 'email', $email);
        if (!$res) {
            $password = $this -> setPass($email, $password);
            $object = [
              'name' => $name,
              'surname' => $surname,
              'email' => $email,
              'password' => $password
            ];
            $res = M_Pdo::Instance() -> Insert('users', $object);
            if (is_numeric($res)) {
                return true;
            } else {
                return false;
            }
        } else {
            // return "regUser(): Пользователь уже существует.";
            return false;
        }
    }
}
