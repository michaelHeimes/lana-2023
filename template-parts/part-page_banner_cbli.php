<?php
	if( !empty( $args['page_banner_cbli'] ) ) {
		$page_banner_cbli = $args['page_banner_cbli'];
	} else {
		$page_banner_cbli = get_sub_field('page_banner_cbli');
	}
	if( !empty($page_banner_cbli['eyebrow']) ) {
		$eyebrow = $page_banner_cbli['eyebrow'];
	}
	if( !empty($page_banner_cbli['heading']) ) {
		$heading = $page_banner_cbli['heading'];
	}
	if( !empty($page_banner_cbli['small_heading']) ) {
		$small_heading = $page_banner_cbli['small_heading'];
	}
	if( !empty($page_banner_cbli['copy']) ) {
		$copy = $page_banner_cbli['copy'];
	}
	if( !empty($page_banner_cbli['button_link']) ) {
		$button_link = $page_banner_cbli['button_link'];
	}
	if( !empty($page_banner_cbli['image']) ) {
		$image = $page_banner_cbli['image'];
	}
?>

<header class="part-page_banner_cbli entry-header page-banner-cbli">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center align-middle">
			<?php if( !empty($eyebrow) || !empty($header) || !empty($small_heading) || !empty($copy) || !empty($button_link) ):?>
				<div class="text-wrap cell small-12 medium-6 large-5 xlarge-4">
					<?php if( !empty($eyebrow) ) {
						echo '<h2 class="h6">' . $eyebrow . '</h2>' ;
					};?>
					<?php if( !empty($heading) ) {
						echo '<h1 class="h2">' . $heading . '</h1>' ;
					};?>	
					<?php if( !empty($small_heading) ) {
						echo '<hr class="yellow">';
						echo '<h3 class="h5">' . $small_heading . '</h3>' ;
					};?>	
					<?php if( !empty($copy) ) {
						echo '<div class="copy-wrap">' . $copy . '</div>' ;
					};?>	
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
			<?php endif;?>
			<?php if( !empty( $image ) ) {
				$imgID = $image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="cell small-12 medium-6 large-5 xlarge-offset-1">';
				echo '<div class="img-wrap br-12 relative">';
				echo $img;
				echo '<div class="mask grid-pattern white over-image"></div>';
				echo '</div>';
				echo '</div>';
			}?>
		</div>
	</div>
</header>