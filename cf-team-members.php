<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jeffreydewit.com
 * @since             1.0.0
 * @package           Cf_Team_Members
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Team Members
 * Plugin URI:        https://jeffreydewit.com
 * Description:       Adds a Team Member post type and an archive template for /team-members
 * Version:           1.0.0
 * Author:            Jeffrey de Wit
 * Author URI:        https://jeffreydewit.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf-team-members
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cf-team-members-activator.php
 */
function activate_cf_team_members() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf-team-members-activator.php';
	Cf_Team_Members_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cf-team-members-deactivator.php
 */
function deactivate_cf_team_members() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf-team-members-deactivator.php';
	Cf_Team_Members_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cf_team_members' );
register_deactivation_hook( __FILE__, 'deactivate_cf_team_members' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cf-team-members.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cf_team_members() {

	$plugin = new Cf_Team_Members();
	$plugin->run();

}
run_cf_team_members();
