<?php

namespace Dev4Press\Plugin\CoreSEO\Basic;

use Dev4Press\v37\Core\DateTime;
use Dev4Press\v37\Core\Plugins\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends Core {
	public $plugin = 'coreseo';

	private $_datetime = null;

	public function __construct() {
		$this->url       = CORESEO_URL;
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
		do_action( 'coreseo_load_settings' );
		do_action( 'coreseo_plugin_init' );
	}

	public function s() {
		return coreseo_settings();
	}

	public function datetime() : DateTime {
		return $this->_datetime;
	}
}
