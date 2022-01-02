<?php

class ModelNews {

	// --------------------List news
	public static function getNewsActionList() {
		$sql = "SELECT news.*, category.* FROM `news`, `category` WHERE `news`.idCategory=`category`.idCategory ORDER BY `news`.`date` DESC";
		$database= new database();
		$rows = $database->getAll($sql);//$rows= массив данных
		return $rows;

	}

	// ---------------------Add news
	public static function addNews() {
		$result= false;
		if(isset($_POST['save'])) {
			if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) ) {
				$title= $_POST['title'];
				$text= $_POST['description'];
				$idCategory= $_POST['category'];
				$date= date('Y-m-d');
				//-----закачка images на сервер
					$image= $_FILES['picture']['name']; //
					if($image!="") {
						$uploadfile= '../images/'. basename($_FILES['picture']['name']);
						copy($_FILES['picture']['tmp_name'], $uploadfile);
					}
				//--------------запрос INSERT в БД
				$sql="INSERT INTO `news` (`idNews`, `idCategory`, `title`, `newsText`, `date`, `newsPicture`) VALUES (NULL, '$idCategory', '$title', '$text', '$date', '$image')";
				$database= new database();
				$item= $database->executeRun($sql);//результат INSERT
					if($item==true) {
						$result=true;
					}
			} //если данные в форме заполнены
		} // если нажата send
		return $result;
	} //end add
	//-----------------detail news
	public static function getNewsDetail($id){
		$sql = "SELECT news.*, category.category FROM `news`, category WHERE news.idCategory=category.idCategory AND news.`idNews`=".$id;

		$database = new database();
		$row=$database->getOne($sql);
		//получаем одну запись
		return $row;
	}

	public static function editNews($id) {
		$result=false;
		if(isset($_POST['save']))
		{	if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category'])) {
			$title= $_POST['title'];
			$description= $_POST['description'];
			$idCategory= $_POST['category'];
			$date=$_POST['date'];
			$oldpicture=$_POST['oldpicture'];
			//---------------images
				$image= $_FILES['picture']['name']; //newspicture
				if($image!="" and $image!=$oldpicture) {//загрузка новой картинки, если выбрана
				$uploadfile= '../images/'. basename($_FILES['picture']['name']);
				copy($_FILES['picture']['tmp_name'], $uploadfile);
				unlink("../images/".$oldpicture);//удаляем старую картинку
				}else{
					$image=$oldpicture;//оставим старую картинку, если нет новой
				}
			//-----------------------------------
$sql="UPDATE `news` SET `idCategory`= '$idCategory', `title` = '$title', `newsText`='$description', `date`= '$date', `newsPicture`= '$image' WHERE `news`.`idNews`= '$id'";
					$database= new database();
					$item= $database->executeRun($sql);
						$result=true;
			}//isset $_POST
		}//save
	return $result;
	}//function

	//-------------------------delete
	public static function deleteNews($id) {
		$result=false;
		if(isset($_POST['save'])) {

			//-----------------images
			$oldpicture=$_POST['oldpicture']; //картинка
				unlink("../images/".$oldpicture);//удаляем
			//------------------------------
			$sql="DELETE FROM `news` WHERE `news`.`idNews`= $id";
			$database= new database();
			$item= $database->executeRun($sql);
			if($item==true) {
				$result=true;
			}//item
		}//save
		return $result;
	}
}// end class

?>