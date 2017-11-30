function allowed_button_list(object){


	var type 	= object["type"];
	var sum 	= object["sum"];
	var older 	= object["btns"]["older"];
	var newer 	= object["btns"]["newer"];

	if (num[type]["num_inicial"] < 0 || num[type]["num_inicial"] == 0) {
		num[type]["num_inicial"] = 0;
		$("#"+newer).prop("disabled", true);
		$("#"+newer).css({"cursor": "not-allowed"});
	} else{
		$("#"+newer).prop("disabled", false);
		$("#"+newer).css({"cursor": "pointer"});
	}

	if (num[type]["num_inicial"] + sum > num[type]["num_total"]) {
		$("#"+older).prop("disabled", true);
		$("#"+older).css({"cursor": "not-allowed"});
	} else{
		$("#"+older).prop("disabled", false);
		$("#"+older).css({"cursor": "pointer"});
	}
}

function count_list_post(){
	$.ajax({
		type: "GET",
		url: "assets/php/load/load_post_list_count.php",
		success: function (c) {
			num["post"]["num_total"] = c;
			allowed_button_list({
			 	"type" : "post",
			 	"btns" : {
	        		"older" : "load_post_older",
	        		"newer" : "load_post_newer"
	        	},
	        	"sum" : 10
			});
		}});
}


function count_list_category(){
	$.ajax({
		type: "GET",
		url: "assets/php/load/load_category_list_count.php",
		success: function (c) {
			num["catg"]["num_total"] = c;
			allowed_button_list({
			 	"type" : "catg",
			 	"btns" : {
	        		"older" : "load_category_older",
	        		"newer" : "load_category_newer"
	        	},
	        	"sum" : 5
			});
		}});
}


function count_list_user(){
	$.ajax({
		type: "GET",
		url: "assets/php/load/load_user_list_count.php",
		success: function (c) {
			num["user"]["num_total"] = c;
			allowed_button_list({
			 	"type" : "user",
			 	"btns" : {
	        		"older" : "load_user_older",
	        		"newer" : "load_user_newer"
	        	},
	        	"sum" : 10
			});
		}});
}



function load_table(object){
	var pagination_num  = object.pagination.num;
	var pagination_var  = object.pagination.var;
	var pagination_type = object.pagination.type;

	num[pagination_type][pagination_var] = num[pagination_type][pagination_var] + pagination_num;

	$.ajax({
		type: object.method,
		url:  object.url,
		data: "num=" + num[pagination_type][pagination_var],
		dataType: object.dataType,
		success: function (list) {
			html = "";
			var columns = object.columns;
			var num_l = list.length;
			var num_c = columns.length;


			for (var i = 0; i < num_l; i++) {
				html += '<tr id="tr-'+list[i]["id"]+'">';

				for (var j = 0; j < num_c; j++) {

					if (columns[j] == "id") {
						html += ' ';
					} else if(columns[j] == "link" || columns[j] == "config" || columns[j] == "edit" || columns[j] == "delete" || columns[j] == "img" ){
						html += '<td class="tab-link">'+list[i][columns[j]]+'</td>';
					}
					else{
						html += '<td>'+list[i][columns[j]]+'</td>';
					}
					
				}

				html += '</tr>';
			}

			$("#"+object.table).html(html);
		}
	});

}


function new_toast(type, message){
	alert = '<div class="alert alert-'+type+' alert-dismissible fade show" role="alert">\
				'+message+'\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">\
				<span aria-hidden="true">&times;</span>\
			</button>\
			</div>';

	$(".wrapper-alert").html(alert);

}