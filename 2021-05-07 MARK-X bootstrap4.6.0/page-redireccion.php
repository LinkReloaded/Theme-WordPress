<?php	
	/*
	Template Name: Redirección al home
	*/
	/* ESTO REDIRECCIONA CUALQUIER PAGINA AL HOME DEL BLOG. UTIL PARA EMERGENCIAS */
	$bloginfo = get_bloginfo('url');
	$urlbase = "Location: ";
	$urlbase .= $bloginfo;
	$urlbase .= "/";
	header($urlbase);
	exit;		
?>