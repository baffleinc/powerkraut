<?php get_header(); ?>

	<?php 
		$site_content = $GLOBALS[ 'site_content' ];

		$posts = get_posts(array('post_type' => 'post'));


		foreach($site_content as $section) : 

		$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $section->ID ), 'original' );

	?>

		<section id="<?php echo sanitize_title($section->post_title); ?>" class="parent <?php if($section->post_title == "Blog") echo 'blog-posts' ?>">
			
			<header style="background-image: url(<?php echo $bg_img[0]; ?>)">
				<?php if($section->post_title == 'About') : ?>
					<h1 class="logo"><img alt="About Powerkraut" src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt=""></h1>
				<?php else : ?>
					<h1><?php echo $section->post_title; ?></h1>
				<?php endif; ?>
			</header>

			<?php if($section->post_title == "Blog") : ?>

				<ul class="no-bullet posts">
					<?php foreach($posts as $post) : ?>
						<li class="post">
							<a class="row" href="<?php echo get_permalink($post->ID); ?>">
								<div class="small-12 columns text-center">
										<h2><?php echo $post->post_title; ?></h2>
										<h3><?php get_field('subtitle', $post->post_title); ?></h3>
										<p>Posted on <?php echo get_the_time('d.m.Y', $post->ID); ?></p>
								</div>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php else : ?>
				<ul class="tabs">
					<?php $x = 0; foreach($section->children as $child) : ?>
						<li class="<?php if($x == 0) echo 'active' ?>"><a href="#<?php echo sanitize_title($child->post_title); ?>"><?php echo $child->post_title; ?></a></li>
					<?php $x++; endforeach; ?>
				</ul>

				<?php $i = 0; foreach($section->children as $child) :
							$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $child->ID ), 'original' );
				 ?>

					<h2 class="show-for-small"><?php echo $child->post_title; ?></h2>

					<div class="tab-content row <?php if($i==0) echo 'active' ?>" id="<?php echo sanitize_title($child->post_title); ?>">

						<div class="show-for-medium-up medium-12 columns">
							<h2 class="child-title"><span><?php the_field('subtitle', $child->ID); ?></span></h2>
						</div>

						<div class="small-12 medium-6 columns">
							<?php echo do_shortcode(wpautop($child->post_content)); ?>	
						</div>

						<div class="small-12 medium-6 columns">
							<img src="<?php echo $feat_image[0]; ?>" alt=""><br><br>
							<?php if (class_exists('MultiPostThumbnails')) :
							    MultiPostThumbnails::the_post_thumbnail(
							        'page',
							        'secondary-image',
							        $child->ID
							    );
							endif; ?>
						</div>
					</div>
				<?php $i++; endforeach; ?>
			<?php endif; ?>
		</section>

	<?php endforeach; ?>

<?php get_footer(); ?>