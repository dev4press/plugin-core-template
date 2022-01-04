<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

use Dev4Press\v37\Core\Admin\Menu\Plugin as BasePlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends BasePlugin {
	public $plugin = 'sweeppress';
	public $plugin_prefix = 'sweeppress';
	public $plugin_menu = 'SweepPress';
	public $plugin_title = 'SweepPress';

	public $has_metabox = true;

	public $enqueue_wp = array( 'dialog' => true, 'color_picker' => true );

	public static function instance() : Plugin {
		static $instance = false;

		if ( $instance === false ) {
			$instance = new Plugin();
		}

		return $instance;
	}

	public function constructor() {
		$this->url  = SWEEPPRESS_URL;
		$this->path = SWEEPPRESS_PATH;

		add_action( 'sweeppress_plugin_core_ready', array( $this, 'ready' ) );

		Columns::instance();
		MetaBoxes::instance();
	}

	public function ready() {
		do_action( 'sweeppress_admin_load_addons' );
	}

	public function after_setup_theme() {
		$this->setup_items = array(
			'install' => array(
				'title' => __( "Install", "sweeppress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin installation was successful.", "sweeppress" ),
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\Install'
			),
			'update'  => array(
				'title' => __( "Update", "sweeppress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin was successfully updated.", "sweeppress" ),
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\Update'
			)
		);

		$this->menu_items = array(
			'dashboard' => array(
				'title' => __( "Overview", "sweeppress" ),
				'icon'  => 'ui-home',
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\Dashboard'
			),
			'about'     => array(
				'title' => __( "About", "sweeppress" ),
				'icon'  => 'ui-info',
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\About'
			),
			'settings'  => array(
				'title' => __( "Settings", "sweeppress" ),
				'icon'  => 'ui-cog',
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\Settings'
			),
			'tools'     => array(
				'title' => __( "Tools", "sweeppress" ),
				'icon'  => 'ui-wrench',
				'class' => '\\Dev4Press\\Plugin\\SweepPress\\Admin\\Panel\\Tools'
			)
		);
	}

	public function svg_icon() : string {
		return sweeppress()->svg_icon;
	}

	public function run_getback() {
		new GetBack( $this );
	}

	public function run_postback() {
		new PostBack( $this );
	}

	public function message_process( $code, $msg ) {
		switch ( $code ) {
			case 'feedback-removed':
				$msg['message'] = __( "Feedback entry is removed.", "sweeppress" );
				break;
			case 'page-failed':
				$msg['message'] = __( "Page creation failed.", "sweeppress" );
				$msg['color']   = 'error';
				break;
		}

		return $msg;
	}

	public function register_scripts_and_styles() {
		$this->enqueue->register( 'css', 'sweeppress-meta',
			array(
				'path' => 'css/',
				'file' => 'meta',
				'ext'  => 'css',
				'min'  => true,
				'req'  => array( 'wp-color-picker' ),
				'ver'  => sweeppress_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'css', 'sweeppress-admin',
			array(
				'path' => 'css/',
				'file' => 'admin',
				'ext'  => 'css',
				'min'  => true,
				'ver'  => sweeppress_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'js', 'sweeppress-meta',
			array(
				'path' => 'js/',
				'file' => 'meta',
				'ext'  => 'js',
				'min'  => true,
				'req'  => array( 'wp-color-picker' ),
				'ver'  => sweeppress_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'js', 'sweeppress-admin',
			array(
				'path' => 'js/',
				'file' => 'admin',
				'ext'  => 'js',
				'min'  => true,
				'ver'  => sweeppress_settings()->file_version(),
				'src'  => 'plugin'
			) );
	}

	public function enqueue_scripts( $hook ) {
		parent::enqueue_scripts( $hook );

		if ( $hook == 'term.php' || $hook == 'edit-tags.php' ) {
			$this->extra_enqueue_scripts_metabox();
		}
	}

	protected function extra_enqueue_scripts_plugin() {
		$this->enqueue->css( 'sweeppress-admin' )->js( 'sweeppress-admin' );
	}

	protected function extra_enqueue_scripts_metabox() {
		$this->enqueue->css( 'sweeppress-meta' );
		$this->enqueue->js( 'sweeppress-meta' );

		$_data = apply_filters( 'sweeppress_admin_posts_javascript_data', array(
			'string_remove_file'       => __( "Remove", "sweeppress" ),
			'string_media_file_title'  => __( "Select Files", "sweeppress" ),
			'string_media_file_button' => __( "Use Selected Files", "sweeppress" )
		) );

		wp_localize_script( 'd4plib3-sweeppress-meta', 'sweeppress_meta_data', $_data );
	}

	protected function extra_enqueue_scripts_postslist() {
		if ( $this->is_valid_post_type() ) {
			$this->enqueue->css( 'sweeppress-meta' );
		}
	}

	protected function is_metabox_available() : bool {
		return $this->is_valid_post_type();
	}

	public function is_valid_post_type() : bool {
		$post_type = $this->get_post_type();

		return true;
	}

	public function settings() : \Dev4Press\Plugin\SweepPress\Basic\Settings {
		return sweeppress_settings();
	}

	public function settings_definitions() : Settings {
		return Settings::instance();
	}
}