// $(document).foundation();

(function($){
	$(function(){
		$('ul.tabs a').on('click', function(e){

			e.preventDefault(); 
			var scope = $(this).parents('.parent');
			var target = $(this).attr('href');

			scope.find('li.active, .tab-content.active').removeClass('active');

			$(this).parent().addClass('active');
			scope.find(target).addClass('active');
		});

		$('.mobile-menu').on('click', function(evt){
			evt.preventDefault();
			$('body').toggleClass('lock');
			$(this).find('i').toggleClass('fa-bars fa-arrow-up');
			$('ul.inline-list.main-menu').toggleClass('visible');
		});

		$('h2.toggle-accordion a').on('click', function(evt){

			evt.preventDefault();
			var scope = $(this).parents('.parent');
			var target = $(this).attr('href');
			var current = $(this).parent().hasClass('active');

			scope.find('.tab-content.active, h2.accordion-toggle.active').removeClass('active');

			if(!current){
				$(this).parent().addClass('active');
				scope.find(target).addClass('active');	

				var st = $(this).parent().offset().top;

				console.log(st);

				$('html,body').animate({
					scrollTop: st - 100
				}, 1000);
			}
		});

		$('.main-menu li a').on('click', function(){

			if(!$('.mobile-menu').is(':visible')) return;

			$('.main-menu').removeClass('visible');
		})


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
})(jQuery);

	