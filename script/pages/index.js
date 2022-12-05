$(document).ready(function () {

	$('#auth_button').click(function () {
		/*
		axios.get('/api/login.php', {
			headers: {
				'Content-Type': 'application/json'
			}
		},)
			.then(function (response) {
				// обработка успешного запроса
				//var obj = JSON.parse(Object.values(response)[0]);
				console.log(Object.values(response)[0].id);
				console.log(Object.values(response)[0].login);
				//console.log(Object.values(response)[0][0].login);
				//console.log(Object.values(response)[0].passwor;
			})
			*/

		var data = {}
		data.login = $('#login').val();
		data.password = $('#password').val();

		axios.post('/api/index.php', data, {
			headers: {
				'Content-Type': 'application/json'
			}
		},)
			.then(function (response) {
				// обработка успешного запроса
				if (Object.values(response)[0] == 'no_user') {
					localStorage.clear();
					var err = '<div class="ui error message">\n' +
						'    <div class="header">Введен неверный логин и/или пароль</div>\n' +
						'    <p>Проверьте, пожалуйста, верно ли вы ввели данные для входа.</p>\n' +
						'  </div>';

					$('#error_message').append(err);
				} else if (Object.values(response)[0] == 'no_perm') {
					localStorage.clear();
					var err = '<div class="ui error message">\n' +
						'    <div class="header">Нет прав</div>\n' +
						'    <p>У вас отсутствуют права на доступ к это странице.</p>\n' +
						'  </div>';

					$('#error_message').append(err);
				} else {
					var user_data = {}
					user_data.id = Object.values(response)[0].id;
					user_data.login = Object.values(response)[0].login;
					user_data.password = Object.values(response)[0].password;
					user_data.name = Object.values(response)[0].name;
					user_data.surname = Object.values(response)[0].surname;
					user_data.token = Object.values(response)[0].token;
					user_data.perm = Object.values(response)[0].id_perm;
					//добавление данных в localStorage
					localStorage.setItem("id", user_data.id);
					localStorage.setItem("login", user_data.login);
					localStorage.setItem("password", user_data.password);
					localStorage.setItem("name", user_data.name);
					localStorage.setItem("surname", user_data.surname);
					localStorage.setItem("token", user_data.token);
					localStorage.setItem("permission", user_data.perm);
					//перенаправить на страницу юзер
					window.location.href = '../pages/users.php';
				}


			})

	});
});
/*
function view_error(){
	var err = localStorage.getItem("error");
	if (err == 'true') {

		axios.post('../index.php', err, {
			headers: {
				'Content-Type': 'application/json'
			}
		},)
			.then(function (response) {
				// обработка успешного запроса
				console.log(Object.values(response)[0]);

			})
	} else{
		console.log('ok!')
	}

}*/

