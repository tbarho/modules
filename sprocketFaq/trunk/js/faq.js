$(document).ready(function() {
	$('#faqs li').each(function() {			
		var id = $(this).attr('id');	
		$('.question', this).click(function() {	
			var answer = $("#"+id+" .answer");
			if(answer.is(":hidden")) {
				answer.slideDown("fast");
			} else {
				answer.slideUp("fast");
			}
			return false;
		});	
	});
});	