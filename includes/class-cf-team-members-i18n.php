<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://jeffreydewit.com
 * @since      1.0.0
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 * @author     Jeffrey de Wit <jeffrey.dewit@gmail.com>
 */
class Cf_Team_Members_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cf-team-members',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
