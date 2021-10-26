<?php
/*
 * @wordpress-plugin
 * Plugin Name:       Disable Auto Update
 * Description:       disable-auto-update.
 * Version:           1.0.0
 * Author:            Will Feng
 * Author URI:        http://blog.waicung.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-auto-update
 * Domain Path:       /languages
 */
add_filter('automatic_updater_disabled', '__return_true');	// 彻底关闭自动更新

remove_action('init', 'wp_schedule_update_checks');	// 关闭更新检查定时作业
wp_clear_scheduled_hook('wp_version_check');			// 移除已有的版本检查定时作业
wp_clear_scheduled_hook('wp_update_plugins');		// 移除已有的插件更新定时作业
wp_clear_scheduled_hook('wp_update_themes');			// 移除已有的主题更新定时作业
wp_clear_scheduled_hook('wp_maybe_auto_update');		// 移除已有的自动更新定时作业

remove_action( 'admin_init', '_maybe_update_core' );		// 移除后台内核更新检查

remove_action( 'load-plugins.php', 'wp_update_plugins' );	// 移除后台插件更新检查
remove_action( 'load-update.php', 'wp_update_plugins' );
remove_action( 'load-update-core.php', 'wp_update_plugins' );
remove_action( 'admin_init', '_maybe_update_plugins' );

remove_action( 'load-themes.php', 'wp_update_themes' );		// 移除后台主题更新检查
remove_action( 'load-update.php', 'wp_update_themes' );
remove_action( 'load-update-core.php', 'wp_update_themes' );
remove_action( 'admin_init', '_maybe_update_themes' );
?>