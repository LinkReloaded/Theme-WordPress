<?php 
	/**
		Sacamos los menus del dashboard
	**/
	function remove_dashboard_widgets() {
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); 	// Enlaces entrantes
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); 		// Ahora puedes
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); 	// últimos comentarios
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); 			// Plugins
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); 		// últimos borradores
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); 			// Blog de desarrollo de WordPress
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 			// Diseño de pantalla
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 		// Publicación rápida.
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); 		// Actividad.
	}
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	
	/**
		Panel de bienvenida personalizado
	**/
	function dashboard_widget_status() {
		global $nombretheme; 
		global $versiontheme;
		global $tituloblog;
		global $urltheme; 
		echo "<div style='margin-left:auto;margin-right:auto;width:387px;height:auto;'>";
		echo "<img style='display:block; width:100%; height:auto;' src='".$urltheme."/screenshot.png'>";
		echo "</div><br/>";
		echo "<p>Bienvenido a <strong>".$tituloblog."</strong>, utilice el men&uacute; de la izquierda para navegar por las secciones</p>";
		echo "<hr><p style='font-size:10px;'><strong>&#9900; &#9900; &#9900; MARK-X</strong><br/>".$versiontheme."</p>";
	} 
	function agregar_dashboard_widgets_status() { 
		global $tituloblog;
		$tituloBienvenida = "Bienvenido(a) al Panel de Control ".$tituloblog;
		add_meta_box('new_dashboard_widget', $tituloBienvenida, 'dashboard_widget_status', 'dashboard', 'normal');
	}
	add_action('wp_dashboard_setup', 'agregar_dashboard_widgets_status' );
	
	/**
		Identificador de cada página (va en el body)
	**/
	function paginaID(){ 
		global $idpagina;
		echo  "id-".$idpagina;
	}
	
	/**
		Identificador del tipo de página
	**/
	function tipodepagina(){ 
		if(is_home()){ 					//cuando es home
			$tipo = "inicio";
		} elseif(is_page()){ 			//cuando es pagina
			$tipoplantilla =  str_replace(".php", "", get_page_template_slug( $post->ID ) );
			if(!empty($tipoplantilla)){ $tipo = "pagina template-".$tipoplantilla; } else { $tipo = "pagina"; } //cuando tengo una plantilla de pagina asociada
		} elseif(is_single()){ 			//cuando es articulo
			$tipopost = get_post_type( $post );	
			if($tipopost=="post"){ $tipo = "articulo"; }else{ $tipo = "articulo postespecial-".$tipopost; } 	// si existe un post type	
		} elseif(is_category()){ 		//cuando es categoria
			$tipo = "categoria";
		} elseif(is_archive()){ 		//cuando es archivo
			$tipo = "archivo";
		} elseif(is_404()){ 			//cuando es la pagina de error
			$tipo = "noencontrado";
		} else { 						//otros casos
			$tipo = "otro";
		};
		echo $tipo;
	}

	/**
		Elementos básicos en el wp_head
	**/
	function headElements(){ 
		global $tituloblog;
		global $urltheme;
		global $urlbase;
		global $tiempo;
		global $desarrollo;
		global $colorwindows;
		/* FAVICON */
		echo "<link rel='shortcut icon' href='".$urltheme."/img/favicon.ico' type='image/x-icon'>"."\n"; //forma 1 de favicon
		echo "<link rel='icon' href='".$urltheme."/img/favicon.ico' type='image/x-icon'>"."\n"; //forma 2 de favicon
		/* ICONO APPLE */
		echo "<link rel='apple-touch-icon' href='".$urltheme."/img/apple_icon.png'>"."\n"; //icono para acceso directo de apple
		/* ICONO WINDOWS */
		echo "<meta name='application-name' content='".$tituloblog."'/>"."\n"; //nombre del recuadro en Windows
		echo "<meta name='msapplication-TileColor' content='".$colorwindows."'/>"."\n"; //color del recuadro en Windows
		/* OPENGRAPH */
		echo "<meta property='og:title' content='".$tituloblog."'/>"."\n"; // titulo de la pagina para el opengraph
		echo "<meta property='og:type' content='website'/>"."\n"; //tipo de pagina (siempre es un blog)
		echo "<meta property='og:url' content='".$urlbase."'/>"."\n"; // URL de la pagina
		/* STYLE */
		if($desarrollo=="si"){ //Si esta marcado "si" en el functions.php muestra esto (es mejor asi para revisar el codigo)
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$urltheme."/css/bootstrap.min.css'>"."\n"; //CSS desarrollo
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$urltheme."/css/all.min.css'>"."\n"; //Font Awesome
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$urltheme."/fonts/fonts.css'>"."\n"; //Fuentes
		} else { //Si no esta marcado carga el include (en donde el codigo aparece en el html resultante
			get_template_part( 'css/part', 'produccion' ); //CSS definitivo
 		};
		echo "\n"."<link type='text/css' rel='stylesheet' media='screen' href='".$urltheme."/style.css?=".$tiempo."'>"."\n"; //CSS del Blog
	}
	add_action("wp_head" , "headElements");

	/**
		Elementos básicos en el wp_footer
	**/
	function footerElements(){ 
		global $urltheme;
		echo "<script src='".$urltheme."/js/jquery-3.3.1.slim.min.js'></script>"."\n";
    	echo "<script src='".$urltheme."/js/popper.min.js'></script>"."\n";
    	echo "<script src='".$urltheme."/js/bootstrap.min.js'></script>"."\n";
	}
	add_action("wp_footer" , "footerElements");
	
	/**
		Remover la version de WP (para evitar decirle al hacker si la version es antigua
	**/
	function sacar_versionWP() {
		return '';
	}
	add_filter('the_generator', 'sacar_versionWP');

	/**
		Titulo personalizado
	**/
	add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
	function wpdocs_hack_wp_title_for_home( $title ){
  		if (empty($title) && (is_home()||is_front_page())){
    		$title = __( 'Home', 'textdomain' ) . ' | ' . get_bloginfo( 'description' );
  		}
  		return $title;
	}
		