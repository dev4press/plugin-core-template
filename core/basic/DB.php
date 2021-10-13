<?php

namespace Dev4Press\Plugin\CoreSEO\Basic;

use Dev4Press\v36\Core\Plugins\DB as LibDB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DB extends LibDB {
	public $_prefix = 'coreseo';
	public $_tables = array();

	public static function instance() {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new DB();
		}

		return $instance;
	}
}