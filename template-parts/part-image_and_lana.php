<?php
	$image_and_lana = $args['image_and_lana'];
	$alignment = $args['alignment'];
	if( !empty( $image_and_lana['image'] ) ) {
		$image = $image_and_lana['image'];
	}
	$leadership_text = $image_and_lana['leadership_text'];
	$achievement_text = $image_and_lana['achievement_text'];
	$novelty_text = $image_and_lana['novelty_text'];
	$accountability_text = $image_and_lana['accountability_text'];

	if( !empty( $image_and_lana['button_link'] ) ) {
		$button_link = $image_and_lana['button_link'];
	}
?>
<div class="image-and-lana">
	<div class="grid-container">
		<div class="grid-x grid-padding-x <?php echo $alignment;?>">
			<?php if( !empty( $image ) ) {
				$imgID = $image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="cell small-12 tablet-5 xlarge-4">';
				echo '<div class="img-wrap br-12">';
				echo $img;
				echo '</div>';
				echo '</div>';
			}?>
			<div class="cell small-12 tablet-7 xlarge-6">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 tablet-6">
						<div class="h4">L</div>
						<hr>
						<h3 class="h6">Leadership</h3>
						<p><?php echo esc_attr( $leadership_text );?></p>
					</div>
					<div class="cell small-12 tablet-6">
						<div class="h4">L</div>
						<hr>
						<h3 class="h6">Leadership</h3>
						<p><?php echo esc_attr( $leadership_text );?></p>
					</div>
					<div class="cell small-12 tablet-6">
						<div class="h4">L</div>
						<hr>
						<h3 class="h6">Leadership</h3>
						<p><?php echo esc_attr( $leadership_text );?></p>
					</div>
					<div class="cell small-12 tablet-6">
						<div class="h4">L</div>
						<hr>
						<h3 class="h6">Leadership</h3>
						<p><?php echo esc_attr( $leadership_text );?></p>
					</div>
					<?php 
					$link = $button_link;
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="button blue-violet-gradient-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>