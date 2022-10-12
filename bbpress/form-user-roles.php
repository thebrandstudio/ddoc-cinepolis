<?php

/**
 * User Roles Profile Edit Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div>
	<label for="role"><?php esc_html_e( 'Blog Role', 'ddoc' ) ?></label>

	<?php bbp_edit_user_blog_role(); ?>

</div>

<div>
	<label for="forum-role"><?php esc_html_e( 'Forum Role', 'ddoc' ) ?></label>

	<?php bbp_edit_user_forums_role(); ?>

</div>
