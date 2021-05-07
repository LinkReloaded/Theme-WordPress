<? 
/*
	Plugin Name: MARK-IV
	Plugin URI: http://www.4sale.cl
	Description: Agrega funciones adicionales a un Wordpress Limpio. 
	Author: 4Sale.cl 
	Version: 1.0
	Author URI: http://www.4sale.cl
	Producer: LinkReloaded.net
*/


	// ******* INICIO ******* 
	register_activation_hook(__FILE__, 'mark_iniciar');
	// funcion que se ejecuta al activar el plugin
	function mark_iniciar() {
		global $wpdb; //variable global de wp que retorna el prefijo
		$nombredb="mark04"; //nombre de la nuestra tabla
		$table_name= $wpdb->prefix.$nombredb;		
		$sql = "CREATE TABLE $table_name ( 
			`id` mediumint( 9 ) NOT NULL, 
			`dato` tinytext NOT NULL, 
			`valor` varchar(255) NOT NULL, 
			PRIMARY KEY (`id`))";//creamos la BBDD
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `dato`, `valor`) VALUES (1, 'custom', 'hola')";//LE ASIGNAMOS UN VALOR POR DEFECTO A LA BBDD
		$wpdb->query($sql);
		add_option('mark_help', 'default'); // añadir la option del plugin
		register_deactivation_hook(__FILE__, 'mark_autodestruccion'); // registrar la funcion que se ejecuta al desactivar el plugin
	}
	// funcion que se ejecuta al desactivar el plugin
	function mark_autodestruccion() {
		global $wpdb;
		$nombredb="mark04"; //nombre de la nuestra tabla
		$table_name = $wpdb->prefix.$nombredb;
		$sql = "DROP TABLE $table_name"; //eliminar tabla de la BBDD
		$wpdb->query($sql);
		 // borrar la option del plugin
		delete_option('mark_help');
	}



include('inc/general.php');
include('inc/contador.php');	
	
?>