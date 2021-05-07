<?
	// ******* SECCION DE BIENVENIDA ******* 	
	add_action('admin_menu', 'my_plugin_menu');
	function my_plugin_menu() {
		add_object_page('MARK IV - 4Sale |', 'Opciones', 'edit_theme_options', 'mark04', 'panel_bienvenida');
	}
	function panel_bienvenida(){ 	
?>		
	<div class="wrap">				
		<strong>MARK IV</strong><br/>
       	Indicadores:<br/>
       	el valor del contador de FRANCISCO actual es: <? leer_contador(); ?>
	</div>	
<? 
	}
?>