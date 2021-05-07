<?
/* =================================================================================== 		
//  => SIDEBAR PANEL
	
	Borra los menus del sidebar del panel de control de WP
=================================================================================== */
		add_action('admin_menu', 'my_remove_menu_pages');
    	function my_remove_menu_pages() {
        	//remove_menu_page('edit.php'); // Entradas
            //remove_menu_page('upload.php'); // Multimedia
            remove_menu_page('link-manager.php'); // Enlaces
            //remove_menu_page('edit.php?post_type=page'); // Páginas
            remove_menu_page('edit-comments.php'); // Comentarios
            //remove_menu_page('themes.php'); // Apariencia
            //remove_menu_page('plugins.php'); // Plugins
            //remove_menu_page('users.php'); // Usuarios
            //remove_menu_page('tools.php'); // Herramientas
            //remove_menu_page('options-general.php'); // Ajustes
		}
?>