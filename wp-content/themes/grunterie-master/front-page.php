<?php get_header(); ?>

	<?php 
		$site_content = $GLOBALS[ 'site_content' ];
		foreach($site_content as $section) : 

		$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $section->ID ), 'original' );

	?>

	<section id="section-<?php echo $section->ID; ?>" class="parent">
		
		<header style="background-image: url(<?php echo $bg_img[0]; ?>)">
			<?php if($section->post_title == 'About') : ?>
				<h2 class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt=""></h2>
			<?php else : ?>
				<h2><?php echo $section->post_title; ?></h2>
			<?php endif; ?>
		</header>

		<ul class="tabs">
			<?php $x = 0; foreach($section->children as $child) : ?>
				<li class="<?php if($x == 0) echo 'active' ?>"><a href="#tab-<?php echo $child->ID; ?>"><?php echo $child->post_title; ?></a></li>
			<?php $x++; endforeach; ?>
		</ul>

		<?php $i = 0; foreach($section->children as $child) :
					$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $child->ID ), 'original' );
		 ?>

			<h2 class="show-for-small"><?php echo $child->post_title; ?></h2>

			<div class="tab-content row <?php if($i==0) echo 'active' ?>" id="tab-<?php echo $child->ID; ?>">

				<div class="show-for-medium-up medium-12 columns">
					<h2 class="child-title"><span><?php the_field('subtitle', $child->ID); ?></span></h2>
				</div>

				<div class="small-12 medium-8 columns">
					<?php echo wpautop($child->post_content); ?>	
				</div>

				<div class="small-12 medium-4 columns">
					<img src="<?php echo $feat_image[0]; ?>" alt="">
				</div>

			</div>
		<?php $i++; endforeach; ?>

	</section>

	<?php endforeach; ?>

	<section id="blog-posts">
		<header>
			<h2>blog</h2>
		</header>
		
		<ul class="no-bullet posts">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<li class="post">
					<a class="row" href="<?php the_permalink(); ?>">
						<div class="small-12 columns text-center">
								<h2><?php the_title(); ?></h2>
								<h3><?php the_field('subtitle'); ?></h3>
								<p>Posted on <?php the_time('d.m.Y'); ?></p>
						</div>
					</a>
				</li>
			<?php endwhile; endif; ?>
		</ul>
	</section>

<?php get_footer(); ?>