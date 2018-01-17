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
	$(this).css('max-width','100%');
    if($(this).width()>500 && $(this).height()<$(this).width() || $(this).width()>999){
		$(this).css({'float':'none',
					 'height': '100%'});
		$(this).wrap( "<div class='text-center col-md-12 top-buffer bottom-buffer'></div>" );
		
	}
	else 
    $(this).css('float','left');
});
$('.main-content .wp-caption').each(function() {
	$(this).css('max-width','none');
});
});

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=961463177255212';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));