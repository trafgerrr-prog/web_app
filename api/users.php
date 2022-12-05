<?php
require '../api/setting.php';

pg_set_client_encoding($dbconn, "UNICODE");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$formdata = json_decode(file_get_contents('php://input'), true);
	$permission = $formdata['perm'];
	//-----
	//Обычный пользователь
	//-----
	if ($permission == 5){


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
					'<td>' . $is_enable . '</td></tr>';
		}

//footer таблицы с кнопками и конец html страницы
		$table_end = '
						<tfoot class="full-width">
    			<tr>
      		<th></th>
      		
    			</tr>
  				</tfoot>
					</tbody>
				</table>
			</div>
		</section>
';
		echo $table_end;

		$html_end = '
		<footer>test footer</footer>
	</body><script src="../script/click_button.js"></script></html>'
		;
		echo $html_end;

	}
	//-----
	//Editor
	//-----
	elseif ($permission == 4){


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
							<th>Действия</th>
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
					'<td> <div id="r'.$id.'" class="ui button blue edit">
         	Ред
        	</div>
        	 </td></tr>';
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

		$modal_form_edit = '
	<div id="modal_form_edit" class="ui modal">
  <div class="header">
  </div>
  <div class="content">
   <div class="description">

    <!-- Форма -->
    <form class="ui form" method="post" action="/api/form_users_edit.php">
     <!-- логин-пароль -->
    	<div class="two fields">
    		<div class="field">
     		<label>Логин</label>
     		<div class="field">
     			<input type="text" id="login_edit" placeholder="Логин">
    			</div>
    		</div>
     	<div class="field">
    			<label>Пароль</label>
     		<div class="field">
     			<input type="text" id="password_edit" placeholder="Пароль">
    			</div>
    		</div>
  			</div>
     <!-- ФИО -->
    	<div class="field">
  				<label>ФИО</label>
  				<div class="two fields">
      	<div class="field">
      		<input type="text" id="name_edit" placeholder="Имя">
    			</div>
    			<div class="field">
       	<input type="text" id="surname_edit" placeholder="Фамилия">
     		</div>
   			</div>
 				</div>
  			<!-- Patron -->
  			<div class="field">
     	<label>Patron</label>
   			<div class="field">
    			<input type="text" id="patron_edit" placeholder="Patron">
   			</div>
    	</div>
     <!-- Пост -->
    	<div class="field">
    		<label>Пост</label>
  				<textarea id="post_edit" style="height: 112px;"></textarea>
					</div>
					<!-- Номер телефона -->
					<div class="field">
    		<label>Номер телефона</label>
  				<div class="field">
    			<input type="text" id="phone_edit" placeholder="+7(999)123-45-67">
   			</div>
					</div>
					<!-- Марка телефона -->
					<div class="field">
    		<label>Марка телефона</label>
  				<div class="field">
    			<input type="text" id="mobile_edit" placeholder="">
   			</div>
					</div>
					<!-- Почта -->
					<div class="field">
    		<label>Почта</label>
  				<div class="field">
    			<input type="text" id="email_edit" placeholder="email@example.ru">
   			</div>
					</div>
					<!-- ДР -->
					<div class="field">
    		<label>День рождения</label>
    		<div id="calendar_window_edit" class="ui calendar">
      	<div class="ui input">
        <input type="text" placeholder="Нажмите, чтобы выбрать дату" name="birthdate">
      	</div>
    		</div>
  			</div>
  			<!-- Is_enable -->
  			<div class="field">
    		<div id="checkbox_enable_edit" class="ui slider checkbox">
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
  					Изменить данные
	 				</button>

				</form>
 		</div>
		</div>

 	</div>
	</div>
';
		echo $modal_form_edit;

		$html_end = '
		<footer>test footer</footer>
	</body><script src="../script/click_button.js"></script></html>'
		;
		echo $html_end;

	}
	//-----
	//Creater
	//-----
	elseif ($permission == 3){


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
					'<td>' . $is_enable . '</td></tr>';
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
	</body><script src="../script/click_button.js"></script></html>'
		;
		echo $html_end;

	}
	//-----
	//Администратор
	//-----
	elseif ($permission == 2){
//меню


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
							<th>Действия</th>
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
					'<td> <div id="r'.$id.'" class="ui button blue edit" onclick="show_win_edit()">
         	Ред
        	</div>
        	<div id="d'.$id.'" class="ui button red delete">
         	уд
        	</div> </td></tr>';
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

		$modal_form_edit = '
	<div id="modal_form_edit" class="ui modal">
  <div class="header">
  </div>
  <div class="content">
   <div class="description">

    <!-- Форма -->
    <form class="ui form" method="post" action="/api/form_users_edit.php">
     <!-- логин-пароль -->
    	<div class="two fields">
    		<div class="field">
     		<label>Логин</label>
     		<div class="field">
     			<input type="text" id="login_edit" placeholder="Логин">
    			</div>
    		</div>
     	<div class="field">
    			<label>Пароль</label>
     		<div class="field">
     			<input type="text" id="password_edit" placeholder="Пароль">
    			</div>
    		</div>
  			</div>
     <!-- ФИО -->
    	<div class="field">
  				<label>ФИО</label>
  				<div class="two fields">
      	<div class="field">
      		<input type="text" id="name_edit" placeholder="Имя">
    			</div>
    			<div class="field">
       	<input type="text" id="surname_edit" placeholder="Фамилия">
     		</div>
   			</div>
 				</div>
  			<!-- Patron -->
  			<div class="field">
     	<label>Patron</label>
   			<div class="field">
    			<input type="text" id="patron_edit" placeholder="Patron">
   			</div>
    	</div>
     <!-- Пост -->
    	<div class="field">
    		<label>Пост</label>
  				<textarea id="post_edit" style="height: 112px;"></textarea>
					</div>
					<!-- Номер телефона -->
					<div class="field">
    		<label>Номер телефона</label>
  				<div class="field">
    			<input type="text" id="phone_edit" placeholder="+7(999)123-45-67">
   			</div>
					</div>
					<!-- Марка телефона -->
					<div class="field">
    		<label>Марка телефона</label>
  				<div class="field">
    			<input type="text" id="mobile_edit" placeholder="">
   			</div>
					</div>
					<!-- Почта -->
					<div class="field">
    		<label>Почта</label>
  				<div class="field">
    			<input type="text" id="email_edit" placeholder="email@example.ru">
   			</div>
					</div>
					<!-- ДР -->
					<div class="field">
    		<label>День рождения</label>
    		<div id="calendar_window_edit" class="ui calendar">
      	<div class="ui input">
        <input type="text" placeholder="Нажмите, чтобы выбрать дату" name="birthdate">
      	</div>
    		</div>
  			</div>
  			<!-- Is_enable -->
  			<div class="field">
    		<div id="checkbox_enable_edit" class="ui slider checkbox">
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
  					Изменить данные
	 				</button>

				</form>
 		</div>
		</div>

 	</div>
	</div>
';
		echo $modal_form_edit;

		$modal_form_delete = '
  <div id="modal_form_del" class="ui basic modal">
  <div class="ui header">
    Удалить пользователя?
  </div>
  <div class="content">
    <p>Вы точно хотите удалить этого пользователя?</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      Нет
    </div>
    <div class="ui green ok inverted button">
      Да
    </div>
  </div>
</div>
';
		echo $modal_form_delete;

		$html_end = '
		<footer>test footer</footer>
	</body><script src="../script/click_button.js"></script></html>'
;
		echo $html_end;

	}
}