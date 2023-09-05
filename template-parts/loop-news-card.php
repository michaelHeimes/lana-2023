<article id="post-<?php the_ID(); ?>" <?php post_class('cell news-card'); ?> role="article">		
	<div class="inner br-12 h-100">		
		<a class="grid-x flex-dir-column h-100 color-black has-arrow-link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
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
			<div class="text-wrap white-bg grid-x flex-dir-column">
				<div class="top">
					<header class="article-header">
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
						<h2 class="h4"><b><?php the_title(); ?></b></h2>			
					</header> <!-- end article header -->	
					<section class="entry-content" itemprop="text">
						<?php 
							
						if ( has_excerpt( $post->ID ) ) {
							
							the_excerpt();
							
						} else {
							
							$content = get_the_content();
							
							// Split the excerpt into words
							$words = explode(' ', $content);
							
							// Check if the number of words is greater than 16
							if (count($words) > 16) {
								// Shorten the excerpt to 16 words and add "..." to the last word
								$shortened_excerpt = implode(' ', array_slice($words, 0, 16)) . ' ...';
							} else {
								// Use the original excerpt
								$shortened_excerpt = $content;
							}
							
							echo wp_strip_all_tags($shortened_excerpt);
					
						};?>
					</section> <!-- end article section -->
				</div>
				<footer class="article-footer">
					<div class="arrow-link grid-x align-middle">
						<span class="color-blue-violet">Read More</span>
						<?php get_template_part('template-parts/svg', 'arrow-violet');?>
					</div>
				</footer> <!-- end article footer -->	
			</div>
		</a>
	</div>
</article> <!-- end article -->