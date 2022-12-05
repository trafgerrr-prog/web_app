<?php
require __DIR__ . '/api/setting.php';
//установление часового пояса
date_default_timezone_set('Europe/Moscow');
pg_set_client_encoding($dbconn, "UNICODE");

$head = '
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf - 8">
		<link rel="stylesheet" type="text/css" href="css/semantic.css">
		<title>Авторизация</title>
	</head>
';
echo $head;

//основные скрипты
require 'api/default_js_scripts.php';
//скрипт для этой страницы
echo	'<script src="script/pages/index.js"></script>';

echo '<body>';
//форма
$authentication = '
<div class="ui placeholder segment">
  <div class="ui one column very relaxed stackable grid">
    <div class="column">
      <form class="ui form error" method="post" action="index.php">
  					<div class="field">
    				<label>Логин</label>
    				<input type="text" id="login" placeholder="Логин">
  					</div>
  					<div class="field">
    				<label>Пароль</label>
    				<input type="text" id="password" placeholder="Пароль">
  					</div>
						</form>
						<p></p>
							<div id="auth_button" class="ui button" >Вход</div>
    </div>
  </div>
		<p></p>
  <div id="error_message"></div>
</div>
';
echo $authentication;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//$formdata = json_decode(file_get_contents('php://input'), true);
	echo 'check';
		$error = json_encode($_REQUEST, JSON_UNESCAPED_UNICODE);
		echo $error;
}

//получаю данные с формы
/*
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$data = '123';
	json_encode($data);

	$formdata = file_get_contents('php://input');
	parse_str($formdata, $data_table);

	$login = "'" . $data_table['login'] . "'";
	$password = "'" . $data_table['password'] . "'";

	$query_select = "SELECT id, login, password, name, surname
	FROM public.users
	WHERE login = $login AND password = $password;";
	$result = pg_query($query_select);
	$data = pg_fetch_assoc($result);
}
*/
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$formdata = file_get_contents('php://input');
	parse_str($formdata, $data_table);

	$login = "'" . $data_table['login'] . "'";
	$password = "'" . $data_table['password'] . "'";
	//запрос по логину
	$query_select_login = "SELECT login
	FROM public.users
	WHERE login = $login;";
	$result = pg_query($query_select_login);
	$data_login = pg_fetch_assoc($result);
//запрос по паролю
	$query_select_password = "SELECT password
	FROM public.users
	WHERE password = $password;";
	$result = pg_query($query_select_password);
	$data_password = pg_fetch_assoc($result);
//запрос по логину и паролю с получением нужных данных
	$query_select = "SELECT id, login, password, name, surname
	FROM public.users
	WHERE login = $login AND password = $password;";
	$result = pg_query($query_select);
	$data = pg_fetch_assoc($result);
//ошибка если неправельно введены логин и пароль
	if (json_encode($data_login) == 'false' && json_encode($data_password) == 'false') {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный логин и пароль</div>
    				<p>Логин и пароль введены неверно.</p>
  					</div>
';//ошибка если неправельно введен логин
	} elseif (json_encode($data_login) == 'false') {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный логин</div>
    				<p>Введен неверный логин.</p>
  					</div>
';//ошибка если неправельно введен пароль
	} elseif (json_encode($data_password) == 'false') {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный пароль</div>
    				<p>Введен неверный пароль.</p>
  					</div>
';//выполняется если все данные правильные и получен результат запроса3
	} elseif (json_encode($data) != 'false'){
		//echo $data["id"];
		//echo '<script type="text/javascript" src="script/script_auth.js" onload="test()"></script>'
		//;
		//header('Location:users.php');
		//exit;
	}

}*/

/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$formdata = file_get_contents('php://input');
	parse_str($formdata, $data_table);

	$login = $data_table['login'];
	$password = $data_table['password'];

	$query_select = "SELECT id, login, password, name, surname
	FROM public.users;";
	$result = pg_query($query_select) or die(pg_last_error());

	for ($i = 0; $i <= pg_num_rows($result) - 1; $i++) {
		$login_flag = false;
		$password_flag = false;
		$data = pg_fetch_assoc($result, $i);
		if (!$login_flag && $data["login"] == $login) $login_flag = true;
		if (!$password_flag && $data["password"] == $password) $password_flag = true;

		if ($login_flag || $password_flag) {
			$id = $data['id'];
			$name = $data['name'];
			$surname = $data['surname'];
			break;
		}
	}
/*?>
<script language="JavaScript">
	function save_in_localstorage (){
		localStorage.setItem('name', '_name');
	}
</script>


<?php*/
/*
	if (!$password_flag && !$login_flag) {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный логин и пароль</div>
    				<p>Логин и пароль введены не верно.</p>
  					</div>
';
	} elseif ($login_flag && !$password_flag) {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный пароль</div>
    				<p>Введен неверный пароль.</p>
  					</div>
';
	} elseif (!$login_flag) {
		echo '
  					<div class="ui error message">
    				<div class="header">Неверный логин</div>
    				<p>Введен неверный логин.</p>
  					</div>
';
	} elseif ($login_flag && $password_flag) {
		echo '<script type="text/javascript" src="script/script_auth.js" onload="save_in_localstorage(\'<?=$id?>\')"></script>'
		;
		//header('Location:users.php');
		//exit;
	}
}
*/

$html_end = '
	</body>
</html>
';
echo $html_end;
?>