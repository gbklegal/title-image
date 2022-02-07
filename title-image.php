<?php

/**
 * Plugin Name: Titelbild
 * Description: Description coming soon.
 * Version: 1.0.1
 * Author: Tobias Röder
 * Author URI: https://tobias-roeder.de
 */

/**
 * Register meta boxes.
 */
function title_image_register_meta_boxes() {
    add_meta_box( 'meta_box_title_image', 'Titelbild', 'title_image_display_callback', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'title_image_register_meta_boxes' );

/**
 * Meta box display callback.
 * 
 * @param WP_Post $post Current post object.
 */
function title_image_display_callback( $post ) {
    wp_register_script( 'title_image_mediaselect', plugins_url('mediaselect.js', __FILE__), ['jquery'], '1.0', true );
    wp_enqueue_script('title_image_mediaselect');

    $title_image_id = esc_attr( get_post_meta( get_the_ID(), 'title_image_id', true ) );
    $title_image_src = wp_get_attachment_url( $title_image_id );
    $has_title_image_id = !!$title_image_id;

    include plugin_dir_path(__FILE__) . 'form.php';
}

/**
 * Save meta box content.
 * 
 * @param int $post_id Post ID
 */
function title_image_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'title_image_id'
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
    }
}
add_action( 'save_post', 'title_image_meta_box' );

/**
 * @param array $options
 * 
 * @return string
 */
function get_title_image_by_id( $options = [] ) {
    $postId = $options['post_id'] ?? get_the_ID();
    $imageId = get_post_meta( $postId, 'title_image_id', true );

    /**
     * sizes
     * - thumbnail
     * - medium
     * - large
     * - full
     */
    $size = $options['size'] ?? 'medium';

    return wp_get_attachment_image($imageId, $size);
}

/**
 * echos the image
 */
function the_title_image() {
    echo get_title_image_by_id();
}

/**
 * return the image
 * 
 * @return string
 */
function get_title_image() {
    return get_title_image_by_id();
}

/**
 * checks if image exists
 * 
 * @return bool
 */
function has_title_image() {
    if (get_title_image_by_id())
        return true;

    return false;
}

/**
 * Add shortcode.
 * 
 * @param array $atts
 * 
 * @return string
 */
function title_image_shortcode( $atts ) {
    return get_title_image_by_id( $atts );
}
add_shortcode('title_image', 'title_image_shortcode');