<?
/* =================================================================================== 		
//  => MENUS EDITABLES
	
	Permite usar menus personalizados en el theme de WP
	ej: '(nombre del menu, debe ser = al nombre que lleva en el theme_location) ' => __( '(este es el nombre que se muestra en el panel)', '(este es el tema)' )
=================================================================================== */
		function twentyten_page_menu_args( $args ) {
				$args['show_home'] = true;
				return $args;
		}
		add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );
		register_nav_menus( array(
			'topmenu' => __( 'men&uacute; principal', 'twentyten' ),
			'menufooter' => __( 'men&uacute; footer', 'twentyten' ) 
			) 
		);
?>