$(document).ready(function(){
 
	$('.ir-inicio').click(function(){
		window.location.assign("inicio")
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 50 ){
			$('.ir-inicio').slideDown(300);
		} else {
			$('.ir-inicio').slideUp(300);
		}
	});
 
});