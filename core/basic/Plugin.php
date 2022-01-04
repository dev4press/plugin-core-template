<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v37\Core\DateTime;
use Dev4Press\v37\Core\Plugins\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends Core {
	public $plugin = 'sweeppress';

	private $_datetime = null;

	public function __construct() {
		$this->url       = SWEEPPRESS_URL;
		$this->_datetime = new DateTime();

		parent::__construct();
	}

	public static function instance() : Plugin {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new Plugin();
		}

		return $instance;
	}

	public function run() {
		do_action( 'sweeppress_load_settings' );
		do_action( 'sweeppress_plugin_init' );
	}

	public function s() {
		return sweeppress_settings();
	}

	public function datetime() : DateTime {
		return $this->_datetime;
	}
}
