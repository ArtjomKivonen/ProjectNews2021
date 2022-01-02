<?php
ob_start();
?>
 <!--content-->
	<div class="col-xs-9">
        <h4 class="box-title">Добавить новость</h4>
        <p>News date <?php echo date('d-m-Y');?></p>
<?php
//Результат добивать запись - ответ
	if(isset($result)) {
		if($result==true){
?>
			<div class="alert alert-info">
				<strong>Запись добавлена.</strong><a href="newsAction"> Список новостей</a>
			</div>
		<?php
		}
		else if($result==false) {
		?>
			<div class="alert alert-warning">
				<strong>Ошибка добавления записи!</strong><a href="newsAction"> Список новостей</a>
			</div>
		<?php
		} //result - false
	} // isset result
	else {	//-------------форма add news
		?>
<!--content-->
	        <form action="addnewsResult" method="POST" enctype="multipart/form-data">						
	            <input type="text" name="title" placeholder="title" class="form-control" >											
	            <select name="category" id="" class="form-control">
	            	<?php
	            		foreach ($rowsCategory as $row) {
	            		        echo '<option value="'.$row['idCategory'].'">'.$row['category'].'</option>';
	            		}
	            	?>
				</select>		
	            <input type="file" name="picture"  class="form-control" required>
				<textarea name="description" placeholder='text news' class="form-control" required></textarea>	
	           <input type="submit" class="btn btn-success" value="add news" name="save">
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

