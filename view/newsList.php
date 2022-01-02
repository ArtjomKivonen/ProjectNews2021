<?php
ob_start();
$title='News List';
// заголовок для списка новостей по категории
if(isset($categoryOne)) $title.=' - '.$categoryOne['category'];
if(isset($text)) $title.='<h4> Результат поиска по запросу '.$text.'</h4>';
?>
<div class="container" style="min-height: 400px;">
	<aside>
		<h3>Category</h3>
		<ul>
			<li><a href="news">All(<?php echo $countNews; ?>)</a></li>
		<?php
		foreach ($categories as $category) {
			echo '<li>';
			echo '<a href="category?id='.$category['idCategory'].'">';
			echo $category['category'].'('.$category['countNews'].')</a>';
			echo '</li>';
		}
		?>
		</ul>
	</aside>
	<content>
		<div class="col-md-12">
			<table class="table table-bordered table-responsive">
				<tr>
					<th width="20%">Date</th>
					<th width="60%">header News</th>
					<th width="20%"></th>
				</tr>
			<?php
			if(count($rows)>0){//если есть новости в категории
				foreach ($rows as $row) {
					echo '<tr>';
						echo '<td>'.$row['date'].'</td>';
						echo '<td>'.$row['title'].'<i>Category: '.$row['category'].'</td>';
						echo '<td><a href="detail?id='.$row['idNews'].'">Details...</a></td>';
					echo '</tr>';
				}
			}else{//если нет новостей в категории
				echo '<tr><td colspan=3>В этой категории или по запросу нет статей </td></tr>';

				}
				?>
			</table>

		</div>
	</content>
</div>

<?php $content = ob_get_clean();
	include "view/templates/layout.php";