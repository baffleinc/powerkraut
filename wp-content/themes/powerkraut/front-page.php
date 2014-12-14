<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<?php 
		$site_content = $GLOBALS[ 'site_content' ];
		foreach($site_content as $section) : 
	?>

	<section id="section-<?php echo $section->ID; ?>" style="border: 1px solid red;">
		
		<header>
			<h1><?php echo $section->post_title; ?></h1>
		</header>
		<ul class="tabs">
			<?php foreach($section->children as $child) : ?>
				<li><a href="#tab-<?php echo $child->ID; ?>"><?php echo $child->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>

		<?php foreach($section->children as $child) : ?>
			<h2 class="hide-for-mobile"><?php echo $child->post_title; ?></h2>
			<div class="tab-content" id="tab-<?php echo $child->ID; ?>">
				<?php echo wpautop($child->post_content); ?>
			</div>
		<?php endforeach; ?>

	</section>

	<?php endforeach; ?>

	<section id="blog-posts">
		<h2>From the blog</h2>
		<ul class="posts">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<li class="post">
					<?php the_title(); ?>
				</li>
			<?php endwhile; endif; ?>
		</ul>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
