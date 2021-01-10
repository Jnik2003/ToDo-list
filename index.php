<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>

		.task{
			display: flex;
		}
		p{
			width: 200px;
			height: 30px;			
			background-color: lime;
			margin:0;
		}
		.del{
			width: 30px;
			height: 30px;
			background-color: red;
			
		}
		.task{
			margin-top: 10px;
		}
		.total{
			width: 200px;
			height: 30px;			
			background-color: yellow;
			margin:10px 0 0 0;
		}
		.tomail{
			margin-top: 15px;
		}
		.result{
			font-size: 18px;
			color: red;
			margin-top: 15px;
		}
		 #maillist{
		 	width: 200px;			
			margin:10px 0 0 0;

		 }
	</style>
</head>
<body>

	<input type="text" class="in">
	<button class="send">Добавить</button>

	<div class="wrap"></div>
	<p class="total">Всего: 0</p>



	<div class="tomail">
	<!-- <input type="mail" class="out" placeholder="Email" value="kaunas16@gmail.com"> -->
	<!-- Получаем список майл адресов из csv файла, преобразуем в массив в файле emailscsv_handler, перебираем в цикле и вставляем в тег select на страницу -->
	<?php
		include ("emailscsv_handler.php");
	?>
	
	<select name="sel" id="maillist">
		<option value=""><?php 
		for($i = 0; $i < count($arr); $i++){
			echo "<option> $arr[$i] </option>";
			echo $_POST['sel'];
		}
		 ?></option>

	</select>


	<button class="mail">Отправить</button>
	</div>
	

	

	

	<div class="result"></div>
	

	<script src="script.js"></script>
	<script src="tomail.js"></script>

	
</body>
</html>