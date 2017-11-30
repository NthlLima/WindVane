<script type="text/javascript">
$(document).ready(function() {

	$(".owl-carousel").owlCarousel({
		loop: true,
		nav: false,
		margin:0,
		items:1,
    	autoplay:true
	});

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
</script>