jQuery(document).ready(function(){
	jQuery(".toggle-content").hide(); 
	
	jQuery(".toggle").toggle(function(){
		jQuery(this).addClass("toggle-open");
		jQuery(this).addClass("icon-tobottom");
		jQuery(this).removeClass("icon-toright");
		}, function () {
		jQuery(this).removeClass("toggle-open");
		jQuery(this).removeClass("icon-tobottom");
		jQuery(this).addClass("icon-toright");
	});
	
	jQuery(".toggle").click(function(){
		jQuery(this).next(".toggle-content").slideToggle();
	});
});