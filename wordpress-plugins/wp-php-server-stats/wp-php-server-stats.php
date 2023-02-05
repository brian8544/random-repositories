<?php
/*
Plugin Name:  BrianCP
Plugin URI:   https://github.com/brian8544/wp-php-server-stats
Description:  Control Panel for Windows / Linux operating systems.
Version:      1.0
Author:       brian8544
Author URI:   https://www.brianoost.com
Text Domain:  wp-php-server-stats

If the host OS is Windows, open 'php.ini' & add:
---
[PHP_COM_DOTNET]
extension=php_com_dotnet.dll
---
Otherwise this script will NOT work.
*/

require_once('loader.php');