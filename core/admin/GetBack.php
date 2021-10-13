<?php

namespace Dev4Press\Plugin\CoreSEO\Admin;

class GetBack extends \Dev4Press\v36\Core\Admin\GetBack {
	protected function process() {
		parent::process();

		do_action( 'coreseo_admin_getback_handler', $this->a()->panel );
	}
}