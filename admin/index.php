<?php
$form = new Cocorico(ETENDARD_COCORICO_PREFIX);

$form->startWrapper('titre');
$form->component('raw', __('Etendard Settings', 'etendard'));
$form->endWrapper('titre');

$form->groupHeader(array('general'=>__('General', 'etendard'), 
						 'apparence'=>__('Appearance', 'etendard'), 
						 'portfolio'=>__('Portfolio', 'etendard'),
						 'addons'=>__('Addons', 'etendard')));

//Tab general
$form->startWrapper('tab', 'general');

$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>substr(ETENDARD_LICENSE_KEY, strlen(ETENDARD_COCORICO_PREFIX)),
					 'label'=>__("License", 'etendard'),
					 'description'=>__("Enter your licence key in order to receive Etendard updates. You'll find it in the confirmation email we sent you after your purchase.", 'etendard')));

$form->setting(array('type'=>'text',
					 'name'=> 'title',
					 'label'=>__("Title", 'etendard'),
					 'description'=>__("Title in the homepage banner.", 'etendard'),
					 'options'=>array(
					 	'default'=>get_bloginfo('name')
					 	)
					 ));

$form->setting(array('type'=>'text',
					 'name'=>'subtitle',
					 'label'=>__("Subtitle", 'etendard'),
					 'description'=>__("Subtitle in the homepage banner.", 'etendard'),
					 'options'=>array(
					 	'default'=>get_bloginfo('description')
					 	)
					 ));

$form->ordre('home_blocks',
				__("Choose elements to display on the homepage and organize them with drag & drop", 'etendard'),
				array(  'titre'=>__('Title and subtitle', 'etendard'),
						'diaporama'=>__('Slider', 'etendard'),
						'content'=>__('Content', 'etendard'),
						'cta'=>__("Call to action", 'etendard'),
						'services'=>__('Services', 'etendard'),
						'portfolio'=>__('Last projects', 'etendard'),
						'articles'=>__('Last posts', 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'footer_gauche',
					 'label'=>__("Footer", 'etendard'),
					 'description'=>__('Left footer content. The following HTML tags are allowed : &lt;a href=&quot;LINK&quot;&gt;TEXT_LINK&lt;/a&gt;, &lt;strong&gt;BOLD_TEXT&lt;/strong&gt;, &lt;em&gt;ITALIC_TEXT&lt;/em&gt;, &lt;img src=&quot;IMAGE_URL&quot;&gt;.', 'etendard'),
					 'options'=>array(
					 	'default'=>__('<strong>2014</strong> - Etendard by <a href="https://www.themesdefrance.fr/" target="_blank">Themes de France</a>', 'etendard')
					 	)
					 ));

$form->endForm();
$form->endWrapper('tab');

//Tab apparence
$form->startWrapper('tab', 'apparence');

$form->startForm();

$form->setting(array('type'=>'color',
					 'name'=>'color',
					 'label'=>__("Main color", 'etendard'),
					 'description'=>__("This color will be used across your site for buttons, links, etc.", 'etendard')));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'logo',
					 'label'=>__('Logo', 'etendard'),
					 'description'=>__('The image filetype should be JPG or PNG. Note that the optimal size is 280px by 60px.', 'etendard')));
					
$form->setting(array('type'=>'radio',
					 'label'=>__('Slider width', 'etendard'),
					 'name'=>'diaporama_width',
					 'radios'=>array(
						 'auto'=>__('Boxed', 'etendard'),
						 'full'=>__('Fullsize', 'etendard')
					 ),
					 'options'=>array(
					 	'after'=>'<br/>',
					 	'default'=>'auto'
					 )));					 
 
$form->setting(array('type'=>'text',
					 'name'=>'diaporama_height',
					 'label'=>__("Slider height (in pixels)", 'etendard'),
					 'options'=>array(
					 	'default'=>500,
					 )));
					 
$form->setting(array('type'=>'radio',
					 'label'=>__('Sidebar position', 'etendard'),
					 'name'=>'sidebar_position',
					 'radios'=>array(
						 'droite'=>__('Right', 'etendard'),
						 'gauche'=>__('Left', 'etendard'),
						 'sans'=>__('Nowhere', 'etendard')
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('Sidebar could be placed on the right or on the left of the main content. Most sites place them on the right but you could do the opposite :)', 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'custom_css',
					 'label'=>__('Additionnal CSS', 'etendard'),
					 'description'=>__('CSS rules added in this field will be added to your site. If you have too many updates, you should create a child theme.', 'etendard')));

$form->endForm();
$form->endWrapper('tab');

//Tab portfolio
$form->startWrapper('tab', 'portfolio');

$form->startForm();

$form->setting(array('type'=>'boolean',
					 'label'=>__('Display excerpts', 'etendard'),
					 'name'=>'extraits_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Check this to display excerpts underneath the projects on the portfolio page.', 'etendard')));
					 
$form->setting(array('type'=>'boolean',
					 'label'=>__('Display buttons', 'etendard'),
					 'name'=>'boutons_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Check this to display buttons underneath the projects on the portfolio page.', 'etendard')));
					 
$form->setting(array('type'=>'text-list',
					'label'=>__('Project metas', 'etendard'),
					'name'=>'portfolio_fields',
					'description' => __('Add metas to enhance your projects (the client, his website, etc.). Add values to each meta in the "Projects metas" metabox on each project page.', 'etendard'),
					'options'=>array()
));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_url',
					 'label'=>__('Call to action destination (url)', 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'cta_text',
					 'label'=>__('Write an incentive to get people to click on the call to action, be convincing ;)', 'etendard')));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_bouton',
					 'label'=>__('Button\'s label (Example : "Contact-us").', 'etendard')));

$form->endForm();
$form->endWrapper('tab');

/* Modules Tab */

$form->startWrapper('tab', 'addons');

	$form->startForm();
	
		$form->startWrapper('td');
		
			$form->component('raw', __('Do you know that Etendard can be extended with addons ? Check the addons available below :', 'etendard'));
		
		$form->endWrapper('td');
	
	$form->endForm();
	
	$form->startForm();
	
		do_action('etendard_addons_tab', $form);
	
	$form->endForm();

$form->endWrapper('tab');


$form->component('submit', 'submit', array('value'=>__('Save changes', 'etendard')));

$form->render();

?>

<div style="margin-top:20px;">

<?php _e('Etendard is a product of','etendard'); ?> <a href="https://www.themesdefrance.fr/?utm_source=theme&utm_medium=link&utm_campaign=etendard" target="_blank">Themes de France</a> - <?php _e('Tell us what you think of this theme','etendard'); ?> <a href="https://www.themesdefrance.fr/temoignage/?utm_source=theme&utm_medium=link&utm_campaign=etendard" target="_blank"><?php _e('on this page','etendard'); ?></a>.

</div>