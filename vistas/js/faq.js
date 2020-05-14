$(document).ready(function(){
 
	$('.ir-faq').click(function(){
		window.location.assign("faq")
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 50 ){
			$('.ir-faq').slideDown(300);
		} else {
			$('.ir-faq').slideUp(300);
		}
	});
 
});