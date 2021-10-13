<?php

namespace Dev4Press\Plugin\CoreSEO\Admin\Panel;

use Dev4Press\v36\Core\UI\Admin\PanelDashboard;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dashboard extends PanelDashboard {
	public function __construct( $admin ) {
		parent::__construct( $admin );

		if ( current_user_can( 'activate_plugins' ) ) {
			$this->sidebar_links['plugin'] = array();
		} else {
			$this->sidebar_links['basic'] = array();
			$this->sidebar_links['about'] = array();
		}
	}
}
