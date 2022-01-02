<?php
ob_start();
$title='Login or Register';
?>
<div class="container" >
    <div class="row">
        <div class="col-md-5" style="min-height:400px;">
		<?php
		//вывод отчета о входе
			if(isset($resultLogIn) && $resultLogIn==true) {
				echo '<p style="color:green;">Login succeeded. Hello, '.$_SESSION['name'].'!</p>';
			}
			elseif(isset($resultLogIn) && $resultLogIn==false) {
				echo '<p style="color:red;">Login errors</p>';
			}


		?>
            <div class="login-form"><!--login form-->
                <h3>Login to your account</h3>
				<form action="loginResult" method="POST">
					<div class="form-group">
					<label>Email address</label>
					<input class="form-control" type="email" name="email"  placeholder="Email Address" required />
					</div>
					<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password"  placeholder="Password" required />
					</div>
					<div class="form-group">
					<button class="btn btn-success" type="submit" class="btn btn-default" name="login">Login</button>
					</div>
				</form>
            </div><!--/login form-->
        </div>
        <div class="col-md-1">               
        </div>
        <div class="col-md-5">
		<?php
		//вывод отчета о регистрации

			if(isset($resultReg) && $resultReg[0]==true) {
				echo '<p style="color:green;">Регистрация успешна, выполните Login</p>';
			}elseif(isset($resultReg) && $resultReg[0]==false){
				echo '<p style="color:red;">Error! '.$resultReg[1].'</p>';
			}
			
		?>
            <div class="signup-form"><!--sign up form-->
            <h3>New user register</h3>
			<form action="registerResult" method="POST">
				<div class="form-group">
				<label>Username</label>
				<input class="form-control"  type="text" name="name" placeholder="Name" required />
				</div>
				<div class="form-group">
				<label>Email address</label>
				<input class="form-control"  type="email" name="email"  placeholder="Email Address" required />   
				</div>
				<div class="form-group">
				<label>Password</label>					
				<input class="form-control"  type="password" name="password"  placeholder="Password" required />
				</div>
				<div class="form-group">
				<label>Confirm password</label>
				<input class="form-control"  type="password" name="confirm" placeholder="Confirm password" required />
				</div>
				<div class="form-group">
				<button class="btn btn-success" type="submit" class="btn btn-default" name="send">Signup</button>
				</div>
			</form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>


<?php
$content= ob_get_clean();
include_once 'view/templates/layout.php';

