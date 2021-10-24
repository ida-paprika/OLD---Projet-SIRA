"use strict";




$(function(){

	$("#newPost").click(function(){
		hideOrShow( $(".hide") );
	});

	var lienA = $(".edite");

	$(lienA).each(function(){
		$(this).click(function(){
		 hideOrShow( $(".hideMisAJour") );


		 $('#titre').val( $(this).attr("titre") );
		 $('#article').val( $(this).attr("contenu") );
		 $('#idArt').val( $(this).attr('id') );
		 console.log($(this).attr('id'))
		})
	});
	

	$(".action").on('click', hideOrShow);


	function hideOrShow(toggle){
		$(toggle).slideToggle(1000);
		$(".show").slideToggle(1000);
	}


});

