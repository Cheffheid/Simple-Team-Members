<?php

/**
 * Fired during plugin activation
 *
 * @link       https://jeffreydewit.com
 * @since      1.0.0
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 * @author     Jeffrey de Wit <jeffrey.dewit@gmail.com>
 */
class Cf_Team_Members_Activator {

	/**
	 * Function run during plugin activation
	 *
	 * Function run during plugin activation, currently only clears permalinks
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$team_members = new CF_Team_Member_CPT();
		$team_members->register_post_type();

		flush_rewrite_rules();
	}

}
