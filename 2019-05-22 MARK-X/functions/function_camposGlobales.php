<?php
/* =================================================================================== 		
//  => OPCIONES DEL THEME
	
	Permite crear campos especiales que se publican en todo el sitio
	1.- Se configura la seccion
	2.- se configuran el o los settings y controles
	3.- Se imprime en el tema como un campo especial echo get_theme_mod('global_XXX');
	
=================================================================================== */
function opciones_del_theme( $wp_customize ) {

	// Agregar la seccion
	$wp_customize->add_section('global_SECCIONUNO', array('title' => 'TITULO DE LA SECCION', 'priority' => 200 ));
	
	// agregar el campo y el controlador (esto se puede replicar para agregar mas campos)
	$wp_customize->add_setting('global_XXX', array( 
		'default' 	=> '',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control('global_XXX', array( 
		'section' 	=> 'global_SECCIONUNO', 
		'label' 	=> 'LABEL DEL CAMPO', 
		'type' 		=> 'text'
	));	


} 
add_action( 'customize_register', 'opciones_del_theme' );	

/*
// OTRAS OPCIONES DE CONTROL

	// CAMPO DE TEXTO
	$wp_customize->add_setting( 'global_textbox', array(
		'default'  	=> 'default_value',
	) );
	$wp_customize->add_control( 'global_textbox', array(
		'label'   	=> 'Text Setting',
		'section' 	=> 'global_SECCIONUNO',
		'type'    	=> 'text',
		'priority' 	=> 1
	) );

	// BOTON CHECK
	$wp_customize->add_setting( 'global_checkbox', array(
		'default'  	=> '1',
	) );
	$wp_customize->add_control( 'global_checkbox', array(
		'label'   	=> 'Checkbox Setting',
		'section' 	=> 'global_SECCIONUNO',
		'type'    	=> 'checkbox',
		'priority' 	=> 2
	) );

	// BOTON RADIAL
	$wp_customize->add_setting( 'global_radio', array(
		'default'        => '1',
	) );

	$wp_customize->add_control( 'global_radio', array(
		'label'   	=> 'Radio Setting',
		'section' 	=> 'global_SECCIONUNO',
		'type'    	=> 'radio',
		'choices' 	=> array("1", "2", "3", "4", "5"),
		'priority'	=> 3
	) );

	// SELECTOR SIMPLE
	$wp_customize->add_setting( 'global_select', array(
		'default'   => '1',
	) );

	$wp_customize->add_control( 'global_select', array(
		'label'   	=> 'Select Dropdown Setting',
		'section' 	=> 'global_SECCIONUNO',
		'type'    	=> 'select',
		'choices' 	=> array("1", "2", "3", "4", "5"),
		'priority'	 => 4
	) );

	// SELECTOR DE PAGINAS
	$wp_customize->add_setting( 'global_dropdown_pages', array(
		'default'   => '1',
	) );

	$wp_customize->add_control( 'global_dropdown_pages', array(
		'label'   	=> 'Dropdown Pages Setting',
		'section' 	=> 'global_SECCIONUNO',
		'type'    	=> 'dropdown-pages',
		'priority'	=> 5
	) );

	// SELECCIONAR COLOR
	$wp_customize->add_setting( 'global_color', array(
		'default'   => '#000000',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_color', array(
		'label'   	=> 'Color Setting',
		'section' 	=> 'global_SECCIONUNO',
		'settings'  => 'color_setting',
		'priority' 	=> 6
	) ) );

	// SUBIR ARCHIVO
	$wp_customize->add_setting( 'global_upload', array(
		'default'   => '',
	) );

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'global_upload', array(
		'label'   	=> 'Upload Setting',
		'section' 	=> 'global_SECCIONUNO',
		'settings' 	=> 'upload_setting',
		'priority' 	=> 7
	) ) );

	// SUBIR IMAGEN
	$wp_customize->add_setting( 'global_image', array(
		'default'   => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'global_image', array(
		'label'   	=> 'Image Setting',
		'section' 	=> 'global_SECCIONUNO',
		'settings'  => 'image_setting',
		'priority' 	=> 8
	) ) );

*/	


	
