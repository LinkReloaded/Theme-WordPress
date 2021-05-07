<?php get_header(); ?>

<section id="contenido">

	<div class="container-fluid" style="margin:20px 0 0 0;">
	    <div class="jumbotron">
			<h1><?php the_title(); ?></h1> 
	  		<p>archive.php</p> 
		</div>
	</div>

	<?php /* MARCADOR */?>
	<div class="container" style="margin: 20px auto 0 auto;"><div class="jumbotron" style="padding: 10px 30px;"><h6 style="margin:0;">Lista de artículos</h6></div></div>
	<?php /* MARCADOR */?>

	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-4">
				<a style="display:block; background-color: #e9ecef; border-radius: 15px; padding:20px;" href="<?php  the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			<?php endwhile; endif; ?>
		</div>
	</div>

</section>

<?php get_footer(); ?>