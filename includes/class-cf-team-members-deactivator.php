<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://jeffreydewit.com
 * @since      1.0.0
 *
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 * @author     Jeffrey de Wit <jeffrey.dewit@gmail.com>
 */
class Cf_Team_Members_Deactivator {

	/**
	* Function run during plugin activation
	*
	* Function run during plugin activation, currently only clears permalinks
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
