<!DOCTYPE HTML>
<html lang="es-ES">
<? include('inc/id_url.php'); ?>
<head>
	<meta charset="<? bloginfo('charset'); ?>">
    <!--[if IE]>
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=IE6"> 
    	<script src="<? bloginfo('template_url'); ?>/js/html5.js"></script>
	<![endif]-->
    <title><?= $titulo ?></title>
    <?= favicon(); ?>
    <?= appleIcons(); ?>
    <? include('inc/opengraph.php'); ?>		
	<? include('inc/css.php'); ?>
	<? include('inc/responsivo.php');?>
    <? wp_head(); ?>	
	<? 	/* =========================================================
			HEADER ELEMENTS  
		========================================================= */?>
  
    
        
	<? 	/* =========================================================
			HEADER ELEMENTS  
		========================================================= */?>
	<?= codigo_analytics(); ?>
</head>
<body <? echo $thispage_php ?>> 
	<header></header>
    