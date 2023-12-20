<?php

namespace SKTPRAC;

// if direct access than exit the file.
defined('ABSPATH') || exit;

$classmaps = [
	'Ajax'                 => 'includes/ajax.php',
	'Assets'               => 'includes/assets.php',
	'Shortcode'            => 'includes/shortcode.php',
	'Hooks'            	   => 'includes/hooks.php',
    'Integrations'         => 'includes/integrations/integrations.php',
];

return $classmaps;
