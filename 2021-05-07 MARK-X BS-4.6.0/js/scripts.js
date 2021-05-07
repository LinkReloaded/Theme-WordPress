/* SCRIPTS BASE */

$(document).ready(function(){

	// Carrusel base
	$(".carrusel-base").owlCarousel({
		loop:true,
    	nav:true,
	    autoplay:!0,
	    autoplayHoverPause:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        }
	    }
	});
	


});