<?
/* =================================================================================== 		
//  => SOPORTE PARA IMAGENES EN MINIATURAS PERSONALIZADAS
	
	Reemplaza la imagen en miniatura por defecto por una imagen previamente formateada
	El primer condicional activa la caracteristica
	El segundo condicional configura el tipo de imagen y sus dimensiones (ancho, alto)
=================================================================================== */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails', array( 'post', 'page') ); //<=== se puede filtar que salga la imagen en un post, una pagina o un post especial, ej:array( 'post', 'page', 'cambiar-por-post-type-name')
	}
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'img200x200', 200, 200, true ); //tamaño por defecto

	}		
  
  	//add_theme_support( 'post-formats' ); // <=== se pueden filtrar para que aparezcan las imagenes por tipos de post
  	//add_theme_support('post-formats', array( 'aside', 'gallery' ));
?>