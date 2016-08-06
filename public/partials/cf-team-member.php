<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_post_thumbnail( 'profile' ); ?>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<p>
			<em><?php echo $position; ?></em>
		</p>
	</header><!-- .entry-header -->

	<?php if ( $show_social ): ?>
		<ul class="social-links">
			<?php if ( ! empty( $facebook ) && '' !== $facebook ): ?>
				<li>
					<a href="<?php echo $facebook; ?>" class="facebook">
						<?php include plugin_dir_path( dirname( __FILE__ ) ) . '/svg/facebook.svg'; ?>
						<span class="screen-reader-text"><?php echo $facebook_label; ?></span>
					</a>
				</li>
			<?php endif; ?>
			<?php if ( ! empty( $twitter ) && '' !== $twitter ): ?>
				<li>
					<a href="<?php echo $twitter; ?>" class="twitter">
						<?php include plugin_dir_path( dirname( __FILE__ ) ) . '/svg/twitter.svg'; ?>
						<span class="screen-reader-text"><?php echo $twitter_label; ?></span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>

	<div id="member-bio-<?php the_ID(); ?>" class="member-bio">
		<?php the_content(); ?>
	</div>

</article><!-- #post-## -->
