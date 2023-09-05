<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lana
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		
		if (has_post_thumbnail()) {
			echo '<div class="grid-container">';
			echo '<div class="grid-x grid-padding-x">';
			echo '<div class="cell small-12">';
			echo '<div class="news-banner has-object-fit cover br-12">';
			the_post_thumbnail('full', array('class' => 'object-fit cover'));
			echo '<div class="mask grid-pattern white over-image"></div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	
	?>
	<div class="grid-container">
		<div class="grid-x grid-padding-x header-content-wrap">
			<header class="entry-header cell small-12 tablet-8 tablet-offset-2 large-5 large-offset-0">
				<hr class="yellow">
				<?php
				$terms = get_the_terms(get_the_ID(), 'news_type');
				
				if ($terms && !is_wp_error($terms)) {
					$term_names = array();
					foreach ($terms as $term) {
						$term_names[] = $term->name;
					}
					
					echo '<h6>';
					echo implode(' // ', $term_names);
					echo '</h6>';
				}
				?>
				<?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>
				<div class="entry-meta white-bg br-12">
					<div class="grid-x grid-padding-x">
						<div class="cell auto">
							<?php
								$author_id = get_the_author_meta('ID');
								$author_name = get_the_author();
								$author_avatar = get_avatar($author_id, 100);
								$post_date = get_the_date('j M Y');
							?>
							<div class="grid-x align-middle">
								<div class="cell shrink">
									<div class="avatar-wrap">
										<?php echo $author_avatar;?>
									</div>
								</div>
								<div class="cell auto">
									<div class="label uppercase">
										Written By
									</div>
									<?php echo $author_name;?>
								</div>
							</div>
						</div>
						<div class="cell shrink arrow-link">
							<div class="date-wrap grid-x align-middle h-100"><?php echo $post_date;?></div>
						</div>
					</div>

				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content cell small-12 tablet-8 tablet-offset-2 large-5 large-offset-1">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lana' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
		
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lana' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			
		</div>
	<footer class="entry-footer">
		<?php lana_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
