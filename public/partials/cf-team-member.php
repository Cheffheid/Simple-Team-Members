<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_post_thumbnail( 'profile' ); ?>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<p>
			<?php echo $position; ?>
		</p>
	</header><!-- .entry-header -->

	<?php if ( ! empty( $twitter ) && '' !== $twitter ): ?>
		<a href="<?php echo $twitter; ?>" class="twitter">
			<span class="fa fa-twitter" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php echo $twitter_label; ?></span>
		</a>
	<?php endif; ?>

	<?php if ( ! empty( $facebook ) && '' !== $facebook ): ?>
		<a href="<?php echo $facebook; ?>" class="facebook">
			<span class="fa fa-twitter" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php echo $facebook_label; ?></span>
		</a>
	<?php endif; ?>

	<div id="member-bio-<?php the_ID(); ?>" class="member-bio">
		<?php the_content(); ?>
	</div>

</article><!-- #post-## -->
