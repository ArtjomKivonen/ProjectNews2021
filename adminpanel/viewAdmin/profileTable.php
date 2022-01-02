<?php
ob_start();
?>
<div class="container" style="min-height: 400px;">
<h4 class="box-title">Profile table</h4>
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-6">
				<h4>Name:</h4>
				<h4>Email:</h4>
				<h4>Password:</h4>
			</div>
			<div class="col-sm-6">
				<h5><?php echo $_SESSION['name']; ?></h5>
				<h5><?php echo $_SESSION['email']; ?></h5>
				<h5>******</h5>
			</div>
		</div>
		<!--answer change-->
			<div class="row" id="answer">
				<?php
				if(isset($result)) {
					echo '<hr>';
					if($result[0]==true){
						echo '<p style="color:green">'.$result[1].'</p>';
					}elseif($result[0]==false){
						echo '<p style="color:red">'.$result[1].'</p>';
					}
				}
				?>
			</div>
		<!-- end answer change -->
		<div class="row">
			<div class="col-sm-3" id="myLink">
				<h5>
					<a href="#" class="btn btn-link btn-sm" id="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Change password
					</a>
				</h5>
			</div>
		</div>
	</div>
	<!-- форма для ввода нового пароля -->
	<div class="row" id="editpass" style="display:none">
		<div class="col-sm-6 col-sm-offset-2">
			<form method="POST" action="profileEditResult">
				<div class="modal-header">
					<h3>Change Password <span class="extra-title muted"></span></h3>
				</div>
				<div class="model-body form-horizontal">
					<div class="control-group">
						<label for="current_password" class="control-label">Current Password</label>
							<input type="password" class="form-control" name="currentPassword" required>
					</div>
					<div class="control-group">
						<label for="new_password" class="control-label">New Password</label>
							<input type="password" class="form-control" name="newPassword" required>
					</div>
					<div class="control-group">
						<label for="confirm_password" class="control-label">Confirm Password</label>
							<input type="password" class="form-control" name="confirmPassword" required>
					</div>
				</div>
				<div class="modal-footer">
					<a href="profile" class="btn btn-primary btn-sm"> Close</a>
					<button name="send" type="submit" class="btn btn-primary btn-sm">Save changes</button>
				</div>
			</form>
		</div>
	</div>
	<!-- end form-->
</div>
<!-- скрипт показать/скрыть форму-->
<script src="../public/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script>
$('#edit').click(function() {
	$('#editpass').show();
	$('#myLink').hide();
	$('#answer').hide();
});
</script>
<?php
	$content= ob_get_clean();
	include "viewAdmin/templates/layout.php";