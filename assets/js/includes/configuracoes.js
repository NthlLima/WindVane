function uploadimage(form){

	var submit = $(form);
	var data  = new FormData(submit[0]);


	$.ajax({
		type: "POST",
		url: "assets/php/upload_image_perfil.php",
		data: data,
		dataType: 'json',
		mimeType:"multipart/form-data",
		contentType: false,
	    cache: false,
	    processData:false,
		success: function (response) {
			console.log(response);
			
			if (response.return == "success") {
				$("#user-img").attr("src", response.msg);
				$("#settingImg").val(response.msg)
				
			} else {
			    new_toast(response.return, response.msg);
			}
		},
		error: function(textStatus, errorThrown) {
			new_toast("warning", "Erro ao Acessar a página");
			console.log(textStatus);
            console.log(errorThrown);
		}
	});
}


$(document).ready(function(){


	$("#submitSetting").click(function(e){
		e.preventDefault();

		var name  = $("#settingNome").val();
		var email = $("#settingEmail").val();
		var img   = $("#settingImg").val();

		msg = "";

		if ((name == '') || (email == '') || (img == '')) {

			if (name == '') {
				msg += 'Insira um Nome';
			}
			else if (email == '') {
				msg += 'Insira um Email';
			}
			else if (img == '') {
				msg += 'Imagem do Perfil Vazia';
			}

			new_toast("danger", msg);

		} else{

			$.ajax({
				type: "POST",
				url:  "assets/php/update/perfil.php",
				data: "name=" + name + "&email=" + email + "&img=" + img,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					new_toast(response.return, response.message);

					if (response.return == "success") {
						setTimeout(function(){ 
							location.reload(); 
						}, 1000);
					}
				}
			});
			
		}
	});

	$("#submitSenhas").click(function(e){
		e.preventDefault();

		var oldpass = $("#settingOldSenha").val();
		var newpass = $("#settingSenha").val();
		var reppass = $("#settingRepSenha").val();
		msg = "";

		if ((oldpass == '') || (newpass == '') || (reppass == '')) {

			if (oldpass == '') {
				msg += 'Insira sua senha antiga';
			}
			else if (newpass == '') {
				msg += 'Insira sua nova senha';
			}
			else if (reppass == '') {
				msg += 'Repita sua nova senha';
			}

			new_toast("danger", msg);

		} else{

			$.ajax({
				type: "POST",
				url:  "assets/php/update/password.php",
				data: "oldpass=" + oldpass + "&newpass=" + newpass + "&reppass=" + reppass,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					new_toast(response.return, response.message);
				},
				error: function(textStatus, errorThrown) {
					new_toast("warning", "Erro ao Acessar a página");
					console.log(textStatus);
		            console.log(errorThrown);
				}
			});
			
		}
	});

	$("#img").change(function(){
		if ($("#img").val()) {
			uploadimage('#formPerfil');
		} else{
			new_toast("danger", "Nenhuma Imagem Selecionada");
		}
	});


});