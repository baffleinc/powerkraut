<!doctype html>
<html lang="en" dir="ltr" class="no-js">
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />
	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />
	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />
<?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
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

	<nav>
		<ul class="inline-list">
			<li class="logo"><a href="#top">Powerkraut</a></li>
			<?php foreach($menu_items as $item) : if($item->post_parent == 0) : ?>
				<?php if(is_front_page()) : ?>
					<li><a href="#section-<?php echo $item->object_id; ?>"><?php echo $item->title; ?></a></li>
				<?php else : ?>
					<li><a href="<?php bloginfo('url'); ?>#section-<?php echo $item->object_id; ?>"><?php echo $item->title; ?></a></li>
				<?php endif; ?> <!-- end is front page -->
			<?php endif; endforeach; ?>
		</ul>
	</nav>
