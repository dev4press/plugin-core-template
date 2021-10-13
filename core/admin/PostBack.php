<?php

namespace Dev4Press\Plugin\CoreSEO\Admin;

use Dev4Press\Plugin\CoreSEO\Basic\InstallDB;
use function Dev4Press\v36\Functions\WP\flush_rewrite_rules;

class PostBack extends \Dev4Press\v36\Core\Admin\PostBack {
	protected function process() {
		parent::process();

		if ( $this->p() == $this->get_page_name( 'tools' ) ) {
			$this->check_referer( 'tools' );
		}

		do_action( 'coreseo_admin_postback_handler', $this->p() );
	}

	protected function remove() {
		$data = $_POST['coreseotools'];

		$remove  = isset( $data['remove'] ) ? (array) $data['remove'] : array();
		$message = 'nothing-removed';

		if ( ! empty( $remove ) ) {
			$groups = array( 'settings' );

			foreach ( $groups as $group ) {
				if ( isset( $remove[ $group ] ) && $remove[ $group ] == 'on' ) {
					$this->a()->settings()->remove_plugin_settings_by_group( $group );
				}
			}

			if ( isset( $remove['drop'] ) && $remove['drop'] == 'on' ) {
				InstallDB::instance()->drop();

				if ( ! isset( $remove['disable'] ) ) {
					$this->a()->settings()->mark_for_update();
				}
			} else if ( isset( $remove['truncate'] ) && $remove['truncate'] == 'on' ) {
				InstallDB::instance()->truncate();
			}

			if ( isset( $remove['disable'] ) && $remove['disable'] == 'on' ) {
				coreseo()->deactivate();

				wp_redirect( admin_url( 'plugins.php' ) );
				exit;
			}

			$message = 'removed';
		}

		wp_redirect( $this->a()->current_url() . '&message=' . $message );
		exit;
	}

	protected function save_settings( $panel ) {
		parent::save_settings( $panel );

		flush_rewrite_rules();
	}
}