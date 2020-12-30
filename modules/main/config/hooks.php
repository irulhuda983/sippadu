<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['display_override'][] = array(
	'class' => 'Compress',
	'function' => 'initialize',
	'filename' => 'Compress.php',
	'filepath' => 'hooks'
);

$hook['post_controller_constructor'][] = array(
    'class' => 	'Config',
    'function' => 'initialize',
    'filename' => 'Config.php',
    'filepath' => 'hooks'
);

$hook['post_controller_constructor'][] = array(
    'class' => 'LanguageLoader',
    'function' => 'initialize',
    'filename' => 'Language.php',
    'filepath' => 'hooks'
);