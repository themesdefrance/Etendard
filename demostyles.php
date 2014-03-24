<?php session_start(); ?>
<div id="demostyles">
	
	<style>
		#demostyles{
			position: absolute;
			top : 100px;
			left: 0;
			width: 205px;
			background:#fff;
			border:5px solid #eee;
			border-left:none;
			z-index:100;
		}
		#demostyles p{
			font-size: 12px;
			padding: 10px;
		}
		
		#demostyles #gachette{
			background-color: #ededed;
			transform: rotateZ(270deg);
			padding:10px;
			-webkit-transform: rotateZ(270deg);
			-moz-transform: rotateZ(270deg);
			-o-transform: rotateZ(270deg);
			-ms-transform: rotateZ(270deg);
			position: absolute;
			right: -58px;
			bottom: 32px;
			cursor: pointer;
		}
		
		#demostyles .styles a{
			display:block;
			float: left;
			width: 100px;
			color: #fff;
			text-decoration:none;
			text-align: center;
			padding: 20px 0;
		}
		#demostyles .styles a:hover{
			opacity:0.7;
			-webkit-opacity:0.7;
			-moz-opacity:0.7;
			-o-opacity:0.7;
		}		
		</style>
		
		<?php 
			
			if(isset($_GET["style"])){
				$style=$_GET["style"];
			}
			else{
				
				if(isset($_SESSION['style'])){
					$style=$_SESSION['style'];
				}
			}
			
			
			switch($style){
				case "turquoise":
					$color="#1abc9c";
					break;
				case "soleil":
					$color="#f1c40f";
					break;
				case "emeraude":
					$color="#2ecc71";
					break;
				case "ciel":
					$color="#3498db";
					break;
				case "pourpre":
					$color="#9b59b6";
					break;
				case "asphalte":
					$color="#34495e";
					break;
				case "beton":
					$color="#95a5a6";
					break;
				case "citrouille":
					$color="#d35400";
					break;
				case "rouge":
					$color="#e74c3c";
					break;
				default:
					$color="#02a7c6";
			}
			
			// On stocke la couleur dans une session
			$_SESSION['style'] = $style;
			
			require('admin/color_functions.php');
			$hsl = etendard_RGBToHSL(etendard_HTMLToRGB($color));
			if ($hsl->lightness > 180) $contrast = '#333';
			else $contrast = '#fff';
			 ?>
			 
			<style type="text/css">
				section.realisation .realisation-site,
				div.pagination a,
				.article .content a,
				.article .header-meta a,
				#comments a,
				.sidebar .widget_etendardnewsletter .form-email:before,
				form.search-form .search-submit-wrapper:before,
				a.more-link,
				ul.services .service h2:hover,
				ul.portfolio .creation figcaption,
				.article .header-title a:hover,
				.article.quote > blockquote cite,
				.comment .comment-author a,
				.main-footer a,
				.sidebar .widget a:hover{
					color: <?php echo $color; ?> !important;
				}
				
				.main-menu a:hover,
				.top-level-menu > li:hover > a,
				ul.portfolio .creation figure:hover figcaption,
				.article.teaser .header-title:after,
				#commentform #submit,
				.widget_calendar #today,
				section.portfolio nav.categories a:hover,
				section.portfolio nav.categories a.active,
				.sidebar .widget_etendardnewsletter input[type="submit"],
				.widget_etendardsocial li a,
				.cta .button-wrapper .cta-button,
				.embedcta .button-wrapper .cta-button,
				.cta-wrapper .cta-button,
				.article .content a.bouton,
				.contact-form .submit input,
				a.bouton.lirelasuite,
				.headerbar{
					background: <?php echo $color; ?> !important;
					color: <?php echo $contrast; ?> !important;
				}
				
				
				<?php foreach(array('-moz-', '-webkit-', '-ms-', '-o-', '') as $prefix){ ?>
				::<?php echo $prefix; ?>selection{ 
					background: <?php echo $color; ?>;
					color: <?php echo $contrast; ?>;
				}
				<?php } ?>
				
				.toplevel > li > a.active{
					border-bottom: 2px solid <?php echo $color; ?> !important;;
				}
				.main-menu .sub-menu:before{
					border-bottom: 3px solid <?php echo $color; ?> !important;;
				}
		
	</style>

	<div id="gachette">
		Options
	</div>
	
	<p><strong>Choisir la couleur principale</strong><br>Cliquez une couleur pour rhabiller Étendard. Via l'administration, vous pourrez définir votre propre couleur.</p>
	
	<form action="" method="get">
	
		<div class="styles">
			<a href="?style=turquoise" style="background:#1abc9c;">Turquoise</a>
			<a href="?style=soleil" style="background:#f1c40f;">Soleil</a>
			<a href="?style=emeraude" style="background:#2ecc71;">Emeraude</a>
			<a href="?style=ciel" style="background:#3498db;">Ciel</a>
			<a href="?style=pourpre" style="background:#9b59b6;">Pourpre</a>
			<a href="?style=asphalte" style="background:#34495e;">Asphalte</a>
			<a href="?style=beton" style="background:#95a5a6;">Béton</a>
			<a href="?style=citrouille" style="background:#d35400;">Citrouille</a>
			<a href="?style=rouge" style="background:#e74c3c;">Rouge</a>
			<a href="?style=defaut" style="background:#02a7c6;">Défaut</a>

			<input type="hidden" value="defaut" id="etendard_style" name="etendard_style">
		</div>
	
	</form>
	<script type="text/javascript">
		jQuery(document).ready(function () {
        jQuery("#gachette").click(function () {
        	if(jQuery("#demostyles").position().left==0){
	            jQuery("#demostyles").animate({
	                "left": "-=205px"
	            }, "fast");
	        }
	        else{
		        jQuery("#demostyles").animate({
	                "left": "+=205px"
	            }, "fast");
	        }
        });
    });
    
	</script>
</div>