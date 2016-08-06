<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jeffreydewit.com
 * @since      1.0.0
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/admin
 * @author     Jeffrey de Wit <jeffrey.dewit@gmail.com>
 */
class Cf_Team_Members_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf-team-members-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf-team-members-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom metabox for the team member custom post type
	 *
	 * @since    1.0.0
	 */
	public function add_team_member_metabox() {
		add_meta_box(
			'team_member_custom_fields',
			__('Additional Details', 'cf-team-members'),
			array( $this, 'team_member_metabox_fields' ),
			'team_member'
		);
	}

	/**
	 * Displays the additional metabox fields for team member custom post types
	 *
	 * @since		1.0.0
	 */
	public function team_member_metabox_fields() {
		global $post;
		$custom_fields = get_post_custom($post->ID);

		wp_nonce_field( 'team_member_save', 'team_member_nonce' );

		require plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/cf-team-member-metabox-form.php';

	}

	/**
	 * Handles saving of Team Member custom post type custom fields
	 *
	 * @since    1.0.0
	 */
	public function save_team_member_data( $post_id ) {

		if ( ! $this->is_valid_post_type( 'team_member' ) ||
				 ! $this->user_can_save( $post_id, 'team_member_nonce', 'team_member_save' ) ) {
        return;
    }

		$textfields = ['cf_team_member_position', 'cf_team_member_twitter', 'cf_team_member_facebook'];

		foreach( $textfields as $textfield ) {
			if ( ! empty( $_POST[$textfield] ) ) {
				$position = sanitize_text_field( $_POST[$textfield] );

				update_post_meta( $post_id, $textfield, $position );
			} else {
				if ( '' !== get_post_meta( $post_id, $textfield, true ) ) {
		        delete_post_meta( $post_id, $textfield );
		    }
			}
		}

	}

	/**
	 * Validates post type we're trying to save
	 *
	 * @since    1.0.0
	 */
	private function is_valid_post_type( $post_type ) {
		return ! empty( $_POST['post_type'] ) && $post_type == $_POST['post_type'];
	}

	/**
	 * Validates if the user can actually save this post
	 *
	 * @since    1.0.0
	 */
	private function user_can_save( $post_id, $nonce_action, $nonce_id ) {

	    $is_autosave = wp_is_post_autosave( $post_id );
	    $is_revision = wp_is_post_revision( $post_id );
	    $is_valid_nonce = ( isset( $_POST[ $nonce_action ] ) && wp_verify_nonce( $_POST[ $nonce_action ], $nonce_id ) );

	    // Return true if the user is able to save; otherwise, false.
	    return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;

	}

}
