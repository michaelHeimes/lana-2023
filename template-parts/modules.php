<?php
if( have_rows('page_modules') ):
	while ( have_rows('page_modules') ) : the_row();
		if( get_row_layout() == 'hero_banner_module' ):
			get_template_part('template-parts/part', 'hero-banner');
		elseif( get_row_layout() == 'page_banner_copy_button_link_and_image_module' ):
			get_template_part('template-parts/part', 'page_banner_cbli');
		elseif( get_row_layout() == 'centered_quote_module' ):
			get_template_part('template-parts/part', 'centered_quote');
		elseif( get_row_layout() == 'three-column_icon_text_module' ):
			get_template_part('template-parts/part', 'three-column_icon_text');
		elseif( get_row_layout() == 'images_copy_module' ):
		get_template_part('template-parts/part', 'images_copy');
		elseif( get_row_layout() == 'lana_module' ):
		get_template_part('template-parts/part', 'lana_module');
		elseif( get_row_layout() == 'team_members_module' ):
		get_template_part('template-parts/part', 'team_members');
		elseif( get_row_layout() == 'cta_copy_left_buttons_right_module' ):
		get_template_part('template-parts/part', 'cta_copy_left_buttons_right');
		endif;

	endwhile;
endif;
?>