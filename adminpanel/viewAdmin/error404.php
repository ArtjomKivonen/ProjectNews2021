<?php 
	ob_start(); 
?>

	<h4 class="box-title">404 ошибка </h4>	
	<p class="text-primary">Упс, что-то пошло не так. Страница не найдена</p>

<?php 
	$content = ob_get_clean(); 
	include 'viewAdmin/templates/layout.php';