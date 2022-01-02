<?php
ob_start();
?>
 <!--content-->
	<div class="col-xs-9">
        <h4 class="box-title">Редактировать новость</h4>
        <p>News edit date <?php echo date('d-m-Y');?></p>
<?php
//Результат добивать запись - ответ
	if(isset($result)) {
		if($result==true){
?>
			<div class="alert alert-info">
				<strong>Запись изменена.</strong><a href="newsAction"> Список новостей</a>
			</div>
		<?php
		}
		else if($result==false) {
		?>
			<div class="alert alert-warning">
				<strong>Ошибка изменения записи!</strong><a href="newsAction"> Список новостей</a>
			</div>
		<?php
		} //result - false
	} // isset result
	else {	//-------------форма add news
		?>
<!--content-->
	        <form action="editnewsResult?id=<?php echo $rowNews['idNews']; ?>" method="POST" enctype="multipart/form-data">
	        	Title*				
	            <input type="text" name="title" placeholder="title" class="form-control" value="<?php echo $rowNews['title']; ?>" required>
	            	Category*	
	            <select name="category" id="" class="form-control">
	            	<?php
	            		foreach ($rowsCategory as $row) {
	            		        echo '<option value="'.$row['idCategory'].'"';
	            		        if($row['idCategory']==$rowNews['idCategory']) echo 'selected';
	            		        echo '>'.$row['category'].'</option>';
	            		}
	            	?>
				</select>
				<p>Old picture		
	            <input type="text" name="oldpicture" placeholder="oldpicture" class="form-control" value="<?php echo $rowNews['newsPicture']; ?>" readonly>
	        	<img src="../images/<?php echo $rowNews['newsPicture']; ?>" class="thumbnail" width=150px></p>
	            New picture <i>(если необходимо, сделайте выбор)</i>
	            <input type="file" name="picture" class="form-control">
	            Text news*
				<textarea name="description" placeholder='text news' class="form-control" required>
<?php echo $rowNews['newsText']; ?></textarea>
				News create date
<input type="text" name="date" placeholder="oldPicture" class="form-control" value="<?php echo $rowNews['date']; ?>" readonly>
	           <input type="submit" class="btn btn-success" value="edit news" name="save">
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

