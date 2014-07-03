<?php
/*
Plugin Name: Juxta
Plugin URI: http://clarknikdelpowell.com
Version: 0.1.0
Description: Comparison of two or more items. Juxtapose, dontcha know. (mid 19th century: from French juxtaposer, from Latin juxta ‘next’ + French poser ‘to place.’)
Author: Glenn Welser
Author URI: http://clarknikdelpowell.com/agency/people/glenn/

Copyright 2014+ Clark/Nikdel/Powell (email : glenn@clarknikdelpowell.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

////////////////////////////////////////////////////////////////////////////////
// PLUGIN CONSTANT DEFINITIONS
////////////////////////////////////////////////////////////////////////////////

//FILESYSTEM CONSTANTS
define('JUX_PATH', plugin_dir_path(__FILE__));
define('JUX_URL', plugin_dir_url(__FILE__));

//DATABASE CONSTANTS
// define('PTY_DB_VERSION', 0);
// define('PTY_DB_VERSION_OPTION', '${12:cjr}_db_version');

////////////////////////////////////////////////////////////////////////////////
// PLUGIN DEPENDENCIES
////////////////////////////////////////////////////////////////////////////////

require_once JUX_PATH.'class.jux-shortcode.php';

////////////////////////////////////////////////////////////////////////////////
// ROOT PLUGIN CLASS
////////////////////////////////////////////////////////////////////////////////

final class JUX_Juxta {

    public static function activation() {
        /* PLUGIN ACTIVATION LOGIC HERE */
    }

    public static function deactivation() {
        /* PLUGIN DEACTIVATION LOGIC HERE */
    }

    public static function uninstall() {
        /* PLUGIN DELETION LOGIC HERE */
    }

    public static function initialize() {
        JUX_Shortcode::initialize();
    }

}

////////////////////////////////////////////////////////////////////////////////
// PLUGIN INITIALIZATION
////////////////////////////////////////////////////////////////////////////////

register_activation_hook(__FILE__, array('JUX_Juxta', 'activation'));
register_deactivation_hook(__FILE__, array('JUX_Juxta', 'deactivation'));
register_uninstall_hook(__FILE__, array('JUX_Juxta', 'uninstall'));
JUX_Juxta::initialize();
