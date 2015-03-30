<?php

/**
 * Custom footer text.
 *
 * @return string
 */
add_filter('admin_footer_text', function () {
    return config('footer.footer_text');
});
