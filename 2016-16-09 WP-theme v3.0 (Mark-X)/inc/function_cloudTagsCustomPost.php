<?
/* =================================================================================== 		
//  => WP-CIRRUS: USAR NUBE DE TAGS CON POST ESPECIALES
	
	Habilita los enlaces para los post especiales usando el plugin "wp-cirrus"
	by: Seba Molina 
=================================================================================== */
		function any_ptype_on_tag($request) {
			if ( isset($request['tag']) )
  			$request['post_type'] = 'any';
			return $request;
		}
		add_filter('request', 'any_ptype_on_tag');

		function any_ptype_on_cate($request) {
			if ( isset($request['cat']) )
  			$request['post_type'] = 'any';
 			return $request;
		}		
		add_filter('request', 'any_ptype_on_cate');

?>