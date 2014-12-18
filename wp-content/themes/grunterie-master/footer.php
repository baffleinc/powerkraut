<footer style="background-image: url(<?php echo the_field('footer_background', 'option'); ?>);">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<ul><?php dynamic_sidebar('Footer Column 1'); ?></ul>
			
		</div>

		<div class="small-12 medium-6 columns">
			<ul><?php dynamic_sidebar('Footer Column 2'); ?></ul>
		</div>
	</div>
</footer>

<div class="copyright">
	<div class="row">
		<div class="small-12 columns"><p>&copy; powerkraut 2014 All Rights Reserved</p></div>
	</div>
</div>


<?php wp_footer(); ?>
<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
</body>
</html>