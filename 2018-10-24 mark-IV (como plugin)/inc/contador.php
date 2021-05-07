<?
	// *******  SECCION CONTADOR FRANCISCO ******* 
	// crear un item en el panel de administracion
	add_action('admin_menu', 'contador_menu');
	// crear la pagina de opciones del plugin
	function contador_menu() {
		add_submenu_page('mark04', 'FCO contador', 'contador', 'edit_theme_options', 'fco-contador', 'contador_options');
	}
	// funcion que muestra la pagina de opciones del plugin
	function contador_options() {
		// comprobar si la peticion procede del form
		global $wpdb;
		$nombredb="mark04"; //nombre de la nuestra tabla	
		$table_name = $wpdb->prefix.$nombredb;
		if (isset($_POST['contador_custom_new'])
			&& !empty($_POST['contador_custom_new'])) {
			$sql = "UPDATE $table_name SET valor ='{$_POST['contador_custom_new']}' WHERE dato='custom'";
			$wpdb->query($sql);
		}
		if (isset($_POST['contador_type'])) {
			update_option('mark_help', $_POST['contador_type']);
		}
		// mostrar la pagina de opciones
		$contador_custom = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='custom'" );
		?>
			<div class='wrap'>
				<h2>Actualizar Contador</h2>
				<form method='post' action=''><br />
					<? //Contador Actual: <? echo $contador_custom ?><br />
					New Message custom: <input type='text' name='contador_custom_new' value="<? echo $contador_custom ?>" /><br />
					<?php submit_button( null, 'primary', 'update' ); ?>
				</form>
			</div>
		<?
	}
	function leer_contador(){
		global $wpdb;
		$nombredb="mark04"; //nombre de la nuestra tabla	
		$table_name = $wpdb->prefix.$nombredb;
		$contador = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='custom'" );
		echo $contador;
		
	}
?>