<?php
/**
 * The admin sanitize file.
 *
 * @package Smart_Post_Show
 * @subpackage Smart_Post_Show/admin/views
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.

if ( ! function_exists( 'spf_sanitize_replace_a_to_b' ) ) {
	/**
	 * Sanitize
	 * Replace letter a to letter b
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 *
	 * @param string $value the value.
	 * @return mixed
	 */
	function spf_sanitize_replace_a_to_b( $value ) {

		return str_replace( 'a', 'b', $value );
	}
}

if ( ! function_exists( 'spf_sanitize_title' ) ) {
	/**
	 * Sanitize title
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 *
	 * @param string $value The title.
	 * @return string
	 */
	function spf_sanitize_title( $value ) {

		return sanitize_title( $value );
	}
}
