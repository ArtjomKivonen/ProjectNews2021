<?php
// блок добавить комментарий
	if(isset($_SESSION['sessionId'])) { // если установлена сессия для пользователя
?>
	<div class="container">
		<div class="col-sm-10">
		<!--  комментарий об ошибках -->
		<?php
		if(isset($_SESSION['comments'])){// ошибка добавить комментарий
			echo $_SESSION['comments'];
			unset($_SESSION['comments']);
		}
		?>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Comments Add - <?php echo $_SESSION['name']; ?></h4>
				</div> 
				<div class="panel-body">					
				   <form action="comments?id=<?php  echo  $row['idNews'] ?>" method="POST" > 
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<strong>Comment text <i>(1000 symbols)</i>:</strong>				
									<textarea class="form-control" style="height:50px" name="body" required ></textarea>
								</div>
							</div>							
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary" name="send">Send comment</button>
							</div>
						</div>
					</form>		
				</div>
			</div>
		</div>	
		</div>
	</div>
<?php
	} //if SESSION
?>