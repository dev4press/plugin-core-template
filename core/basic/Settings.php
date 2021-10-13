<?php

namespace Dev4Press\Plugin\CoreSEO\Basic;

use Dev4Press\v36\Core\Plugins\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	public $base = 'coreseo';

	public $settings = array(
		'core'     => array(
			'activated' => 0
		),
		'settings' => array()
	);

	public static function instance() : Settings {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new Settings();
		}

		return $instance;
	}

	protected function constructor() {
		$this->info = new Information();

		add_action( 'coreseo_load_settings', array( $this, 'init' ) );
	}
}