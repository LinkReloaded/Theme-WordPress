<?php
/*
Template Name: HomePage
*/
?>

<?php get_header(); ?>
<section id="contenido">

	<div class="container-fluid" style="margin:20px 0 0 0;">
	    <div class="jumbotron">
	  		<h1><?php the_title(); ?></h1> 
	  		<p>page-portada.php</p> 
		</div>
	</div>

	<div class="container">
		<div class="owl-carousel carrusel-base">
	            	
	        <div class="item"><div class="jumbotron" style="background-color: #009688;"><h3>Item 1</h3></div></div>
	        <div class="item"><div class="jumbotron" style="background-color: #4caf50;"><h3>Item 2</h3></div></div>
	        <div class="item"><div class="jumbotron" style="background-color: #8bc34a;"><h3>Item 3</h3></div></div>
	        <div class="item"><div class="jumbotron" style="background-color: #cddc39;"><h3>Item 4</h3></div></div>
	        <div class="item"><div class="jumbotron" style="background-color: #ffc107;"><h3>Item 5</h3></div></div>
		
		</div>
	</div>

	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>              
		<?php endwhile; endif; ?>
	</div>

</section>

<?php get_footer(); ?>