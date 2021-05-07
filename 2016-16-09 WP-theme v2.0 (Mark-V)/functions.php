<? 
// 	***************************************************************************************
//	WORDPRESS THEME CODENAME MARK
// 	*************************************************************************************** 
//
	$nombretheme 	=	"MARK-V";
	$versiontheme 	=	"3.2.4"; //NO OLVIDAR CAMBIAR LA VERSION EN EL CSS "style.css"
	$firmatheme 	=	"&copy;2014-2016";
	$autortheme 	=	"LinkReloaded";
	$autorwebtheme 	=	"http://www.linkreloaded.net/";
//
//	*************************************************************************************** 
//  HISTORIAL DE CAMBIOS
//	*************************************************************************************** 
/* 
	+ MARK-V:3.2.4(20161220)
	.- Se respaldo el theme en bitbucket, https://linkreloaded@bitbucket.org/colaboraciones/wordpress.git
		
	+ MARK-V:3.2.3(20161028)
	.- Se ordenaron archivos y se eliminaron los que no se usan recurrentemente, la idea es optimizar la puesta en marcha del theme basico
	
	+ MARK-V:3.2.2(20151230)
	.- Se ordenaron archivos base para limpiar el function segun sugerencia de Ingenieria.

	+ MARK-V:3.2.1(20151201)
	.- Se ordenaron archivos en base a los problemas resueltos en el ultimo proyecto.
	
	+ MARK-V:3.2.0(20151027)
	.- Se incluyeron fuentes y componentes JS anexos al funcionamiento del Boostrap y se dejaron ejemplos de funcionamiento
	.- cambios en functions.php, se corrijió el sistema de pop up en el home (ahora funciona con boostrap)

	+ MARK-V:3.1.2(20151005)
	.- ordenados otra vez los archivos, eliminados los JS que estan incorporados ya en el boostrap, se empaquetaron los css para optimizar la carga

	+ MARK-V:3.1.1(20151001)
	.- ordenados otra vez los archivos, se adjunta un archivo de configuracion para poder bajar y re-configurar boostrap, ahora todos los archivos personalizados del theme estan dentro de la carpeta "assets"

	+ MARK-V:3.1.0(20150901)
	.- cambios mayores en el theme, se editaron y ordenaron los archivos en función de boostrap 3
	.- cambios en functions.php se elimino el selector responsivo desde el panel.

	+ MARK-V:3.0.9(20150603)
	.- cambios en functions.php se cambió la forma en que se imprimen los campos opcionales, ahora quedan disponibles como variable y deben ser impresos por obligacion para poder ser mostrados, esto permite hacer condiciones con ellos.
	.- cambios en functions-imagenesMiniaturas.php se eliminaron las nomenclaturas diferentes para las imagenes horizontales y verticales, ahora existe un unico identificador IMG con el tamaño del recorte, el antiguo método era más lento y confuso.

	+ MARK-V:3.0.8(20150311)
	.- cambios en functions.php y footer.php se mejoró el sistema de pop up, ahora se puede cargar una imagen sin vinculo y se puede
	escribir el tiempo de duracion del pop up activado.
	
	+ MARK-V:3.0.7(20150123)
	.- cambios en functions.php Se eliminó la etiqueta script en el código analytics, ahora se debe poner la etiqueta al 
	momento de incluir el codigo, esto ayuda a poner el tag manager.
	
	+ MARK-V:3.0.6(20150112)
	.- cambios en inc/id_url.php Se añadió la capacidad de detectar e imprimir en el body una plantilla de página para poder usar CSS de acuerdo a plantillas, no a ID de las páginas.
	
	+ MARK-V:3.0.5(20141229)
	.- cambios en functions.php, Se solucionó un error css que impedia que el plugin CCTM mostrara la barra de navegacion tras cargar un medio.
	
	+ MARK-V:3.0.4(20141027)
	.- cambios en functions.php, Se incorporó una excepción de seguridad para permitir que se pudieran subir archivos .ico, .mp3 y .swf mediante el panel de WP.

	+ MARK-V:3.0.3(20141022)
	.- cambios en default.css y carpeta js, se corrigieron algunos estilos y se agrego el minmap al jQuery.

	+ MARK-V:3.0.2(20140923)
	.- cambios en functions.php, ahora se puede agregar una imagen pop up en el home del sitio directo desde el panel de control.

	+ MARK-V:3.0.1(20140723)
	.- cambios en header.php, eliminado el identificador por JS, no se usa y da mas problemas de los que resuelve.
	.- arreglado el bug en iexplorer que te permitia ver las vistas de compatibilidad, ahora va a forzar la ultima version de explorer

	+ MARK-V:3.0.0(20140611)
	.- cambios de css, ahora en la version no responsiva se puede identificar un ipad y dar estilo especificos.
	.- eliminado el "include/datos_en_duro.php", se debe utilzar la modificacion en el panel para dejar administrables los textos en duro.
	.- agregada una funcion "panel opciones" para poder manipular ciertos elementos del panel de control de WP. 
	.- simplificado el sistema de ordenamiento de versiones y firma, ahora solo se edita el style.css con los datos necesarios.

	+ MARK-V:2.0.0(201404)
	.- cambios varios en la version, ahora se usan dos plugin CCTM y CUSTOM FIELD SUITE como apoyo el theme
	
	+ MARK-V:1.0.0(20140205) 
	.- inicio de la version, reunion de los plugins y metodologias a aplicar.

*/	
// 	*************************************************************************************** 
//
//  INCLUDES DEL THEME
//	
	include('inc/function_base.php');  						
//
//	NOTA: Descomentar sólo los archivos necesarios
//
// 	*************************************************************************************** 
	
	//include('inc/function_paginador1234.php'); 			/* Paginador con numero de listas */
	//include('inc/function_widgetTheme.php'); 				/* Permitir widgets en el theme */
	//include('inc/function_extractoDinamico.php'); 		/* Extracto personalidado */
	//include('inc/function_camposGlobales.php');  			/* Permite editar informacion global del sitio (PREVIA CONFIGURACION) */
	//include('inc/function_cloudTagsCustomPost.php'); 		/* Nube de tags en los post especiales */
	//include('inc/function_shortcode.php');  				/* Atajos de teclado en el sitio */
	include('inc/function_panelSidebarMenu.php'); 			/* Mostrar o ocultar los menus en el panel de control */
	include('inc/function_imagenesMiniaturas.php');  		/* Imagenes en miniatura personalizada */
	include('inc/function_menuEditable.php'); 				/* Menus editables WORDPRESS*/
	include('inc/function_panelOpciones.php');  			/* Agrega funcionalidades al panel de control de WP */
	
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
?>