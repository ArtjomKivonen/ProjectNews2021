<?php

class ControllerCategory {
	public static function categoryList() {
		//get category list
		$rows= ModelCategory::getCategoryActionList();
		include_once('viewAdmin/categoryActionList.php');
	}
	public static function addCategoryForm() {
		//получить список категорий для формы add news
		$rowsCategory= ModelCategory::getCategoryActionList();
		include_once('viewAdmin/categoryAddForm.php');
	}
	//-------------add news result
	public static function addCategoryResult() {
		$result= ModelCategory::addCategory();
		include_once('viewAdmin/categoryAddForm.php');
	}
	//-------------edit
	public static function editCategoryForm($id){
		$rowDetail=ModelCategory::getCategoryDetail($id); // одна категория
		include_once('viewAdmin/categoryEditForm.php');
	}

	public static function editCategoryResult($id) {
		$result= ModelCategory::editCategory($id); //обработка формы edit
		include_once('viewAdmin/categoryEditForm.php');
	}
	//---------------delete

	public static function deleteCategoryForm($id) {
		$rowDetail=ModelCategory::getCategoryDetail($id);
		include_once('viewAdmin/categoryDeleteForm.php');
	}

	public static function deleteCategoryResult($id) {
		$result= ModelCategory::deleteCategory($id);
		include_once('viewAdmin/categoryDeleteForm.php');
	}
}


?>