<?php

use function Dev4Press\v36\Functions\panel;

?>
<div class="d4p-content">
    <div class="d4p-update-info">
		<?php



		?>

        <div class="d4p-install-block">
            <h4>
				<?php _e( "Cache Cleanup", "gd-knowledge-base" ); ?>
            </h4>
            <div>
				<?php _e( "Cleanup completed.", "gd-knowledge-base" ); ?>
            </div>
        </div>

		<?php

		coreseo_settings()->set( 'install', false, 'info' );
		coreseo_settings()->set( 'update', false, 'info', true );

		?>

        <div class="d4p-install-block">
            <h4>
				<?php _e( "All Done", "gd-knowledge-base" ); ?>
            </h4>
            <div>
				<?php _e( "Update completed.", "gd-knowledge-base" ); ?>
            </div>
        </div>

        <div class="d4p-install-confirm">
            <a class="button-primary" href="<?php echo panel()->a()->panel_url( 'about' ) ?>&update"><?php _e( "Click here to continue", "gd-knowledge-base" ); ?></a>
        </div>
    </div>
	<?php echo coreseo()->recommend(); ?>
</div>