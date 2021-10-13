<?php

namespace Dev4Press\Plugin\CoreSEO\Basic;

use Dev4Press\v37\Core\Plugins\InstallDB as BaseInstallDB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class InstallDB extends BaseInstallDB {
	protected $prefix = 'coreseo';
	protected $tables = array();

	public static function instance() : InstallDB {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new InstallDB();
		}

		return $instance;
	}
}