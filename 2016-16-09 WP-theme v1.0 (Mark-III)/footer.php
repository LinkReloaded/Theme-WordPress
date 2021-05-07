	<footer></footer>
	<? wp_footer(); ?>
	<? 	/* =========================================================
			FOOTER ELEMENTS  
		========================================================= */?>

	<!-- jQuery -->
	<script type="text/javascript" src="<? bloginfo('template_url'); ?>/js/jquery-1.9.1.min.js"></script>
    <!-- /jQuery -->
    
    <!-- shadowbox -->
    <script src="<? bloginfo('template_url'); ?>/js/shadowbox/shadowbox.js"></script>
    <script>
    	Shadowbox.init({
            language: 'es',
            players:  ['swf', 'img', 'html', 'iframe']
        });
        <? //SHADOW BOX AUTOMATICO EN EL HOME  
        $recent = new WP_Query("post_type=homepopup&showposts=1"); while($recent->have_posts()) : $recent->the_post();            
            $pop_up = get_post_meta($post->ID, 'esp_popuphome_ini', true);
            $vinculo = get_post_meta($post->ID, 'esp_popuphome_vin', true);
			$urlimg = get_post_meta($post->ID, 'esp_popuphome_url', true);
			$duracion = get_post_meta($post->ID, 'esp_popuphome_tie', true);
			if (!empty($pop_up)) {
                if(is_home()) { 
			?>        
                window.onload = function() {
                    Shadowbox.open({
        		<? 	if (!empty($vinculo)) { ?>                
                        content:    '<a href="<?= $vinculo; ?>" target="_blank" rel="nofollow"><img src="<?= $urlimg; ?>"/></a>',
        				player:     "html",
        		<? } else { ?>
                        content:    '<?= $urlimg; ?>',
        				player:     "img",
        		<? } ?>                   
                        width:      <?= get_post_meta($post->ID, 'esp_popuphome_anc', true); ?>,
                        height:     <?= get_post_meta($post->ID, 'esp_popuphome_alt', true); ?>
                	});
				<?	if (!empty($duracion)) { ?>				
						setTimeout("Shadowbox.close()",<?= get_post_meta($post->ID, 'esp_popuphome_tie', true); ?>);
				<? } ?>
				};
        <?    
            	}
        	}
        endwhile;
        ?>
    </script>
    <!-- /shadowbox -->


    <? /*
    <!-- superfish -->
    <script src="<? bloginfo('template_url'); ?>/js/superfish/superfish.js" ></script>
    <script src="<? bloginfo('template_url'); ?>/js/superfish/hoverIntent.js" ></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('ul#menu-menuppal').superfish();
        });
    </script>
    <!-- /superfish -->
    */?>
    
    <? /*
    <!-- CarouFredSel -->
    <script src="<? bloginfo('template_url'); ?>/js/carouFredSel/jquery.mousewheel.min.js"></script>
    <script src="<? bloginfo('template_url'); ?>/js/carouFredSel/jquery.touchSwipe.min.js"></script>
    <script src="<? bloginfo('template_url'); ?>/js/carouFredSel/jquery.carouFredSel-6.2.1.js"></script>
    <script>
        jQuery(function() {
            jQuery('#iddeldiv').carouFredSel({
                auto: false,
                prev: '#prev2',
                next: '#next2',
                mousewheel: true,
                swipe: {
                    onMouse: true,
                    onTouch: true
                }
            });
        });
    </script>
    <!-- /CarouFredSel -->
    */?>
    
    
    <? /*
    <!-- acordeon -->
    <script>
        jQuery(document).ready(function(){
            jQuery("dd").hide();
            jQuery("#primero").slideToggle("slow");
            jQuery("dt a").click(function(){		
                jQuery(this).parent().next().siblings("dd:visible").slideUp("slow");
                jQuery(this).parent().next().slideToggle("slow");
                jQuery(this).parent().siblings("dt").addClass("marcado");
                jQuery(this).parent().next().siblings("dt").toggleClass("marcado");
            return false;
            });		
        });
            jQuery(document).ready(function(){
            jQuery("#subacordeon dd").hide();
            jQuery("#subacordeon a").click(function(){		
                jQuery(this).parent().next().siblings("dd:visible").slideUp("slow");
            return false;
            });		
        });
    </script>
    <!-- /acordeon -->
    */?>
    
    <? /*
	<!-- tamaño de pantalla -->
    <script>
		var anchoVentana = jQuery(window).width(); 	
		jQuery(document).ready(function(){
			if (anchoVentana > 979) {
				alert(document.write('sitio normal');
			} else if(anchoVentana > 767 && anchoVentana < 980){
				alert(document.write('ipad vertical');
			} else if(anchoVentana > 479 && anchoVentana < 768){
				alert(document.write('iphone horizontal');
			} else if(anchoVentana < 480){ 
				alert(document.write('iphone vertical');
			}
		});
	</script>
	<!-- /tamaño de pantalla -->
	*/ ?>
    
	<? /*
	<!-- responsive slider -->
	<script src="<? bloginfo('template_url'); ?>/js/slider/jquery.event.move.js"></script>
	<script src="<? bloginfo('template_url'); ?>/js/slider/responsive-slider.js"></script>
	<!-- /responsive slider -->
	*/?>

	<? 	/* =========================================================
			FOOTER ELEMENTS  
		========================================================= */?>
</body>
</html>