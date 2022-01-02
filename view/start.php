<?php
ob_start();
$title = 'САЙТ НОВОСТЕЙ';
?>
<div class="container" style="min-height: 400px;">
	<?php
		foreach ($rows as $row) {
	?>
			<div class="col-md-4">
				<img src="<?php print('images/'.$row['newsPicture']);?>" width="300" height="180" class="thumbnail">
				<h2 class="h2-start"><?php print($row['title']);?></h2>
				<h5><i>Дата: </i><?php print($row['date']); ?></h5>
				<p><i>Category: </i><?php print($row['category']);?></p>
				<?php
					echo '<div class="detail-link"><a href="detail?id='.$row['idNews'].'">Details</a></div>';
				?>



			</div>
	<?php
		}
	?>


</div>


<?php
	$content = ob_get_clean();
	include "view/templates/layout.php";