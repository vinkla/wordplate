<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Custom footer text.
 *
 * @return string
 */
add_filter('admin_footer_text', function () {
    return config('footer.footer_text', 'Thank you for creating with WordPress.');
});
