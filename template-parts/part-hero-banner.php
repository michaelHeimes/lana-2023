<?php
if( !empty($args['hero-banner']) ) {
	$hero_banner = $args['hero-banner'];
}
if( !empty( get_sub_field('hero_banner') ) ) {
	$hero_banner = get_sub_field('hero_banner');
}
$background_image = $hero_banner['background_image'];
$eyebrow = $hero_banner['eyebrow'];
$pre_heading_text = $hero_banner['pre_heading_text'];
$large_heading = $hero_banner['large_heading'];
$button_link = $hero_banner['button_link'];
$bottom_right_logo = $hero_banner['bottom_right_logo'];
?>
<header class="entry-header hero-banner">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="inner has-object-fit">
					<?php if( !empty( $background_image ) ) {
						$imgID = $background_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit cover", "alt"=>$img_alt] );
						echo $img;
						echo '<div class="mask grid-pattern white over-image"></div>';
					}?>
					<div class="content-wrap relative">
						<?php if( !empty($eyebrow) ) {
							echo '<h6 class="color-white">' . esc_attr( $eyebrow ) . '</h6>';
						};?>
						<?php if( !empty($pre_heading_text) ) {
							echo '<h4 class="color-white">' . esc_attr( $pre_heading_text ) . '</h4>';
						};?>
						<?php if( !empty($large_heading) ) {
							echo '<div class="large-heading color-white">' . $large_heading . '</div>';
						};?>
						<?php 
						$link = $button_link;
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="button white-outline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div>
					<?php if( !empty( $bottom_right_logo ) ) {
						$imgID = $bottom_right_logo['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="bl-img-wrap">';
						echo $img;
						echo '</div>';
					}?>
				</div>	
			</div>
		</div>
	</div>
</header><!-- .entry-header -->