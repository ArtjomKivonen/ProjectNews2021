<?php
class ControllerAdmin {
	// start page controll
	public static function startAdmin() {
		include_once('viewAdmin/dashboard.php');
	}
	//-----------admin logout
	public static function logoutAdmin() {
		ModelAdmin::getAdminLogout();
		header('Location:../'); //возврат на клиент часть сайта
	}

	//-----------Страница Error
	public static function error404() {
		include_once('viewAdmin/error404.php');
	}
	
	//-----------------------profile admin

	public static function profileTable() {
		include_once('viewAdmin/profileTable.php');
	}

	public static function profileEditResult() {
		$result=ModelAdmin::ChangePassword();// запрос на изменение пароля
		include_once('viewAdmin/profileTable.php');
	}

	

}//end class
?>