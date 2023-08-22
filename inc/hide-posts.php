<?php
function hide_posts_menu() {
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'hide_posts_menu');
