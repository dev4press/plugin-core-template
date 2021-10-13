<?php

use function Dev4Press\v37\Functions\panel;

?>
<div class="d4p-content">
    <div class="d4p-update-info">
		<?php

		?>

        <div class="d4p-install-block">
            <h4>
				<?php _e( "All Done", "coreseo" ); ?>
            </h4>
            <div>
				<?php _e( "Installation completed.", "coreseo" ); ?>
            </div>
        </div>

		<?php

		coreseo_settings()->set( 'install', false, 'info' );
		coreseo_settings()->set( 'update', false, 'info', true );

		?>

        <div class="d4p-install-confirm">
            <a class="button-primary" href="<?php echo panel()->a()->panel_url( 'about' ) ?>&install"><?php _e( "Click here to continue", "coreseo" ); ?></a>
        </div>
    </div>
	<?php echo coreseo()->recommend( 'install' ); ?>
</div>