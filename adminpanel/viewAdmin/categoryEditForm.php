<?php
ob_start();
?>
 <!--content-->
	<div class="col-xs-9">
        <h4 class="box-title">Редактировать категорию</h4>
        <p>Date <?php echo date('d-m-Y');?></p>
<?php
//Результат добивать запись - ответ
	if(isset($result)) {
		if($result==true){
?>
			<div class="alert alert-info">
				<strong>Категория изменена.</strong><a href="categoryAction"> Список категорий</a>
			</div>
		<?php
		}
		else if($result==false) {
		?>
			<div class="alert alert-warning">
				<strong>Ошибка изменения категории!</strong><a href="categoryAction"> Список категорий</a>
			</div>
		<?php
		} //result - false
	} // isset result
	else {	//-------------форма edit category
		?>
<!--content-->
	        <form action="editcategoryResult?id=<?php echo $rowDetail['idCategory']; ?>" method="POST" enctype="multipart/form-data">
	            Category*
				<input type="text" name="category" placeholder="category" class="form-control" value="<?php echo $rowDetail['category']; ?>" required>
	           <input type="submit" class="btn btn-success" value="edit category" name="save">
	        </form>
  <!-- end content-->
<?php
	}//end else
?>

    </div>
  <!-- end content-->
<?php
	$content= ob_get_clean();
	include "viewAdmin/templates/layout.php"; ?>

