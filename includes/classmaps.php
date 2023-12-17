<?php

namespace SKTPRAC;

// if direct access than exit the file.
defined('ABSPATH') || exit;

$classmaps = [
	'Admin'              => 'includes/admin.php',
	'Ajax'               => 'includes/ajax.php'
];

return $classmaps;
