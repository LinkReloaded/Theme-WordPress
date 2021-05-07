<?php 
	/**
		MARK-X
		Datos de la versión
	**/		
	$desarrollo 	=	"si"; //Cambia el CSS de acuerdo a si el sitio esta publicado o no
	$versiontheme 	=	"<strong>NÚCLEO:</strong> Bootstrap v4.1.0, jquery-3.3.1.slim.min.js"."<br/>"; //Versiones del Bootstrap y sus dependencias
    $versiontheme	.=	"<strong>FUENTES:</strong> OpenSansLight, OpenSansLightItalic, OpenSansRegular, ";  //Fuentes precargadas
    $versiontheme	.=	"OpenSansItalic, OpenSansSemibold, OpenSansSemiboldItalic, "; //Fuentes precargadas (cont 1)
    $versiontheme	.=	"OpenSansBold, OpenSansBoldItalic, OpenSansExtrabold, "; //Fuentes precargadas (cont 2)
    $versiontheme	.=	"OpenSansExtraboldItalic, OpenSansCondensedLight, "; //Fuentes precargadas (cont 3)
    $versiontheme	.=	"OpenSansCondensedLightItalic, OpenSansCondensedBold"."<br/>"; //Fuentes precargadas (cont 4)
    $versiontheme	.=	"<strong>ÍCONOS:</strong> fontawesome-free-5.8.2-web"."<br/>"; //Iconos precargados
    $versiontheme	.=	"<strong>VERSIÓN: 2019-05-22</strong>"."<br/>"; //Última fecha de cambios.
	$colorwindows	= 	"#2b2b2b"; //Cambia el color del shortcut de windows
	$tituloblog		=	get_bloginfo('name');
	$urltheme		=	get_bloginfo('template_url');
	$idpagina		=	get_the_ID();
	$tiempo			= 	time();
	$urlbase		=	get_bloginfo('url');

	/**
		Secciones basicas, no descomentar sin revisar.		
	**/
	include("functions/function_base.php");
	
	/**
		Secciones complementarias, descomentar sólo las necesarias.		
	**/
	include("functions/function_panelSidebarMenu.php");			/* Mostrar o ocultar los menus en el panel de control */
	include("functions/function_imagenesMiniaturas.php"); 		/* Imagenes en miniatura personalizada */
	include("functions/function_menuEditable.php");				/* Menus editables WORDPRESS*/
	include("functions/function_panelOpciones.php");			/* Agrega funcionalidades al panel de control de WP */
	//include('functions/function_paginador1234.php'); 			/* Paginador con numero de listas */
	//include('functions/function_widgetTheme.php'); 			/* Permitir widgets en el theme */
	//include('functions/function_extractoDinamico.php'); 		/* Extracto personalidado */
	//include('functions/function_camposGlobales.php');  		/* Permite editar informacion global del sitio (PREVIA CONFIGURACION) */
	//include('functions/function_cloudTagsCustomPost.php'); 	/* Nube de tags en los post especiales */
	//include('functions/function_shortcode.php');  			/* Atajos de teclado en el sitio */
	
	

	/*---------------------------------------------------------------------------------------------	*/
	/* Custom Post Type 																			*/
	/* http://www.weareo3.com/wordpress-custom-post-type-generator/ 								*/
	/* cambiar "postespecial* por el nombre interno del tipo de post a utilizar 				 	*/
	/*---------------------------------------------------------------------------------------------	*/
	
	/*
	class postespecial {
		function postespecial() {
			add_action('init',array($this,'create_post_type'));
		}
		function create_post_type() {
			$labels = array(
			    'name' => 'post especial',
			    'singular_name' => 'Post especial',
			    'add_new' => 'Agregar nuevo',
			    'all_items' => 'Todos los post especiales',
			    'add_new_item' => 'Agregar nuevo post especial',
			    'edit_item' => 'Editar post especial',
			    'new_item' => 'Nuevo post especial',
			    'view_item' => 'Ver por especial',
			    'search_items' => 'Buscar post especiales',
			    'not_found' =>  'No se encontraron post especiales',
			    'not_found_in_trash' => 'No se encontraron post especiales en la papelera',
			    'parent_item_colon' => 'Post especial superior:',
			    'menu_name' => 'Post especial'
			);
			$args = array(
				'labels' => $labels,
				'description' => "Descripcion del post especial",
				'public' => true,
				'exclude_from_search' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'show_in_menu' => true,
				'show_in_admin_bar' => false,
				'menu_position' => 100,
				'menu_icon' => null,
				'taxonomies' => array('category'),
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array('title','editor','revisions'),
				'has_archive' => true,
				'rewrite' => array('slug' => 'postespecial', 'with_front' => 'b'),
				'query_var' => true,
				'can_export' => true
			);
			register_post_type('postespecial',$args);
		}
	}
	$postespecial = new postespecial();
	*/
