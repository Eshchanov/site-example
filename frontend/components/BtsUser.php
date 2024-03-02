<?php

	namespace frontend\components;
	use yii\base\Component;

	class BtsUser extends Component
	{
		public $id;
		public $login;
		public $password;
		public $name;
		public $phone;

		// public function setValues($data)
		// {
		// 	$this->_id = isset($data['id']) ? $data['id'] : null;
		// 	$this->_login = isset($data['login']) ? $data['login'] : null;
		// 	$this->_password = isset($data['password']) ? $data['password'] : null;
		// 	$this->_name = isset($data['name']) ? $data['name'] : null;
		// 	$this->_phone = isset($data['phone']) ? $data['phone'] : null;
		// }

		public function setValues($data)
		{
			$this->login = isset($data['login']) ? $data['login'] : null;
		}
	}
?>