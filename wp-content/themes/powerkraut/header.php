<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php

		$menu_items = wp_get_nav_menu_items( 'Site Structure' ); 

		$site_content = array();

		// top level content
		foreach($menu_items as $item){
			if(!$item->post_parent){
				$site_content[$item->ID] = get_post($item->object_id);
				$site_content[$item->ID]->children = array(); 
			}
		}

		// adding children 
		foreach($menu_items as $item){
			if($item->post_parent){
				$site_content[$item->menu_item_parent]->children[] = get_post($item->object_id);
			}
		}

		$GLOBALS[ 'site_content' ] = $site_content;

	?>

	<header>
		<ul>
			<li class="logo"><a href="#top">Powerkraut</a></li>
			<?php foreach($menu_items as $item) : if($item->post_parent == 0) : ?>
				<?php if(is_front_page()) : ?>
					<li><a href="#section-<?php echo $item->object_id; ?>"><?php echo $item->title; ?></a></li>
				<?php else : ?>
					<li><a href="<?php bloginfo('url'); ?>#section-<?php echo $item->object_id; ?>"><?php echo $item->title; ?></a></li>
				<?php endif; ?> <!-- end is front page -->
			<?php endif; endforeach; ?>
		</ul>
	</header>

	<div id="content" class="site-content">
