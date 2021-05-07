<?php
/* =================================================================================== 		
//  => OPCIONES DEL PANEL DE CONTROL
	
	Aca se guardan configuraciones utiles a utilizar en el panel de control
	
=================================================================================== */
	
    /* -------------------------------------------------------------------------------
  	// 	CATEGORIAS PADRE NO CLICKEABLES
	// 	Based on Category Checklist Tree, by scribu	Preserves the category hierarchy  
	//	on the post editing screen Removes parent categories checkbox selection
	------------------------------------------------------------------------------- */
	/*
	class Category_Checklist {
		function init() {
			add_filter( 'wp_terms_checklist_args', array( __CLASS__, 'checklist_args' ) );
		}
		function checklist_args( $args ) {
			add_action( 'admin_footer', array( __CLASS__, 'script' ) );
			$args['checked_ontop'] = false;
			return $args;
		}
		function script() {
	?>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('[id$="-all"] > ul.categorychecklist').each(function() {
					var $list = jQuery(this);
					var $firstChecked = $list.find(':checked').first();
					if ( !$firstChecked.length )
						return;
					var pos_first = $list.find(':checkbox').position().top;
					var pos_checked = $firstChecked.position().top;
					$list.closest('.tabs-panel').scrollTop(pos_checked - pos_first + 5);
				});
				jQuery("#categorychecklist>li>label input").each(function(){
					jQuery(this).remove();
				});
				jQuery('#category-tabs .hide-if-no-js').remove(); //esconder el menu "mas usadas"
			});
		</script>
	<?
		}
	}
	Category_Checklist::init();
	*/
	
	
	

    /* -------------------------------------------------------------------------------
  	// 	SACAR TAGS EN CATEGORY DESCRIPTION
	// 	 
	------------------------------------------------------------------------------- */
	/*
	remove_filter('term_description','wpautop');
	*/
	
	
	
    /* -------------------------------------------------------------------------------
  	// 	ESCONDER PANELES NO DESEADOS
	// 	Based on Category Checklist Tree, by scribu	Preserves the category hierarchy  
	//	on the post editing screen Removes parent categories checkbox selection
	------------------------------------------------------------------------------- */

	class esconder_paneles {
		function init() {
			add_filter( 'wp_terms_checklist_args', array( __CLASS__, 'paneles_args' ) );
		}
		function paneles_args( $args ) {
			add_action( 'admin_footer', array( __CLASS__, 'script' ) );
			return $args;
		}
		function script() {
		?>
			<script type="text/javascript">
				jQuery(function(){
					jQuery('#commentsdiv, #authordiv, #revisionsdiv, #slugdiv, #commentstatusdiv, #trackbacksdiv, #postexcerpt, #tagsdiv-post_tag, #postimagediv, #postcustom').remove(); //esconder el panel "comentarios"
				});
			</script>
		<?php
		}
	}
	esconder_paneles::init();

