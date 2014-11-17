<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package jv-a-taste-of-the-season
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function jv_a_taste_of_the_season_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'jv_a_taste_of_the_season_jetpack_setup' );
