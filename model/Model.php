<?php

/* для выборки данных из базы данных используем запросы,
class database из папки inc
сохраняем в переменную выбранный массив*/

class Model {
	//--------------- start - news limit3
	public static function getNewsLimit3() {
		//Запрос $SQL
		//Выполнить запрос

		$sql = "SELECT news.*, category.category FROM `news`, `category` WHERE `news`.idCategory=`category`.idCategory ORDER BY `news`.`date` DESC LIMIT 3";

		//создать экземпляр класса database
		$database = new database();
		//$rows = массив данных
		$rows = $database->getAll($sql);

		//------------------------------
		return $rows;


	}
	// detail news
	public static function getNewsDetail($id){
		$sql = "SELECT news.*, category.category FROM `news`, category WHERE news.idCategory=category.idCategory AND news.`idNews`=".$id;

		$database = new database();
		$row=$database->getOne($sql);
		//получаем одну запись
		return $row;


	}
	//------------picture list by id
	public static function getPictureNews($id){
		$sql = "SELECT * FROM `picture` WHERE `idNews`=".$id;
	
		$database= new database();
		$rows = $database->getAll($sql);// получаем массив картинок

		return $rows;

	}

	//------список комментов из таблицы по ид новости, нужное имя клиента, сортируем по дате добавл
	public static function getCommentsList($id) {
		$sql = "SELECT comments.*, user.username FROM `comments`, user WHERE user.idUser=comments.userId AND comments.newsId=".$id." ORDER BY `comments`.`date` DESC";
		$database = new database();
		$rows = $database->getAll($sql);// получаем массив
		return $rows;

	}

	public static function getCategoryList() {
		$sql = "SELECT category.*,COUNT(news.idNews) as countNews FROM `category` LEFT JOIN news ON category.idCategory=news.idCategory GROUP BY news.idCategory ORDER BY `category`.`category` ASC";
		$database = new database();
		$rows = $database->getAll($sql); //$rows = массив данных

		return $rows;
	}

	public static function getNewsList() {
		$sql = "SELECT news.*, category.category FROM `news`, `category` WHERE `news`.idCategory=`category`.idCategory ORDER BY `news`.`date` DESC";
		$database= new database();
		$rows = $database->getAll($sql);//$rows= массив данных
		return $rows;

	}

	//-------------------одна категория по id

	public static function getCategoryDetail($id)	{
		$sql = "SELECT * FROM `category` WHERE `idCategory`=".$id;
		$database= new database();
		$row = $database->getOne($sql);// одна запись
		return $row;
	}
// ------------------------------ новости по id категории
	public static function getNewsByCategory($id)	{
		$sql = "SELECT news.*, category.category FROM `news`, category WHERE news.idCategory=category.idCategory AND news.`idCategory`=".$id." ORDER BY `news`.`date` DESC";
		$database= new database();
		$rows= $database->getAll($sql);//$rows = массив данных
		return $rows;

	}

// -----------------------search
	public static function getSearch($text)	{
		$sql = "SELECT news.*, category.category FROM `news`,category WHERE news.idCategory=category.idCategory AND news.`newsText` LIKE '%".$text."%' ORDER BY `news`.`date` DESC";
		$database= new database();
		$rows= $database->getAll($sql); //$rows = массив данных
		// --------------------------------
		return $rows;
	}

	//-------------------- добавить комментарий
	public static function getCommentsAdd($id) {
		$result=false;
		if (isset($_SESSION['sessionId'])) {
			if(isset($_POST['send'])) {
				$body=trim($_POST['body']);
				$body=htmlspecialchars($body);
				if($body!="") {
					$userId=$_SESSION['userId'];
					$sql = "INSERT INTO `comments` (`id`, `userId`, `newsId`, `body`, `date`) VALUES (NULL, '$userId', '$id', '$body', CURRENT_TIMESTAMP)";
					$database= new database();
					$result= $database->executeRun($sql);
				} //if body
			}//if send
		}//if SESSION
		return $result;
	}
}

/// END MODEL

?>