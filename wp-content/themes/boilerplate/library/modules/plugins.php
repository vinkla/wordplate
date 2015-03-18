<?php

/**
 * Add Roots Soil plugin features.
 */
if (count($config['plugins']['soil']['features']) > 0) {
    foreach ($config['plugins']['soil']['features'] as $feature) {
        add_theme_support($feature);
    }
}
