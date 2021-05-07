<? 
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
	
	function dashboard_widget_status() { // Aquí mostramos lo que queramos o necesitemos
		global $nombretheme; 
		global $versiontheme; 
		$blog_title = get_bloginfo('name');
		echo "<div style='margin-left:auto;margin-right:auto;width:387px;height:auto;'>";
		echo "<img style='display:block; width:100%; height:auto;' src='".get_bloginfo('template_url')."/screenshot.png'>";
		echo "</div><br/>";
		echo "<p>Bienvenido a <strong>".$blog_title."</strong>, utilice el men&uacute; de la izquierda para navegar por las secciones</p>";
		echo "<hr><p style='font-size:10px;'><strong>".$nombretheme."</strong><br/>Version: ".$versiontheme."</p>";
	} 
	
	function agregar_dashboard_widgets_status() { // Crea la función usando la accion de un "hook" o gancho
		$blog_title = get_bloginfo('name');
		$tituloBienvenida = "Bienvenido(a) al Panel de Control ".$blog_title;
		add_meta_box('new_dashboard_widget', $tituloBienvenida, 'dashboard_widget_status', 'dashboard', 'normal');
	}
	add_action('wp_dashboard_setup', 'agregar_dashboard_widgets_status' );
	
	function paginaID(){ //Identificador de cada elemento, va en el body
		$paginaID = get_the_ID();
		echo  "id-".$paginaID;
	}
	
	function tipodepagina(){ //Identificador del tipo de publicacion
		if(is_home()){ //cuando es home
			$tipo = "inicio";
		} elseif(is_page()){ //cuando es pagina
			//cuando tengo una plantilla de pagina asociada
			$tipoplantilla =  str_replace(".php", "", get_page_template_slug( $post->ID ) );
			if(!empty($tipoplantilla)){ $tipo = "pagina template-".$tipoplantilla; } else { $tipo = "pagina"; }
		} elseif(is_single()){ //cuando es articulo
			// si existe un post type
			$tipopost = get_post_type( $post );
			if($tipopost=="post"){ $tipo = "articulo"; }else{ $tipo = "articulo postespecial-".$tipopost; }	
		} elseif(is_category()){ //cuando es categoria
			$tipo = "categoria";
		} elseif(is_archive()){ //cuando es archivo
			$tipo = "archivo";
		} elseif(is_404()){ //cuando es la pagina de error
			$tipo = "noencontrado";
		} else { //otros casos
			$tipo = "otro";
		};
		echo $tipo;
	}

	function headElements(){ //incluye elementos basicos del theme en el head
		/* VARIABLES */
		$template_url = get_bloginfo('template_url');
		$blog_title = get_bloginfo('name');
		$tiempo = time();
		global $desarrollo;
		/* FAVICON */
		echo "<link rel='shortcut icon' href='".$template_url."/js/favicon.ico' type='image/x-icon'>"."\n"; //forma 1 de favicon
		echo "<link rel='icon' href='".$template_url."/js/favicon.ico' type='image/x-icon'>"."\n"; //forma 2 de favicon
		/* ICONO APPLE */
		echo "<link rel='apple-touch-icon' href='".$template_url."/img/apple_icon.png'>"."\n"; //icono para acceso directo de apple
		/* ICONO WINDOWS */
		echo "<meta name='application-name' content='".$blog_title."'/>"."\n"; //nombre del recuadro en Windows
		echo "<meta name='msapplication-TileColor' content='#2b2b2b'/>"."\n"; //color del recuadro en Windows
		/* OPENGRAPH */
		echo "<meta property='og:title' content='".$blog_title."'/>"."\n"; // titulo de la pagina para el opengraph
		echo "<meta property='og:type' content='website'/>"."\n"; //tipo de pagina (siempre es un blog)
		echo "<meta property='og:url' content='".$blog_url."'/>"."\n"; // URL de la pagina
		/* STYLE */
		if($desarrollo=="si"){ //Si esta marcado "si" en el functions.php muestra esto (es mejor asi para revisar el codigo)
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$template_url."/css/bootstrap.min.css'>"."\n"; //CSS desarrollo
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$template_url."/css/fontawesome-all.min.css'>"."\n"; //Font Awesome
			echo "<link type='text/css' rel='stylesheet' media='screen' href='".$template_url."/fonts/fonts.css'>"."\n"; //Fuentes
		} else { //Si no esta marcado carga el include (en donde el codigo aparece en el html resultante
			get_template_part( 'inc/part', 'CSS' ); //CSS definitivo
 		};
		echo "\n"."<link type='text/css' rel='stylesheet' media='screen' href='".$template_url."/style.css?=".$tiempo."'>"."\n"; //CSS del Blog
	}
	add_action("wp_head" , "headElements");

	function footerElements(){ //incluye elementos basicos del theme en el footer
		/* VARIABLES */
		$template_url = get_bloginfo('template_url');
		/* SCRIPTS */
	    echo "<script src='".$template_url."/js/jquery-3.3.1.slim.min.js'></script>"."\n";
    	echo "<script src='".$template_url."/js/popper.min.js'></script>"."\n";
    	echo "<script src='".$template_url."/js/bootstrap.min.js'></script>"."\n";
	}
	add_action("wp_footer" , "footerElements");
	
	//remover la version de WP (para evitar decirle al hacker si la version es antigua
	function sacar_versionWP() {
		return '';
	}
	add_filter('the_generator', 'sacar_versionWP');
	