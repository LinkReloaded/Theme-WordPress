<!DOCTYPE HTML>
<html lang="es-ES">
<? include('inc/inc_ID.php'); ?>
<head>
	<meta charset="<? bloginfo('charset'); ?>">
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?= $titulo ?></title>
    <?= favicon(); ?>
    <?= appleIcons(); ?>
    <? include('inc/inc_opengraph.php'); ?>
    <? include('inc/inc_css.php'); ?>
    <? wp_head(); ?>	
	<? 	/* /-HEADER ELEMENTS */?>
         
	<? 	/* -/HEADER ELEMENTS */?>
	<?= codigo_analytics(); ?>
</head>
<body <? echo $thispage_php ?>> 
	<header class="container-fluid">
        <div class="row">
            <div class="col-xs-6">
                <a class="navbar-brand" href="<? bloginfo('url'); ?>">Bootstrap theme</a>
            </div>
            <div class="col-xs-6">
                <? /* usar este espacio para poner contenidos en el lado superior izquierdo del header */?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <? wp_nav_menu( array( 'menu_class' => 'nav navbar-nav', 'container_class' => 'menu_ppal', 'theme_location' => 'menuppal', 'walker' => new wp_bootstrap_navwalker()) ); ?>
                </div>
            </div>
        </div>
    </header>
    