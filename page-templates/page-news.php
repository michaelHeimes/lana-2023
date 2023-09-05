<?php
/**
 * Template name: News Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lana
 */

get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<header class="entry-header news-banner">
						<div class="grid-x grid-padding-x align-center">
							<div class="cell small-12 medium-10 large-8 xlarge-6 text-center">
								<?php if( !empty( $fields['pb_eyebrow'] ) ) {
									echo '<h2 class="h6">' . $fields['pb_eyebrow'] . '</h2>';
								};?>
								<?php if( !empty( $fields['pb_heading'] ) ) {
									echo '<h3 class="h2">' . $fields['pb_heading'] . '</h3>';
								};?>
							</div>
						</div>
					</header>
					
					<div class="news module-padding">
						<?php
						$args = array(
							'taxonomy' => 'news_type',
							'hide_empty' => true,
							'orderby' => 'name',
							'order' => 'ASC',
						);
						$terms = get_terms($args);
						if( !empty( $terms ) && !is_wp_error( $terms ) ):
						?>
						<div class="news-filter alm-filter-nav">
							<div class="grid-container">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-12"><hr class="top"></div>
									<?php foreach ($terms as $term):?>
									<div class="cell shrink">
										<button type="button" data-post-type="news_post" data-taxonomy="news_type" data-taxonomy-terms="<?php echo $term->slug;?>" data-posts-per-page="12" data-scroll="false" data-button-label="More <?php echo $term->name;?>"><?php echo $term->name;?></button>
									</div>
									<?php endforeach;?>
									<div class="cell small-12"><hr></div>
								</div>
							</div>
						</div>
						<?php endif;?>
						<div class="news-grid">
							<div class="grid-container">
								<?php echo do_shortcode( '[ajax_load_more id="3674830524" container_type="div" post_type="news_post" posts_per_page="12" scroll="false" transition_container_classes="news-grid grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3" button_loading_label="Loading News"]' );?>
							</div>
						</div>
					</div>
				
					<?php get_template_part('template-parts/modules');?>
				
				</article>
				

			</main><!-- #main -->
					
		</div>
	</div>
<?php
get_footer();