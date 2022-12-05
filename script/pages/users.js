//проверяю токен
$(document).ready(function () {
	var token = localStorage.getItem('token');
	formdata = {}
	formdata.id = localStorage.getItem("id")

	axios.post('/api/check_token.php',formdata, {
		headers: {
			'Content-Type': 'application/json',
			'Authorization': token
		}
	})
		.then(function (response) {
			// если токены не сходятся, то отправляет на стр входа
			if (!Object.values(response)[0]) {
				localStorage.clear();
				window.location.href = '../index.php';
			}

			formdata.perm = localStorage.getItem('permission')
			//если токены одинаковые, то отправляются права юзера для отрисовки страницы
			axios.post('/api/users.php', formdata, {
				headers: {
					'Content-Type': 'application/json',
					'Authorization': token
				}
			})
				.then(function (response) {
					$('#id_body').append(Object.values(response)[0]);
				})
		})



});

//модальная форма
function show_win() {
	$('#modal_window').modal({
		onShow: function () {
			$('#checkbox_enable').checkbox();
			$('#calendar_window').calendar({type: 'date'});
		},
		onDeny: function () {

		},
		onApprove: function () {
			document.location.replace("../pages/users.php");
		}
	})
		.modal('show')
	;
}

//чтобы меню раскрывалось
function drop_menu() {
	$('.ui.floating.dropdown.icon.button').dropdown({transition: 'drop'});
}
