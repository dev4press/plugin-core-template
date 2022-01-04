<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class MetaBoxes {
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	public static function instance() : MetaBoxes {
		static $instance = false;

		if ( $instance === false ) {
			$instance = new MetaBoxes();
		}

		return $instance;
	}

	public function add_meta_boxes() {

	}

	public function save_post( $post_id ) {
		$is_autosave    = wp_is_post_autosave( $post_id );
		$is_revision    = wp_is_post_revision( $post_id );
		$is_valid_nonce = isset( $_POST['sweeppress-nonce'] ) && wp_verify_nonce( $_POST['sweeppress-nonce'], 'sweeppress_meta_box' );

		if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
			return;
		}
	}
}