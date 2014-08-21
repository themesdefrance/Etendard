( function() {
    tinymce.PluginManager.add( 'shortcode_drop', function( editor, url ) {
		
		etendard_shortcodesEd = editor;
		etendard_shortcodesUrl = url;
		// We go up in the tree
		etendard_url = etendard_shortcodesUrl.substring(0, etendard_shortcodesUrl.length-2);
		
		var buttonstyle = "background:url('" + etendard_url + "img/cocorico.png') no-repeat 5px 2px";
		
        editor.addButton( 'etendard_shortcode_button', {
			type: 'menubutton',
            style: buttonstyle,
            tooltip: 'Shortcodes Étendard',
            //tooltip: editor.getLang('etendard_i18n_shortcodes.tooltip'),
            menu: [

            		{	//text: editor.getLang('etendard_i18n_shortcodes.buttons'),
            			text: 'Boutons',
            			menu: [
							{	text: 'Bouton',
								onclick: function() {editor.insertContent('[bouton lien="LIEN_PAGE_DESTINATION"]TEXTE_BOUTON[/bouton]');}
							},
							{	text: 'Bouton (nouvelle fenêtre)',
								onclick: function() {editor.insertContent('[bouton lien="LIEN_PAGE_DESTINATION" nouvellefenetre="oui"]TEXTE_BOUTON[/bouton]');}
							}
						]
            			
            		},
  
					{	text: 'Appels à l\'action',
						menu: [
							{	text: 'Appel à l\'action',
								onclick: function() {editor.insertContent('[appel_action lien="LIEN_PAGE_DESTINATION" bouton="TEXTE_BOUTON"]TEXTE_APPEL_ACTION[/appel_action]');}
							},
							{	text: 'Appel à l\'action (nouvelle fenêtre)',
								onclick: function() {editor.insertContent('[appel_action lien="LIEN_PAGE_DESTINATION" bouton="TEXTE_BOUTON" nouvellefenetre="oui"]TEXTE_APPEL_ACTION[/appel_action]');}
							}
						],
            		},
            		
            		{	text: 'Toggle', 
            			onclick: function() {editor.insertContent('[toggle titre="TITRE_TOGGLE"]CONTENU_TOGGLE[/toggle]');}
            		},
					
					{	text: 'Séparateur', 
            			onclick: function() {editor.insertContent('[separateur]');}
            		},
            		
            		{	text: '2 Colonnes', 
            			menu: [
							{	text: '1/2 | 1/2',
								onclick: function() {editor.insertContent('[un_demi premier]CONTENU_COLONNE_1[/un_demi][un_demi]CONTENU_COLONNE_2[/un_demi]');}
							},
							
							{	text: '1/3 | 2/3',
								onclick: function() {editor.insertContent('[un_tiers premier]CONTENU_COLONNE_1[/un_tiers][deux_tiers]CONTENU_COLONNE_2[/deux_tiers]');}
							},
							
							{	text: '2/3 | 1/3',
								onclick: function() {editor.insertContent('[deux_tiers premier]CONTENU_COLONNE_1[/deux_tiers][un_tiers]CONTENU_COLONNE_2[/un_tiers]');}
							},
							
							{	text: '1/4 | 3/4',
								onclick: function() {editor.insertContent('[un_quart premier]CONTENU_COLONNE_1[/un_quart][trois_quarts]CONTENU_COLONNE_2[/trois_quarts]');}
							},
							
							{	text: '3/4 | 1/4',
								onclick: function() {editor.insertContent('[trois_quarts premier]CONTENU_COLONNE_1[/trois_quarts][un_quart]CONTENU_COLONNE_2[/un_quart]');}
							},
						],
            		},
            		
            		{	text: '3 Colonnes', 
            			menu: [
							{	text: '1/3 | 1/3 | 1/3',
								onclick: function() {editor.insertContent('[un_tiers premier]CONTENU_COLONNE_1[/un_tiers][un_tiers]CONTENU_COLONNE_2[/un_tiers][un_tiers]CONTENU_COLONNE_3[/un_tiers]');}
							},
							
							{	text: '1/2 | 1/4 | 1/4',
								onclick: function() {editor.insertContent('[un_demi premier]CONTENU_COLONNE_1[/un_demi][un_quart]CONTENU_COLONNE_2[/un_quart][un_quart]CONTENU_COLONNE_3[/un_quart]');}
							},
							
							{	text: '1/4 | 1/2 | 1/4',
								onclick: function() {editor.insertContent('[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_demi]CONTENU_COLONNE_2[/un_demi][un_quart]CONTENU_COLONNE_3[/un_quart]');}
							},
							
							{	text: '1/4 | 1/4 | 1/2',
								onclick: function() {editor.insertContent('[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_quart]CONTENU_COLONNE_2[/un_quart][un_demi]CONTENU_COLONNE_3[/un_demi]');}
							},
							
						],
            		},
            		
            		{	text: '4 Colonnes', 
						onclick: function() {editor.insertContent('[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_quart]CONTENU_COLONNE_2[/un_quart][un_quart]CONTENU_COLONNE_3[/un_quart][un_quart]CONTENU_COLONNE_4[/un_quart]');}
            		},
            		
            		{	text: 'Boites de message', 
            			menu: [
		            		{	text: 'Succès', 
								onclick: function() {editor.insertContent('[succes]CONTENU_MESSAGE_SUCCES[/succes]');}
		            		},
		            		
		            		{	text: 'Info', 
								onclick: function() {editor.insertContent('[info]CONTENU_MESSAGE_INFO[/info]');}
		            		},
		            		
		            		{	text: 'Alerte', 
								onclick: function() {editor.insertContent('[alerte]CONTENU_MESSAGE_ALERTE[/alerte]');}
		            		},
		            		
		            		{	text: 'Erreur', 
								onclick: function() {editor.insertContent('[erreur]CONTENU_MESSAGE_ERREUR[/erreur]');}
		            		},
						],
					},
            		
	        ]
            

        } );

		
    } );

} )();