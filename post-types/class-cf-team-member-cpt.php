<?php

/**
 * Class that defines the Team Member custom post type
 *
 * This class defines all code necessary to register custom post types.
 *
 * @since      1.0.0
 * @package    Cf_Team_Members
 * @subpackage Cf_Team_Members/includes
 * @author     Jeffrey de Wit <Jeffrey.deWit@gmail.com>
 */
class CF_Team_Member_CPT {

    private $single;
    private $plural;
    private $type;
    private $icon;

    public function __construct() {
        $this->single     = __('Team Member', 'cf-team-members');
        $this->plural     = __('Team Members', 'cf-team-members');
        $this->type       = __('team-member', 'cf-team-members');
        $this->dashicon   = 'dashicons-groups';
    }

    /**
     * Registers the post type.
     *
     * @since    1.0.0
     */
    public function register_post_type( ){

        $labels = array(
            'name' => _( $this->plural ),
            'singular_name' => _( $this->single ),
            'add_new' => _x('Add ' . $this->single, $this->single),
            'add_new_item' => _('Add New ' . $this->single),
            'edit_item' => _('Edit ' . $this->single),
            'new_item' => _('New ' . $this->single),
            'view_item' => _('View ' . $this->single),
            'search_items' => _('Search ' . $this->plural),
            'not_found' =>  _('No ' . $this->plural . ' Found'),
            'not_found_in_trash' => _('No ' . $this->plural . ' found in Trash'),
            'parent_item_colon' => ''
        );
        $options = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => $this->type),
            'capability_type' => 'post',
            'hierarchical' => true,
            'has_archive' => true,
            'menu_position' => null,
            'menu_icon' => $this->dashicon,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
        );
        register_post_type($this->type, $options);

    }
}
