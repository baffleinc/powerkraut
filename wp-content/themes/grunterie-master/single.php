<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'original' );
	?>
	<header style="background-image: url(<?php echo $img[0]; ?>)">
		&nbsp;
	</header>
	<div class="row content">
		<div class="small-12 columns">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

			<div class="nav">
				<?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i> %title'); ?>
				<?php next_post_link('%link', '%title <i class="fa fa-arrow-right"></i>'); ?>
			</div>

			<div class="fb-comments" data-width="100%" data-numposts="5" data-colorscheme="light" data-href="<?php the_permalink(); ?>"></div>
		</div>
	</div>

<?php endwhile; endif; ?>
		
<?php get_footer(); ?>