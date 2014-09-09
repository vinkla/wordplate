<?php

/**
 * Format bytes to kilobytes, megabytes, gigabytes.
 *
 * @param  integer  $bytes
 * @param  integer $precision
 * @return string
 */
function format_bytes($bytes, $precision = 2)
{
	$units = array('B', 'KB', 'MB', 'GB', 'TB');

	$bytes = max($bytes, 0);
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
	$pow = min($pow, count($units) - 1);

	$bytes /= pow(1024, $pow);

	return sprintf('%s %s', round($bytes, $precision), $units[$pow]);
}
