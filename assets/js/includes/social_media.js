function count_list_ebook(){
	$.ajax({
		type: "GET",
		url: "assets/php/load/load_social_media_list_count.php",
		success: function (c) {
			num["media"]["num_total"] = c;
			allowed_button_list({
			 	"type" : "media",
			 	"btns" : {
	        		"older" : "load_social_media_older",
	        		"newer" : "load_social_media_newer"
	        	},
	        	"sum" : 10
			});
		}});
}



$(document).ready(function(){

	num = {
		"media" : {
			"num_inicial" : 0,
			"num_total" : 0
		}
	};

	count_list_ebook();

	$("#load_ebook_older").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_social_media_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "url", "count", "type", "link", "config"],
	        "table": "table-list-media",
	        "btns" : {
	        	"old" : "load_social_media_older",
	        	"new" : "load_social_media_newer"
	        },
	        "pagination": {
	        	"num": -10,
	        	"var" : "num_inicial",
	        	"type" : "media"
	        }
	    });

	    allowed_button_list({
			 	"type" : "media",
			 	"btns" : {
	        		"older" : "load_social_media_older",
	        		"newer" : "load_social_media_newer"
	        	},
	        	"sum" : 10
		});

	});

	$("#load_ebook_newer").click(function(){

		load_table({
			"method": "POST",
			"url": "assets/php/load/load_social_media_list.php",
			"dataType": "JSON",
	        "columns": ["nome" , "url", "count", "type", "link", "config"],
	        "table": "table-list-media",
	        "btns" : {
	        	"old" : "load_social_media_older",
	        	"new" : "load_social_media_newer"
	        },
	        "pagination": {
	        	"num": 10,
	        	"var" : "num_inicial",
	        	"type" : "media"
	        }
	    });

	    allowed_button_list({
			 	"type" : "media",
			 	"btns" : {
	        		"older" : "load_social_media_older",
	        		"newer" : "load_social_media_newer"
	        	},
	        	"sum" : 10
		});

	});

});