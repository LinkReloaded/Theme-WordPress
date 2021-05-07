<?
/* =================================================================================== 		
//  => BASE            

	Configuracion base del theme personalizado.                
=================================================================================== */

/* 	=================================================================================== 		
	VARIABLES GLOBALES 
	=================================================================================== */
	function dato_version(){global $markv_version; global $nombretheme; global $versiontheme; $markv_version = '<strong>'.$nombretheme.'</strong><br/>Version: '.$versiontheme; return $markv_version;}
	function dato_firma(){global $markv_firma; global $autorwebtheme; global $firmatheme; global $autortheme; $markv_firma = $firmatheme.", <a href='".$autorwebtheme."' target='_blank'>".$autortheme."</a>"; return $markv_firma;}
	function dato_analytics(){global $wpdb; global $dato_analytics; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $dato_analytics = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='analytics'" ); if(!empty($dato_analytics)){ $dato_analytics = "si"; } else { $dato_analytics = "no"; } return $dato_analytics;} 
	function dato_imagenlogin(){global $dato_imagenlogin; $dato_imagenlogin = get_option('imagenlogin_dato'); if(!empty($dato_imagenlogin)){ $dato_imagenlogin = "si"; } else { $dato_imagenlogin = "no"; } return $dato_imagenlogin;}
	function dato_favicon(){global $dato_favicon; $dato_favicon = get_option('favicon_dato'); if(!empty($dato_favicon)){ $dato_favicon = "si"; } else { $dato_favicon = "no"; } return $dato_favicon;}
	function dato_appleicons1(){global $dato_favicon1; $dato_appleicons1 = get_option('appleicons1_dato'); if(!empty($dato_appleicons1)){ $dato_appleicons1 = "si"; } else { $dato_appleicons1 = "no"; } return $dato_appleicons1;}
	function dato_appleicons2(){global $dato_favicon2; $dato_appleicons2 = get_option('appleicons2_dato'); if(!empty($dato_appleicons2)){ $dato_appleicons2 = "si"; } else { $dato_appleicons2 = "no"; } return $dato_appleicons2;}
	function dato_appleicons3(){global $dato_favicon3; $dato_appleicons3 = get_option('appleicons3_dato'); if(!empty($dato_appleicons3)){ $dato_appleicons3 = "si"; } else { $dato_appleicons3 = "no"; } return $dato_appleicons3;}		

/* 	=================================================================================== 		
	PANEL OPCIONES
	=================================================================================== */
	add_action('admin_menu', 'markv_base');
	function markv_base() {
		// 1.- CREO LA BASE DE DATOS GENERAL
		global $wpdb;
		$nombredb="mark05";
		$table_name= $wpdb->prefix.$nombredb;		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE $table_name ( 
			`id` mediumint( 9 ) NOT NULL, 
			`dato` tinytext NOT NULL, 
			`valor` varchar(2048) NULL, 
			PRIMARY KEY (`id`))";	//creo la BBDD
			$wpdb->query($sql);
			$sql = "INSERT INTO $table_name (`id`, `dato`, `valor`) 
			VALUES (1, 'analytics', ''), (2, 'texto_2', 'dato 2'),  (3, 'texto_3', 'dato 3'), (4, 'texto_4', 'dato 4'), (5, 'texto_5', 'dato 5'), (6, 'texto_6', 'dato 6'), (7, 'texto_7', 'dato 7'), (8, 'texto_8', 'dato 8'), (9, 'texto_9', 'dato 9'), (10, 'texto_10', 'dato 10'), (11, 'texto_11', 'dato 11'), (12, 'texto_12', 'dato 12'), (13, 'texto_13', 'dato 13'), (14, 'texto_14', 'dato 14'), (15, 'texto_15', 'dato 15'), (16, 'texto_16', 'dato 16'), (17, 'texto_17', 'dato 17'), (18, 'texto_18', 'dato 18'), (19, 'texto_19', 'dato 19'), (20, 'texto_20', 'dato 20'), (21, 'texto_21', 'dato 21'), (22, 'texto_22', 'dato 22'), (23, 'texto_23', 'dato 23'), (24, 'texto_24', 'dato 24'), (25, 'texto_25', 'dato 25'), (26, 'texto_26', 'dato 26'), (27, 'texto_27', 'dato 27'), (28, 'texto_28', 'dato 28'), (29, 'texto_29', 'dato 29'), (30, 'texto_30', 'dato 30'), (31, 'opengraph_1', 'no'), (32, 'opengraph_2', 'opengraph 2'), (33, 'opengraph_3', 'opengraph 3')";//LE ASIGNAMOS UN VALOR POR DEFECTO A LA BBDD (1, custom, hola)
			$wpdb->query($sql);
		}
		// 2.- AGREGO LA SECCION AL PANEL: "add_options_page" = pone la pagina dentro de la seccion AJUSTES, "add_object_page" = pone la pagina como una seccion independiente	
		add_object_page('4Sale [MARK-V] : Opciones', 'Opciones', 'manage_options', 'mark-v', 'markv_portada' );
	}
	function markv_portada() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		/*	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
		?>
		<style type="text/css">
			/* los cambios realizados aca, se deben realizar en el panel de bienvenida */ 
			.textos {height:20px; float:left;} 
			.row {clear:both; width:100%; margin-bottom:5px;}
			.clear {clear:both; width:100%;}
			.info{width:128px; height:128px; margin-top:1px; margin-left:1px; float:left;  background-position: 0px 0px;}
			.info.ana{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_analitycs.jpg');}
			.info.ana.activado{background-position: 0px 128px;}
			.info.res{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_responsivo.jpg');}
			.info.res.activado{background-position: 0px 128px;}
			.info.log{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_login.jpg');}
			.info.log.activado{background-position: 0px 128px;}
			.info.ap1{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon1.jpg');}
			.info.ap1.activado{background-position: 0px 128px;}
			.info.ap2{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon2.jpg');}
			.info.ap2.activado{background-position: 0px 128px;}
			.info.ap3{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon3.jpg');}
			.info.ap3.activado{background-position: 0px 128px;}
			.info.fav{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_favicon.jpg');}
			.info.fav.activado{background-position: 0px 128px;}
			.left{float:left;}
			.texto{padding: 10px;}		
		</style>
		<div class="wrap">        
			<p>
				<strong>Opciones habilitadas:</strong>
				<div class="row">
					<div class="info left ana<? $dato = dato_analytics(); if($dato=="si"){?> activado<? };?>"></div>
					<div class="texto left"><strong>C&Oacute;DIGO ANALYTICS:</strong><br/>Debe copiar el c&oacute;digo que proporciona Google en Opciones/ Analytics</div>
					<div class="clear"></div>
				</div>
				<div class="row">
					<div class="info log<? $dato = dato_imagenlogin(); if($dato=="si"){?> activado<? };?>"></div>
					<div class="texto left"><strong>IMAGEN PANTALLA DE LOGIN Y DASHBOARD:</strong><br/>Debe subir una imagen en Apariencia/ Personalizar</div>
					<div class="clear"></div>
				</div>
				<div class="row">
					<div class="info fav<? $dato = dato_favicon(); if($dato=="si"){?> activado<? };?>"></div>
					<div class="texto left"><strong>FAVICON DEL SITIO:</strong><br/>Debe subir una imagen o &iacute;cono en Apariencia/ Personalizar</div>
					<div class="clear"></div>
				</div>
				<div class="row">
					<div class="info ap1<? $dato = dato_appleicons1(); if($dato=="si"){?> activado<? };?>"></div>
					<div class="texto left"><strong>ICONO APPLE TOUCH 127x128:</strong><br/>Para esta opci&oacute;n debe subir una imagen de 128x128 px en Apariencia/ Personalizar</div>
					<div class="clear"></div>
				</div>
				<div class="row">
					<div class="info ap2<? $dato = dato_appleicons2(); if($dato=="si"){?> activado<? };?>"></div>
					<div class="texto left"><strong>ICONO APPLE TOUCH 114x114:</strong><br/>Para esta opci&oacute;n debe subir una imagen de 114x114 px en Apariencia/ Personalizar</div>
					<div class="clear"></div>
				</div>
				<div class="row">
					<div class="info ap3<? $dato = dato_appleicons3(); if($dato=="si"){?> activado<? };?>"></div>       
					<div class="texto left"><strong>ICONO APPLE TOUCH 72x72:</strong><br/>Para esta opci&oacute;n debe subir una imagen de 72x72 px en Apariencia/ Personalizar</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</p>
			<hr>
			<p><?= dato_version(); ?><br/><?= dato_firma(); ?></p>
		</div>
		<? /*	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
				-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
	}  

/* 	=================================================================================== 		
	SUBPANEL ANALYTICS 
	=================================================================================== */
	add_action('admin_menu', 'analytics_submenu');
	function analytics_submenu() {
		// 2.- AGREGO LA SUBSECCION AL PANEL
		//"add_options_page" = pone la pagina dentro de la seccion AJUSTES, "add_object_page" = pone la pagina como una seccion independiente, "add_submenu_page" = se debe identificar de que seccion es el submenu de la pagina
		add_submenu_page('mark-v', '[MARK-V] : Analytics', 'Analytics', 'manage_options', 'mark-v-analytics', 'markv_seccion_analytics' );
	}
	function markv_seccion_analytics() { 
		// 1.-ACTUALIZO LA BBDD
		global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb;
		if (isset($_POST['cod_analytics'])) { //&& !empty($_POST['cod_analytics'])
			$sql = "UPDATE $table_name SET valor ='{$_POST['cod_analytics']}' WHERE dato='analytics'";
			$wpdb->query($sql);		
		}		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		} 
		$markv_codigoAnalytics = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='analytics'" ); //lector del codigo en el panel
	/* 	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */ ?>	
		
		<div class="wrap">
			<form method="post" action="">
				<label>Escriba el c&oacute;digo analytics del sitio, incluya la etiqueta "< script >"</label><br/><br/>	
				<textarea name='cod_analytics' cols="50" rows="10"><? echo $markv_codigoAnalytics ?></textarea><br/>
				<?php submit_button( null, 'primary', 'update' ); ?>
			</form>
		</div>
		
	<? /* 	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
	} 
	function codigo_analytics(){ //lector del codigo en el theme, se pone "echo codigo_analytics();"
		global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb;	
		$cod = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='analytics'" );
		$codigo="\n<!-- analytics -->\n".$cod."\n<!-- /analytics -->\n";
		if(!empty($cod)){//imprimo el resultado solo si el campo no esta vacio
		echo $codigo; 
		}
	}

/* 	=================================================================================== 		
	SUBPANEL TEXTOS 
	=================================================================================== */
	add_action('admin_menu', 'textos_submenu');
	function textos_submenu() {
		add_submenu_page('mark-v', '[MARK-V] : Textos del theme', 'Textos', 'manage_options', 'mark-v-textos', 'markv_seccion_textos' );
	}
	function markv_seccion_textos() { 
		global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb;
		if (isset($_POST['cod_texto_2'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_2']}' WHERE dato='texto_2'";$wpdb->query($sqldir);}$markv_texto_2 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_2'" );// fin IF
		if (isset($_POST['cod_texto_3'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_3']}' WHERE dato='texto_3'";$wpdb->query($sqldir);}$markv_texto_3 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_3'" );// fin IF		
		if (isset($_POST['cod_texto_4'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_4']}' WHERE dato='texto_4'";$wpdb->query($sqldir);}$markv_texto_4 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_4'" );// fin IF
		if (isset($_POST['cod_texto_5'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_5']}' WHERE dato='texto_5'";$wpdb->query($sqldir);}$markv_texto_5 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_5'" );// fin IF				
		if (isset($_POST['cod_texto_6'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_6']}' WHERE dato='texto_6'";$wpdb->query($sqldir);}$markv_texto_6 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_6'" );// fin IF
		if (isset($_POST['cod_texto_7'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_7']}' WHERE dato='texto_7'";$wpdb->query($sqldir);}$markv_texto_7 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_7'" );// fin IF	
		if (isset($_POST['cod_texto_8'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_8']}' WHERE dato='texto_8'";$wpdb->query($sqldir);}$markv_texto_8 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_8'" );// fin IF
		if (isset($_POST['cod_texto_9'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_9']}' WHERE dato='texto_9'";$wpdb->query($sqldir);}$markv_texto_9 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_9'" );// fin IF	
		if (isset($_POST['cod_texto_10'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_10']}' WHERE dato='texto_10'";$wpdb->query($sqldir);}$markv_texto_10 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_10'" );// fin IF
		if (isset($_POST['cod_texto_11'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_11']}' WHERE dato='texto_11'";$wpdb->query($sqldir);}$markv_texto_11 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_11'" );// fin IF	
		if (isset($_POST['cod_texto_12'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_12']}' WHERE dato='texto_12'";$wpdb->query($sqldir);}$markv_texto_12 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_12'" );// fin IF
		if (isset($_POST['cod_texto_13'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_13']}' WHERE dato='texto_13'";$wpdb->query($sqldir);}$markv_texto_13 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_13'" );// fin IF	
		if (isset($_POST['cod_texto_14'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_14']}' WHERE dato='texto_14'";$wpdb->query($sqldir);}$markv_texto_14 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_14'" );// fin IF
		if (isset($_POST['cod_texto_15'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_15']}' WHERE dato='texto_15'";$wpdb->query($sqldir);}$markv_texto_15 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_15'" );// fin IF
		if (isset($_POST['cod_texto_16'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_16']}' WHERE dato='texto_16'";$wpdb->query($sqldir);}$markv_texto_16 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_16'" );// fin IF	
		if (isset($_POST['cod_texto_17'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_17']}' WHERE dato='texto_17'";$wpdb->query($sqldir);}$markv_texto_17 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_17'" );// fin IF
		if (isset($_POST['cod_texto_18'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_18']}' WHERE dato='texto_18'";$wpdb->query($sqldir);}$markv_texto_18 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_18'" );// fin IF	
		if (isset($_POST['cod_texto_19'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_19']}' WHERE dato='texto_19'";$wpdb->query($sqldir);}$markv_texto_19 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_19'" );// fin IF
		if (isset($_POST['cod_texto_20'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_20']}' WHERE dato='texto_20'";$wpdb->query($sqldir);}$markv_texto_20 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_20'" );// fin IF	
		if (isset($_POST['cod_texto_21'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_21']}' WHERE dato='texto_21'";$wpdb->query($sqldir);}$markv_texto_21 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_21'" );// fin IF
		if (isset($_POST['cod_texto_22'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_22']}' WHERE dato='texto_22'";$wpdb->query($sqldir);}$markv_texto_22 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_22'" );// fin IF	
		if (isset($_POST['cod_texto_23'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_23']}' WHERE dato='texto_23'";$wpdb->query($sqldir);}$markv_texto_23 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_23'" );// fin IF
		if (isset($_POST['cod_texto_24'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_24']}' WHERE dato='texto_24'";$wpdb->query($sqldir);}$markv_texto_24 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_24'" );// fin IF	
		if (isset($_POST['cod_texto_25'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_25']}' WHERE dato='texto_25'";$wpdb->query($sqldir);}$markv_texto_25 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_25'" );// fin IF
		if (isset($_POST['cod_texto_26'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_26']}' WHERE dato='texto_26'";$wpdb->query($sqldir);}$markv_texto_26 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_26'" );// fin IF	
		if (isset($_POST['cod_texto_27'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_27']}' WHERE dato='texto_27'";$wpdb->query($sqldir);}$markv_texto_27 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_27'" );// fin IF
		if (isset($_POST['cod_texto_28'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_28']}' WHERE dato='texto_28'";$wpdb->query($sqldir);}$markv_texto_28 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_28'" );// fin IF	
		if (isset($_POST['cod_texto_29'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_29']}' WHERE dato='texto_29'";$wpdb->query($sqldir);}$markv_texto_29 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_29'" );// fin IF
		if (isset($_POST['cod_texto_30'])) { $sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_texto_30']}' WHERE dato='texto_30'";$wpdb->query($sqldir);}$markv_texto_30 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_30'" );// fin IF			
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		} 
		/* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */ 
?>		
		<div class="wrap">
			<p>Textos en Duro del Theme</p>
			<form method="post" action="">
				<label>Nombre de etiqueta <strong>2</strong> <sup>&lt;?= texto_2(); ?&gt;</sup></label><br/><input name="cod_texto_2" type="text" value="<? echo $markv_texto_2 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>3</strong> <sup>&lt;?= texto_3(); ?&gt;</sup></label><br/><input name="cod_texto_3" type="text" value="<? echo $markv_texto_3 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>4</strong> <sup>&lt;?= texto_4(); ?&gt;</sup></label><br/><input name="cod_texto_4" type="text" value="<? echo $markv_texto_4 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>5</strong> <sup>&lt;?= texto_5(); ?&gt;</sup></label><br/><input name="cod_texto_5" type="text" value="<? echo $markv_texto_5 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>6</strong> <sup>&lt;?= texto_6(); ?&gt;</sup></label><br/><input name="cod_texto_6" type="text" value="<? echo $markv_texto_6 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>7</strong> <sup>&lt;?= texto_7(); ?&gt;</sup></label><br/><input name="cod_texto_7" type="text" value="<? echo $markv_texto_7 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>8</strong> <sup>&lt;?= texto_8(); ?&gt;</sup></label><br/><input name="cod_texto_8" type="text" value="<? echo $markv_texto_8 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>9</strong> <sup>&lt;?= texto_9(); ?&gt;</sup></label><br/><input name="cod_texto_9" type="text" value="<? echo $markv_texto_9 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>10</strong> <sup>&lt;?= texto_10(); ?&gt;</sup></label><br/><input name="cod_texto_10" type="text" value="<? echo $markv_texto_10 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>11</strong> <sup>&lt;?= texto_11(); ?&gt;</sup></label><br/><input name="cod_texto_11" type="text" value="<? echo $markv_texto_11 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>12</strong> <sup>&lt;?= texto_12(); ?&gt;</sup></label><br/><input name="cod_texto_12" type="text" value="<? echo $markv_texto_12 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>13</strong> <sup>&lt;?= texto_13(); ?&gt;</sup></label><br/><input name="cod_texto_13" type="text" value="<? echo $markv_texto_13 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>14</strong> <sup>&lt;?= texto_14(); ?&gt;</sup></label><br/><input name="cod_texto_14" type="text" value="<? echo $markv_texto_14 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>15</strong> <sup>&lt;?= texto_15(); ?&gt;</sup></label><br/><input name="cod_texto_15" type="text" value="<? echo $markv_texto_15 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>16</strong> <sup>&lt;?= texto_16(); ?&gt;</sup></label><br/><input name="cod_texto_16" type="text" value="<? echo $markv_texto_16 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>17</strong> <sup>&lt;?= texto_17(); ?&gt;</sup></label><br/><input name="cod_texto_17" type="text" value="<? echo $markv_texto_17 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>18</strong> <sup>&lt;?= texto_18(); ?&gt;</sup></label><br/><input name="cod_texto_18" type="text" value="<? echo $markv_texto_18 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>19</strong> <sup>&lt;?= texto_19(); ?&gt;</sup></label><br/><input name="cod_texto_19" type="text" value="<? echo $markv_texto_19 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>20</strong> <sup>&lt;?= texto_20(); ?&gt;</sup></label><br/><input name="cod_texto_20" type="text" value="<? echo $markv_texto_20 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>21</strong> <sup>&lt;?= texto_21(); ?&gt;</sup></label><br/><input name="cod_texto_21" type="text" value="<? echo $markv_texto_21 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>22</strong> <sup>&lt;?= texto_22(); ?&gt;</sup></label><br/><input name="cod_texto_22" type="text" value="<? echo $markv_texto_22 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>23</strong> <sup>&lt;?= texto_23(); ?&gt;</sup></label><br/><input name="cod_texto_23" type="text" value="<? echo $markv_texto_23 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>24</strong> <sup>&lt;?= texto_24(); ?&gt;</sup></label><br/><input name="cod_texto_24" type="text" value="<? echo $markv_texto_24 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>25</strong> <sup>&lt;?= texto_25(); ?&gt;</sup></label><br/><input name="cod_texto_25" type="text" value="<? echo $markv_texto_25 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>26</strong> <sup>&lt;?= texto_26(); ?&gt;</sup></label><br/><input name="cod_texto_26" type="text" value="<? echo $markv_texto_26 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>27</strong> <sup>&lt;?= texto_27(); ?&gt;</sup></label><br/><input name="cod_texto_27" type="text" value="<? echo $markv_texto_27 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>28</strong> <sup>&lt;?= texto_28(); ?&gt;</sup></label><br/><input name="cod_texto_28" type="text" value="<? echo $markv_texto_28 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>29</strong> <sup>&lt;?= texto_29(); ?&gt;</sup></label><br/><input name="cod_texto_29" type="text" value="<? echo $markv_texto_29 ?>" size="80"><br/>
				<label>Nombre de etiqueta <strong>30</strong> <sup>&lt;?= texto_30(); ?&gt;</sup></label><br/><textarea name='cod_texto_30' cols="78" rows="10"><? echo $markv_texto_30 ?></textarea><br/>
				<?php submit_button( null, 'primary', 'update' ); ?>
		  </form>
		</div>
		
<? 
		/* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
	} 
	function texto_2(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_2'" );return $codigo; }
	function texto_3(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_3'" );return $codigo; }
	function texto_4(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_4'" );return $codigo; }
	function texto_5(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_5'" );return $codigo; }
	function texto_6(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_6'" );return $codigo; }
	function texto_7(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_7'" );return $codigo; }
	function texto_8(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_8'" );return $codigo; }
	function texto_9(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_9'" );return $codigo; }
	function texto_10(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_10'" );return $codigo; }
	function texto_11(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_11'" );return $codigo; }
	function texto_12(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_12'" );return $codigo; }
	function texto_13(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_13'" );return $codigo; }
	function texto_14(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_14'" );return $codigo; }
	function texto_15(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_15'" );return $codigo; }
	function texto_16(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_16'" );return $codigo; }
	function texto_17(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_17'" );return $codigo; }
	function texto_18(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_18'" );return $codigo; }
	function texto_19(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_19'" );return $codigo; }
	function texto_20(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_20'" );return $codigo; }
	function texto_21(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_21'" );return $codigo; }
	function texto_22(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_22'" );return $codigo; }
	function texto_23(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_23'" );return $codigo; }
	function texto_24(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_24'" );return $codigo; }
	function texto_25(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_25'" );return $codigo; }
	function texto_26(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_26'" );return $codigo; }
	function texto_27(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_27'" );return $codigo; }
	function texto_28(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_28'" );return $codigo; }
	function texto_29(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_29'" );return $codigo; }
	function texto_30(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='texto_30'" );return $codigo; }
	
		
/* 	=================================================================================== 		
	CUSTOM LOGIN: NUEVA IMAGEN PARA EL LOGIN DE WP
	=================================================================================== */
	function campo_imagenlogin( $wp_customize ) {
		$wp_customize->add_section('imagenlogin_seccion', array('title' => 'Imagen Login', 'priority' => 300 ));
		$wp_customize->add_setting('imagenlogin_dato', array('default' => "", 'capability'  => 'edit_theme_options', 'type' => 'option')); // <-- no carga imagen para que salga el alert
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array( 'label' => 'Suba una imagen de 300*100 en png (transparente)', 'section'  => 'imagenlogin_seccion', 'settings' => 'imagenlogin_dato' )));//image_upload_test <-- no se que hace
	}
	add_action( 'customize_register', 'campo_imagenlogin' );
	function my_custom_login_logo() {
		echo '<style type="text/css"> .login #login h1 a { background-image:url('.get_option('imagenlogin_dato').') !important;  background-size: 300px 100px !important; width: 300px !important; height: 100px !important; } </style>';
	}
	add_action('login_head', 'my_custom_login_logo');

/* 	=================================================================================== 		
	IMAGEN FAVICON
	=================================================================================== */
	function campo_favicon( $wp_customize ) {
		$wp_customize->add_section('favicon_seccion', array('title' => 'Favicon del Sitio', 'priority' => 300 ));
		$wp_customize->add_setting('favicon_dato', array('default' => "", 'capability'  => 'edit_theme_options', 'type' => 'option')); // <-- no carga imagen para que salga el alert
		$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'favicon_upload_test', array( 'label' => 'Suba una imagen en .ico (16*16px)', 'section'  => 'favicon_seccion', 'settings' => 'favicon_dato' )));
	}
	add_action( 'customize_register', 'campo_favicon' );
	function favicon(){	$favico = get_option('favicon_dato'); if(!empty($favico)){ $favico = "	<link type='image/x-icon' rel='icon' href='".get_option("favicon_dato")."' /><link type='image/x-icon' rel='shortcut icon' href='".get_option("favicon_dato")."' />"; } echo $favico; }

/* 	=================================================================================== 		
	CUSTOM LOGIN: ICONOS APPLE 
	=================================================================================== */
	function campo_appleIcons( $wp_customize ) {
		$wp_customize->add_section('appleicons_seccion', array('title' => 'Iconos touch Apple', 'priority' => 400 ));
		$wp_customize->add_setting('appleicons1_dato', array('default' => "", 'capability'  => 'edit_theme_options', 'type' => 'option')); 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test1', array( 'label' => 'Agregue una imagen .png (129*129)', 'section'  => 'appleicons_seccion', 'settings' => 'appleicons1_dato' )));
		$wp_customize->add_setting('appleicons2_dato', array('default' => "", 'capability'  => 'edit_theme_options', 'type' => 'option')); 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test2', array( 'label' => 'Agregue una imagen .png (114*114)', 'section'  => 'appleicons_seccion', 'settings' => 'appleicons2_dato' )));
		$wp_customize->add_setting('appleicons3_dato', array('default' => "", 'capability'  => 'edit_theme_options', 'type' => 'option')); 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test3', array( 'label' => 'Agregue una imagen .png (72*72)', 'section'  => 'appleicons_seccion', 'settings' => 'appleicons3_dato' )));
	}
	add_action( 'customize_register', 'campo_appleIcons' );
	function appleIcons(){	
		$appleicons1 = get_option('appleicons1_dato');$appleicons2 = get_option('appleicons2_dato');$appleicons3 = get_option('appleicons3_dato'); 
		if(!empty($appleicons1)){ $appleicons1 = "<link rel='apple-touch-icon' href='".get_option("appleicons1_dato")."' />"; } if(!empty($appleicons2)){ $appleicons2 = "<link rel='apple-touch-icon' sizes='114x114' href='".get_option("appleicons2_dato")."' />"; } if(!empty($appleicons3)){ $appleicons3 = "<link rel='apple-touch-icon' sizes='72x72' href='".get_option("appleicons3_dato")."' />"; }
		echo $appleicons1;echo $appleicons2;echo $appleicons3; 
	}

/* 	=================================================================================== 		
	PANEL DE BIENVENIDA 
	=================================================================================== */
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
	function dashboard_widget_status() { 													// Aquí mostramos lo que queramos o necesitemos
		$blog_title = get_bloginfo('name');
	/* 	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */ 
?>
		<style type="text/css">
			/* los cambios realizados aca, se deben realizar en el panel de opciones */ 
			.textos {height:20px; float:left;} 
			.row {clear:both; width:100%; margin-bottom:5px;}
			.clear {clear:both; width:100%;}
			.info{width:128px; height:128px; margin-top:1px; margin-left:1px; float:left;  background-position: 0px 0px;}
			.info.ana{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_analitycs.jpg');}
			.info.ana.activado{background-position: 0px 128px;}
			.info.res{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_responsivo.jpg');}
			.info.res.activado{background-position: 0px 128px;}
			.info.log{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_login.jpg');}
			.info.log.activado{background-position: 0px 128px;}
			.info.ap1{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon1.jpg');}
			.info.ap1.activado{background-position: 0px 128px;}
			.info.ap2{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon2.jpg');}
			.info.ap2.activado{background-position: 0px 128px;}
			.info.ap3{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_appleicon3.jpg');}
			.info.ap3.activado{background-position: 0px 128px;}
			.info.fav{background-image: url('<? bloginfo('template_url'); ?>/img/img_icono_favicon.jpg');}
			.info.fav.activado{background-position: 0px 128px;}		
		</style>
		<div style='margin-left:auto;margin-right:auto;width:387px;height:100px;'>
			<img src='<?= get_option('imagenlogin_dato') ?>' width='300' height='100'>
		</div>
		<br/>
		<p>Bienvenido a <strong><?= $blog_title ?></strong>, utilice el men&uacute; de la izquierda para navegar por las secciones</p>
		<br/>
		<hr>   
		<p>
			<strong>Opciones:</strong>
			<div class="row">
				<div class="info ana<? $dato = dato_analytics(); if($dato=="si"){?> activado<? };?>"></div>
				<div class="info log<? $dato = dato_imagenlogin(); if($dato=="si"){?> activado<? };?>"></div>
				<div class="info fav<? $dato = dato_favicon(); if($dato=="si"){?> activado<? };?>"></div>
				<div class="info ap1<? $dato = dato_appleicons1(); if($dato=="si"){?> activado<? };?>"></div>
				<div class="info ap2<? $dato = dato_appleicons2(); if($dato=="si"){?> activado<? };?>"></div>
				<div class="info ap3<? $dato = dato_appleicons3(); if($dato=="si"){?> activado<? };?>"></div>           
				<div class="clear"></div>
			</div>
		</p>
		<hr>
		<p style="font-size:10px;"><?= dato_version(); ?></p>        
<? 
		/* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
	} 
	function agregar_dashboard_widgets_status() { // Crea la función usando la accion de un "hook" o gancho
		$blog_title = get_bloginfo('name');
		$tituloBienvenida="Bienvenido al Panel de Control ".$blog_title;
		add_meta_box('new_dashboard_widget', $tituloBienvenida, 'dashboard_widget_status', 'dashboard', 'normal');
	}
	add_action('wp_dashboard_setup', 'agregar_dashboard_widgets_status' );
	
/* 	=================================================================================== 		
	SUBPANEL OPENGRAPH
	=================================================================================== */
	add_action('admin_menu', 'opengraph_submenu');
	function opengraph_submenu() {
		add_submenu_page('mark-v', '[MARK-V] : Opengraph', 'Opengraph', 'manage_options', 'mark-v-opengraph', 'markv_seccion_opengraph' );
	}
	function markv_seccion_opengraph() { 
		global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb;	
		if (isset($_POST['cod_opengraph_1'])){$sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_opengraph_1']}' WHERE dato='opengraph_1'";$wpdb->query($sqldir);}$markv_opengraph_1 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_1'" );// fin IF
		if (isset($_POST['cod_opengraph_2'])){$sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_opengraph_2']}' WHERE dato='opengraph_2'";$wpdb->query($sqldir);}$markv_opengraph_2 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_2'" );// fin IF
		if (isset($_POST['cod_opengraph_3'])){$sqldir = "UPDATE $table_name SET valor ='{$_POST['cod_opengraph_3']}' WHERE dato='opengraph_3'";$wpdb->query($sqldir);}$markv_opengraph_3 = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_3'" );// fin IF
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		} 
	/* 	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */ ?>
		<div class="wrap">
			<p>Par&aacute;metros Opengraph</p>
			<form method="post" action="">
				<label>Activar Opengraph</label><br/><select name="cod_opengraph_1" id="open_combo"><option>Seleccione...</option><option value="si" <? if($markv_opengraph_1=='si'){echo 'selected';} ?>>Activado</option><option value="no" <? if($markv_opengraph_1=='no'){echo 'selected';} ?>>Desactivado</option></select><br/>
				<label>App ID:</label><br/><input name="cod_opengraph_2" type="text" value="<? echo $markv_opengraph_2 ?>" size="80"><br/>
				<label>FB admin ID:</label><br/><input name="cod_opengraph_3" type="text" value="<? echo $markv_opengraph_3 ?>" size="80"><br/>                                
				<?php submit_button( null, 'primary', 'update' ); ?>
			</form>
		</div>
	
	<? /* 	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
	-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
	} 
	function opengraph_1(){ global $wpdb; global $codigo_og; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo_og = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_1'" ); return $codigo_og;}
	function opengraph_2(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_2'" ); echo $codigo; }
	function opengraph_3(){ global $wpdb; $nombredb="mark05"; $table_name = $wpdb->prefix.$nombredb; $codigo = $wpdb->get_var("SELECT valor FROM $table_name WHERE dato='opengraph_3'" ); echo $codigo; }
	

/* 	=================================================================================== 		
	POP UP HOME
	=================================================================================== */
	function custom_post_type() {
		register_post_type('homepopup', 
		array( 'labels' => array( 
			'name' => 'Pop Up Home', 'singular_name' => 'Pop Up Home', 'add_new' => 'Agregar nuevo Pop Up', 'edit_item' => 'Editar Pop Up', 'new_item' => 'Nueva Pop Up', 'view_item' => 'Ver Pop Up', 'search_items' => 'Buscar Pop Up', 'not_found' => 'No se encuentran Pop Up', 'not_found_in_trash' => 'No hay Pop Up en la papelera'), 'public' => true, 'rewrite' => array('slug' => 'homepopup'), 'menu_position' => 4, 'show_ui' => true, 'supports' => array('title', 'custom-fields')
		));
	}
	add_action( 'init', 'custom_post_type', 0 );
	function demo_add_default_boxes() { register_taxonomy_for_object_type('category', 'homepopup'); register_taxonomy_for_object_type('post_tag', 'homepopup'); }

	if ( !class_exists('myCustomFields') ) {
		class myCustomFields {
			var $prefix = 'esp_';
			var $postTypes = array( 'homepopup'); 
			var $customFields =	array(		
				array( "name" => "popuphome_url", "title" => "URL de la imagen", "description" => "Pegue la URL de la imagen a subir", "type" => "text", "scope" => array( "homepopup" ), "capability" => "edit_posts" ),
				//array( "name" => "popuphome_url", "title" => "URL de la imagen", "description" => "Pegue la URL de la imagen a subir", "type" => "text", "scope" => array( "homepopup" ), "capability" => "edit_posts" ),
				array( "name" => "popuphome_tie", "title" => "Duraci&oacute;n del Pop Up", "description"	=> "Escriba la duraci&oacute;n del Pop Up en milisegundos", "type" => "tiempo", "scope" =>	array( "homepopup" ), "capability"	=> "edit_posts" ),
				array( "name" => "popuphome_vin", "title" => "Vinculo del Pop Up", "description"	=> "Escriba el vinculo del Pop Up si es que tiene el vinculo debe ser completo. ej:http://www.misitio.com", "type" => "text", "scope" =>	array( "homepopup" ), "capability"	=> "edit_posts" )
			);
			function myCustomFields() { $this->__construct(); }
			function __construct() { add_action( 'admin_menu', array( &$this, 'createCustomFields' ) ); add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 ); add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 ); }					
			function removeDefaultCustomFields( $type, $context, $post ) { foreach ( array( 'normal', 'advanced', 'side' ) as $context ) { foreach ( $this->postTypes as $postType ) { remove_meta_box( 'postcustom', $postType, $context ); } } }
			function createCustomFields() { if ( function_exists( 'add_meta_box' ) ) { foreach ( $this->postTypes as $postType ) { add_meta_box( 'my-custom-fields', 'Configurar el Pop Up', array( &$this, 'displayCustomFields' ), $postType, 'normal', 'high' ); } } }
			function displayCustomFields() { 
				global $post;
				?>
				<div class="form-wrap">
				<? 
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) { $scope = $customField[ 'scope' ]; $output = false;
					foreach ( $scope as $scopeItem ) { 
						switch ( $scopeItem ) {
							default: {
								if ( $post->post_type == $scopeItem )
								$output = true;
								break;
							}
						}
						if ( $output ) break;
					}
					if ( !current_user_can( $customField['capability'], $post->ID ) )
					$output = false;
					if ( $output ) { 
						?>
						<div class="form-field form-required">
						<?
						switch ( $customField[ 'type' ] ) {
							case "text": { 
								echo '<strong>'.$customField[ 'title' ].'</strong><br /><input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
							break;
							}
							case "corto": { 
								echo '<strong>'.$customField[ 'title' ].'</strong><br /><input style="width:70px;" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" /> px';
							break;
							}
							case "tiempo": { 
								echo '<strong>'.$customField[ 'title' ].'</strong><br /><input style="width:70px;" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" /> ej: 10000 = 10 segundos';
							break;
							}
							case "checkbox": {
								echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
								echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
								if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
								echo ' checked="checked"';
								echo '" style="width: auto;" />';
							break;
							}
							default: {
								echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
								echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
							break;
							}
						}
						if ( $customField[ 'description' ] ) echo '<p style="display:block;width:100%;clear:both;">' . $customField[ 'description' ] . '</p>'; 
						?>
						</div>
						<?
					} 
				}
				?>
				</div>
				<?
			}
			function saveCustomFields( $post_id, $post ) { 
				if ( !isset( $_POST[ 'my-custom-fields_wpnonce' ] ) || !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
				if ( !current_user_can( 'edit_post', $post_id ) )
				return;
				if ( ! in_array( $post->post_type, $this->postTypes ) )
				return;
				foreach ( $this->customFields as $customField ) {
					if ( current_user_can( $customField['capability'], $post_id ) ) {
						if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
							$value = $_POST[ $this->prefix . $customField['name'] ];
							if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value ); update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $value ); 
						} else { 
							delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
						}
						if ( isset( $_POST[ $this->prefix . $customField['alt'] ] ) && trim( $_POST[ $this->prefix . $customField['alt'] ] ) ) {
							$value = $_POST[ $this->prefix . $customField['alt'] ];
							if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value );
							update_post_meta( $post_id, $this->prefix . $customField[ 'alt' ], $value );
						} else {
							delete_post_meta( $post_id, $this->prefix . $customField[ 'alt' ] );
						}
						if ( isset( $_POST[ $this->prefix . $customField['options'] ] ) && trim( $_POST[ $this->prefix . $customField['options'] ] ) ) {
							$value = $_POST[ $this->prefix . $customField['options'] ];
							if ( $customField['type'] == "select" ) $value = wpautop( $value );
							update_post_meta( $post_id, $this->prefix . $customField[ 'options' ], $value );
						} else {
							delete_post_meta( $post_id, $this->prefix . $customField[ 'options' ] );
						}
					}
				}
			}
			
		} 
	} 
	if ( class_exists('myCustomFields') ) { 
		$myCustomFields_var = new myCustomFields();
	}

	

/* 	=================================================================================== 		
	QUITAR RESTRICCION DE SEGURIDAD PARA TIPOS DE ARCHIVO ESPECIFICOS
	=================================================================================== */
	add_filter('upload_mimes', 'mqw_mas_extensiones');
	function mqw_mas_extensiones ( $existing_mimes=array() ) {
		// Agregamos nuevas extensiones al array al lado de su MIME type:
		$existing_mimes['swf'] = 'application/x-shockwave-flash';
		$existing_mimes['mp3'] = 'audio/mpeg3';
		$existing_mimes['ico'] = 'image/x-icon';
		//Agregamos las que necesitemos y luego retornamos el array
		return $existing_mimes;
	}

	
/* 	=================================================================================== 		
	BUG EN PLUGIN CCTM: al subir un medio no muestra el scroll de vuelta
	=================================================================================== */
	add_action( 'admin_head', 'admin_css' );
	function admin_css(){ 
	?>
    	<style>
			/* solucion al bug de CCTM */
			body.modal-open {
				overflow:visible !important;
			}
      	</style>
	<?
	}	
		
		
		
?>