$( document ).ready(function() {
var affixElement = '.affix-top';

$(affixElement).affix({
  offset: {
    top: function () {
      return (this.top = $(affixElement).offset().top)
    }
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

