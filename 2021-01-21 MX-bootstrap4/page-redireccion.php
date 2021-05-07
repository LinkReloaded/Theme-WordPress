<?php	
	/*
	Template Name: Redirección al home
	*/
	$bloginfo = get_bloginfo('url');
	$urlbase = "Location: ";
	$urlbase .= $bloginfo;
	$urlbase .= "/";
	header($urlbase);
	exit;	
	/* 	======================================================
		CAMPO PARA CFS: importar al plugin esa linea.
		====================================================== 
	
	[{"post_title":"Redirecci\u00f3n al home del sitio","post_name":"redireccion-al-home-del-sitio","cfs_fields":[],"cfs_rules":{"page_templates":{"operator":"==","values":["page-redireccion.php"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"1"}}]	
	
	*/	
?>