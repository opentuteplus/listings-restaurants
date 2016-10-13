<?php
/**
 * Single view Job meta box
 *
 * Hooked into single_restaurant_listing_start priority 20
 *
 * @since  1.14.0
 */
global $post;

do_action( 'single_restaurant_listing_meta_before' ); ?>

<ul class="job-listing-meta meta">
	<?php do_action( 'single_restaurant_listing_meta_start' ); ?>

	<li class="job-type <?php echo listings_restaurants_the_restaurant_type() ? sanitize_title( listings_restaurants_the_restaurant_type()->slug ) : ''; ?>" itemprop="employmentType"><?php listings_restaurants_the_restaurant_type(); ?></li>

	<li class="location" itemprop="jobLocation"><?php listings_restaurants_the_restaurant_location(); ?></li>

	<li class="date-posted" itemprop="datePosted"><date><?php printf( __( 'Posted %s ago', 'listings-jobs' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

	<?php if ( listings_restaurants_is_position_filled() ) : ?>
		<li class="position-filled"><?php _e( 'This position has been filled', 'listings-jobs' ); ?></li>
	<?php elseif ( ! listings_restaurants_candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
		<li class="listing-expired"><?php _e( 'Applications have closed', 'listings-jobs' ); ?></li>
	<?php endif; ?>

	<?php do_action( 'single_restaurant_listing_meta_end' ); ?>
</ul>

<?php do_action( 'single_restaurant_listing_meta_after' ); ?>
