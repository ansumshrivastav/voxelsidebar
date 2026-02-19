<?php
/**
 * Plugin Name: Voxel Sidebar Toggle
 * Plugin URI: https://diimetechnology.com
 * Description: Adds a collapsible sidebar menu with toggle functionality and localStorage persistence. Prevents layout shift on page reload.
 * Version: 1.0.0
 * Author: Ansum (Diime Technology)
 * Author URI: https://diimetechnology.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: voxel-sidebar-toggle
 *
 * @package Voxel_Sidebar_Toggle
 * @author Ansum
 * @copyright Diime Technology
 * @license GPL-2.0-or-later
 */

defined( 'ABSPATH' ) || exit;

define( 'VOXEL_SIDEBAR_VERSION', '1.0.0' );
define( 'VOXEL_SIDEBAR_PATH', plugin_dir_path( __FILE__ ) );
define( 'VOXEL_SIDEBAR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue plugin assets.
 */
function voxel_sidebar_toggle_enqueue_assets() {
	wp_enqueue_style(
		'voxel-sidebar-toggle',
		VOXEL_SIDEBAR_URL . 'assets/public.css',
		array(),
		VOXEL_SIDEBAR_VERSION
	);

	wp_enqueue_script(
		'voxel-sidebar-toggle',
		VOXEL_SIDEBAR_URL . 'assets/public.js',
		array(),
		VOXEL_SIDEBAR_VERSION,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'voxel_sidebar_toggle_enqueue_assets' );
add_action( 'admin_enqueue_scripts', 'voxel_sidebar_toggle_enqueue_assets' );

/**
 * Output critical CSS and script in head to prevent layout shift on load.
 * Runs before body renders so collapsed state is applied from first paint.
 */
function voxel_sidebar_toggle_head_critical() {
	?>
	<style id="voxel-sidebar-critical">
		html.voxel-sidebar-collapsed .main-sidebar {
			width: 72px !important;
			padding-top: 20px;
		}
		html.voxel-sidebar-collapsed .main-sidebar .menu-text {
			display: none;
		}
		html.voxel-sidebar-collapsed .main-sidebar .menu-item .ts-item-link {
			border-radius: 100% !important;
		}
		html.voxel-sidebar-collapsed .main-sidebar .menu-item .ts-item-link span {
			opacity: 0;
		}
		html.voxel-sidebar-collapsed .content-wrapper {
			margin-left: 72px !important;
		}
		@media screen and (max-width: 767px) {
			html.voxel-sidebar-collapsed .content-wrapper {
				margin-left: 0 !important;
			}
		}
	</style>
	<script>
		(function() {
			if (localStorage.getItem('voxelSidebarToggleStatus') === 'collapsed') {
				document.documentElement.classList.add('voxel-sidebar-collapsed');
			}
		})();
	</script>
	<?php
}
add_action( 'wp_head', 'voxel_sidebar_toggle_head_critical', 1 );
add_action( 'admin_head', 'voxel_sidebar_toggle_head_critical', 1 );
