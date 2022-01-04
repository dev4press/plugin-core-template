/*jslint regexp: true, nomen: true, sloppy: true, eqeq: true, vars: true, white: true, plusplus: true, maxerr: 50, indent: 4 */
/*global sweeppress_meta_data, wp */

;(function($, window, document, undefined) {
    window.wp = window.wp || {};
    window.wp.sweeppress = window.wp.sweeppress || {};

    window.wp.sweeppress.meta = {
        init: function() {

        }
    };

    $(document).ready(function() {
        wp.sweeppress.meta.init();
    });
})(jQuery, window, document);
