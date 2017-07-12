<?php
	status_header('200');
	header('Content-type: text/html;charset=' . get_bloginfo('charset'));
	header('Date: ' . date(DATE_RFC1123));
	$wp_last_modified = get_post_modified_time(DATE_RFC1123, true);
	$wp_etag = md5($wp_last_modified);
	header("Last-Modified: $wp_last_modified");
	header("Tag: $wp_etag");
	header('Cache-Control: public, max-age=604800, s-maxage=604800');
	header('Pragma:');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<title>
<?php
		bloginfo('name');
		wp_title();
?>
	</title>
</head>
<body <?php body_class(); ?>>
