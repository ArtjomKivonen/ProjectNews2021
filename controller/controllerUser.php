<?php

class controllerUser{
//---------------login форма
	public static function loginForm() {
		include_once('view/loginRegisterForm.php');
	}
//обработка формы login
	public static function loginResult() {
		$resultLogIn= modelUser::userLogin();

		include_once('view/loginRegisterForm.php');
	}
//--------------logout
	public static function logoutAction() {
		modelUser::userLogout();
		include_once('view/loginRegisterForm.php');
	}
// ----------------обработка формы register
	public static function registerResult() {

		$resultReg= modelUser::userRegister();
		include_once('view/loginRegisterForm.php');
	}

} //end class


