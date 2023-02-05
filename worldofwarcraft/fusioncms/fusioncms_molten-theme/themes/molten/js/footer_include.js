$('#header .holder .navigation .dropdown-holder').each(function() {
	$(this).css('left', -($(this).outerWidth() / 2) + ($(this).prev('a').outerWidth() / 2));
});