<?php

$status = array();

?>
<div class="d4p-group d4p-dashboard-card d4p-card-double">
    <h3><?php _e( "Plugin Status", "sweeppress" ); ?></h3>
    <div class="d4p-group-inner">
		<?php

		if ( empty( $status ) ) {
			?>
            <span class="d4p-card-badge d4p-badge-right d4p-badge-ok"><i class="d4p-icon d4p-ui-check"></i><?php _e( "OK", "sweeppress" ); ?></span>
            <div class="d4p-status-message"><?php _e( "Everything appears to be in order.", "sweeppress" ); ?></div>
			<?php
		} else {
			?>
            <span class="d4p-card-badge d4p-badge-right d4p-badge-error"><i class="d4p-icon d4p-ui-warning"></i><?php _e( "Error", "sweeppress" ); ?></span>
            <div class="d4p-status-message">
				<?php _e( "There are some issues related to use of blocks.", "sweeppress" ); ?>
                <ul class="d4p-with-bullets d4p-full-width" style="font-weight: normal; margin-top: 10px;">
                    <li><?php echo join( '</li><li>', $status ); ?></li>
                </ul>
            </div>
			<?php
		}

		?>
    </div>
</div>