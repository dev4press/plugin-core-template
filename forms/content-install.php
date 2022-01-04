<?php

use function Dev4Press\v37\Functions\panel;

?>
<div class="d4p-content d4p-setup-wrapper">
    <div class="d4p-update-info">
		<?php

		?>

        <div class="d4p-install-block">
            <h4>
				<?php _e( "All Done", "sweeppress" ); ?>
            </h4>
            <div>
				<?php _e( "Installation completed.", "sweeppress" ); ?>
            </div>
        </div>

		<?php

		sweeppress_settings()->set( 'install', false, 'info' );
		sweeppress_settings()->set( 'update', false, 'info', true );

		?>

        <div class="d4p-install-confirm">
            <a class="button-primary" href="<?php echo panel()->a()->panel_url( 'about' ) ?>&install"><?php _e( "Click here to continue", "sweeppress" ); ?></a>
        </div>
    </div>
	<?php echo sweeppress()->recommend( 'install' ); ?>
</div>