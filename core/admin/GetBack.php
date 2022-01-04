<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

class GetBack extends \Dev4Press\v37\Core\Admin\GetBack {
	protected function process() {
		parent::process();

		do_action( 'sweeppress_admin_getback_handler', $this->a()->panel );
	}
}