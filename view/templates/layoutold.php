<html>
<head>
<meta charset="UTF-8">   

	<!-- CSS Bootstrap & Custom -->
    	<script src="public/js/jquery.js" type="text/javascript"></script>
		<script src="public/js/bootstrap.js" type="text/javascript"></script>
        <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="public/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
				
	<div class="container">
			
			<nav class="navbar navbar-inverse container">
			<div class="container-fluid">	
				<div class="navbar-header navbar-inverse">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>	
				</div>	
					
			
					<div class="collapse navbar-collapse main_menu" id="myNavbar">
					
						<ul class="nav navbar-nav navbar-right">
						<!-- php code Login, Register   admin panel    !!!!! -->
						  <?php 
							if (!isset($_SESSION['role'])) {
						  ?>
													 
									<li><a href="login">LogIn</a></li>
									<li><a href="register">Register </a></li>

							<?php }
							elseif(isset($_SESSION['role'])) {
								if($_SESSION['role']=='admin'){
									echo '<li><a href="adminpanel/" target=_blank>Admin panel</a></li>';
								}
							?>
								<li class="dropdown" style="margin-top:7px;">
									<button class="btn btn-default dropdown-toggle"  type="button" data-toggle="dropdown"><?php echo $_SESSION['name'] ?> 
									<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a style="color: #b10021; background-color:white;" href="logout">Logout</a></li>								  
									</ul>
							</li>							
						<?php } ?>
					</ul>
		
				
			<ul class="nav  navbar-nav">
				<li class="nav-item"><img src="images/newsphoto.png"  width=50 style="margin-left:-30px;"></li>
				<li class="nav-item"><a class="nav-link" href="home">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="news">News</a></li>
				<li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
		  </ul>
		
		
		<!--     search form           -->
			<form class="nav navbar-form navbar-right"   method="GET" action="search">
					<div class="form-group">
					  <input type="text" class="form-control" name="text" placeholder="Введите текст для поиска">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
			</form>
		
		
		
		
		</div>	
	</div>	
	</nav> <!-- /.row -->

	  	<div class="container">
			<div class="row">			
				<div class="col-md-12 text-center">
					<h1 class="templatemo_logo"><?php  echo $title;  ?></h1> <!-- /.logo -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.container -->
	
	
		<div class="container">   
			<div class="row">   
		<!-- php code -  content    !!!!! -->
				<?php
					if(isset ($content))
					{
						echo $content;
					}
				?>
			</div>    		
	    </div>



	 
	
		<div class="container">
		  <hr>
		   <footer>

			<div class="row">
				<div class="col-md-12 text-center">
					<p>Copyright &copy; 2021 IVKHK | Design</p>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			 </footer>
		</div> <!-- /.container -->
	<!-- 
    	Free Responsive Template by templatemo
    	http://www.templatemo.com
	-->
</body>
</html>