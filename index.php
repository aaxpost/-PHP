
<?php
	//45.10.1
	//index.php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	
	//Получаем название страницы из гет запроса и формируем путь
	$page = $_GET['page'];
	$path = "pages/$page.php";

	//Если файл по пути существует, считываем данные
	if (file_exists($path)) {
	$content = file_get_contents($path);
	
		//Регулярка для поиска тайтла
		$reg = '#\{\{title:(.*?)\}\}#';
		//Ищем значение в контенте и помещаем в массив
		if (preg_match($reg, $content, $match)) {
				//Забираем тайтл из кармана
				$title = $match[1];
				//Обрезаем пробелы, и вырезаем тайтл
				$content = trim(preg_replace($reg, '', $content));
				//Или выводим ошибку
			} else {
				echo '<font color="red">title not found</font>';
			}
		
		//Тоже для дискрипшина
		$reg = '#\{\{desc:(.*?)\}\}#';
		if (preg_match($reg, $content, $match)) {
				$desc = $match[1];
				$content = trim(preg_replace($reg, '', $content));
			} else {
				echo '<font color="red">desc not found</font>';
			}	
			
		//Если контента нет, выводим ошибку.			
	} else {
		$content =  'file not found';
		}
	
	include 'layout.php';


	


	
