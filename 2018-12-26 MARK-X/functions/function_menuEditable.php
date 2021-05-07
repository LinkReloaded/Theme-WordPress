<?php
/**
	MENUS EDITABLES (- V2.0 -)
	Permite usar menus personalizados en el theme de WP usando las funcionalidades de boostrap
	ej: '(nombre del menu, debe ser = al nombre que lleva en el theme_location) ' => __( '(este es el nombre que se muestra en el panel)', '(este es el tema)' )
**/
		require_once('function_bs4navwalker.php');
		register_nav_menus( array(
			'menuppal' => __( 'Men&uacute; Principal', 'bootstrap4' ) 
			) 
		);

	/*
		
		'menufooter' => __( 'men&uacute; footer', 'twentyten' )
		
		<nav class="navbar navbar-expand-lg navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
  				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
                wp_nav_menu([
                    'theme_location'  => 'menufooter',
                    'container'       => 'div',
                    'container_id'    => 'navbarsExample10',
                    'container_class' => 'collapse navbar-collapse justify-content-md-center',
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
            ?>
		</nav>
		
	*/
?>
