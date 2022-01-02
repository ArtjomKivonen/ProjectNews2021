<?php
ob_start();
?>
<!--content -->
	<h4 class="box-title">Category Action list</h4>
	<button class="btn btn-success btn-sm ">
		<a href='addcategory' style='color: white'>add category</a>
	</button>
	<table class="table">
		<thead>
			<tr class="d-flex">
				<th style="width:20%">#</th>
				<th style="width:70%">Category name</th>
				<th style="width:10%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php // выводим список категорий
			foreach($rows as $row) {
		?>
			<tr>
				<td><?php echo $row['idCategory']; ?></td>
				<td><?php echo $row['category']; ?></td>
				<td>
					<button class="btn btn-warning btn-sm btn-block">
					<a href='editcategory?id=<?php echo $row['idCategory']; ?>' style='color: white'>Edit <span class="glyphicon glyphicon-edit"></span></a>
					</button>							
					<button class="btn btn-danger btn-sm btn-block">
					<a href='deletecategory?id=<?php echo $row['idCategory']; ?>' style='color: white'>Delete <span class="glyphicon glyphicon-remove"></span></a>
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