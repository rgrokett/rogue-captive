jQuery(document).ready(function($) {
	$('select').niceSelect();

	$('.username-field input').click(function(event) {
		$('.username-field input').addClass('input-ready');
		$('.username-field input').removeAttr('placeholder');

		$('.pass-field input').addClass('input-ready');
		$('.pass-field input').removeAttr('placeholder');
		$('.username-label').fadeIn();
		$('.password-label').fadeIn();
	});

	$( "#modalMenuButton" ).click(function() {
		$('.menuModal').addClass('show');
	});
	$( ".menuModal .closeButton" ).click(function() {
		$('.menuModal').removeClass('show');
	});

});