<?
/* =================================================================================== 		
//  => ANALYTICS COMO CAMPO GLOBAL
	
	Permite poner el codigo analytics dentro de las opciones del sitio
=================================================================================== */
function campo_analytics( $wp_customize ) {

	// Agregar la seccion
	$wp_customize->add_section('analytics_seccion', array('title' => 'Google Analytics', 'priority' => 300 ));
	
	// Codigo analytics
	$wp_customize->add_setting('analytics_direccion', array( 'default' => '','transport' => 'postMessage'));
	$wp_customize->add_control('analytics_direccion', array( 'section' => 'analytics_seccion', 'label' => 'Pegue el c&oacute;digo analytics', 'type' => 'text'));	

} 
add_action( 'customize_register', 'campo_analytics' );
