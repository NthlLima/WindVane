$(document).ready(function(){

	$("#loginForm").submit(function(e){
		e.preventDefault();
		$(".load").show();

		var email 	 = $("#loginEmail").val();
		var password = $("#loginPassword").val();

		msg = "";

		if ((email == '') || (password == '')) {

			if (email == '') {
				msg += 'Insira o seu email';
			}
			else if (password == '') {
				msg += 'Insira a sua senha';
			}

			new_toast("danger", msg);
			$(".load").hide();

		} else{
			$.ajax({
				type: "POST",
				url:  "assets/php/login.php",
				data: "password=" + password + "&email=" + email,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					if(response.return == "success"){
						location.reload();
					} else{
						$(".load").hide();
						new_toast(response.return, response.message);

					}
				},
				error: function(textStatus, errorThrown) {
					console.log(textStatus);
		            console.log(errorThrown);
				}
			});
			
		}
	});

});