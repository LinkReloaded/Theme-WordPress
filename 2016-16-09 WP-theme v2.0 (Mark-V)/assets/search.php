<?	/*	EXPLICACION:
		funciona igual que un listado, cuando wp encuentra alguna coincidencia los lista a continuacion, sino muestro en mensaje de que no econtré nada.
	*/ ?>
<? get_header(); ?>	
	<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<? //listo los resultados ?>
    <section>
        <h2>article section h2</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
    </section>       
	<? endwhile; else:?>    
	<? //mando un mensaje si no encuentro nada ?>
	<section class="noenc">
        <h2>No Encontrado</h2>
        <p>Intente otra b&uacute;squeda</p>          
        <div class="buscador">
            <form method="get" id="searchform" action="<? bloginfo('home'); ?>/">
                <input onblur="if (value ==''){value='Buscar......'}" onfocus="if (value =='Buscar......'){value =''}" value="Buscar......" id="s" name="s" class="imput_busca" type="text" />
                <input class="btn_busca" value="Buscar" alt="Buscar" src="<? bloginfo('template_url');?>/img/btn_buscar.png" width="XX" height="XX" type="image" />
            </form>
            <div class="clearfix"></div>
        </div>
  	</section>
	<? endif; ?>
<? get_footer(); ?>