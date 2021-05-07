<? 
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  
?>
<p class="nocomments">
	Debes estar registrado para dejar un comentario en este Post.
	<p class="clear"></p>
</p>
<?
		return;
	}
}
$oddcomment = 'alt';
?>

<div class="box_comentarios">
	<? if ($comments) : ?><h3 id="comments"><? comments_number('Sin comentarios', '1 Comentario', '% Comentarios');?></h3> 
	<ol class="commentlist">
		<? foreach ($comments as $comment) : ?>
		<li class="<? echo $oddcomment; ?>" id="comment-<? comment_ID() ?>">
			<span class="uar">
				<? comment_author_link() ?>
            	<span class="clear"></span>
            </span>
			<? if ($comment->comment_approved == '0') : ?>
			<p>
            	T&uacute; comentario est&aacute; esperando su aprobaci&oacute;n.
           		<div class="clear"></div>
            </p>
			<? endif; ?>
			<br />
			<span class="commentmetadata">
            	<a href="#comment-<? comment_ID() ?>"><? comment_date('j M, Y'); echo $langat; ?><? comment_time() ?></a> <? edit_comment_link('editar','',''); ?>
          		<span class="clear"></span>
            </span>
			<? comment_text() ?>
			<div class="clear"></div>
        </li>
		<? if ('alt' == $oddcomment) $oddcomment = ''; else $oddcomment = 'alt'; ?>
		<? endforeach; ?>
		<li class="clear"></li>
    </ol>
	<? else : // this is displayed if there are no comments so far ?>

		<? if ('open' == $post->comment_status) : ?> 
	<!-- If comments are open, but there are no comments. -->
		<? else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments">
    	Los comentarios est&aacute;n cerrados.
    	<p class="clear"></p>
    </p>
		<? endif; ?>

	<? endif; ?>

	<? if ('open' == $post->comment_status) : ?>
		<a id="comments" name="comments"></a>
		<h3 id="respond">Deja un comentario</h3>
		<? if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>
        	<a href="<? echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<? the_permalink(); ?>">Debes estar registrado para dejar un comentario en este Post.</a>
      		<p class="clear"></p>
        </p>
		<? else : ?>
		<form action="<? echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<? if ( $user_ID ) : ?>
			<p>
            	Registrado como <a href="<? echo get_option('siteurl'); ?>/wp-admin/profile.php"><? echo $user_identity; ?></a>. <a href="<? echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Salir &raquo;</a>
          		<p class="clear"></p>
            </p>
			<? else : ?>
			<p>
            	<input type="text" name="author" id="author" value="<? echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small>Nombre (<? if ($req) echo 'Obligatorio'; ?>)</small></label>
          		<p class="clear"></p>
            </p>
			<p>
            	<input type="text" name="email" id="email"  size="22" tabindex="2" /><label for="email"><small>E-mail (no ser&aacute; publicado) (<? if ($req) echo 'Obligatorio'; ?>)</small></label>
          		<p class="clear"></p>
            </p>
			<? endif; ?>
			<p>
				<textarea name="comment" id="comment"  rows="10" tabindex="4"></textarea>
				<p class="clear"></p>
            </p>
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" />
				<input type="hidden" name="comment_post_ID" value="<? echo $id; ?>" />
				<p class="clear"></p>
            </p>
			<? do_action('comment_form', $post->ID); ?>
		</form>
		<? endif; ?>
	<? endif; ?>
    <div class="clear"></div>
</div>