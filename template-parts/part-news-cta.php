<?php
	if( !empty( $args['news-cta']) ) {
		$news_cta = $args['news-cta'];
	} else {
		$news_cta = get_sub_field('news_cta');
	}
	
	$eyebrow = $news_cta['eyebrow'];
	$heading = $news_cta['heading'];
	$text = $news_cta['text'];
	$post_feed = $news_cta['post_feed'];
?>
<div class="news-cta module-padding">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<?php if( !empty($eyebrow) || !empty($heading) || !empty($text) ):?>
			<div class="cell small-12 medium-10 large-8 xlarge-5 header text-center">
				<?php if( !empty($eyebrow) ):?>
				<h2 class="h6"><?php echo esc_attr( $eyebrow );?></h2>
				<?php endif;?>
				<?php if( !empty($heading) ):?>
				<h3 class="h2"><?php echo esc_attr( $heading );?></h3>
				<?php endif;?>
				<?php if( !empty($text) ):?>
				<div class="text-wrap"><?php echo $text;?></div>
				<?php endif;?>
			</div>
			<?php endif;?>
		</div>
		<?php 
		if( $post_feed === 'most-recent' ) {
			$args = array(  
				'post_type' => 'news_post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
			);
		}
		if( $post_feed === 'most-recent-type' ) {
			$type_of_most_recent_posts = $news_cta['type_of_most_recent_posts'];
			$args = array(  
				'post_type' => 'news_post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'tax_query' => array(
					array(
						'taxonomy' => 'news_type',
						'terms' => $type_of_most_recent_posts,
						'field' => 'term_id',
					)
				),
			);
		}
		if( $post_feed === 'manual-selection' ) {
			$selected_posts = $news_cta['news_post_selector'];
		
			$post_ids = array();
			foreach ($selected_posts as $post) {
				$post_ids[] = $post->ID;
			}
			$args = array(  
				'post_type' => 'news_post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'post__in' => $post_ids // Use the array of post IDs directly
			);
		}
		
		$loop = new WP_Query( $args ); 
		
		if ( $loop->have_posts() ) : ?>
			<div class="news-grid grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
			<?php while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part('template-parts/loop', 'news-card', '');	
			endwhile;?>
			</div>
		<?php endif; wp_reset_postdata();?>
		
		<div class="grid-x grid-padding-x align-center btn-wrap">
			<a class="button blue-violet-gradient-bg" href="/news">
				Read All
			</a>
		</div>

	</div>
</div>