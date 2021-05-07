		<footer style="background-color:#343a40; padding:30px 0;" class="container-fluid">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
        			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          				<span class="navbar-toggler-icon"></span>
        			</button>
        			<?php
	                    wp_nav_menu([
	                        'theme_location'  => 'menufooter',
	                        'container'       => 'div',
	                        'container_id'    => 'navbarsExample10',
	                        'container_class' => 'collapse navbar-collapse justify-content-md-center',
	                        'menu_class'      => 'navbar-nav',
	                        'fallback_cb'     => 'bs4navwalker::fallback',
	                        'walker'          => new bs4navwalker()
	                    ]);
	                ?>
      			</nav>		
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>