<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v37\Core\Plugins\InstallDB as BaseInstallDB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class InstallDB extends BaseInstallDB {
	protected $prefix = 'sweeppress';
	protected $tables = array();

	public static function instance() : InstallDB {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new InstallDB();
		}

		return $instance;
	}
}