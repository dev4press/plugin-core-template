<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Columns {
	public function __construct() {
		add_action( 'admin_init', array( $this, 'admin_columns' ) );
	}

	public function admin_columns() {

	}

	public static function instance() : Columns {
		static $instance = false;

		if ( $instance === false ) {
			$instance = new Columns();
		}

		return $instance;
	}
}
