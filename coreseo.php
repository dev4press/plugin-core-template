<?php

/*
Plugin Name:       CoreSEO
Plugin URI:        https://plugins.dev4press.com/coreseo/
Description:       Collection of various SEO related tools and features, completely modular for improving website SEO.
Author:            Milan Petrovic
Author URI:        https://www.dev4press.com/
Text Domain:       coreseo
Version:           1.0
Requires at least: 5.3
Tested up to:      5.9
Requires PHP:      7.0
License:           GPLv3 or later
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

== Copyright ==
Copyright 2008 - 2021 Milan Petrovic (email: milan@gdragon.info)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>
*/

$coreseo_dirname_basic = dirname( __FILE__ ) . '/';
$coreseo_urlname_basic = plugins_url( '/coreseo/' );

define( 'CORESEO_PATH', $coreseo_dirname_basic );
define( 'CORESEO_URL', $coreseo_urlname_basic );
define( 'CORESEO_D4PLIB_PATH', $coreseo_dirname_basic . 'd4plib/' );
define( 'CORESEO_D4PLIB_URL', $coreseo_urlname_basic . 'd4plib/' );

require_once( CORESEO_D4PLIB_PATH . 'core.php' );

require_once( CORESEO_PATH . 'core/autoload.php' );
require_once( CORESEO_PATH . 'core/bridge.php' );

coreseo();
coreseo_settings();

if ( D4P_ADMIN ) {
	coreseo_admin();
}
