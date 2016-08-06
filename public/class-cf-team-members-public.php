<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jeffreydewit.com
 * @since      1.0.0
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/public
 * @author     Jeffrey de Wit <jeffrey.dewit@gmail.com>
 */
class Cf_Team_Members_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		if ( is_post_type_archive ( 'team_member' ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf-team-members-public.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		if ( is_post_type_archive ( 'team_member' ) ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf-team-members-public.js', array( 'jquery' ), $this->version, false );

			wp_localize_script( $this->plugin_name, 'TeamMemberScripti18n', array(
				'read_more'    => __( 'Read More', 'cf-team-members' ),
				'read_less'   => __( 'Read Less', 'cf-team-members' ),
			) );

		}
	}

	/**
	 *
	 *
	 * @since	1.0.0
	 */
	public function get_custom_team_member_archive_template( $archive_template ) {
		if ( is_post_type_archive ( 'team_member' ) ) {
		    $archive_template = dirname( __FILE__ ) . '/templates/team_member_archive.php';
		}

		return $archive_template;
	}

}
