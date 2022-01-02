<?php

class ModelContact{

	public static function getContactMessage() {
			$errorString="";
			$send=array(false, 'error send');
		if(isset($_POST['send'])){
			$myemail="you@domain.com";
			$yourname=$_POST['name'];
				if(trim($yourname)=='') //если поле name осталось пустое
			{
				$errorString.='Enter your name<br/>';
			}
			
			$email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			if(!$email){ //если поле email заполнено неправильно
				$errorString.='Wrong e-mail<br/>';
			}
			$comments=$_POST['message'];

			//-------------------------проверка заполненность полей на корректность
			if(trim($comments)=="")
			{//если поле message осталось пустое
				$errorString.='No text input<br/>';
			}
			//------------------------report send mail создание отчета и отправка сообщения на емайл
			$subject='Message from company site';
			if($errorString==""){
				$message="
				<i>Contact form from mysite</i><hr>
				Hello!<br>
				Your name: $yourname<br>
				Your email: $email<br>
				Your message: <br> $comments
				<hr>
				Сообщение отправлено на почту фирмы и копия на ваш e-mail: $email<br>
				----------End message----------
				";
				mail($myemail,$subject,$message);//отправка на email фирмы
				$send=array(true, $message);
			}else{
				$send=array(false, $errorString);
			}

		}
		return $send;
	}
// END MODELCONTACT class
}

?>