<?php get_header(); ?>
<section id="contenido">

	<div class="container-fluid" style="margin:20px 0 0 0;">
	    <div class="jumbotron">
	  		<h1><?php the_title(); ?></h1> 
	  		<p>archive.php</p> 
		</div>
	</div>

	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>              
		<?php endwhile; endif; ?>
	</div>

</section>
<?php get_footer(); ?>