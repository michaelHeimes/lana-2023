<?php
	$three_column_icon_texts = get_sub_field('three-column_icon_text');
?>
<div class="three-column-icon-text white-bg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 large-11 xlarge-10">
				<div class="grid-x grid-padding-x align-spaced">
					<?php foreach( $three_column_icon_texts as $card ):
						if($card):
							$icon = $card['icon'];
							$text = $card['text'];	
					?>
						<div class="cell text-center small-12 medium-6 large-4">
							<?php if( !empty( $icon ) ) {
								$imgID = $icon['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="icon-wrap">';
								echo $img;
								echo '</div>';
							}
							if( !empty($text) ) {
								echo '<div class="text-wrap">' . $text . '</div>';
							}
							?>
							
						</div>
					<?php endif; endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>