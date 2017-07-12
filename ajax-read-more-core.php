<?php 

function is_ajax_read_more() {
	return ($_GET['ajax-read-more-mode']);
}

function ajax_read_more_validate_options($options) {
	if (!is_array($options)) {
		$options = array();
	} else {
		$options['scrollLowBound'] = (int)($options['scrollLowBound']);
		if (0 > $options['scrollLowBound']) 
			$options['scrollLowBound'] = 0;
		if (0 == $options['scrollLowBound']) 
			unset($options['scrollLowBound']);

		if (isset($options['scroll'])) {
			if (is_bool($options['scroll'])) {
				if ($options['scroll']) 
					unset($options['scroll']);
			} elseif ('disable' == $options['scroll']) {
				$options['scroll'] = false;
			} else {
				unset($options['scroll']);
			};
		};

		if (
			('default' == $options['errorMessageMode'])
			or ('' == $options['errorMessage'])
		)
			unset($options['errorMessage']);
		unset($options['errorMessageMode']);

		if (
			('' == $options['loadingClass'])
			or ('loading' == $options['loadingClass'])
		)
			unset($options['loadingClass']);

		if (
			('' == $options['errorClass'])
			or ('loading-error' == $options['errorClass'])
		)
			unset($options['errorClass']);

		if (
			('' == $options['animateSpeed'])
			or ('slow' == $options['animateSpeed'])
		) {
			unset($options['animateSpeed']);
		} elseif (is_numeric($options['animateSpeed'])) {
			$options['animateSpeed'] = (int)$options['animateSpeed'];
			if (100 > $options['animateSpeed']) 
				$options['animateSpeed'] = 100;
			if (1000 < $options['animateSpeed']) 
				$options['animateSpeed'] = 1000;
		} else {
			if ('fast' != $options['animateSpeed']) 
				unset($options['animateSpeed']);
		};
			
		if (
			('' == $options['scrollToSelector'])
			or ('.entry-header' == $options['scrollToSelector'])
		) {
			unset($options['scrollToSelector']);
		} elseif ('.more-link-container' == $options['scrollToSelector']) {
			$options['scrollToSelector'] = '.entry-part:last';
		};

		if (
			('' == $options['parentScrollableEl'])
			or ('html,body' == $options['parentScrollableEl'])
		) {
			unset($options['parentScrollableEl']);
		};

	};
	return $options;
}

if (is_admin()) {
	include_once('admin/admin.php');
};

add_action('init', 'ajax_read_more_init');

function ajax_read_more_init() {
	global $ajax_read_more_cfg;
	global $options_script_position_cfg;
	
	$ajax_read_more_cfg['options'] = ajax_read_more_validate_options(
		get_option($ajax_read_more_cfg['options_id'])
	);

    if(!is_admin()) {
		if(!is_ajax_read_more()) {
			add_filter('the_content', 'ajax_read_more_the_content', 11); // сразу после "встроенных" фильтров
		} else {
			add_action('wp', 'ajax_read_more_wp');
		};
		require_once('jquery/ajax/readmore/jquery.ajax.readmore.php');
		include_once('css/styles.php');
		add_action('wp_enqueue_scripts', 'ajax_read_more_wp_enqueue_scripts');
	};
};

function ajax_read_more_wp_enqueue_scripts() {
	global $ajax_read_more_cfg;

	wp_register_script(
		'readmore', 
		$ajax_read_more_cfg['url'] . "ajax-read-more.js",
		array('jquery.ajax.readmore'),
		$ajax_read_more_cfg['ver'],
		get_option('options-script-position') == 'footer'
	);
	wp_enqueue_script('readmore');

	if ($ajax_read_more_cfg['options'].count) { // выводим в html только опции, чьи значения отличны от default
		wp_localize_script(
			'readmore',
			'AJAXReadMoreConfig',
 			$ajax_read_more_cfg['options']
		);	
	};
};

function ajax_read_more_the_content($content) {
	if (!is_singular() and !is_feed() and !$more) {
		return 
			'<div id="post-entry-excerpt-' . get_the_ID() . '" class="entry-part">'
			. ajax_read_more_sanitize_content($content)
			. '</div>'
			. '<div id="post-footer-' . get_the_ID() . '" class="post-footer clear">'
			. apply_filters( 'the_content_footer', '' )
			. '</div>'
		;
	} else {
		return $content;
	};
};

function ajax_read_more_wp() {
	if (have_posts()) {
		the_post();
		include('inc/ajax-response-html-wrappers/header.php');
		the_content(null, true);
		include('inc/ajax-response-html-wrappers/footer.php');
		die();
	} else {
		wp_die(
			'Post not found.',
			'Post not found.',
			array('response'=>404)
		);
	}
};

function ajax_read_more_sanitize_content($content) {
	return 
		preg_replace(
			'/<p>\s*<\/p>/s',
			'',
			force_balance_tags($content)
		)
	;
}
?>