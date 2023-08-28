<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?> role="article">		
	<div class="inner br-12">		
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php if( has_post_thumbnail( $post->ID ) ) {
				echo '<div class="thumb-wrap">';
				$minWidth = 880;
				$minHeight = 560;
				
				$thumbnail_id = get_post_thumbnail_id();
				
				$thumbnail_metadata = wp_get_attachment_metadata($thumbnail_id);
				$thumbnail_width = $thumbnail_metadata['width'];
				$thumbnail_height = $thumbnail_metadata['height'];
				
				if ($thumbnail_width >= $minWidth && $thumbnail_height >= $minHeight) {
					the_post_thumbnail('news-thumb');
				} else {
					the_post_thumbnail('news-thumb-2x');
				}
				echo '</div>';
			};?>
			<div class="text-wrap white-bg">
				<header class="article-header">
					<?php
					// Get the terms for the 'news_type' taxonomy assigned to the current post
					$terms = get_the_terms(get_the_ID(), 'news_type');
					
					// Check if terms exist
					if ($terms && !is_wp_error($terms)) {
						$term_names = array();
						foreach ($terms as $term) {
							$term_names[] = $term->name;
						}
						
						// Output the term names separated by "//"
						echo '<h6>';
						echo implode(' // ', $term_names);
						echo '</h6>';
					}
					?>
					<h2 class="h4"><?php the_title(); ?></h2>			
				</header> <!-- end article header -->	
				<section class="entry-content" itemprop="text">
					<?php if( !empty( get_field('excerpt_text') ) ) {
						echo esc_attr( get_field('excerpt_text') );
					} else {
						the_excerpt();
					};?>
				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<div class="arrow-link grid-x align-middle">
						<span>Read More</span>
						<?php get_template_part('template-parts/svg', 'arrow-violet');?>
					</div>
				</footer> <!-- end article footer -->	
			</div>
		</a>
	</div>
</article> <!-- end article -->