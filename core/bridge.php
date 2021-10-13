<?php

use Dev4Press\Plugin\CoreSEO\Admin\Plugin as AdminPlugin;
use Dev4Press\Plugin\CoreSEO\Basic\DB;
use Dev4Press\Plugin\CoreSEO\Basic\Plugin;
use Dev4Press\Plugin\CoreSEO\Basic\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function coreseo() : Plugin {
	return Plugin::instance();
}

function coreseo_settings() : Settings {
	return Settings::instance();
}

function coreseo_db() : DB {
	return DB::instance();
}

function coreseo_admin() : AdminPlugin {
	return AdminPlugin::instance();
}
