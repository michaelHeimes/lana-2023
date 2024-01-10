<?php 
	$images_copy = get_sub_field('images_copy');
	$bg_color = $images_copy['background_color'];
	$image_size = $images_copy['image_size'];
	$image_orientation = $images_copy['image_orientation'];
	$image_type = $images_copy['image_type'];
	$three_image_set = $images_copy['three-image_set'];
	if( !empty($three_image_set) ) {
		$top_left_image = $three_image_set['top_left_image'];
		$top_right_image = $three_image_set['top_right_image'];
		$bottom_image = $three_image_set['bottom_image'];
	}
	$small_image = $images_copy['small_image'];
	$large_image = $images_copy['large_image'];
	$icon = $images_copy['icon'];
	$eyebrow = $images_copy['eyebrow'];
	$heading = $images_copy['heading'];
	$small_heading = $images_copy['small_heading'];
	$copy = $images_copy['copy'];
	$button_link = $images_copy['button_link'];
	$add_grid_overlay = $images_copy['add_grid_overlay'];
?>
<div class="images-copy module-padding<?php if( $bg_color == 'white' ){ echo ' white-bg'; }; echo ' img-size-' . $image_size;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
				<div class="copy-image grid-x grid-padding-x<?php if( $image_orientation == 'right' ){ echo ' tablet-flex-dir-row-reverse align-right';}?>">
					<?php if( $image_size == 'small' && !empty( $small_image ) ) {
						$imgID = $small_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="top-img-wrap cell small-12 tablet-6 large-4 xlarge-offset-1">';
						echo '<div class="img-wrap br-12 relative">';
						echo $img;
						if( $add_grid_overlay == true ) {
							echo '<div class="mask grid-pattern white over-image"></div>';
						}
						echo '</div>';
						echo '</div>';
					}?>
					<?php if( $image_type == 'single' && $image_size == 'large' && !empty( $large_image ) ) {
						$imgID = $large_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="top-img-wrap cell small-12 tablet-5 tablet-offset-1">';
						echo '<div class="img-wrap br-12 relative">';
						echo $img;
						if( $add_grid_overlay == true ) {
							echo '<div class="mask grid-pattern white over-image"></div>';
						}
						echo '</div>';
						echo '</div>';
					}?>
					<?php if( $image_type == 'three-set' && !empty( $three_image_set ) ):?>
						<div class="top-img-wrap three-set cell small-12 tablet-6 large-5 large-offset-1">
							<div class="grid-x grid-padding-x">
							<?php
								$imgID = $top_left_image['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="tl-img cell shrink">';
								echo '<div class="img-wrap br-12">';
								echo $img;
								echo '</div>';
								echo '</div>';
								
								$imgID = $top_right_image['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="tr-img cell shrink">';
								echo '<div class="img-wrap br-12">';
								echo $img;
								echo '</div>';
								echo '</div>';
								
								$imgID = $bottom_image['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="cell small-12">';
								echo '<div class="img-wrap br-12">';
								echo $img;
								echo '</div>';
								echo '</div>';
							?>
							</div>
						</div>
					<?php endif;?>
					<?php if( !empty( $icon ) || !empty( $heading ) || !empty( $small_heading ) || !empty( $copy ) || !empty( $button_link )  ):?>
						<div class="cell small-12<?php if( $image_size == 'small' ) { echo ' tablet-6 large-offset-1 xlarge-5';};if( $image_size == 'large' || $image_type == 'three-set' ) { echo ' tablet-6 large-5 xlarge-4 xlarge-offset-1';}?>">
							<?php if( !empty( $icon ) ) {
								$imgID = $icon['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="icon-wrap">';
								echo $img;
								echo '</div>';
							}?>
							<?php if( !empty( $eyebrow ) ) {
								echo '<h6>' . esc_attr( $eyebrow ) . '</h6>';
							};?>
							<?php if( !empty( $heading ) ) {
								echo '<h2 class="h3">' . esc_attr( $heading ) . '</h2>';
							};?>
							<?php if( !empty( $small_heading ) ) {
								echo '<h5>' . esc_attr( $small_heading ) . '</h5>';
							};?>
							<?php if( !empty( $copy ) ) {
								echo '<div class="copy-wrap">' . $copy . '</div>';
							};?>
							<?php 
							$link = $button_link;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
							<div class="btn-wrap">
								<a class="button blue-violet-gradient-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
		</div>
	</div>
</div>