<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path  = explode('/', $host)[$num];

//...code

if ($path == '' OR $path == 'index.php' OR $path== 'home') {
	//главная страница

	$response = Controller::startSite();
}
elseif ($path == 'contact') {
	// страница Контакт contact
	$response = Controller::contact();
}
elseif ($path == 'contactSend'){
	// обработка формы сообщений страница Контакт
	$response = Controller::contactSend();
}

//маршрут для просмотра одной новости

elseif ($path == 'detail') {
	//если известен id  - номер новости из адресной строки.
	if(isset($_GET['id'])){
		$response=Controller::newsDetail($_GET['id']);
	}else{
		$response=Controller::error404();
	}
}

elseif ($path == 'news'){
	$response = Controller::newsList();

}

elseif($path=='category'){
	if(isset($_GET['id'])){
		$response= Controller::newsByCategory($_GET['id']);
	}else{
		$response= Controller::error404();
	}
}

elseif ($path=='search') {	//Просмотр поиск
	if(isset($_GET['text'])){
		$response = Controller::textSearch($_GET['text']);
	}else{
		$response = Controller::error404();
	}
}

// ................. login - logout
elseif ($path=='login' || $path=='register') {//формы
	$response= controllerUser::loginForm();
}
elseif ($path== 'loginResult') { //обработка login
	$response= controllerUser::loginResult();
}
elseif ($path=='logout') {//выход
	$response= controllerUser::logoutAction();
}

elseif ($path== 'registerResult') { //обработка register
	$response= controllerUser::registerResult();
}

//-------------comments add
elseif ($path== 'comments') {// комментарии
	if(isset($_GET['id'])) {	//id - номер новости
		$response= Controller::commentsAdd($_GET['id']);
	}else{
		$response= Controller::error404();
	}
 }


else {
	//страница не существует

	$response = Controller::error404();
}



?>





















