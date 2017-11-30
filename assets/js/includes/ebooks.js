
function not_allowed(button){
	$(button).prop("disabled", true);
	$(button).css({"cursor": "not-allowed"});
}

function allowed(button){
	$(button).prop("disabled", false);
	$(button).css({"cursor": "pointer"});
}

function count_list_ebook(){
	$.ajax({
		type: "GET",
		url: "assets/php/load/load_ebook_list_count.php",
		success: function (c) {
			num["ebook"]["num_total"] = c;
			allowed_button_list({
			 	"type" : "ebook",
			 	"btns" : {
	        		"older" : "load_ebook_older",
	        		"newer" : "load_ebook_newer"
	        	},
	        	"sum" : 10
			});
		}});
}


function upload_pdf(form){

	var submit = $(form);
	var data  = new FormData(submit[0]);

	not_allowed('#arquivo');
	$('#uploading-pdf span').html('Carregando..');


	$.ajax({
		type: "POST",
		url: "assets/php/upload_ebook_pdf.php",
		data: data,
		dataType: 'json',
		mimeType:"multipart/form-data",
		contentType: false,
	    cache: false,
	    processData:false,
		success: function (response) {
			allowed('#arquivo');
			
			if (response.return == "success") {
				$("#ebook-PDF").val(response.msg);
				$("#ebook-namePDF").val(response.name);
				$('#uploading-pdf span').html(response.name);
				allowed('#btnNewEbook');
				
			} else {
			    new_toast(response.return, response.msg);
			    $('#uploading-pdf span').html('Ocorreu um erro!');
			}
		},
		error: function(textStatus, errorThrown) {
			new_toast("warning", "Erro ao Acessar a página");
			console.log(textStatus);
            console.log(errorThrown);
		}
	});
}

function upload_img(form){

	var submit = $(form);
	var data  = new FormData(submit[0]);

	not_allowed('#img');
	$('#uploading-img span').html('Carregando..');


	$.ajax({
		type: "POST",
		url: "assets/php/upload_ebook_img.php",
		data: data,
		dataType: 'json',
		mimeType:"multipart/form-data",
		contentType: false,
	    cache: false,
	    processData:false,
		success: function (response) {
			allowed('#img');
			
			if (response.return == "success") {
				$("#ebook-img").val(response.msg);
				$('#uploading-img span').html(response.name);
				allowed('#btnNewEbook');
				
			} else {
			    new_toast(response.return, response.msg);
			    $('#uploading-img span').html('Ocorreu um erro!');
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

	num = {
		"ebook" : {
			"num_inicial" : 0,
			"num_total" : 0
		}
	};

	count_list_ebook();

	$("#load_ebook_older").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_ebook_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "status", "downloads", "img", "link", "config"],
	        "table": "table-list-ebook",
	        "btns" : {
	        	"old" : "load_ebook_older",
	        	"new" : "load_ebook_newer"
	        },
	        "pagination": {
	        	"num": -10,
	        	"var" : "num_inicial",
	        	"type" : "ebook"
	        }
	    });

	    allowed_button_list({
			 	"type" : "ebook",
			 	"btns" : {
	        		"older" : "load_ebook_older",
	        		"newer" : "load_ebook_newer"
	        	},
	        	"sum" : 10
		});

	});

	$("#load_ebook_newer").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_ebook_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "status", "downloads", "img", "link", "config"],
	        "table": "table-list-ebook",
	        "btns" : {
	        	"old" : "load_ebook_older",
	        	"new" : "load_ebook_newer"
	        },
	        "pagination": {
	        	"num": 10,
	        	"var" : "num_inicial",
	        	"type" : "ebook"
	        }
	    });

	    allowed_button_list({
			 	"type" : "ebook",
			 	"btns" : {
	        		"older" : "load_ebook_older",
	        		"newer" : "load_ebook_newer"
	        	},
	        	"sum" : 10
		});

	});



	$("#arquivo").change(function(e){
		e.preventDefault();

		if ($("#arquivo").val()) {
			not_allowed('#btnNewEbook');
			upload_pdf('#upload-PDF');
		} else{
			new_toast("danger", "Nenhum Arquivo Selecionado");
		}

	});

	$("#img").change(function(e){
		e.preventDefault();

		if ($("#img").val()) {
			not_allowed('#btnNewEbook');
			upload_img('#upload-IMG');
		} else{
			new_toast("danger", "Nenhum Arquivo Selecionado");
		}

	});


	$("#btnNewEbook").click(function(e){

		var pdf  = $("#ebook-PDF").val();
		var img  = $("#ebook-img").val();
		var name = $("#ebook-Name").val();
		var namePDF = $("#ebook-namePDF").val();

		if (pdf != '' && img != '' && name != '' && namePDF != '') {
				$.ajax({
					type: "POST",
					url: "assets/php/insert/ebook.php",
					data: "pdf=" + pdf + "&img=" + img + "&name=" + name + "&namePDF=" + namePDF,
					dataType: 'json',
					success: function (response) {
						console.log(response);
						
						if (response.return == "success") {
							new_toast(response.return, response.message);
							$('#modalEbooks').modal('hide');

							$("#ebook-PDF").val('');
							$("#ebook-img").val('');
							$("#ebook-Name").val('');

							count_list_ebook();
							load_table({
								"method": "POST",
								"url": "assets/php/load/load_ebook_list.php",
								"dataType": "JSON",
						        "columns": ["nome" , "status", "downloads", "img", "link", "config"],
						        "table": "table-list-ebook",
						        "btns" : {
						        	"old" : "load_ebook_older",
						        	"new" : "load_ebook_newer"
						        },
						        "pagination": {
						        	"num": 0,
						        	"var" : "num_inicial",
						        	"type" : "ebook"
						        }
						    });

						    allowed_button_list({
								 	"type" : "ebook",
								 	"btns" : {
						        		"older" : "load_ebook_older",
						        		"newer" : "load_ebook_newer"
						        	},
						        	"sum" : 10
							});
							
						} else {
						    new_toast(response.return, response.message);
						}
					},
					error: function(textStatus, errorThrown) {
						new_toast("warning", "Erro ao Acessar a página");
						console.log(textStatus);
			            console.log(errorThrown);
					}
				});
		}

	});

});