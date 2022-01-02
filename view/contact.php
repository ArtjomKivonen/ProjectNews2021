<?php
ob_start();
$title='Контакт';
?>

<div class="container" style="min-height:400px;">
	<div class="row">
		<div class="col-md-6">
			<!--message form-->

			<?php
				if(!isset($message)){

			?>

				<h2>Ваше сообщение</h2>
					<div class="contact-form">
						<form  action="contactSend" id="myForm" method="post" >
							<p><input class="form-control" type="text" id="name" name="name" placeholder="Ваше имя" autofocus required></p> 
							<p><input class="form-control" type="text" id="email" name="email" placeholder="Email address" required></p> 
							<p><textarea class="form-control" id="mess" name="message" placeholder="Сообщение" required></textarea></p> 
							<input class="button" type="submit" name="send" id="submit" value="Send it">				
						</form>	


			</div>
			<!-- contact form
				message-->

				<?php
				}
				elseif (isset($message) && $message[0]==true){
					echo '
						<h3>Отправка сообщения</h3>
						<p>Ваше сообщение отправлено, спасибо.</p>';
					echo $message[1];

					echo '<hr><p><a href="contact">Написать сообщение</a></p>';
					}
				else{
						echo '<h3>Сообщение об ошибке</h3>';
						echo '<p><b>Please correct the following error:</b><br>'.$message[1].'</p>';
						echo '<hr><p><a href="contact">Написать сообщение </a> </p>';
					}
				?>
				<!-- end message-->

			</div> <!-- / . col-md-6-->

			<div class="col-md-6">
				<h2>Our Location</h2>
				<h3>Ida-Virumaa Kutsehariduskeskus</h3>
				<p>
				<br>
				<b>Aadress:</b> Kutse 13, 41533 Johvi, Ida-virumaa<br>
				<b>Telefon:</b> 3320381<br>
				<b>E-post:</b> info@ivkhk.ee<br>
				</p>


			</div>



		</div>




	</div>

	<?php
		$content = ob_get_clean();
		include "view/templates/layout.php";
	?>


