<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path  = explode('/', $host)[$num];

if($path == 'index.php' OR $path =='' OR $path == 'index') {
	//start admin
	$reponse = ControllerAdmin::startAdmin();
}
// -------------logout

elseif($path == 'logout') {
	// logout
	$response= ControllerAdmin::logoutAdmin();

}

// - ----------------------News CRUD---add news

elseif($path == 'newsAction') {
	$response = ControllerNews::newsList();
}

elseif($path == 'addnews') {
	$response = ControllerNews::addNewsForm();
}

elseif($path == 'addnewsResult') {
	$response = ControllerNews::addNewsResult();
}
//-------------------------------edit news

elseif($path == 'editnews') {
	if(isset($_GET['id'])) {
		$response= ControllerNews::editNewsForm($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}
elseif($path == 'editnewsResult') {
	if(isset($_GET['id'])) {
		$response= ControllerNews::editNewsResult($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}

//------------------------------delete news

elseif($path == 'deletenews') {
	if(isset($_GET['id'])) {
		$response= ControllerNews::deleteNewsForm($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}
elseif($path == 'deletenewsResult') {
	if(isset($_GET['id'])) {
		$response= ControllerNews::deletenewsResult($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}

//--------------------------category CRUD---add cat

elseif($path == 'categoryAction') {
	$response = ControllerCategory::categoryList();
}

elseif($path == 'addcategory') {
	$response = ControllerCategory::addCategoryForm();
}

elseif($path == 'addcategoryResult') {
	$response = ControllerCategory::addCategoryResult();
}

//---------------------------edit category

elseif($path == 'editcategory') {
	if(isset($_GET['id'])) {
		$response= ControllerCategory::editCategoryForm($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}
elseif($path == 'editcategoryResult') {
	if(isset($_GET['id'])) {
		$response= ControllerCategory::editCategoryResult($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}

//------------------------------delete category

elseif($path == 'deletecategory') {
	if(isset($_GET['id'])) {
		$response= ControllerCategory::deleteCategoryForm($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}
elseif($path == 'deleteCategoryResult') {
	if(isset($_GET['id'])) {
		$response= ControllerCategory::deleteCategoryResult($_GET['id']);
	}else{
		$response= ControllerAdmin::error404();
	}
}
//----------------------profile admin
elseif ($path== 'profile')  {
	$response= ControllerAdmin::profileTable();
}
elseif ($path== 'profileEditResult') {
	$response= ControllerAdmin::profileEditResult();
}

//--------------------------

else{
	// page doesn`t exist
	$response= ControllerAdmin::error404();
}

?>