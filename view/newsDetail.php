<?php
ob_start();
$title = $row['title']; // заголовок
?>
<!--start block-->

<div class="container" style="min-height: 400px;">
	<div class="col-md-12">
		<?php
		//выводим одну новость по id
		echo '<img src="images/'. $row['newsPicture'].'" class="thumbnail" width="300" height="auto" style="float:left; margin: 0px 15px 7px 0">';
		echo $row['newsText'];
		echo '<h5>Дата: '.$row['date'].'</h5>';
		echo '<p><i>Category: </i>'.$row['category'].'</p>';
		?>
		<div style="clear:both"></div>
		<?php
		//картинки из таблицы picture по id новости
		if(count($rows)>0){
			echo '<h3>Photo news: </h3>';
			foreach ($rows as $image) {
				echo '<div class="thumbnail" style="float:left; margin:10px;">';
				echo '<img src="images/'.$image['picture'].'" width="200" height="180" >';
				echo '</div>';
			}
		}
		echo '<div style="height: 40px; width:300px; clear:both;">';
		echo '<a href="news">News List</a>';//ссылка на маршрут news - список новостей
		echo '</div>';
		?>
	</div>
	<hr>
	<!--здесь блок форма для добавления комментов-->
		<?php
		include_once 'view/commentsForm.php';
		?>
	<div class="container">
		<h3>Comments List <?php echo '('.count($comments).')';?></h3>

		<?php
			if(count($comments)>0){
				foreach($comments as $comment){
					echo '<hr>';
					echo '<p><i>Author: </i>'.$comment['username'].'<br>';
					$date=date("d-m-Y", strtotime($comment['date'])); //формат для даты дд-мм-гггг
					echo '<i>Date created:</i>'.$date.'</p>';
					echo '<p><span class="spanclass"><i>Comment: </i></span>'.$comment['body'].'</p>';
				}
			}else{
				echo '<p>This post has no comments</p>';
			}
		?>


	</div>


</div>
<?php
$content = ob_get_clean();
include "view/templates/layout.php";