<?php

class ControllerNews {

	public static function newsList()	{
		//получить список новостей
		$rows = ModelNews::getNewsActionList();
		include_once('viewAdmin/newsActionList.php');
	}

	//-------------add news form

	public static function addNewsForm() {
		//получить список категорий для формы add news
		$rowsCategory= ModelCategory::getCategoryActionList();
		include_once('viewAdmin/newsAddForm.php');
	}
	//-------------add news result
	public static function addNewsResult() {
		$result= ModelNews::addNews();
		include_once('viewAdmin/newsAddForm.php');
	}
	//-------------edit
	public static function editNewsForm($id){
		$rowsCategory= ModelCategory::getCategoryActionList(); //список категорий
		$rowNews=ModelNews::getNewsDetail($id); // одна новость
		include_once('viewAdmin/newsEditForm.php');
	}

	public static function editNewsResult($id) {
		$result= ModelNews::editNews($id); //обработка формы edit
		include_once('viewAdmin/newsEditForm.php');
	}
	//---------------delete

	public static function deleteNewsForm($id) {
		$rowsCategory= ModelCategory::getCategoryActionList();
		$rowNews=ModelNews::getNewsDetail($id);
		include_once('viewAdmin/NewsDeleteForm.php');
	}

	public static function deleteNewsResult($id) {
		$result= ModelNews::deleteNews($id);
		include_once('viewAdmin/newsDeleteForm.php');
	}
}// ---------------end class

?>