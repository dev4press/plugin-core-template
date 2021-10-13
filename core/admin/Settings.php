<?php

namespace Dev4Press\Plugin\CoreSEO\Admin;

use Dev4Press\v36\Core\Options\Element as EL;
use Dev4Press\v36\Core\Options\Settings as BaseSettings;
use Dev4Press\v36\Core\Options\Type;
use function Dev4Press\v36\Functions\WP\list_user_roles;

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
		return coreseo_settings()->get( $name, $group, $default );
	}

	protected function init() {
		$this->settings = array(

		);

		$this->settings = apply_filters( 'coreseo_admin_internal_settings', $this->settings );
	}
}