/* ======================================
Created by Arthur Systems (http://arthur.systems).
© All rights reserved 2016.
====================================== */

$(function(){
	'use strict';
	// Connect tip tool
	$('[data-toggle="tooltip"]').tooltip();
	
	// Remove or add classes from yes button
	$('.yesb').hover(function(){
		$('.yesButtonPress').removeClass('yesButtonReg');
		$('.yesButtonReg').addClass('yesButtonPress');
	}, function(){
		$('.yesButtonReg').removeClass('yesButtonPress');
		$('.yesButtonPress').addClass('yesButtonReg');
	});
});