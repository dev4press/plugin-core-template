<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

use Dev4Press\v37\Core\Options\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	public static function instance() : Settings {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new Settings();
		}

		return $instance;
	}

	protected function value( $name, $group = 'settings', $default = null ) {
		return sweeppress_settings()->get( $name, $group, $default );
	}

	protected function init() {
		$this->settings = array();

		$this->settings = apply_filters( 'sweeppress_admin_internal_settings', $this->settings );
	}
}