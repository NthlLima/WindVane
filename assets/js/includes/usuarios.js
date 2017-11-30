function edit_user(id){
	console.log(id);

	var func = $("#"+id).data("func");
    var name = $("#"+id).data("name");

    $("#inputEditId").val(id);
    $("#inputEditUsername").val(name);
    $("#selectEditFuncao").val(func);
	$('#modalEditUsuarios').modal('show');
}


$(document).ready(function(){

	num = {
		"user" : {
			"num_inicial" : 0,
			"num_total" : 0
		}
	};

	count_list_user();

	// CARREGAR USUARIOS
	$("#load_user_older").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_user_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "email", "funcao", "posts", "config"],
	        "table": "table-list-user",
	        "btns" : {
	        	"old" : "load_user_older",
	        	"new" : "load_user_newer"
	        },
	        "pagination": {
	        	"num": 10,
	        	"var" : "num_inicial",
	        	"type" : "user"
	        }
	    });

	    allowed_button_list({
			 	"type" : "user",
			 	"btns" : {
	        		"older" : "load_user_older",
	        		"newer" : "load_user_newer"
	        	},
	        	"sum" : 10
		});

	});

	$("#load_user_newer").click(function(){
		load_table({
			"method": "POST",
			"url": "assets/php/load/load_user_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "email", "funcao", "posts", "config"],
	        "table": "table-list-user",
	        "btns" : {
	        	"old" : "load_user_older",
	        	"new" : "load_user_newer"
	        },
	        "pagination": {
	        	"num": -10,
	        	"var" : "num_inicial",
	        	"type" : "user"
	        }
	    });

	    allowed_button_list({
			 	"type" : "user",
			 	"btns" : {
	        		"older" : "load_user_older",
	        		"newer" : "load_user_newer"
	        	},
	        	"sum" : 10
		});
	});


	$("#btnNewUser").click(function(){

		var username = $("#inputUsername").val();
		var email 	 = $("#inputEmail").val();
		var pass 	 = $("#inputPass").val();
		var reppass  = $("#inputRepPass").val();
		var funcao   = $("#selectFuncao").val();

		msg = "";

		if ((username == '') || (email == '') || (pass == '') || (reppass == '') || (funcao == '') ) {

			if (username == '') {
				msg += 'Nome Vazio<br>O Usuário deve ter um nome';
			}
			else if (email == '') {
				msg += 'Email Vazio<br>O Usuário deve ter um email';
			}
			else if (pass == '') {
				msg += 'Insira a senha';
			}
			else if (reppass == '') {
				msg += 'Repita sua senha';
			}
			else if (funcao == '') {
				msg += 'Selecione a função do Usuário';
			}

			new_toast("danger", msg);

		} else{

			$.ajax({
				type: "POST",
				url:  "assets/php/insert/usuario.php",
				data: "username=" + username + "&email=" + email + "&pass=" + pass + "&reppass=" + reppass + "&funcao=" + funcao,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					
					new_toast(response.return, response.message);

					if(response.return == "success"){

						$('#modalUsuarios').modal('hide');

						$("#inputUsername").val('');
						$("#inputEmail").val('');
						$("#inputPass").val('');
						$("#inputRepPass").val('');
						$("#selectFuncao").val('');

						load_table({
							"method": "POST",
							"url": "assets/php/load/load_user_list.php",
							"dataType": "JSON",
					        "columns": ["nome" , "email", "funcao", "posts", "config"],
					        "table": "table-list-user",
					        "btns" : {
					        	"old" : "load_user_older",
					        	"new" : "load_user_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "user"
					        }
					    });

					    allowed_button_list({
							 	"type" : "user",
							 	"btns" : {
					        		"older" : "load_user_older",
					        		"newer" : "load_user_newer"
					        	},
					        	"sum" : 10
						});
					}
				}
			});
			
		}
	});

	$("#btnEditUser").click(function(){

		var id   = $("#inputEditId").val();
		var func = $("#selectEditFuncao").val();
		var user = $("#inputEditUsername").val();

		msg = "";

		if ((id == '') || (func == '') ) {

			if (id == '') {
				msg += 'Usuário não selecionado';
			}
			else if (func == '') {
				msg += 'Função não selecionada';
			}

			new_toast("danger", msg);

		} else{

			$.ajax({
				type: "POST",
				url:  "assets/php/update/usuario.php",
				data: "func=" + func + "&id=" + id + "&user=" + user,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					
					new_toast(response.return, response.message);

					if(response.return == "success"){

						$('#modalEditUsuarios').modal('hide');

						load_table({
							"method": "POST",
							"url": "assets/php/load/load_user_list.php",
							"dataType": "JSON",
					        "columns": ["nome" , "email", "funcao", "posts", "config"],
					        "table": "table-list-user",
					        "btns" : {
					        	"old" : "load_user_older",
					        	"new" : "load_user_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "user"
					        }
					    });

					    allowed_button_list({
							 	"type" : "user",
							 	"btns" : {
					        		"older" : "load_user_older",
					        		"newer" : "load_user_newer"
					        	},
					        	"sum" : 10
						});
					}
				}
			});
			
		}
	});

	$("#btnExcluirUser").click(function(){
		$('#modalEditUsuarios').modal('hide');
		$('#modalDeleteUsuarios').modal('show');

	});

	$("#btnExcluirUserCancel").click(function(){
		$('#modalEditUsuarios').modal('show');
		$('#modalDeleteUsuarios').modal('hide');

	});
	$("#btnDeleteUser").click(function(){

		var id   = $("#inputEditId").val();
		var user = $("#inputEditUsername").val();

		msg = "";


		if (id == '') {

			msg += 'Usuário não selecionado';
			new_toast("danger", msg);

		} else{

			$.ajax({
				type: "POST",
				url:  "assets/php/delete/usuario.php",
				data: "id=" + id + "&user=" + user,
				dataType: 'JSON',
				success: function (response) {
					console.log(response);
					
					new_toast(response.return, response.message);

					if(response.return == "success"){

						$('#modalDeleteUsuarios').modal('hide');

						load_table({
							"method": "POST",
							"url": "assets/php/load/load_user_list.php",
							"dataType": "JSON",
					        "columns": ["nome" , "email", "funcao", "posts", "config"],
					        "table": "table-list-user",
					        "btns" : {
					        	"old" : "load_user_older",
					        	"new" : "load_user_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "user"
					        }
					    });

					    allowed_button_list({
							 	"type" : "user",
							 	"btns" : {
					        		"older" : "load_user_older",
					        		"newer" : "load_user_newer"
					        	},
					        	"sum" : 10
						});
					}
				}
			});
			
		}
	});


});