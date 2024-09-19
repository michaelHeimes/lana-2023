<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lana
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="entry-content">
        <?php if( post_password_required( $post )): ?>
            <div class="text-editor module-padding white-bg">
                <div class="grid-container">
                    <div class="grid-x grid-padding-x align-center">
                        <div class="entry-content cell small-12 tablet-10 large-8 xlarge-6">
                            <form action="/wp-login.php?action=postpass" method="post">
                                <p>This content is password protected. To view it please enter your password below:</p>
                                <label for="pwbox-123">Password:</label>
                                <input name="post_password" id="pwbox-123" type="password" size="20" />
                                <input class="button" type="submit" name="Submit" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php else:?>
	           <?php get_template_part('template-parts/modules');?>
        <?php endif;?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
