<?php
	// $arr = ["kaunas16@gmail.com", "kaunas16@mail.ru", "ya.kaunas@yandex.ru"];
	// читаем адреса майл из emails.csv' и получаем двумерный массив, далее его надо преобразовать в одномерный
	
	$arr = [];
	if(($file = fopen('emails.csv', 'r')) !== false){
	while(($data = fgetcsv($file, 100, ";")) !== false){	

		$arr[] = $data;		
	}
	
	//print_r($arr);
	fclose($file);	
}

// Функция call_user_function_array разбивает двумерный массив на множество одномерных массивов, которые уже преобразует в одномерный массив функция array_merge. 
$arr = call_user_func_array('array_merge',$arr);
//print_r($arr);



?>