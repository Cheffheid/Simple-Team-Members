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
