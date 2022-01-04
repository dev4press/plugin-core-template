<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v37\Core\Plugins\DB as LibDB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DB extends LibDB {
	public $_prefix = 'sweeppress';
	public $_tables = array();

	public static function instance() : DB {
		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new DB();
		}

		return $instance;
	}
}
