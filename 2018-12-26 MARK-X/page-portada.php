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

	<?php /* TEST */?>
	<div class="container" style="margin: 20px auto 0 auto;">
		<div class="jumbotron" style="padding: 10px 30px;">
			<h6 class="bold" style="margin:0;">Heading Bold</h6>
			<h6 class="regular" style="margin:0;">Heading Regular</h6>
			<h6 class="light" style="margin:0 0 20px 0;">Heading light</h6>
			<span>
				FONT AWESOME 5.3.1 
				<i class="fas fa-ankh"></i> 
				<i class="fas fa-plane-departure"></i>
			</span>
		</div>
	</div>
	<?php /* TEST */?>

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