<?php get_header(); ?>
<section id="contenido">

	<div class="container-fluid" style="margin:20px 0 0 0;">
	    <div class="jumbotron">
	  		<h1><?php echo get_search_query(); ?></h1> 
	  		<p>search.php</p> 
		</div>
	</div>

	
	<?php if ( have_posts() ) :  ?>
	
		<div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>              
			<?php endwhile; endif; ?>
		</div>	
		<div class="container">
	        <?php previous_posts_link('<span class="prev">Anterior</span>'); ?>
	        <?php next_posts_link('<span class="next">Siguiente</span>'); ?>
	    </div>
	
	<?php else: ?>

		<div class="container">
            <div class="jumbotron">
	  			<h3>Contenido no encontrado</h3> 
	  		</div>
        </div>

	<?php endif; ?>	


</section>
<?php get_footer(); ?>

<?php  /* OJO ESTE ES EL SEARCH FORM 

	<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo("url"); ?>">
    	<div>
        	<label class="screen-reader-text" for="s">Buscar:</label>
            <input type="text" value="" name="s" id="s" placeholder="Buscar...">
            <input type="submit" id="searchsubmit" value=''>
     	</div>
  	</form>
