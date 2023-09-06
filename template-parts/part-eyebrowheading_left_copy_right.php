<?php 
	$eyebrowheading_left_copy_right = $args['eyebrowheading_left_copy_right'];
	if( !empty( $eyebrowheading_left_copy_right['eyebrow'] ) ) {
		$eyebrow = $eyebrowheading_left_copy_right['eyebrow'];
	}
	if( !empty( $eyebrowheading_left_copy_right['heading'] ) ) {
		$heading = $eyebrowheading_left_copy_right['heading'];
	}
	if( !empty( $eyebrowheading_left_copy_right['copy'] ) ) {
		$copy = $eyebrowheading_left_copy_right['copy'];
	}
	if( !empty( $eyebrowheading_left_copy_right['arrow_link'] ) ) {
		$arrow_link = $eyebrowheading_left_copy_right['arrow_link'];
	}
?>											
<div class="eyebrowheading-left-copy-right module-padding grid-x grid-padding-x">
	<div class="cell small-12 tablet-7">
		<?php if( !empty($eyebrow) ) {
			echo '<h2 class="h6">' . esc_attr( $eyebrow ) . '</h2>';
		};?>
		<?php if( !empty($heading) ) {
			echo '<h3 class="h2">' . esc_attr( $heading ) . '</h3>';
		};?>
	</div>
	<?php if( !empty( $copy ) || !empty( $arrow_link ) ):?>
		<div class="cell small-12 tablet-6 xlarge-5">
			<?php if( !empty($copy) ) {
				echo '<div class="text-wrap">' . $copy . '</div>';
			};?>
			<?php if( !empty( $arrow_link ) ): 
				$link = $arrow_link;
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
			<div class="link-wrap">
				<a class="arrow-link grid-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<span><?php echo esc_html( $link_title ); ?></span>
					<?php get_template_part('template-parts/svg', 'arrow-violet');?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	<?php endif;?>
	
</div>