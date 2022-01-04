<?php

namespace Dev4Press\Plugin\SweepPress\Admin\Panel;

use Dev4Press\v37\Core\UI\Admin\PanelSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends PanelSettings {
	public $settings_class = '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Settings';

	public function __construct( $admin ) {
		parent::__construct( $admin );

		$this->subpanels = $this->subpanels + array();

		$this->subpanels = apply_filters( 'sweeppress_admin_settings_panels', $this->subpanels );
	}
}
