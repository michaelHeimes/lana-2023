<?php
$bg_color = get_sub_field('background_color') ?? null;
$text_editor = get_sub_field('text_editor') ?? null;
?>
<div class="text-editor module-padding <?php if( !empty($bg_color) ){ echo $bg_color . '-bg'; }?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="entry-content cell small-12 large-10 xlarge-8">
				<?=wp_kses_post( $text_editor );?>
			</div>
		</div>
	</div>
</div>