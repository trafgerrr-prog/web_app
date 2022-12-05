<?php
require '../api/setting.php';

pg_set_client_encoding($dbconn, "UNICODE");
//Head html страницы
$head = '
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf - 8">
		<link rel="stylesheet" type="text/css" href="../css/semantic.css">
		<title>Пользователи</title>
	</head>
';
echo $head;
//основные скрипты
require '../api/default_js_scripts.php';
//скрипт для этой страницы
echo	'<script src="../script/pages/users.js"></script>';

//начало body
echo '<body id="id_body" onload="drop_menu()">';

//меню
require '../pages/menu.php';




/*
//начало body
echo '<body onload="drop_menu()">';
//меню
require 'menu.php';

//начало таблицы
$table = '
		<section class="table_sec">
			<header><h1>Таблица</h1></header>
			<div class="ui basic segment">
				<table class="ui compact celled definition table">
					<thead>
						<tr>
							<th>№</th>
							<th>№ создателя</th>
							<th>№ изменившего</th>
							<th>Создано</th>
							<th>Изменено</th>
							<th>id_datacenter</th>
							<th>Логин</th>
							<th>Пароль</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>patron</th>
							<th>Пост</th>
							<th>Номер телефона</th>
							<th>Марка телефона</th>
							<th>Почта</th>
							<th>День рождения</th>
							<th>№ сессии</th>
							<th>is_enable</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
';
echo $table;

//запрос на вывод всех строк таблицы по возрастанию id
$query_select = "SELECT *
	FROM public.users
	ORDER BY id ASC ";
//цикл для вывода строк
$result = pg_query($query_select) or die(pg_last_error());
for ($i = 0; $i <= pg_num_rows($result) - 1; $i++) {
	$data = pg_fetch_assoc($result, $i);

	$id = $data["id"];
	$id_creator = $data["id_creator"];
	$id_editor = $data["id_editor"];
	$created_at = $data["created_at"];
	$updated_at = $data["updated_at"];
	$id_datacenter = $data["id_datacenter"];
	$login = $data["login"];
	$password = $data["password"];
	$name = $data["name"];
	$surname = $data["surname"];
	$patron = $data["patron"];
	$post = $data["post"];
	$phone = $data["phone"];
	$mobile = $data["mobile"];
	$email = $data["email"];
	$birthdate = $data["birthdate"];
	$id_session = $data["id_session"];
	$is_enable = $data["is_enable"];
	echo
			'<tr><td>' . $id . '</td>' .
			'<td>' . $id_creator . '</td>' .
			'<td>' . $id_editor . '</td>' .
			'<td>' . $created_at . '</td>' .
			'<td>' . $updated_at . '</td>' .
			'<td>' . $id_datacenter . '</td>' .
			'<td>' . $login . '</td>' .
			'<td>' . $password . '</td>' .
			'<td>' . $name . '</td>' .
			'<td>' . $surname . '</td>' .
			'<td>' . $patron . '</td>' .
			'<td>' . $post . '</td>' .
			'<td>' . $phone . '</td>' .
			'<td>' . $mobile . '</td>' .
			'<td>' . $email . '</td>' .
			'<td>' . $birthdate . '</td>' .
			'<td>' . $id_session . '</td>' .
			'<td>' . $is_enable . '</td>' .
			'<td>' . '<div class="item">
						<button class="ui blue basic button">Изменить</button>
				</div>' . '</td></tr>';
}

//footer таблицы с кнопками и конец html страницы
$table_end = '
						<tfoot class="full-width">
    			<tr>
      		<th></th>
      		<th colspan="17">
        	<button class="ui right floated small primary button" onclick="show_win()">
         	Добавить запись
        	</button>
      		</th>
    			</tr>
  				</tfoot>
					</tbody>
				</table>
			</div>
		</section>
';
echo $table_end;

$modal_form = '
	<div id="modal_window" class="ui modal">
  <div class="header">
  </div>
  <div class="content">
   <div class="description">
   
    <!-- Форма -->
    <form class="ui form" method="post" action="/api/form_users.php">
     <!-- логин-пароль -->
    	<div class="two fields">
    		<div class="field">
     		<label>Логин</label>
     		<div class="field">
     			<input type="text" name="login" placeholder="Логин">
    			</div>
    		</div>
     	<div class="field">
    			<label>Пароль</label>
     		<div class="field">
     			<input type="text" name="password" placeholder="Пароль">
    			</div>
    		</div>
  			</div>
     <!-- ФИО -->
    	<div class="field">
  				<label>ФИО</label>
  				<div class="two fields">
      	<div class="field">
      		<input type="text" name="name" placeholder="Имя">
    			</div>
    			<div class="field">
       	<input type="text" name="surname" placeholder="Фамилия">
     		</div>
   			</div>
 				</div>
  			<!-- Patron -->
  			<div class="field">
     	<label>Patron</label>
   			<div class="field">
    			<input type="text" name="patron" placeholder="Patron">
   			</div>
    	</div>
     <!-- Пост -->
    	<div class="field">
    		<label>Пост</label>
  				<textarea name="post" style="height: 112px;"></textarea>
					</div>
					<!-- Номер телефона -->
					<div class="field">
    		<label>Номер телефона</label>
  				<div class="field">
    			<input type="text" name="phone" placeholder="+7(999)123-45-67">
   			</div>
					</div>
					<!-- Марка телефона -->
					<div class="field">
    		<label>Марка телефона</label>
  				<div class="field">
    			<input type="text" name="mobile" placeholder="">
   			</div>
					</div>
					<!-- Почта -->
					<div class="field">
    		<label>Почта</label>
  				<div class="field">
    			<input type="text" name="email" placeholder="email@example.ru">
   			</div>
					</div>
					<!-- ДР -->
					<div class="field">
    		<label>День рождения</label>
    		<div id="calendar_window" class="ui calendar">
      	<div class="ui input">
        <input type="text" placeholder="Нажмите, чтобы выбрать дату" name="birthdate">
      	</div>        
    		</div>
  			</div>
  			<!-- Is_enable -->
  			<div class="field">
    		<div id="checkbox_enable" class="ui slider checkbox">
      	<input name="checkbox" type="checkbox" tabindex="0" class="hidden">
      	<label>Is_enable</label>
    		</div>
  			</div>
  			
  			<!-- Кнопки -->
 				<div class="actions">
  				<button id="button_deny" class="ui red deny button">
   				Закрыть
  				</button>
  				<button class="ui positive right button" type="submit">
  					Добавить пользователя
	 				</button>
  					
				</form>
 		</div>
		</div>
		
 	</div>
	</div>
';

echo $modal_form;

$html_end = '
		<footer>test footer</footer>
	</body>
</html>
';
echo $html_end;
*/
?>