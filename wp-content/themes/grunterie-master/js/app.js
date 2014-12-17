// $(document).foundation();

(function($){
	$(function(){
		$('ul.tabs a').on('click', function(e){
			e.preventDefault(); 

			var scope = $(this).parents('.parent');
			var target = $(this).attr('href').replace('', '');

			scope.find('li.active, .tab-content.active').removeClass('active');

			$(this).parent().addClass('active');
			scope.find(target).addClass('active');
		});

		$(function() {
			$('nav a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			});
		});
	});
})(jQuery);

	