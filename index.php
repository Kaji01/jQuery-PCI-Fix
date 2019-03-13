<?php
	/**
	 * Plugin Name: jQuery PCI Fix
	 * Description: Patches an issue with WordPress's embedded jQuery version to enable a site to pass PCI DSS compliance scans.
	 * Version: 1.0
	 * Author: Big Cloud Media
	 * Author URI: https://bigcloudmedia.com
	 *
	 * @author	BigCloudMedia
	 */
	
	/**
	 * Implement a plug for an XSS security hole that exists in WordPress's embedded version of jQuery
	 *
	 * Addresses the vulnerability identified in CVE-2015-9251
	 *
	 * Solution Credit:
	 * @url https://www.cadence-labs.com/2018/07/magento-outdated-jquery-version-how-to-patch-without-upgrading-cve-2015-9251/
	 *
	 * Article provides a test link for ensuring the solution works.
	 */
	function bcm_enm_jquery_security_fix() {
		$js_path = str_replace('index.php', 'js', __FILE__);
		$js_url = str_replace( ABSPATH, get_bloginfo('url').'/', $js_path);
		
		wp_register_script(
			'bcm_enm_pci_security_fix',
			$js_url.'/security_fix.js',
			array('jquery')
		);
		
		wp_enqueue_script('bcm_enm_pci_security_fix');
	}
	
	add_action('wp_enqueue_scripts', 'bcm_enm_jquery_security_fix');
	
