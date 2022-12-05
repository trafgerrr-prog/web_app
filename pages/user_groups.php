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
		<title>Группы</title>
	</head>
	<script src="../script/jquery.min.js"></script>
	<script src="../script/semantic.js"></script>
	<script src="../script/script_modal.js"></script>
	<script src="../script/script_auth.js"></script>
';
echo $head;

//меню
$body = '
<body onload="drop_menu()">
	<header>
		<div class="ui four item menu">
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'users.php\';">Пользователи</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="users" onclick="window.location.href = \'users.php\';">Пользователи</div>
      				<div class="item" data-value="user to groups" onclick="window.location.href = \'user_to_groups.php\';">Пользователь-группы</div>
      				<div class="item" data-value="groups" onclick="window.location.href = \'user_groups.php\';">Группы</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'permissions.php\';">Разрешения</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="permissions" onclick="window.location.href = \'permissions.php\';">Разрешения</div>
      				<div class="item" data-value="user permissions" onclick="window.location.href = \'user_permissions.php\';">Разрешения пользователей</div>
      				<div class="item" data-value="user group permissions" onclick="window.location.href = \'user_group_permissions.php\';">Разрешения групп</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'channels.php\';">Каналы</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="channels" onclick="window.location.href = \'channels.php\';">Каналы</div>
      				<div class="item" data-value="disconnecting channels" onclick="window.location.href = \'disconnecting_channels.php\';">Разрыв каналов</div>
      				<div class="item" data-value="max load channels" onclick="window.location.href = \'max_load_channels.php\';">Максимальная загрузка каналов</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item" onclick="window.location.href = \'../index.php\';">
						<button class="ui red basic button">Выход</button>
				</div>
		</div>
	</header>
';
echo $body;

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
							<th>Название группы</th>
						</tr>
					</thead>
					<tbody>
';
echo $table;



//запрос на вывод всех строк таблицы по возрастанию id
$query_select = "SELECT * 
FROM public.user_groups
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
	$name = $data["name"];

	echo
			'<tr><td>' . $id . '</td>' .
			'<td>' . $id_creator . '</td>' .
			'<td>' . $id_editor . '</td>' .
			'<td>' . $created_at . '</td>' .
			'<td>' . $updated_at . '</td>' .
			'<td>' . $name . '</td>'
	;
}

//footer таблицы с кнопками и конец html страницы
$table_end = '
						<tfoot class="full-width">
    			<tr>
      		<th></th>
      		<th colspan="6">
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
    <form class="ui form" method="post" action="/api/form.php">
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
?>