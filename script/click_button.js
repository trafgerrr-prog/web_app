$(document).ready(function () {
	$('.edit').click(function () {
		var id = this.id.substring(1);

		show_win_edit();
		var data = {};
		data.id = id;
		axios.post('/api/get_data_by_id.php', data, {
			headers: {
				'Content-Type': 'application/json'
			}
		},)
			.then(function (response) {
				$('#login_edit').val(Object.values(response)[0].login);
				$('#password_edit').val(Object.values(response)[0].password);
				$('#name_edit').val(Object.values(response)[0].name);
				$('#surname_edit').val(Object.values(response)[0].surname);
				$('#patron_edit').val(Object.values(response)[0].patron);
				$('#post_edit').val(Object.values(response)[0].post);
				$('#phone_edit').val(Object.values(response)[0].phone);
				$('#mobile_edit').val(Object.values(response)[0].mobile);
				$('#email_edit').val(Object.values(response)[0].email);
				$('#birthdate_edit').val(Object.values(response)[0].birthdate);
				$('#is_enable_edit').val(Object.values(response)[0].is_enable);
			})
	});
	$('.delete').click(function () {
		var id = this.id.substring(1);

		show_win_del();
		var data = {};
		data.id = id;
	});
})

//модальная форма
function show_win_edit() {
	$('#modal_form_edit').modal({
		onShow: function () {
			$('#checkbox_enable_edit').checkbox();
			$('#calendar_window_edit').calendar({type: 'date'});
		},
		onDeny: function () {

		},
		onApprove: function () {

		}
	})
		.modal('show')
	;
}
function show_win_del() {
	$('#modal_form_del').modal({
		onShow: function () {
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