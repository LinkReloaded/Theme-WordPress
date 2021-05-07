<? if(opengraph_1() == "si"){ ?>
<!-- opengraph -->
	<meta property="fb:app_id" content="<?= opengraph_2(); ?>"/> 
	<meta property="fb:admins" content="<?= opengraph_3(); ?>"/>
<?  // si estoy en el home
if($opengraph_id == "home" ){ ?>
	<meta property="og:url" content="<? bloginfo('url') ?>"/>	
	<meta property="og:title" content="<? bloginfo('name'); ?>" />	
	<meta property="og:description" content="<? bloginfo('description'); ?>" />	
	<meta property="og:type" content="website" />	
	<meta property="og:image" content="<? bloginfo('template_url') ?>/img/opengraph.jpg"/>	

<? //si estoy en una pagina  o en un post
} elseif($opengraph_id == "page" || $opengraph_id == "post" ){ ?>
	<? if (have_posts()) : while (have_posts()) : the_post(); ?>
	<meta property="og:url" content="<? the_permalink() ?>"/> 
	<meta property="og:title" content="<? bloginfo('name'); ?> | <? the_title(); ?>" />
	<meta property="og:description" content="<? echo strip_tags(get_the_excerpt($post->ID)); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<? function imagen_opengraph() {	global $post, $posts; $first_img = ''; ob_start(); ob_end_clean(); $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); $first_img = $matches [1] [0]; if(empty($first_img)){$first_img = bloginfo('template_url').'/assets/img/opengraph.jpg'; } return $first_img;} echo imagen_opengraph() ?>"/>
    <?  endwhile; endif; ?>

<? //si estoy en una categoria 
} elseif($opengraph_id == "list"){ ?>
	<meta property="og:url" content="<? bloginfo('url') ?>/category/<? if (is_category()){global $wp_query;$cat_obj = $wp_query->get_queried_object();echo $cat_obj->slug;}?>"/>    
	<meta property="og:title" content="<? bloginfo('name'); ?> | <? single_cat_title();?>"/>
	<meta property="og:description" content="<? echo strip_tags(category_description($cat));?>"/>
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<? bloginfo('template_url') ?>/img/opengraph.jpg"/>

<? //si estoy en un archivo 
} elseif($opengraph_id == "arch"){ ?>
	<meta property="og:url" content="<? bloginfo('url') ?>/category/<? if (is_category()){global $wp_query;$cat_obj = $wp_query->get_queried_object();echo $cat_obj->slug;}?>"/>    
	<meta property="og:title" content="<? bloginfo('name'); ?> | <? single_cat_title();?>"/>
	<meta property="og:description" content="<? echo strip_tags(category_description($cat));?>"/>
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<? bloginfo('template_url') ?>/img/opengraph.jpg"/>

<? //si estoy en la pagina de error (404) 
} elseif($opengraph_id == "error"){	?>
	<meta property="og:url" content="<? bloginfo('url') ?>"/> 
	<meta property="og:title" content="<? bloginfo('name'); ?>" />
	<meta property="og:description" content="<? bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<? bloginfo('template_url') ?>/img/opengraph.jpg"/>

<? 	//si estoy en otra pagina 
} else { ?>
	<meta property="og:url" content="<? bloginfo('url') ?>"/> 
	<meta property="og:title" content="<? bloginfo('name'); ?>" />
	<meta property="og:description" content="<? bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<? bloginfo('template_url') ?>/img/opengraph.jpg"/>

<? //fin
} ?>
<!-- /opengraph -->
<? } ?>
