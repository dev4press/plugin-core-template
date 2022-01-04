<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v37\Core\Plugins\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	public $base = 'sweeppress';

	public $settings = array(
		'core'     => array(
			'activated' => 0
		),
		'load'     => array(
			
		),
		'features' => array(
			
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

		add_action( 'sweeppress_load_settings', array( $this, 'init' ) );
	}
}