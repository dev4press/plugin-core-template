<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v37\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'sweeppress';

	public $version = '1.0';
	public $build = 50;
	public $updated = '2021.12.21';
	public $status = 'stable';
	public $edition = 'pro';
	public $released = '2021.12.21';

	public $php = '7.0';

	public static function instance() : Information {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new Information();
		}

		return $instance;
	}
}