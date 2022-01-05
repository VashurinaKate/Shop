<?php
include_once('models/M_User.class.php');

class User extends Base {
	public function action_invitation() {
		$this->title .= 'Приглашение';
		$this->content = $this->Template('views/invitation.php');
	}

	public function action_account() {
		$this->title .= 'Личный кабинет';
		$this->content = $this->Template('views/account.php');
	}

	public function action_logout() {
		$this->title .= 'Приглашение';
		$user = new M_User();
		$user->logout();
		$this->content = $this->Template('views/invitation.php');
	}

	public function action_registration() {
		$this->title .= 'Регистрация';
		$user = new M_User();
		if ($_POST) {
			if ($user->register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'])) {
				$info = "Вы успешно зарегистрированы!";	
				$this->content = $this->Template('views/invitation.php', array('info' => $info));
			} else {
				$info = 'Что-то пошло не так, попробуйте еще раз';
				$this->content = $this->Template('views/registrationForm.php', array('info' => $info));
			}
		} else {
			$this->content = $this->Template('views/registrationForm.php');
		}
	}

	public function action_auth() {
		$this->title .= 'Авторизация';
        $user = new M_User();
        if ($_POST) {
			$userData = $user->auth($_POST['email'], $_POST['password']);
			if ($userData) {
				$info = 'Вы успешно вошли в аккаунт!';
				$this->content = $this->Template('views/account.php', array('info' => $info, 'email' => $email, 'userData' => $userData));
			} 
			else {
				$info = 'Неправильно введен логин или пароль';
				$this->content = $this->Template('views/authForm.php', array('info' => $info));
			}
		}
		else {
		   	$this->content = $this->Template('views/authForm.php');
		}
	}
}
