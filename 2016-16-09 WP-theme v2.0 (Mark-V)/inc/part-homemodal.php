    <!-- pop up en el home -->
	<? //SHADOW BOX AUTOMATICO EN EL HOME  
        $contadorURL=1; $recent = new WP_Query("post_type=homepopup&showposts=1"); while($recent->have_posts()) : $recent->the_post();            
        $vinculo = get_post_meta($post->ID, 'esp_popuphome_vin', true); 
        $urlimg = get_post_meta($post->ID, 'esp_popuphome_url', true);
        $duracion = get_post_meta($post->ID, 'esp_popuphome_tie', true);
            if ($contadorURL==1 && !empty($urlimg)) { if(is_home()) { 
        ?>        
        <script>
            $(window).load(function(){ $('#shadowBoxHome').modal('show'); });
            <? if (!empty($duracion)) { ?> 				
            setTimeout(function() {$('#shadowBoxHome').modal('hide');}, <?= get_post_meta($post->ID, 'esp_popuphome_tie', true); ?>);
            <? } ?>
        </script>			
        <div id="shadowBoxHome" class="modal fade" role="dialog">
          <div class="modal-dialog"> 
            <div class="modal-content">
            	<? if (!empty($vinculo)) { ?><a href="<?= $vinculo; ?>" target="_blank" rel="nofollow"><? } ?><img src="<?= $urlimg; ?>"/><? if (!empty($vinculo)) { ?></a><? } ?>
            </div>
          </div>
        </div>
    <? 		} }	$contadorURL++;	endwhile; ?>
	<!-- /pop up en el home -->
    