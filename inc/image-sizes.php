<?php
function add_custom_sizes() {
	// Team Photos
	add_image_size( 'news-thumb', 440, 280, true );
	add_image_size( 'news-thumb-x2', 880, 560, true );
	add_image_size( 'service-banner', 1110, 1400, true );
	add_image_size( 'team-card-img', 190, 190, true );
}
add_action('after_setup_theme','add_custom_sizes');