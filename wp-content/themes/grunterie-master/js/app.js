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
		})
	});
})(jQuery);

	