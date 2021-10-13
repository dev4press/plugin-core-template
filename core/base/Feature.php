<?php

namespace Dev4Press\Plugin\CoreSEO\Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class Feature {
	public $feature_name = '';
	public $has_settings = true;
	public $settings = array();

	public function __construct() {
		if ( $this->has_settings ) {
			$this->settings = coreseo_settings()->prefix_get( $this->feature_name . '__', 'features' );
		}
	}

	public function __get( $name ) {
		return $this->settings[ $name ] ?? '';
	}

	public function get( $name, $missing = null ) {
		return $this->settings[ $name ] ?? $missing;
	}
}
