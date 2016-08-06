<?php

  get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e('Team Members'); ?></h1>
			</header><!-- .entry-header -->

	    <?php

				if ( have_posts() ) {

					// Start the Loop.
					while ( have_posts() ) : the_post();

						$position = get_post_meta( get_the_ID(), 'cf_team_member_position', true );
						$twitter  = get_post_meta( get_the_ID(), 'cf_team_member_twitter', true );
						$facebook = get_post_meta( get_the_ID(), 'cf_team_member_facebook', true );

						$twitter_label = sprintf( __('Twitter profile for %s'), get_the_title() );
						$facebook_label = sprintf( __('Facebook profile for %s'), get_the_title() );

						// Team Member partial
						include plugin_dir_path( dirname( __FILE__ ) ) . '/partials/cf-team-member.php';

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'cf-team-members' ),
						'next_text'          => __( 'Next page', 'cf-team-members' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cf-team-members' ) . ' </span>',
					) );

	    	// If no content, include the "No posts found" template.
				} else {
					include plugin_dir_path( dirname( __FILE__ ) ) . '/partials/cf-team-members-not-found.php';
				}

			?>
    </main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
