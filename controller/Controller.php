<?php

class Controller{
	//стартовая страница
	public static function startSite() {
		$rows=Model::getNewsLimit3();
		include_once('view/start.php');
	}

	//страница contact форма
	public static function contact() {
		include_once ('view/contact.php');
	}

	public static function contactSend() {
		error_reporting(0);
		$message=ModelContact::getContactMessage();
		include_once('view/contact.php');
	}
	//страница error

	public static function error404() {
		include_once('view/error404.php');
	}
// page news detail

	public static function newsDetail($id){
		//запрос на получение данных одной новости по id
		$row=Model::getNewsDetail($id);
		//запрос на получение данных списка картинок из таблицы picture по id новости
		$rows=Model::getPictureNews($id);
		//запрос на получение данных списка комментов из таблицы comments по id новости
		$comments=Model::getCommentsList($id);
		//строим страницу вывода
		include_once('view/newsDetail.php');
	}

// Page news list

	public static function newsList(){
		$categories= Model::getCategorylist();
		$rows=Model::getNewslist();
		$countNews=count($rows);
		include_once('view/newsList.php');
	}

//-----------------news By Category
	public static function newsByCategory($id)	{
		$categories=Model::getCategoryList();
		$categoryOne=Model::getCategoryDetail($id);
		// ---- all news
		$rows=Model::getNewsList();
		$countNews=count($rows); // всего новостей в таблице
		// ----------------новости по категории
		$rows=Model::getNewsByCategory($id);
		//------------------
		include_once('view/newsList.php');

	}
	public static function textSearch($text)	{
		$categories=Model::getCategoryList();
		//-----------all news
		$rows=Model::getNewsList();
		$countNews=count($rows);
		//------------$text 0 строка поиска
		$rows=Model::getSearch($text);
		include_once('view/newsList.php');
	}

	//--------------добавление комментариев по id новости
	public static function commentsAdd($id) {
		$resultAdd=Model::getCommentsAdd($id);
		if($resultAdd==false) {//если добавление не удачно
			$_SESSION['comments']='<p style="color:red;">Не удалось добавить комментарий</p>';
		}
		header('Location:detail?id='.$id);//переход на маршрут для detail новости
	}

}

//END CLASS CONTROLLER

?>