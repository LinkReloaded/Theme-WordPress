<?php get_header(); ?>

<section id="contenido">

	<?php if (is_404()) { //SI NO ENCUENTRA LA PAGINA ?>

	<div class="container-fluid" style="background-color: #6c757d; padding: 5px 0 !important;">
		<div class="container">
	    	<div class="jumbotron" style="margin: 0px;">
	  			<h1>Contenido no encontrado (404)</h1> 
	  			<p>index.php (404)</p> 
			</div>
		</div>
	</div>

	<?php } else { //INDEX ?>

	<div class="container-fluid" style="background-color: #6c757d; padding: 5px 0 !important;">
		<div class="container">
	    	<div class="jumbotron" style="margin: 0px;">
	  			<h1><?php the_title(); ?></h1> 
	  			<p>(LISTADOS) index.php, archive.php, category.php</p> 
			</div>

			<div class="container">
				<div class="row">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="col-4">
						<a style="display:block; background-color: #e9ecef; border-radius: 15px; padding:20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>

		</div>
	</div>

	<?php } ?>
	
</section>

<?php get_footer(); ?>