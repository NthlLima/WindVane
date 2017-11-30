
function open_modal(modal){
	$('.modals').show(0);
	$(modal).show(0);
}
function close_modal(modal){
	$('.modals').hide(0);
	$(modal).hide(0);
}


function load_button(button){
	$(button).html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
	$(button).prop("disabled", true);
	$(button).css({"cursor": "not-allowed"});
}
function normal_button(button, text){
	$(button).html(text);
	$(button).prop("disabled", false);
	$(button).css({"cursor": "pointer"});
}

 
function save_email(){

	var name  = $("#name-ebook").val();
	var email = $("#email-ebook").val();

	$("#name-ebook").val('');
	$("#email-ebook").val('');

	if(!(name == '') && !(email == '')){
		$.ajax({
			type: "POST",
			url: "assets/php/insert_email.php",
			data: "name=" + name + "&email=" + email,
			dataType: 'JSON',
			success: function (r) {
			    console.log(r);
			    normal_button('#newsletter-send', '<i class="fa fa-paper-plane" aria-hidden="true"></i>');
			    if (r.return == true) {
			    	open_modal('#modal-ebook');
			    } else{
			    	alert(r.message);
			    }
			},
			beforeSend: function (){
				load_button('#newsletter-send');				
			},
			error: function () {
				
		    }
		});
	}
}
 
function contato(){

	var name    = $("#contact-nome").val();
	var email   = $("#contact-email").val();
	var message = $("#contact-message").val();

	$("#contact-nome").val('');
	$("#contact-email").val('');
	$("#contact-message").val('');

	if(!(name == '') && !(email == '') && !(message == '')){
		$.ajax({
			type: "POST",
			url: "assets/php/contact.php",
			data: "name=" + name + "&email=" + email + "&message=" + message,
			dataType: 'JSON',
			success: function (r) {
			    console.log(r);
			    if (r.return == true) {
			    	normal_button('#btn-contato', 'Enviado &nbsp; <i class="fa fa-check" aria-hidden="true"></i>');	
			    } else{
			    	normal_button('#btn-contato', 'Erro ao enviar &nbsp; <i class="fa fa-times" aria-hidden="true"></i>');
			    	alert(r.message);
			    }
			},
			beforeSend: function (){
				load_button('#btn-contato');				
			},
			error: function () {
				
		    }
		});
	}
}

function feed(max){
	$.ajax({
		type: "POST",
		url: "assets/includes/feed.php",
		data: "max=" + max,
		success: function (r) {
			normal_button('#load-feed', 'Leia Mais');
			$("#feed").html(r);

		},
		beforeSend: function (){
			load_button('#load-feed');				
		},
		error: function (textStatus, errorThrown) {
			console.log(textStatus);
            console.log(errorThrown);
		}
	});
}

function total(max){
	$.ajax({
		type: "GET",
		url: "assets/php/post_total.php",
		success: function (r) {
			if (parseInt(r) < max) {
				$("#load-feed").hide(0);
			}
		},
		error: function (textStatus, errorThrown) {
			console.log(textStatus);
            console.log(errorThrown);
		}
	});
}

$(document).ready(function(){

	total(parseInt($('#start-feed').val()));
	$(".toggle").click(function(){
		$(".navbar-menu ul").slideToggle(400);
	});

	$(".notify-item").click(function(){
		$(".social-menu").fadeToggle();
		$(".social-fb").fadeToggle(400);
		$(".social-tw").fadeToggle(600);
		$(".social-insta").fadeToggle(700);
		$(".social-yt").fadeToggle(800);
	});


	$(".scroll").click(function(){
		$(".scroll").removeClass('selected');
		$(this).addClass('selected');
		var link = $(this).data("link");
		$(link).animatescroll();
	});

	$("#newsletter-form").submit(function(e){
    	e.preventDefault();
    	save_email();
    });
    $("#newsletter-send").click(function(){
    	save_email();
    });
    $("#btn-contato").click(function(){
    	contato();
    });

    $("#load-feed").click(function(){
    	var max = $('#start-feed').val();
    	max = parseInt(max) + 4;
    	$('#start-feed').val(max);
    	feed(max);
    	total(max);
    });
});
