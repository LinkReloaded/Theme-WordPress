<?php
/**
	MENUS EDITABLES (- V2.0 -)
	Permite usar menus personalizados en el theme de WP usando las funcionalidades de boostrap
	ej: '(nombre del menu, debe ser = al nombre que lleva en el theme_location) ' => __( '(este es el nombre que se muestra en el panel)', '(este es el tema)' )
**/
		require_once('function_bs4navwalker.php');
		register_nav_menus( array(
			'menuppal' => __( 'men&uacute; principal', 'twentyten' ),
			'menufooter' => __( 'men&uacute; footer', 'twentyten' )
			) 
		);
?>
