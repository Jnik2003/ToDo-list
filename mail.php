<?php

//echo $_POST['mail']; //для строки почты

//для массива json

$postData = file_get_contents('php://input');

$data = json_decode($postData, true);

// запись в строку содержимого массива кроме 0-го индекса
$str = "\r\n";
for($i = 1; $i <count($data); $i++){
	$str .= $i." ".$data[$i]."\r\n";
	
// Проверка
}
if(count($data) == 1){
	
	exit("Нечего отправлять");
}
if($data[0] == ''){
	
exit("Введите email");
}
// обрежем проберы у электронной почты
$email = trim($data[0]);

$to = $data[0]; // адрес получателя 
$subject = 'Письмо от TODO'; // тема письма
$subject_from = 'Письмо получено'; // тема письма для автоответа
$mail_from = 'kaunas16@gmail.com'; //указать доменную почту чтобы не попадать в спам 



$message = 'Сообщение: '. $str; 
$headers = 'From: '. $mail_from . "\r\n"; // от кого указать доменную почту чтобы не попадать в спам 

//Автоответ
//$automess = "Мы получили Ваше письмо и свяжемся с Вами в ближайшее время.";

// кодируем заголовок в UTF-8
$subject = preg_replace("/(\r\n)|(\r)|(\n)/", "", $subject);
$subject = preg_replace("/(\t)/", " ", $subject);
$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';


@mail($to, $subject, $message, $headers);

echo '<p style="color: green">"Сообщение отправлено"</p>';

// отправка автоответ
//@mail($email, $subject_from, $automess, $headers);

// Запись в лог файл

//запишем в json файл 

// Сначала надо преобразовать массив в json-строку, но в нашем случае строка в  переменной $postData , преобразовывать не надо

//$jsonData = json_encode($data); //получили json строку 

// теперь мы можем записать ее в Json файл
//добавим в начало дату и время
$postDataTime = date('d-m-Y H:i:s').';'.$postData;

file_put_contents('./log/out.json', $postDataTime.PHP_EOL, FILE_APPEND | LOCK_EX);


// Запишем в csv файл 
$file = fopen('./log/out.csv', 'a');
	
array_unshift($data, date('d-m-Y H:i:s')); //добавим в начало дату и время

fputcsv($file, $data,';');

// for($i = 0; $i <count($data); $i++){
// 	fputcsv($file, $data,';');
// 	
// }
fclose($file);
?>