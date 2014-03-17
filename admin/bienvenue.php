<?php

/* Etendard Welcome Class thanks to Easy Digital Downloads */

// Exit if loaded directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Etendard_Welcome {

	// Minimum role to see this page
	public $minimum_capability = 'manage_options';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus') );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome'    ) );
	}

	// Page registering
	public function admin_menus() {
		// Update
		add_dashboard_page(
			__('Étendard a été mis à jour', TEXT_TRANSLATION_DOMAIN),
			__('Étendard a été mis à jour', TEXT_TRANSLATION_DOMAIN),
			$this->minimum_capability,
			'etendard-update',
			array( $this, 'update_screen' )
		);

		// First Installation
		add_dashboard_page(
			__('Bienvenue sur Étendard', TEXT_TRANSLATION_DOMAIN),
			__('Bienvenue sur Étendard', TEXT_TRANSLATION_DOMAIN),
			$this->minimum_capability,
			'etendard-bienvenue',
			array( $this, 'bienvenue_screen' )
		);
	}

	// Hide those pages
	public function admin_head() {
		remove_submenu_page( 'index.php', 'etendard-update' );
		remove_submenu_page( 'index.php', 'etendard-bienvenue' );

		// Badge for welcome page
		$badge_url = EDD_PLUGIN_URL . 'assets/images/edd-badge.png';
		?>
		<style type="text/css" media="screen">
		/*<![CDATA[*/
		.edd-badge {
			padding-top: 150px;
			height: 52px;
			width: 185px;
			color: #666;
			font-weight: bold;
			font-size: 14px;
			text-align: center;
			text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
			margin: 0 -5px;
			background: url('<?php echo $badge_url; ?>') no-repeat;
		}

		.about-wrap .edd-badge {
			position: absolute;
			top: 0;
			right: 0;
		}

		.edd-welcome-screenshots {
			float: right;
			margin-left: 10px!important;
		}
		/*]]>*/
		</style>
		<?php
	}

	// Tabs
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'etendard-update';
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'etendard-update' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'etendard-update' ), 'index.php' ) ) ); ?>">
				<?php _e( "Quoi de neuf ?", TEXT_TRANSLATION_DOMAIN ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'etendard-bienvenue' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'etendard-bienvenue' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Bienvenue', TEXT_TRANSLATION_DOMAIN ); ?>
			</a>
		</h2>
		<?php
	}

	// Display Update Screen
	public function update_screen() {
		list( $display_version ) = explode( '-', EDD_SL_THEME_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php printf( __( 'Bienvenue sur Étendard %s', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></h1>
			<div class="about-text"><?php printf( __( 'Merci d\'avoir procédé à la mise à jour, vous allez pouvoir découvrir ce que nous avons ajouté pour que votre site web soit encore plus performant :)', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></div>
			<div class="edd-badge"><?php printf( __( 'Version %s', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<div class="changelog">
				<h3><?php _e( 'Improved Order Editing', TEXT_TRANSLATION_DOMAIN );?></h3>

				<div class="feature-section">

					<img src="<?php echo EDD_PLUGIN_URL . 'assets/images/screenshots/order-details.png'; ?>" class="edd-welcome-screenshots"/>

					<h4><?php _e( 'Combined View and Edit Screens', TEXT_TRANSLATION_DOMAIN );?></h4>
					<p><?php _e( 'The View and Edit payment screens have been combined into a single, more efficient, user-friendly screen. Add or remove products to an order, adjust amounts, add notes, or resend purchase receipts all at one time from the same screen.', TEXT_TRANSLATION_DOMAIN );?></p>
					<p><?php _e( 'All data associated with a payment can now be edited as well, including the customer\'s billing address.', TEXT_TRANSLATION_DOMAIN );?></p>

					<h4><?php _e( 'Responsive and Mobile Friendly', TEXT_TRANSLATION_DOMAIN );?></h4>
					<p><?php _e( 'We have followed the introduction of a responsive Dashboard in WordPress 3.8 and made our own view/edit screen for orders fully responsive and easy to use on mobile devices.', TEXT_TRANSLATION_DOMAIN );?></p>

				</div>
			</div>


			<div class="changelog">
				<h3><?php _e( 'Additional Updates', TEXT_TRANSLATION_DOMAIN );?></h3>

				<div class="feature-section col three-col">
					<div>
						<h4><?php _e( 'Improved Product Creation / Editing', TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'The interface for creating / editing Download products has been dramatically improved by separating the UI out into sections that are easier to use and less cluttered.', TEXT_TRANSLATION_DOMAIN );?></p>

						<h4><?php _e( 'EDD_Graph Class', TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'Along with per-product earnings / sales graphs, we have introduced an EDD_Graph class that makes it exceptionally simple to generate your own custom graphs. Simply build an array of data and let the class work its magic.', TEXT_TRANSLATION_DOMAIN );?></p>
					</div>

					<div>
						<h4><?php _e( 'Payment Date Filters', TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'A new section has been added to the Payment History screen that allows you to filter payments by date, making it much easier to locate payments for a particular period.', TEXT_TRANSLATION_DOMAIN );?></p>

						<h4><?php _e( 'EDD_Email_Template_Tags Class', TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'A new API has been introduced for easily adding new template tags to purchase receipts and admin sale notifications.', TEXT_TRANSLATION_DOMAIN );?></p>
					</div>

					<div class="last-feature">
						<h4><?php _e( 'Resend Purchase Receipts in Bulk', TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'A new action has been added to the Bulk Actions menu in the Payment History screen that allows you to resend purchase receipt emails in bulk.' ,TEXT_TRANSLATION_DOMAIN );?></p>

						<h4><?php _e( 'Exclude Products from Discounts',TEXT_TRANSLATION_DOMAIN );?></h4>
						<p><?php _e( 'Along with being able to assign discounts to specific products, you can also now exclude products from discount codes.', TEXT_TRANSLATION_DOMAIN );?></p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard">
				<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'post_type' => 'download', 'page' => 'edd-settings' ), 'edit.php' ) ) ); ?>"><?php _e( 'Go to Easy Digital Downloads Settings', TEXT_TRANSLATION_DOMAIN ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Render Getting Started Screen
	 *
	 * @access public
	 * @since 1.9
	 * @return void
	 */
	public function getting_started_screen() {
		list( $display_version ) = explode( '-', EDD_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php printf( __( 'Welcome to Easy Digital Downloads %s', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></h1>
			<div class="about-text"><?php printf( __( 'Thank you for updating to the latest version! Easy Digital Downloads %s is ready to make your online store faster, safer and better!', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></div>
			<div class="edd-badge"><?php printf( __( 'Version %s', TEXT_TRANSLATION_DOMAIN ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<p class="about-description"><?php _e( 'Use the tips below to get started using Easy Digital Downloads. You will be up and running in no time!', TEXT_TRANSLATION_DOMAIN ); ?></p>

			<div class="changelog">
				<h3><?php _e( 'Creating Your First Download Product', TEXT_TRANSLATION_DOMAIN );?></h3>

				<div class="feature-section">

					<img src="<?php echo EDD_PLUGIN_URL . 'assets/images/screenshots/edit-download.png'; ?>" class="edd-welcome-screenshots"/>

					<h4><?php printf( __( '<a href="%s">%s &rarr; Add New</a>', TEXT_TRANSLATION_DOMAIN ), admin_url( 'post-new.php?post_type=download' ), edd_get_label_plural() ); ?></h4>
					<p><?php printf( __( 'The %s menu is your access point for all aspects of your Easy Digital Downloads product creation and setup. To create your first product, simply click Add New and then fill out the product details.', TEXT_TRANSLATION_DOMAIN ), edd_get_label_plural() ); ?></p>

					<h4><?php _e( 'Product Price', TEXT_TRANSLATION_DOMAIN );?></h4>
					<p><?php _e( 'Products can have simple prices or variable prices if you wish to have more than one price point for a product. For a single price, simply enter the price. For multiple price points, click <em>Enable variable pricing</em> and enter the options.', TEXT_TRANSLATION_DOMAIN );?></p>

					<h4><?php _e( 'Download Files', TEXT_TRANSLATION_DOMAIN );?></h4>
					<p><?php _e( 'Uploading the downloadable files is simple. Click <em>Upload File</em> in the Download Files section and choose your download file. To add more than one file, simply click the <em>Add New</em> button.', TEXT_TRANSLATION_DOMAIN );?></p>

				</div>
			</div>

			

		</div>
		<?php
	}



	// Redirect to the First Install or Update Page
	/*public function welcome() {
		global $edd_options;

		// Bail if no activation redirect
		if ( ! get_transient( '_edd_activation_redirect' ) )
			return;

		// Delete the redirect transient
		delete_transient( '_edd_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) )
			return;

		$upgrade = get_option( 'edd_version_upgraded_from' );

		if( ! $upgrade ) { // First time install
			wp_safe_redirect( admin_url( 'index.php?page=etendard-bienvenue' ) ); exit;
		} else { // Update
			wp_safe_redirect( admin_url( 'index.php?page=etendard-update' ) ); exit;
		}
	}*/
}
new Etendard_Welcome();
