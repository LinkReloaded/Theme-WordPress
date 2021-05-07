<?php get_header(); ?>

<section id="contenido">

	<div class="container-fluid" style="margin:20px 0 0 0;">
	    <div class="jumbotron">
	  		<h1><?php the_title(); ?></h1> 
	  		<p>page.php</p> 
		</div>
	</div>

	<?php /* MARCADOR */?>
	<div class="container" style="margin: 20px auto 0 auto;"><div class="jumbotron" style="padding: 10px 30px;"><h6 style="margin:0;">Contenido</h6></div></div>
	<?php /* MARCADOR */?>
	
	<?php /* CONTENIDO */?>
	<div class="container">
		<div class="row" style=" margin: 15px auto; background-color: #e9ecef; border-radius: .3rem">
			<div class="col-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>              
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	<?php /* CONTENIDO */?>

</section>

<?php get_footer(); ?>