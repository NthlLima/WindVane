function uploadimagenote(file, callback){
	data = new FormData()
	data.append("img", file[0]);

	$.ajax({
		type: "POST",
		url: "assets/php/upload_image.php",
		data: data,
		dataType: 'JSON',
		mimeType:"multipart/form-data",
		contentType: false,
	    cache: false,
	    processData:false,
	    success: function (response) {
	    	if (response.return == false) {
            	new_toast("danger", response.msg);
	    	} else{
	      		callback(response);
	    	}
	  	},
	  	error: function(textStatus, errorThrown) {
            new_toast("warning", "Erro ao Acessar a página<br>Por favor entre em contato com o TI");
	  	}
	});
}




$(function () {
  $('[data-toggle="popover"]').popover()
})

$(document).ready(function(){

	$('#summernote').summernote({
		minHeight: 500,
		maxHeight: 500,
		 callbacks: {
		    onImageUpload: function(files) {
		    	uploadimagenote(files, function(img){
		    		$('#summernote').summernote('insertImage', img.msg);
				});
		    }
		  }
	});

	$("#inputData").mask("99/99/9999",{placeholder:"  /  /    "});

	$("#selectCategoria").change(function(){
		var val = $("#selectCategoria").val();
		var cat = $("#selectCategoria option[value='"+val+"']").html();
		$("#nameCategoria").val(cat);
	});

	$(".btn-formPost").click(function(e){
		e.preventDefault();

		var titulo 	  = $("#inputTitulo").val();
		var content   = $("#summernote").val();

		if ($('#inputDestaque').is(':checked')) {
			var destaque = true;
		} else{
			var destaque = false;
		}

		var link 	  = $("#inputLink").val();
		var categoria = $("#selectCategoria").val();
		var namecat   = $("#nameCategoria").val();
		var data 	  = $("#inputData").val();
		var keywords  = $("#textareaKeywords").val();

		var elem 	  = $(this).data('elem');
		$("#inputSubmit").val(elem);

		msg = "";

		if ((titulo == '') || (categoria == '') || (data == '') || (keywords == '') || $('#summernote').summernote('isEmpty')) {

			if (titulo == '') {
				msg += 'Título Vazio<br>O Título não pode ser vazio, por favor insira um título a essa postagem.';
			}
			else if (link == '') {
				msg += 'A Postagem precisa de um Link<br>Crie um link para essa postagem.';
			}
			else if (categoria == '') {
				msg += 'Categoria não selecionada<br>Por Favor selecione a categoria, caso a categoria desejada não exista adicione uma nova categoria.';
			}
			else if (data == '') {
				msg += 'Data não Informada<br>Por favor informe a data da postagem.';
			}
			else if (keywords == '') {
				msg += 'Nenhuma Palavra-chave<br>Insira ao menos uma palavra-chave a essa postagem.';
			}
			else if ($('#summernote').summernote('isEmpty')) {
				msg += 'Postagem Vazia<br>Opa! A postagem não pode estar vazia, por favor escreva a postagem :)';
			}

			new_toast("danger", msg);

		} else{

			var postagem  = $("#idPostagem").val();

			if(postagem == -1){
				var url = "/assets/php/insert/post.php";
			} else{
				var url = "/assets/php/update/post.php";
			}

			$.post(url, {
							inputTitulo: titulo, 
						 	summernote: content, 
						 	inputLink: link, 
						 	inputDestaque: destaque, 
						 	selectCategoria: categoria, 
						 	nameCategoria: namecat,
						 	inputData: data, 
						 	textareaKeywords: keywords, 
						 	inputSubmit: elem, 
						 	idPostagem : postagem
						}, function(result, status){
				
				new_toast(result.return, result.message);
				if (result.return == "success" && postagem == -1) {
					$("#idPostagem").val(result.idPostagem);
				}

			}, 'json');
		}

		
	});
	
});