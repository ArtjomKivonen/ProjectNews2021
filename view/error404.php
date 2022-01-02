<!-- Заголовок title -->
<?php $title = 'Страница не найдена'; ?>

<?php ob_start() ?>

<div class="container" style="min-height:400px;">
<h2>404 ошибка</h2>

	
<p>	Упс, что-то пошло не так. Страница не найдена.
</p>
</div>  

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";