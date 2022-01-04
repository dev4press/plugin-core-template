<?php

use Dev4Press\Plugin\SweepPress\Admin\Plugin as AdminPlugin;
use Dev4Press\Plugin\SweepPress\Basic\DB;
use Dev4Press\Plugin\SweepPress\Basic\Plugin;
use Dev4Press\Plugin\SweepPress\Basic\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sweeppress() : Plugin {
	return Plugin::instance();
}

function sweeppress_settings() : Settings {
	return Settings::instance();
}

function sweeppress_db() : DB {
	return DB::instance();
}

function sweeppress_admin() : AdminPlugin {
	return AdminPlugin::instance();
}
