
<div class="lana-module white-bg">
	<div class="grid-container">

		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 tablet-10">
				<?php if( !empty( get_sub_field('eyebrowheading_left_copy_right') ) ) {
					get_template_part('template-parts/part', 'eyebrowheading_left_copy_right', 
						array(
							'eyebrowheading_left_copy_right' => get_sub_field('eyebrowheading_left_copy_right'),
						)
					);
				};?>
			</div>
		</div>
	</div>
		
	<?php if( !empty( get_field('image_and_l-a-n-a', 'option') ) ){
		$image_and_lana = get_field('image_and_l-a-n-a', 'option');

		get_template_part('template-parts/part', 'image_and_lana',
			array(
				'image_and_lana' => $image_and_lana,
				'alignment' => 'align-center',
			)
		);

	};?>
		
</div>