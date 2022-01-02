<?php
//начало сессии
session_start();
	require_once '../inc/database.php';// подключаем класс database
	include_once 'modelAdmin/ModelAdmin.php';
	include_once 'controllerAdmin/ControllerAdmin.php';
	//----------------------модели
	include_once 'modelAdmin/ModelNews.php';
	include_once 'modelAdmin/ModelCategory.php';

	//-------------------контроллеры
	include_once 'controllerAdmin/ControllerNews.php';
	include_once 'controllerAdmin/ControllerCategory.php';

	//----------------------
	include 'routeAdmin/routing.php';

	echo $response;
?>
