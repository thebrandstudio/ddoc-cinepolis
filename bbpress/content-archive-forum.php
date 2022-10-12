<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
$forum_sidebar = is_active_sidebar('forum_sidebar') ? '8' : '12';
?>

<div class="row">

    <div class="col-lg-<?php echo esc_attr($forum_sidebar) ?>">

        <div id="bbpress-forums" class="bbpress-wrapper">

            <?php bbp_forum_subscription_link(); ?>

            <?php do_action( 'bbp_template_before_forums_index' ); ?>

            <?php if ( bbp_has_forums() ) : ?>

                <?php bbp_get_template_part( 'loop',     'forums'    ); ?>

            <?php else : ?>

                <?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

            <?php endif; ?>

            <?php do_action( 'bbp_template_after_forums_index' ); ?>

        </div>

    </div>

    <?php get_sidebar('forum') ?>


</div>
