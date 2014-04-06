// Dropdown Shortcodes
// https://stackoverflow.com/questions/9329446/for-each-in-an-array-how-to-do-that-in-javascript

//var etendard_shortcodes = new Array();
//etendard_shortcodes['half'] = "[un_demi premier]Contenu de la première colonne[/un_demi][un_demi]Contenu seconde colonne[/un_demi]";

(function() {
	tinymce.create('tinymce.plugins.drop', {
 
		init : function(ed, url) {
			etendard_shortcodesEd = ed;
			etendard_shortcodesUrl = url;
			// On remonte d'un repertoire
			etendard_url = etendard_shortcodesUrl.substring(0, etendard_shortcodesUrl.length-2);
		},
		createControl : function(n, cm) {
 
            if(n=='drop'){
                var mlb = cm.createMenuButton('wtpstshortcode', {
						title : 'Shortcodes',
						image : etendard_url + 'img/cocorico.png',
						icons:false
						
				});
                
                mlb.onRenderMenu.add(function(c, m) {
					
					// Bouton
					
					m.add({title : 'Bouton', onclick : function() {
						var str = '[bouton lien="LIEN_PAGE_DESTINATION"]TEXTE_BOUTON[/bouton]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Bouton Nouvelle Fenêtre
					
					m.add({title : 'Bouton (nouvelle fenêtre)', onclick : function() {
						var str = '[bouton lien="LIEN_PAGE_DESTINATION" nouvellefenetre="oui"]TEXTE_BOUTON[/bouton]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Appel à l'action
					
					m.add({title : 'Appel à l\'action', onclick : function() {
						var str = '[appel_action lien="LIEN_PAGE_DESTINATION" bouton="TEXTE_BOUTON"]TEXTE_APPEL_ACTION[/appel_action]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Appel à l'action
					
					m.add({title : 'Appel à l\'action (nouvelle fenêtre)', onclick : function() {
						var str = '[appel_action lien="LIEN_PAGE_DESTINATION" bouton="TEXTE_BOUTON" nouvellefenetre="oui"]TEXTE_APPEL_ACTION[/appel_action]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Toggle
					
					m.add({title : 'Toggle', onclick : function() {
						var str = '[toggle titre="TITRE_TOGGLE"]CONTENU_TOGGLE[/toggle]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Séparateur
					
					m.add({title : 'Séparateur', onclick : function() {
						var str = '[separateur]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					m.addSeparator();

					// Agencement en 2 colonnes

					sub = m.addMenu({title : '2 Colonnes'});
					
					sub.add({title : '1/2 | 1/2', onclick : function() {
						var str = '[un_demi premier]CONTENU_COLONNE_1[/un_demi][un_demi]CONTENU_COLONNE_2[/un_demi]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '1/3 | 2/3', onclick : function() {
						var str = '[un_tiers premier]CONTENU_COLONNE_1[/un_tiers][deux_tiers]CONTENU_COLONNE_2[/deux_tiers]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '2/3 | 1/3', onclick : function() {
						var str = '[deux_tiers premier]CONTENU_COLONNE_1[/deux_tiers][un_tiers]CONTENU_COLONNE_2[/un_tiers]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '1/4 | 3/4', onclick : function() {
						var str = '[un_quart premier]CONTENU_COLONNE_1[/un_quart][trois_quarts]CONTENU_COLONNE_2[/trois_quarts]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '3/4 | 1/4', onclick : function() {
						var str = '[trois_quarts premier]CONTENU_COLONNE_1[/trois_quarts][un_quart]CONTENU_COLONNE_2[/un_quart]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Agencement en 3 colonnes
					
					sub = m.addMenu({title : '3 Colonnes'});
					
					sub.add({title : '1/3 | 1/3 | 1/3', onclick : function() {
						var str = '[un_tiers premier]CONTENU_COLONNE_1[/un_tiers][un_tiers]CONTENU_COLONNE_2[/un_tiers][un_tiers]CONTENU_COLONNE_3[/un_tiers]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '1/2 | 1/4 | 1/4', onclick : function() {
						var str = '[un_demi premier]CONTENU_COLONNE_1[/un_demi][un_quart]CONTENU_COLONNE_2[/un_quart][un_quart]CONTENU_COLONNE_3[/un_quart]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '1/4 | 1/2 | 1/4', onclick : function() {
						var str = '[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_demi]CONTENU_COLONNE_2[/un_demi][un_quart]CONTENU_COLONNE_3[/un_quart]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : '1/4  | 1/4 | 1/2', onclick : function() {
						var str = '[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_quart]CONTENU_COLONNE_2[/un_quart][un_demi]CONTENU_COLONNE_3[/un_demi]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});

					// Agencement en 4 colonnes
					
					m.add({title : '4 colonnes', onclick : function() {
						var str = '[un_quart premier]CONTENU_COLONNE_1[/un_quart][un_quart]CONTENU_COLONNE_2[/un_quart][un_quart]CONTENU_COLONNE_3[/un_quart][un_quart]CONTENU_COLONNE_4[/un_quart]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					m.addSeparator();
					
					// Messages d'information
					
					sub = m.addMenu({title : 'Messages d\'information'});
					
					sub.add({title : 'Succès', onclick : function() {
						var str = '[succes]CONTENU_MESSAGE_SUCCES[/succes]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Info', onclick : function() {
						var str = '[info]CONTENU_MESSAGE_INFO[/info]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Alerte', onclick : function() {
						var str = '[alerte]CONTENU_MESSAGE_ALERTE[/alerte]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Erreur', onclick : function() {
						var str = '[erreur]CONTENU_MESSAGE_ERREUR[/erreur]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
				});
				
                return mlb;
            }
            return null;
        }
 
 
	});
	tinymce.PluginManager.add('drop', tinymce.plugins.drop);
})();

