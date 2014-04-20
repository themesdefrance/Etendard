(function($){
	$(function(){
		$('ul.slip-target').each(function(){
			new Slip(this);
			
			this.addEventListener('slip:reorder', function(e){
				e.target.parentNode.insertBefore(e.target, e.detail.insertBefore);
				return false;
			}, false);
			
			this.addEventListener('slip:beforeswipe', function(e){
				e.preventDefault();
			}, false);
			
			this.addEventListener('slip:beforewait', function(e){
				e.preventDefault();
			}, false);
		});
	});
})(jQuery);