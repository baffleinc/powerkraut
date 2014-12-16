<footer>
	<div class="row">
		<div class="small-12 medium-4 columns">
			<?php dynamic_sidebar('Footer Column 1'); ?>
		</div>

		<div class="small-12 medium-4 columns">
			<?php dynamic_sidebar('Footer Column 2'); ?>
		</div>

		<div class="small-12 medium-4 columns last">
			<?php dynamic_sidebar('Footer Column 3'); ?>
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