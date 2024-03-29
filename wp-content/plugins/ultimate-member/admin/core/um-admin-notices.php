<?php

class UM_Admin_Notices {

	function __construct() {
		
		add_action('admin_init', array(&$this, 'create_languages_folder') );

		add_action('admin_notices', array(&$this, 'main_notices'), 1);
		
		add_action('admin_notices', array(&$this, 'localize_note'), 2);
		
		add_action('admin_notices', array(&$this, 'show_update_messages'), 10);
		
	}
	
	/***
	***	@to store plugin languages
	***/
	function create_languages_folder() {
		
		global $ultimatemember;
		
		$path = $ultimatemember->files->upload_basedir;
		$path = str_replace('/uploads/ultimatemember','',$path);
		$path = $path . '/languages/plugins/';
		$path = str_replace('//','/',$path);
		
		if ( !file_exists( $path ) ) {
			$old = umask(0);
			@mkdir( $path, 0777, true);
			umask($old);
		}
		
	}
	
	/***
	***	@show main notices
	***/
	function main_notices(){
		global $ultimatemember;
		$hide_register_notice = get_option('um_can_register_notice');
		
		if ( !get_option('um_passwords_secured') ) {
			echo '<div class="updated error"><p>';
		
			echo sprintf(__( 'Secure your database by removing hardcoded user passwords now. Click <a href="%s">here</a> to secure your database.', 'ultimatemember' ), add_query_arg('um_adm_action', 'um_passwords_secured') );
		
			echo '</p></div>';
		}
		
		if ( !get_option('users_can_register') && !$hide_register_notice ) {
			
			echo '<div class="updated" style="border-color: #3ba1da;"><p>';
		
			echo sprintf(__( 'Registration is disabled. Please go to the <a href="%s">general settings</a> page in the WordPress admin and select anyone can register. <a href="%s">Hide this notice</a>', 'ultimatemember' ), admin_url('options-general.php'), add_query_arg('um_adm_action', 'um_can_register_notice') );
		
			echo '</p></div>';
		
		}
		
		$hide_exif_notice = get_option('um_hide_exif_notice');
		
		if ( !extension_loaded('exif') && !$hide_exif_notice ) {
			
			echo '<div class="updated" style="border-color: #3ba1da;"><p>';
		
			echo sprintf(__( 'Exif is not enabled on your server. Mobile photo uploads will not be rotated correctly until you enable the exif extension. <a href="%s">Hide this notice</a>', 'ultimatemember' ), add_query_arg('um_adm_action', 'um_hide_exif_notice') );
		
			echo '</p></div>';
		
		}
		
		// Regarding page setup
		$pages = $ultimatemember->permalinks->core;
		if ( $pages && is_array( $pages ) ) {
			
			$err = false;
			
			foreach( $pages as $slug => $page_id ) {
				
				$page = get_post( $page_id );
				if ( !isset( $page->ID ) && in_array( $slug, array( 'user','account','members','register','login','logout','password-reset' ) ) ) {
					$err = true;
				}
				
			}
			
			if ( $err ) {
				echo '<div class="updated" style="border-color: #3ba1da;"><p>' . __('One or more of your Ultimate Member pages are not correctly setup. Please visit <strong>Ultimate Member > Settings</strong> to re-assign your missing pages.','ultimatemember') . '</p></div>';
			}
			
			if ( isset( $pages['user'] ) ) {
				$test = get_post( $pages['user'] );
				if ( isset( $test->post_parent ) && $test->post_parent > 0 ) {
					echo '<div class="updated" style="border-color: #3ba1da;"><p>' . __('Ultimate Member Setup Error: User page can not be a child page.','ultimatemember') . '</p></div>';
				}
			}
			
			if ( isset( $pages['account'] ) ) {
				$test = get_post( $pages['account'] );
				if ( isset( $test->post_parent ) && $test->post_parent > 0 ) {
					echo '<div class="updated" style="border-color: #3ba1da;"><p>' . __('Ultimate Member Setup Error: Account page can not be a child page.','ultimatemember') . '</p></div>';
				}
			}
			
		}
		
		do_action('um_admin_after_main_notices');
		
	}
	
	
	/***
	***	@localization notice
	***/
	function localize_note() {
		global $ultimatemember;
		
		$locale = get_option('WPLANG');
		if ( !$locale ) return;
		if ( strstr( $locale, 'en_' ) ) return; // really, english!
		if ( file_exists( WP_LANG_DIR . '/plugins/ultimatemember-' . $locale . '.mo' ) ) return;
		
		if ( isset( $ultimatemember->available_languages[$locale] ) ) {
		
			$download_uri = add_query_arg('um_adm_action', 'um_language_downloader');
				
			echo '<div class="updated" style="border-color: #3ba1da;"><p>';
			
			echo sprintf(__('Your site language is <strong>%1$s</strong>. Good news! Ultimate Member is already available in <strong>%2$s language</strong>. <a href="%3$s">Download the translation</a> files and start using the plugin in your language now.','ultimatemember'), $locale, $ultimatemember->available_languages[$locale], $download_uri );
			
			echo '</p></div>';
		
		} else {
			
			$hide_locale_notice = get_option('um_hide_locale_notice');
			if ( !$hide_locale_notice ) {
				
			echo '<div class="updated" style="border-color: #3ba1da;"><p>';
				
			echo sprintf(__('Ultimate Member has not yet been translated to your langeuage: <strong>%1$s</strong>. If you have translated the plugin you need put these files <code>ultimatemember-%1$s.po and ultimatemember-%1$s.mo</code> in <strong>/wp-content/languages/plugins/</strong> for the plugin to be translated in your language. <a href="%2$s">Hide this notice</a>','ultimatemember'), $locale, add_query_arg('um_adm_action', 'um_hide_locale_notice') );
				
			echo '</p></div>';
			
			}
			
		}
	
	}
	
	/***
	***	@updating users
	***/
	function show_update_messages(){

		if ( !isset($_REQUEST['update']) ) return;

		$update = $_REQUEST['update'];
		switch($update) {
			
			case 'confirm_delete':
				$wp_http_referer = isset( $_REQUEST['_wp_http_referer'] ) ? $_REQUEST['_wp_http_referer']: '';
				$confirm_uri = sanitize_text_field( urldecode( $wp_http_referer ) );
				$users = '';
				
				if( isset( $_REQUEST['user'] ) ){
					foreach( $_REQUEST['user'] as $user_id ) {
						$user = get_userdata( $user_id );
						$users .= '#' . $user_id . ': ' . $user->user_login . '<br />';
					}
				}
				
				$ignore = admin_url('users.php');
				
				$messages[0]['err_content'] = sprintf(__('Are you sure you want to delete the selected user(s)? The following users will be deleted: <p>%s</p> <strong>This cannot be undone!</strong>','ultimatemember'), $users);
				$messages[0]['err_content'] .= '<p><a href="'. esc_html( $confirm_uri ) .'" class="button-primary">' . __('Remove','ultimatemember') . '</a>&nbsp;&nbsp;<a href="'.$ignore.'" class="button">' . __('Undo','ultimatemember') . '</a></p>';
				
				break;
				
			case 'language_updated':
				$messages[0]['content'] = __('Your translation files have been updated successfully.','ultimatemember');
				break;
				
			case 'purged_temp':
				$messages[0]['content'] = __('Your temp uploads directory is now clean.','ultimatemember');
				break;
				
			case 'cleared_cache':
				$messages[0]['content'] = __('Your user cache is now removed.','ultimatemember');
				break;
				
			case 'form_duplicated':
				$messages[0]['content'] = __('The form has been duplicated successfully.','ultimatemember');
				break;
		
			case 'user_updated':
				$messages[0]['content'] = __('User has been updated.','ultimatemember');
				break;
				
			case 'users_updated':
				$messages[0]['content'] = __('Users have been updated.','ultimatemember');
				break;
				
			case 'err_users_updated':
				$messages[0]['err_content'] = __('Super administrators cannot be modified.','ultimatemember');
				$messages[1]['content'] = __('Other users have been updated.','ultimatemember');
				
		}
		
		if ( !empty( $messages ) ) {
			foreach( $messages as $message ) {
				if ( isset($message['err_content'])) {
					echo '<div class="error"><p>' . $message['err_content'] . '</p></div>';
				} else {
					echo '<div class="updated" style="border-color: #3ba1da;"><p>' . $message['content'] . '</p></div>';
				}
			}
		}
		
	}

}