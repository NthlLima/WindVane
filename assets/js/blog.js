$(document).ready(function() {


	$('#num-face').html(0);
	$('#num-insta').html(0);
	$('#num-yt').html(0);
	$('#num-twitter').html(0);
	$('#num-face').animateNumber({ number: 2746 }, 1000);
	$('#num-insta').animateNumber({ number: 4430 }, 1000);
	$('#num-yt').animateNumber({ number: 112 }, 1000);
	$('#num-twitter').animateNumber({ number: 13 }, 1000);

			var top  = 759;
			var num_start = 0;
			var html = '1';
			var load = true;

	    $(window).scroll(function(){

	    	if ($(this).scrollTop() + $(this).height() >= (top + document.getElementById("feed").scrollHeight)) {

	    		if (html != '' && load == true) {
	    			$('.feed-load').show();
		    		num_start = num_start + 6;
		    		load = false;
		        	$.post('assets/includes/contents/post_latest.php', {
						start: num_start, 
						limit: 6
					}, function(result, status){
						$("#feed").append(result);
						html = result;
						load = true;
	    				$('.feed-load').hide();

					});	
	    		}

	      	}
		});
	  });