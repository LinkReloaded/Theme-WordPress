<?php
/* =================================================================================== 		
//  => SHORTCODES EN EL SITIO
=================================================================================== */

/*
// EJEMPLO DE SHORTCODE SIMPLE 
function shortcode_ejemplo1() {
	return '<div>codigo shortcode a imprimir</div>';
}
add_shortcode('shortcodesimple', 'shortcode_ejemplo1');
// en el panel se pone: [shortcodesimple] 

// EJEMPLO DE SHORTCODE COMPLEJO 
function shortcode_ejemplo2( $atts, $content = null ) {
    extract(shortcode_atts(array(
	"var1" => '',
    "var2" => '',
	), $atts));   
	return '<div class"uno">' . $var1 . '</div><div class"dos">' . $var2 . '</div>';   
}
add_shortcode('shortcodecomplejo', 'shortcode_ejemplo2');
// [shortcodecomplejo var1="" var2=""] 

*/
	

/* 	==================================================
	EJEMPLO DE USO FRECUENTES 
	=============================================== */
	
	/* ACORDEON */
	/* abre acordeon: [acord_inicio] */ 												function shortcode_abreac() { return '<div class="accordeon"><dl>'; } add_shortcode('acord_inicio', 'shortcode_abreac');
	/* cierra acordeon:	[acord_cierre] */ 												function shortcode_cierraac(){ return '</dl></div>'; } add_shortcode('acord_cierre', 'shortcode_cierraac'); 		
	/* abre campo acordeon:	[acord_campo_inicio titulo="" marcado="" primero=""] */ 	function shortcode_abrecam( $atts, $content = null ) { extract(shortcode_atts(array("titulo" => '', "marcado" => '', "primero" => ''), $atts)); return '<dt class="' . $marcado . '"><a href="#">' . $titulo . '</a></dt><dd id="' . $primero . '"><div class="cont">'; } add_shortcode('acord_campo_inicio', 'shortcode_abrecam');
	/* cierra campo acordeon: [acord_campo_cierre] */ 									function shortcode_cierracam(){ return '</div></dd><!-- ===== -->'; } add_shortcode('acord_campo_cierre', 'shortcode_cierracam'); 		






?>