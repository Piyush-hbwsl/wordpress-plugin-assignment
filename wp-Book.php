<?php
/**
 * @package  wpBook
 */
/*
Plugin Name: wpBook
Plugin URI: https://github.com/Piyush-hbwsl/wordpress-plugin-assignment
Description: A Plugin to make custom post type and taxanomies.
Version: 1.0.0
Author: Piyush Agarwal
Author URI: https://github.com/Piyush-hbwsl
License: GPLv2 or later
Text Domain: /languages
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

class wpBookPlugin
{
	function __construct(){
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}

	function activate() {
		$this->custom_post_type();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}

	function custom_post_type() {
		register_post_type( 'Book', array( 'public' => true, 'label' => 'Books' ) );
	}
}

if ( class_exists( 'wpBookPlugin' ) ) {
	$wpBook = new wpBookPlugin();
}

register_activation_hook( __FILE__, array( $wpBook, 'activate' ) );

register_deactivation_hook( __FILE__, array( $wpBook, 'deactivate' ) );
