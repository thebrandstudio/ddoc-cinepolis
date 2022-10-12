<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Get the statistics
$stats = bbp_get_statistics();

$user_count = !empty($stats['user_count']) ? $stats['user_count'] : '';
$forum_count = !empty($stats['forum_count']) ? $stats['forum_count'] : '';
$topic_count = !empty($stats['topic_count']) ? $stats['topic_count'] : '';
$reply_count = !empty($stats['reply_count']) ? $stats['reply_count'] : '';
$topic_tag_count = !empty($stats['topic_tag_count']) ? $stats['topic_tag_count'] : '';

?>

<ul>

	<?php do_action( 'bbp_before_statistics' ); ?>

    <?php
    if ( $user_count ) { ?>
        <li>
            <?php esc_html_e( 'Registered Users', 'ddoc' ); ?>
            <span><?php echo esc_html( $user_count ); ?></span>
        </li>
        <?php
    }
    if ( $forum_count ) { ?>
        <li>
            <?php esc_html_e( 'Forums', 'ddoc' ); ?>
            <span><?php echo esc_html( $forum_count ); ?></span>
        </li>
        <?php
    }
    if ( $topic_count ) { ?>
        <li>
            <?php esc_html_e( 'Topics', 'ddoc' ); ?>
            <span><?php echo esc_html( $topic_count ); ?></span>
        </li>
        <?php
    }
    if ( $reply_count ) { ?>
        <li>
            <?php esc_html_e( 'Replies', 'ddoc' ); ?>
            <span><?php echo esc_html( $reply_count ); ?></span>
        </li>
        <?php
    }
    if ( $topic_tag_count ) { ?>
        <li>
            <?php esc_html_e( 'Topic Tags', 'ddoc' ); ?>
            <span><?php echo esc_html( $topic_tag_count ); ?></span>
        </li>
        <?php
    }
    ?>
	<?php if ( ! empty( $stats['empty_topic_tag_count'] ) ) : ?>
        <li>
            <?php esc_html_e( 'Empty Topic Tags', 'ddoc' ); ?>
            <span><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></span>
        </li>
	<?php endif; ?>

	<?php if ( ! empty( $stats['topic_count_hidden'] ) ) : ?>
		<li>
            <?php esc_html_e( 'Hidden Topics', 'ddoc' ); ?>
            <span>
                <abbr title="<?php echo esc_attr( $stats['hidden_topic_title'] ); ?>"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></abbr>
            </span>
        </li>
	<?php endif; ?>

	<?php if ( ! empty( $stats['reply_count_hidden'] ) ) : ?>
		<li>
            <?php esc_html_e( 'Hidden Replies', 'ddoc' ); ?>
            <span>
                <abbr title="<?php echo esc_attr( $stats['hidden_reply_title'] ); ?>"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></abbr>
            </span>
        </li>
	<?php endif; ?>

	<?php do_action( 'bbp_after_statistics' ); ?>

</ul>

<?php unset( $stats );