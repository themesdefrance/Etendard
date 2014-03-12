(function($, window){
	$(function(){
		
		var supportsLocalStorage = !!window.localStorage;
		
		//tabs
		var $tabs = $('.cocorico-tab-wrapper');
		var tabIds = [],
			$activeTab = null,
			activeTabStorageKey = 'cocorico_active_tab';
		
		if ($tabs.length){
			$tabs.each(function(){
				tabIds.push($(this).attr('id'));
			});
			
			if (supportsLocalStorage && window.localStorage.getItem(activeTabStorageKey)){
				var hash = window.localStorage.getItem(activeTabStorageKey);
				if (tabIds.indexOf(hash) >= 0){
					$activeTab = $('#'+hash);
				}
			}
			
			if (!$activeTab) $activeTab = $tabs.first();
			$tabs.not($activeTab).hide();
			$('.nav-tab-wrapper a').filter('[href="#'+$activeTab.attr('id')+'"]').addClass('nav-tab-active');
		}
		
		$('.nav-tab-wrapper a').click(function(event){
			var $this = $(this);
			//make sure the event is for us
			var hrefHash = $this.attr('href').substring(1);
			if (tabIds.indexOf(hrefHash) >= 0){
				event.preventDefault();
				event.stopPropagation();
				
				//show/hdie tab
				$activeTab.hide();
				$activeTab = $('#'+hrefHash);
				$activeTab.show();
				
				//add classes
				$('.nav-tab-wrapper a').removeClass('nav-tab-active');
				$this.addClass('nav-tab-active');
				
				if (supportsLocalStorage) window.localStorage.setItem(activeTabStorageKey, hrefHash);
			}
		});
		
		//activate color pickers
		$('.cocorico-colorpicker').wpColorPicker();
		
		//media uploaders
		$('.cocorico-upload').each(function(){
			var $field = $(this),
				$parent = $field.parent(),
				$previewWrapper = $parent.find('.cocorico-preview-wrapper'),
				$preview = $parent.find('.cocorico-preview');
				
			$parent.find('.cocorico-upload-button').add($field).live('click', function(){
				if (this === $field[0] && $field.val() !== '') return;
				
				var frame = wp.media();
				
				frame.on('select', function(){
					var attachment = frame.state().get('selection').first();

					$field.val(attachment.attributes.url);
					
					if (attachment.attributes.type == 'image'){
						$preview.attr('src', attachment.attributes.url);
					}
					else{
						$preview.attr('src', attachment.attributes.icon);
					}
					
					$previewWrapper.slideDown();
				});
				
				frame.open();
			});
			
			$parent.find('.cocorico-remove').click(function(event){
				event.preventDefault();
				$field.val('');
				$previewWrapper.slideUp();
			});
		});
	});
})(jQuery, window);