/* ======================================
Created by Arthur Systems (http://arthur.systems).
© All rights reserved 2016.
====================================== */

//var base_url = "http://localhost/button/en/";
//var base_url = "http://willyoupressil.tk/";

$(function(){
	'use strict';
	// Connect tip tool
	$('[data-toggle="tooltip"]').tooltip();
	$(".add_rules").hide();
    $(".terms_open").on('click', function() {
       $(".add_rules").fadeToggle(); 
    });
    
	// Remove or add classes from yes button
	$('.yesb').hover(function(){
		$('.yesButtonPress').removeClass('yesButtonReg');
		$('.yesButtonReg').addClass('yesButtonPress');
	}, function(){
		$('.yesButtonReg').removeClass('yesButtonPress');
		$('.yesButtonPress').addClass('yesButtonReg');
	});
    
    $(document).on('click', ".yesb, .nob", function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: base_url + "chose/click/" + $(this).find('a').attr('id') + "/" + $(this).find('a').attr('data-bool'),
            data: {},
            success: function(data) {
                $("main").html(data);
            }
        });
    });
    
    $(document).on('click', ".unlikeButton, .likeButton", function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: base_url + "chose/like/" + $(this).find('a').attr('id') + "/" + $(this).find('a').attr('data-bool'),
            data: {},
            success: function(data) {
                $("main").html(data);
            }
        });
    });
});