<?php
ob_start();
?>
<!--content -->
	<h4 class="box-title">News Action list</h4>
	<button class="btn btn-success btn-sm ">
		<a href='addnews' style='color: white'>add news</a>
	</button>
	<table class="table">
		<thead>
			<tr class="d-flex">
				<th style="width:5%">#</th>
				<th style="width:25%">Title</th>
				<th style="width:20%">Category</th>
				<th style="width:20%">Date</th>
				<th style="width:20%">Picture</th>							
				<th style="width:10%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php // выводим список новостей в таблицу
			foreach($rows as $row) {
		?>
			<tr>
				<td><?php echo $row['idNews']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['category']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td><img src="../images/<?php echo $row['newsPicture']; ?>" alt='' width='100px'></td>							
				<td>
					<button class="btn btn-warning btn-sm btn-block">
					<a href='editnews?id=<?php echo $row['idNews']; ?>' style='color: white'>edit</a>
					</button>							
					<button class="btn btn-danger btn-sm btn-block">
					<a href='deletenews?id=<?php echo $row['idNews']; ?>' style='color: white'>delete</a>
					</button>
				</td>
			</tr>
			<?php
				}//end foreach
			?>
			
		</tbody>
		<tfoot>
			<tr>
				<td colspan=6></td>
			</tr>
		</tfoot>
	</table>
<!-- end content-->
<?php
	$content = ob_get_clean();
	include "viewAdmin/templates/layout.php";