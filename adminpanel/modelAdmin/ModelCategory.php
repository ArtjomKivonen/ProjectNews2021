<?php

class ModelCategory {

	//--------------------------List category
	public static function getCategoryActionList() {
		$sql= "SELECT * FROM `category` ORDER BY `category`.`category` ASC";
			$database= new database();
			$rows= $database->getAll($sql);
			return $rows;
	}

	// ---------------------Add category
	public static function addCategory() {
		$result= false;
		if(isset($_POST['save'])) {
			if(isset($_POST['category'])) {
				$category= $_POST['category'];
				//--------------запрос INSERT в БД
				$sql="INSERT INTO `category` (`category`) VALUES ('$category')";
				$database= new database();
				$item= $database->executeRun($sql);//результат INSERT
					if($item==true) {
						$result=true;
					}
			} //если данные в форме заполнены
		} // если нажата send
		return $result;
	} //end add
	// getCat details
	public static function getCategoryDetail($id){
		$sql = "SELECT category.`idCategory`, category.`category` FROM `category` WHERE category.`idcategory`=".$id;

		$database = new database();
		$row=$database->getOne($sql);
		//получаем одну запись
		return $row;
	}


	//-----------------Edit category
	public static function editCategory($id) {
		$result=false;
		if(isset($_POST['save'])) {
			if(isset($_POST['category'])) {
				$category=$_POST['category'];
				//--------------запрос INSERT в БД
		}
$sql="UPDATE `category` SET `category`= '$category'WHERE `category`.`idCategory`= '$id'";
					$database= new database();
					$item= $database->executeRun($sql);
						$result=true;
			}//isset $_POST
	return $result;
	}//function
	//-------------------------delete
	public static function deleteCategory($id) {
		$result=false;
		if(isset($_POST['save'])) {
			$sql="DELETE FROM `category` WHERE `category`.`idCategory`= $id";
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