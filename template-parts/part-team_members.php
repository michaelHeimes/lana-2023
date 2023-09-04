<?php
	$team_members = get_sub_field('team_members');
	$eyebrow = $team_members['eyebrow'];
	$heading = $team_members['heading'];
	$team_members = $team_members['team_members'];
?>
<div class="team-members module-padding">
	<div class="grid-container">
		<?php if( !empty($eyebrow) || !empty($heading) ):?>
		<div class="header grid-x grid-padding-x align-center">
			<div class="cell small-12 tablet-10 large-6 text-center">
				<?php echo '<h6>' . $eyebrow . '</h6>';?>
				<?php echo '<h2>' . $heading . '</h2>';?>
			</div>
		</div>
		<?php endif;?>
		<?php if( !empty($team_members) ):?>
		<div class="team-member-grid grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
			<?php foreach($team_members as $post):
				setup_postdata($post);
				$card_image = get_field('card_image'); 
				$name = get_the_title();
				$title = get_field('title'); 
				$country_flag = get_field('country_flag'); 
				$location = get_field('location'); 
			?>
			<div class="cell">
				<div class="white-bg br-12">
					<div class="grid-x grid-padding-x align-middle">
						<?php if( !empty( $card_image ) ) {
							$imgID = $card_image['ID'];
							$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
							$img = wp_get_attachment_image( $imgID, 'team-card-img', false, [ "class" => "", "alt"=>$img_alt] );
							echo '<div class="cell small-4">';
							echo '<div class="img-wrap overflow-hidden">';
							echo $img;
							echo '</div>';
							echo '</div>';
						}?>
						<div class="cell small-8">
							<h4><?php echo esc_attr( $name );?></h4>
							<?php if( !empty($title) ) {
								echo '<h5 class="h6">' . $title . '</h5>';
							};?>
							<?php if( !empty($country_flag) || !empty($country_flag) ):?>
							<div class="grid-x align-middle">
								<?php if( !empty( $country_flag ) ) {
									$imgID = $country_flag['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
									echo '<div class="flag-wrap">';
									echo $img;
									echo '</div>';
								}?>
								<?php if( !empty($location ) ) {
									echo '<div class="arrow-link">' . $location . '</div>';
								};?>
							</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; wp_reset_postdata();?>
		</div>
		<?php endif;?>
	</div>
</div>