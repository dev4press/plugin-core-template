<?php

use Dev4Press\v36\WordPress;
use function Dev4Press\v36\Functions\panel;

$status = array();

?>
<div class="d4p-group d4p-dashboard-card d4p-card-double">
    <h3><?php _e( "Plugin Status", "gd-knowledge-base" ); ?></h3>
    <div class="d4p-group-inner">
		<?php

		if ( empty( $status ) ) {
			?>
            <span class="d4p-card-badge d4p-badge-right d4p-badge-ok"><i class="d4p-icon d4p-ui-check"></i><?php _e( "OK", "gd-knowledge-base" ); ?></span>
            <div class="d4p-status-message"><?php _e( "Everything appears to be in order.", "gd-knowledge-base" ); ?></div>
			<?php
		} else {
			?>
            <span class="d4p-card-badge d4p-badge-right d4p-badge-error"><i class="d4p-icon d4p-ui-warning"></i><?php _e( "Error", "gd-knowledge-base" ); ?></span>
            <div class="d4p-status-message">
				<?php _e( "There are some issues related to use of blocks.", "gd-knowledge-base" ); ?>
                <ul class="d4p-with-bullets d4p-full-width" style="font-weight: normal; margin-top: 10px;">
                    <li><?php echo join( '</li><li>', $status ); ?></li>
                </ul>
            </div>
			<?php
		}

		?>
    </div>
</div>