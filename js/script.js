$( document ).ready(function() {
	$(window).scroll(function(){
    if ($(window).scrollTop() >= 50) {
       $('.navbar-default').addClass('navbar-fixed-top');
    }
    else {
       $('.navbar-default').removeClass('navbar-fixed-top');
    }
});
$('.main-content img').each(function() {
    if($(this).width()>500 && $(this).height()<$(this).width()){
		$(this).css('float','none');
		$(this).wrap( "<div class='text-center col-md-12 top-buffer bottom-buffer'></div>" );
		
	}
	else
    $(this).css('float','left');
});
});

