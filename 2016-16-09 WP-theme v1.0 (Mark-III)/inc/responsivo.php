<? if(get_theme_mod('responsivo_dato')==1) { ?>	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link type="text/css" rel="stylesheet" media="screen" href="<? bloginfo('template_url'); ?>/css/layout768.css"/>
	<link type="text/css" rel="stylesheet" media="screen" href="<? bloginfo('template_url'); ?>/css/layout480.css"/>
	<link type="text/css" rel="stylesheet" media="screen" href="<? bloginfo('template_url'); ?>/css/layout320.css"/>     
<? 	} else {?>
<!--[if IE 7]><link rel="stylesheet" media="screen" href="css/style7.css?=<? echo time();?>" /><![endif]-->
<!--[if IE 8]><link rel="stylesheet" media="screen" href="css/style8.css?=<? echo time();?>" /><![endif]-->
<? 	} ?>
