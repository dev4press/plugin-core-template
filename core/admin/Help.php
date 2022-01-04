<?php

namespace Dev4Press\Plugin\SweepPress\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Help {
	public function __construct() {
		add_action( 'load-post.php', array( $this, 'content' ) );
		add_action( 'load-post-new.php', array( $this, 'content' ) );
	}

	public static function instance() : Help {
		static $instance = false;

		if ( $instance === false ) {
			$instance = new Help();
		}

		return $instance;
	}

	public function content() {
		$screen = get_current_screen();
		$type   = $screen->post_type;

		if ( ! empty( $type ) ) {
			$this->help_tab_sidebar();
			$this->help_access();
			$this->help_tab_getting_help();
		}
	}

	public function plugin() {
		$this->help_tab_sidebar();
		$this->help_tab_getting_help();
	}

	public function help_access() {
		$screen = get_current_screen();

		$screen->add_help_tab(
			array(
				'id'      => 'sweeppress-help-access',
				'title'   => __( "Knowledge Base", "sweeppress" ),
				'content' => '<h3>' . __( "Access Control", "sweeppress" ) . '</h3><p>' . __( "Content access gives basic control over who can view this resource. For private access type you can select roles that can access the content. If set to restricted, you need to use filter to provide the access status.", "sweeppress" ) . '</p>' .
				             '<p>' . __( "File download access only controls if the user can see the download links, WordPress doesn't have any method to actually protect files from download.", "sweeppress" ) . '</p>' .
				             '<h3>' . __( "Visibility Control", "sweeppress" ) . '</h3><p>' . __( "This option will be used to completely hide the content from any query that gets lists or archives of content from the database, it doesn't prevent access to the content. This is useful when you are in the process of writing content and test it, but you don't want it to be visible for users browsing the website.", "sweeppress" ) . '</p>'
			)
		);
	}

	public function help_tab_getting_help() {
		$screen = get_current_screen();

		$screen->add_help_tab(
			array(
				'id'      => 'd4p-help-info',
				'title'   => __( "Getting Help", "sweeppress" ),
				'content' => '<p>' . __( "To get help with this plugin, you can start with Knowledge Base list of frequently asked questions and articles. If you have any questions, or you want to report a bug, or you have a suggestion, you can use support forum. All important links for this are on the right side of this help dialog.", "sweeppress" ) . '</p>'
			)
		);
	}

	public function help_tab_sidebar( $plugin = 'sweeppress', $title = 'SweepPress Pro' ) {
		$screen = get_current_screen();

		$screen->set_help_sidebar(
			'<p><strong>' . $title . '</strong></p>' .
			'<p><a target="_blank" href="https://plugins.dev4press.com/' . $plugin . '/">' . __( "Home Page", "sweeppress" ) . '</a><br/>' .
			'<a target="_blank" href="https://support.dev4press.com/kb/product/' . $plugin . '/">' . __( "Knowledge Base", "sweeppress" ) . '</a><br/>' .
			'<a target="_blank" href="https://support.dev4press.com/forums/forum/plugins/' . $plugin . '/">' . __( "Support Forum", "sweeppress" ) . '</a></p>'
		);
	}
}
