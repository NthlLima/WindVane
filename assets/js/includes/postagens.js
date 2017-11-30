function delete_category(id){

	if(id != ""){
			$.ajax({
				type: "POST",
				url:  "assets/php/delete/category.php",
				data: "id=" + id,
				dataType: 'JSON',
				success: function (response) {
					
					new_toast(response.return, response.message);

					if(response.return == "success"){
						load_table({
							"method": "POST",
							"url": "assets/php/load/load_category_list.php",
							"dataType": "JSON",
					        "columns": ["id" , "categoria", "delete"],
					        "table": "table-list-category",
					        "btns" : {
					        	"old" : "load_category_older",
					        	"new" : "load_category_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "catg"
					        }
					    });

					    allowed_button_list({
							 	"type" : "catg",
							 	"btns" : {
					        		"older" : "load_category_older",
					        		"newer" : "load_category_newer"
					        	},
					        	"sum" : 5
						});
					}
				}
			});
		}

}

function delete_post(id){
	$(".load").show();

	if(id != ""){
			$.ajax({
				type: "POST",
				url:  "assets/php/delete/post.php",
				data: "id=" + id,
				dataType: 'JSON',
				success: function (response) {
					$(".load").hide();
					new_toast(response.return, response.message);

					if(response.return == "success"){
						load_table({
							"method": "POST",
							"url": "assets/php/load/load_post_list.php",
							"dataType": "JSON",
					        "columns": ["title" , "category", "author", "data", "edit", "delete", "link"],
					        "table": "table-list-post",
					        "btns" : {
					        	"old" : "load_post_older",
					        	"new" : "load_post_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "post"
					        }
					    });

						count_list_post();
					    allowed_button_list({
							 	"type" : "post",
							 	"btns" : {
					        		"older" : "load_post_older",
					        		"newer" : "load_post_newer"
					        	},
					        	"sum" : 10
						});
					}
				}
			});
		}
}



$(document).ready(function(){

	num = {
		"post" : {
			"num_inicial" : 0,
			"num_total" : 0
		},
		"catg" : {
			"num_inicial" : 0,
			"num_total" : 0
		}
	};

	count_list_post();
	count_list_category();

	// CARREGAR POSTAGEM
	$("#load_post_older").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_post_list.php",
			"dataType": "JSON",
	        "columns": ["title" , "category", "author", "data", "edit", "delete", "link"],
	        "table": "table-list-post",
	        "btns" : {
	        	"old" : "load_post_older",
	        	"new" : "load_post_newer"
	        },
	        "pagination": {
	        	"num": 10,
	        	"var" : "num_inicial",
	        	"type" : "post"
	        }
	    });

	    allowed_button_list({
			 	"type" : "post",
			 	"btns" : {
	        		"older" : "load_post_older",
	        		"newer" : "load_post_newer"
	        	},
	        	"sum" : 10
		});

	});

	$("#load_post_newer").click(function(){
		load_table({
			"method": "POST",
			"url": "assets/php/load/load_post_list.php",
			"dataType": "JSON",
	        "columns": ["title" , "category", "author", "data", "edit", "delete","link"],
	        "table": "table-list-post",
	        "btns" : {
	        	"old" : "load_post_older",
	        	"new" : "load_post_newer"
	        },
	        "pagination": {
	        	"num": -10,
	        	"var" : "num_inicial",
	        	"type" : "post"
	        }
	    });

	    allowed_button_list({
			 	"type" : "post",
			 	"btns" : {
	        		"older" : "load_post_older",
	        		"newer" : "load_post_newer"
	        	},
	        	"sum" : 10
		});
	});
// CARREGAR CATEGORIAS
	$("#load_category_older").click(function(){
		load_table({
			"method": "POST",
			"url": "assets/php/load/load_category_list.php",
			"dataType": "JSON",
	        "columns": ["categoria", "delete"],
	        "table": "table-list-category",
	        "btns" : {
	        	"old" : "load_category_older",
	        	"new" : "load_category_newer"
	        },
	        "pagination": {
	        	"num": 5,
	        	"var" : "num_inicial",
	        	"type" : "catg"
	        }
	    });

	    allowed_button_list({
			 	"type" : "catg",
			 	"btns" : {
	        		"older" : "load_category_older",
	        		"newer" : "load_category_newer"
	        	},
	        	"sum" : 5
		});
	});

	$("#load_category_newer").click(function(){
		load_table({
			"method": "POST",
			"url": "assets/php/load/load_category_list.php",
			"dataType": "JSON",
	        "columns": ["categoria", "delete"],
	        "table": "table-list-category",
	        "btns" : {
	        	"old" : "load_category_older",
	        	"new" : "load_category_newer"
	        },
	        "pagination": {
	        	"num": -5,
	        	"var" : "num_inicial",
	        	"type" : "catg"
	        }
	    });

	    allowed_button_list({
			 	"type" : "catg",
			 	"btns" : {
	        		"older" : "load_category_older",
	        		"newer" : "load_category_newer"
	        	},
	        	"sum" : 5
		});
	});


	$("#form-new-categoria").submit(function(e){
		e.preventDefault();
		var categoria = $("#categoria-nome").val();
		$("#categoria-nome").val("");

		if(categoria != ""){
			$.ajax({
				type: "POST",
				url:  "assets/php/insert/category.php",
				data: "categoria=" + categoria,
				dataType: 'JSON',
				success: function (response) {
					
					new_toast(response.return, response.message);

					if(response.return == "success"){
						load_table({
							"method": "POST",
							"url": "assets/php/load/load_category_list.php",
							"dataType": "JSON",
					        "columns": ["categoria", "delete"],
					        "table": "table-list-category",
					        "btns" : {
					        	"old" : "load_category_older",
					        	"new" : "load_category_newer"
					        },
					        "pagination": {
					        	"num": 0,
					        	"var" : "num_inicial",
					        	"type" : "catg"
					        }
					    });

					    allowed_button_list({
							 	"type" : "catg",
							 	"btns" : {
					        		"older" : "load_category_older",
					        		"newer" : "load_category_newer"
					        	},
					        	"sum" : 5
						});
					}
				}
			});
		}

	});


});