<?php
/* =================================================================================== 		
//  => PAGINADOR 1234
	
	Paginador del tipo 1 2 3 4, utiliza flechas para navegar
	
	pegar esto en el theme:
	<?php  if(function_exists('utom_pagenavi')) { utom_pagenavi(); } ?>
	
=================================================================================== */
		function utom_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
				global $request, $posts_per_page, $wpdb, $paged;
				if(empty($prelabel)) {
					$prelabel  = '&laquo;'; //doble flecha hacia la izquierda
				}
				if(empty($nxtlabel)) {
					$nxtlabel = '&raquo;'; //doble flecha hacia la derecha
				}
				$half_pages_to_show = round($pages_to_show/2);
				if (!is_single()) {
					if(!is_category()) {
						preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);  
					} else {
						preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);  
					}
					$fromwhere = $matches[1];
					$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
					$max_page = ceil($numposts /$posts_per_page);
					if(empty($paged)) {
						$paged = 1;
					}
					if($max_page > 1 || $always_show) {
						echo "$before <span class=\"utompage\">P&aacute;ginas ($max_page):</span> <strong>";
						if ($paged >= ($pages_to_show-1)) {
							echo '<a href="'.get_pagenum_link().'">&laquo; First</a> <span class="utompage">...</span> ';
						}
						previous_posts_link($prelabel);
						for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
							if ($i >= 1 && $i <= $max_page) {
								if($i == $paged) {
									echo "<span class=\"utompage\">$i</span>";
								} else {
									echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
								}
							}
						}
						next_posts_link($nxtlabel, $max_page);
						if (($paged+$half_pages_to_show) < ($max_page)) {
							echo ' <span class="utompage">...</span> <a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
						}
						echo "</strong>$after";
					}
				}
		}
?>