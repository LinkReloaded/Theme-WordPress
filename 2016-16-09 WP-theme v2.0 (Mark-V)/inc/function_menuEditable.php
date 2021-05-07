<?
/* =================================================================================== 		
//  => MENUS EDITABLES (- V2.0 -)
	
	Permite usar menus personalizados en el theme de WP usando las funcionalidades de boostrap
	ej: '(nombre del menu, debe ser = al nombre que lleva en el theme_location) ' => __( '(este es el nombre que se muestra en el panel)', '(este es el tema)' )
=================================================================================== */
		require_once('function_menuEditable_navwalker.php');
		function twentyten_page_menu_args( $args ) {
				$args['show_home'] = true;
				return $args;
		}
		add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );
		register_nav_menus( array(
			'menuppal' => __( 'men&uacute; principal', 'twentyten' ),
			'menusuperior' => __( 'men&uacute; superior', 'twentyten' ),
			'menulateral' => __( 'men&uacute; lateral', 'twentyten' ),
			'menufooter' => __( 'men&uacute; footer', 'twentyten' ) 
			) 
		);
?>
