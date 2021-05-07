<!DOCTYPE HTML>
<html lang="es-ES">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>
	<body id="<?php paginaID(); ?>" class="<?php tipodepagina(); ?>">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">Bootstrap 4</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuppal" aria-controls="menuppal" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>    
                <?php
                    wp_nav_menu([
                        'theme_location'  => 'menuppal',
                        'container'       => 'div',
                        'container_id'    => 'menuppal',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class'      => 'navbar-nav mr-auto',
                        'fallback_cb'     => 'bs4navwalker::fallback',
                        'walker'          => new bs4navwalker()
                    ]);
                  ?>
            </nav>
        </header>

