<?php

namespace Dev4Press\Plugin\CoreSEO\Admin;

use Dev4Press\v37\Core\Admin\Menu\Plugin as BasePlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends BasePlugin {
	public $plugin = 'coreseo';
	public $plugin_prefix = 'coreseo';
	public $plugin_menu = 'CoreSEO';
	public $plugin_title = 'CoreSEO';

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
		$this->url  = CORESEO_URL;
		$this->path = CORESEO_PATH;

		add_action( 'coreseo_plugin_core_ready', array( $this, 'ready' ) );

		Columns::instance();
		MetaBoxes::instance();
	}

	public function ready() {
		do_action( 'coreseo_admin_load_addons' );
	}

	public function after_setup_theme() {
		$this->setup_items = array(
			'install' => array(
				'title' => __( "Install", "coreseo" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin installation was successful.", "coreseo" ),
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\Install'
			),
			'update'  => array(
				'title' => __( "Update", "coreseo" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin was successfully updated.", "coreseo" ),
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\Update'
			)
		);

		$this->menu_items = array(
			'dashboard' => array(
				'title' => __( "Overview", "coreseo" ),
				'icon'  => 'ui-home',
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\Dashboard'
			),
			'about'     => array(
				'title' => __( "About", "coreseo" ),
				'icon'  => 'ui-info',
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\About'
			),
			'settings'  => array(
				'title' => __( "Settings", "coreseo" ),
				'icon'  => 'ui-cog',
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\Settings'
			),
			'tools'     => array(
				'title' => __( "Tools", "coreseo" ),
				'icon'  => 'ui-wrench',
				'class' => '\\Dev4Press\\Plugin\\CoreSEO\\Admin\\Panel\\Tools'
			)
		);
	}

	public function svg_icon() : string {
		return coreseo()->svg_icon;
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
				$msg['message'] = __( "Feedback entry is removed.", "coreseo" );
				break;
			case 'page-failed':
				$msg['message'] = __( "Page creation failed.", "coreseo" );
				$msg['color']   = 'error';
				break;
		}

		return $msg;
	}

	public function register_scripts_and_styles() {
		$this->enqueue->register( 'css', 'coreseo-meta',
			array(
				'path' => 'css/',
				'file' => 'meta',
				'ext'  => 'css',
				'min'  => true,
				'req'  => array( 'wp-color-picker' ),
				'ver'  => coreseo_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'css', 'coreseo-admin',
			array(
				'path' => 'css/',
				'file' => 'admin',
				'ext'  => 'css',
				'min'  => true,
				'ver'  => coreseo_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'js', 'coreseo-meta',
			array(
				'path' => 'js/',
				'file' => 'meta',
				'ext'  => 'js',
				'min'  => true,
				'req'  => array( 'wp-color-picker' ),
				'ver'  => coreseo_settings()->file_version(),
				'src'  => 'plugin'
			) )->register( 'js', 'coreseo-admin',
			array(
				'path' => 'js/',
				'file' => 'admin',
				'ext'  => 'js',
				'min'  => true,
				'ver'  => coreseo_settings()->file_version(),
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
		$this->enqueue->css( 'coreseo-admin' )->js( 'coreseo-admin' );
	}

	protected function extra_enqueue_scripts_metabox() {
		$this->enqueue->css( 'coreseo-meta' );
		$this->enqueue->js( 'coreseo-meta' );

		$_data = apply_filters( 'coreseo_admin_posts_javascript_data', array(
			'string_remove_file'       => __( "Remove", "coreseo" ),
			'string_media_file_title'  => __( "Select Files", "coreseo" ),
			'string_media_file_button' => __( "Use Selected Files", "coreseo" )
		) );

		wp_localize_script( 'd4plib3-coreseo-meta', 'coreseo_meta_data', $_data );
	}

	protected function extra_enqueue_scripts_postslist() {
		if ( $this->is_valid_post_type() ) {
			$this->enqueue->css( 'coreseo-meta' );
		}
	}

	protected function is_metabox_available() : bool {
		return $this->is_valid_post_type();
	}

	public function is_valid_post_type() : bool {
		$post_type = $this->get_post_type();

		return true;
	}

	public function settings() : \Dev4Press\Plugin\CoreSEO\Basic\Settings {
		return coreseo_settings();
	}

	public function settings_definitions() : Settings {
		return Settings::instance();
	}
}