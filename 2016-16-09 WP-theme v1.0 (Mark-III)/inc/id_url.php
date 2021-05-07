<?
/* 	=================================================================================== 		
	IDENTIFICADOR DE PAGINAS PARA WP (PHP)
	=================================================================================== */
	$estapagina = get_the_ID();
	if(is_home()){ 										//cuando es home
		$thispage_php = "id=\"home\""; 
		$opengraph_id = "home"; 
		$title_id = "home"; 
		$titulo = get_bloginfo('name');
	} elseif(is_page()){ 								//cuando es pagina
		$plantilla =  str_replace(".php", "", get_page_template_slug( $post->ID ) );
		if(!empty($plantilla)){ 						//cuando tengo una plantilla de pagina asociada
			$thispage_php = "id=\"page\" class=\"page-".$estapagina." ".$plantilla."\"";
		} else {
			$thispage_php = "id=\"page\" class=\"page-".$estapagina."\"";
		} 
		$opengraph_id = "page"; 
		$title_id = "page"; 
		$titulo = get_the_title().' | '. get_bloginfo('name');
	} elseif(is_single()){ 								//cuando es articulo
		$esppost = get_post_type( $post );
		if($esppost=="post"){$post_esp="";}else{$post_esp="post-".$esppost;}
		$thispage_php = "id=\"post\" class=\"".$post_esp." post-".$estapagina."\""; 
		$opengraph_id = "post"; 
		$title_id = "post"; 
		$titulo = get_the_title().' | '. get_bloginfo('name');
	} elseif(is_category()){ 							//cuando es categoria
		$q_cat = get_query_var('cat'); 
		$cat = get_category( $q_cat ); 
		$thispage_php = "id=\"list\" class=\"list-".$cat->cat_ID."\""; 
		$opengraph_id = "list"; $title_id = "list"; 
		$titulo = single_cat_title("", false).' | '.get_bloginfo('name');
	} elseif(is_archive()){ 							//cuando es archivo
		$thispage_php = "id=\"list\" class=\"list-arch\""; 
		$opengraph_id = "arch";	
		$title_id = "arch"; 
		if ( is_day() ) {								//titulo  
			$cab_arch = "Archivos del " . get_the_date(); 
		} else if ( is_month() ){ 
			$cab_arch = "Archivos de" . get_the_date('F, Y'); 
		} else if ( is_year() ){ 
			$cab_arch = "Archivos del" . get_the_date('Y'); 
		} else { 
			$cab_arch = "Archivos"; 
		} 
		$titulo = $cab_arch.' | '; get_bloginfo('name');
	} elseif(is_404()){ 								//cuando es la pagina de error
		$thispage_php = "id=\"errorpage\""; 
		$opengraph_id = "error"; 
		$title_id = "error"; 
		$titulo = "P&aacute;gina no encontrada | ". get_bloginfo('name');
	} else { 											//otros casos
		$thispage_php = "id=\"otra\""; 
		$opengraph_id = "otra"; 
		$title_id = "otra"; 
		$titulo = get_bloginfo('name');
	};	
?>
