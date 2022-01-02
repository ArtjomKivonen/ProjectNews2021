<?php
ob_start();
?>
 <!--content-->
	<div class="col-xs-9">
        <h4 class="box-title">Удалить категорию</h4>
        <p>Date <?php echo date('d-m-Y');?></p>
<?php
//Результат добивать запись - ответ
	if(isset($result)) {
		if($result==true){
?>
			<div class="alert alert-info">
				<strong>Категория удалена.</strong><a href="categoryAction"> Список категорий</a>
			</div>
		<?php
		}
		else if($result==false) {
		?>
			<div class="alert alert-warning">
				<strong>Ошибка удаления категории!</strong><a href="categoryAction"> Список категорий</a>
			</div>
		<?php
		} //result - false
	} // isset result
	else {	//-------------форма edit category
		?>
<!--content-->
	        <form action="deleteCategoryResult?id=<?php echo $rowDetail['idCategory']; ?>" method="POST" enctype="multipart/form-data">
	            Category*
				<input type="text" name="category" placeholder="category" class="form-control" value="<?php echo $rowDetail['category']; ?>" readonly>
	           <input type="submit" class="btn btn-success" value="delete category" name="save">
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

