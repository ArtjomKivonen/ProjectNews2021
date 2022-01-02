<?php
class ModelAdmin{

// -----------------Admin panel logout
	public static function getAdminLogout() {
		session_destroy();
		unset($_SESSION['sessionId']);
		unset($_SESSION['userId']);
		unset($_SESSION['name']);
		unset($_SESSION['role']);
		unset($_SESSION['email']);
	}
//-----------------------ChangePassword admin
	public static function ChangePassword() {
		$result=array(false, "No correct password");
		if(isset($_POST['send'])) {
			//читаем данные из формы
			$currentPassword=$_POST['currentPassword'];
			$newPassword=$_POST['newPassword'];
			$confirmPassword=$_POST['confirmPassword'];
			//--------------------------
			if($newPassword==$confirmPassword && $newPassword!="") {
			//--выбор хеш пароля из базы по е-майл адресу
				$sql="SELECT * FROM `user` WHERE `email` ='".$_SESSION['email']."'";
				$database= new database();
				$item= $database->getOne($sql);
				//----проверка правильности ввода текущего пароля
				if(password_verify($currentPassword, $item['password'])) {
					$passwordHash=password_hash($newPassword, PASSWORD_DEFAULT); //кодируем новый пароль
				   $sql="UPDATE `user` SET `password`= '$passwordHash' WHERE `user`.`idUser`= ".$_SESSION['userId'];
				    $database= new database();
				    $item= $database->executeRun($sql);//записали новый пароль в базу данных
				    $result=array(true, "Password changed");

				    }else{
				    	$result=array(false, "No insert change password");
				    }
				}
			}
			return $result;
		}//Changepassword
}//end class



















