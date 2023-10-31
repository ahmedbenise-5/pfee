////////----Authentication

1---composer require laravel/ui
2---php artisan ui bootstrap --auth
3--- npm instal
4--- npm run dev


///////-----migrate

1---php artisan migrate
2---php artisan make:migration create_users_table

////--------model and controller and table

1--php artisan make:model Classe -

////------ controlller
1--php artisan make:controller niveauxdetudesController --resource
1--php artisan make:controller usersController --resource

////--- Classes
1-- php artisan make:controller ClassesController --resource
2-- php artisan make:model Classes
3-- php artisan make:migration create_classes_table --create=Classes

//// Section

1-- php artisan make:controller SectionsController --resource
2-- php artisan make:Model Sections
3-- php artisan make:migration create_sections_table --create=SectionsController


//// seeds Religion Nationalitie

1--- php artisan make:model Religion -m
2--- php artisan make:model Nationalitie -m
3--- php artisan make:seeder ReligionTableSeeder
4--- php artisan make:seeder NationalitieTableSeeder



/// parentes

1--- php artisan make:model Parentes -mcr

// --------- atche file parent

1--- php artisan make:model FileParentes -mcr

// Spécialités

1---php artisan make:model Specialites -mcr
2--- php artisan make:seeder SpecialitesTableSeeder

// Genre

1--- php artisan make:model Genre -mcr
2 -- php artisan make:seeder GenreTableSeeder


// enseignants

1-- php artisan make:model Enseignants -mcr
EnseignantsRepository
EnseignantsRepositoryInterface


// Etudaints

1--- php artisan make:model Etudaints -mcr


// Frais

php artisan make:model Frais -mcr

FraisRepository
FraisRepositoryInterface

// facture
php artisan make:model facture -mcr

// facture
php artisan make:model CompteEtudiant -mcr
*

/// HomeController

php artisan make:model Accueil -mcr

EnseignantsRepository
EnseignantsRepositoryInterface








// Reçu Étudiant

php artisan make:model RecuEtudiant -mcr

RecuEtudiantRepository
RecuEtudiantRepositoryInterface


// compte financier

php artisan make:model Comptefinancier -m



//Frais de traitement

FraisTraitementRepository
FraisTraitementRepositoryInterface
php artisan make:model FraisTraitement -mcr




/// RecuDeEchange

php artisan make:model RecuDeEchange -mcr

RecuDeEchangeRepository
RecuDeEchangeRepositoryInterface


//la présence

php artisan make:model Presence -mcr


//
php artisan make:seeder RolesSeeder


//
php artisan help make:controller RolesController


// php artisan make:model Matieres -mcr

// php artisan make:model Exame -mcr

















أنا بتعلم باك اند بقالي سنتين متواصل يومياً عملت خلالهم بتاع ٢٥ ريبو علي جت هب ما بين PHP, Laravel 7, Laravel 9 و استخدمت تكنولوجيز و لغات زي
- Livewire
- Design patterns
- Solid principles
- Js And Ajax
- bootstrap
-apis with postman
- Blade Engine
و المشاريع اللي عملتها ف لارافيل استخدمت حاجات زي
-Crud operations
- Localization
- Integration with Google, Facebook, .. El
-Integration with PayPal
-Integration Sms Notifications
-Integration with Zoom
- Multi guarded
- Validation
- Relationships
- Real Time With Pusher
-Emails
- file systems
- Authorization
- Eloquent and DB
و حاجات تانية ممكن اكون مش فاكرها
فأنا عايز شغل و مش مهم المرتب يكون كبير بقدر مانا عايز اكتسب خبرة من الشغل
للعلم
انا لسه طالب و هخلص امتحاناتي ف ٥-٦ الجاي فعايز اشتغل اول ما اخلص الإمتحانات كمان بعد ٣ اسابيع
اللي عايز الcv يقولي ف التعليقات و انا هبعتله ....
ودا رابط الجت هب







































































































































































































admin
Adminwex2022@





<div class="request-form">
	<div class="row">
		<div class="col-xs-12 col-md-6">[text* your-name placeholder "Votre nom ici ..." ]</div>
		<div class="col-xs-12 col-md-6">[email* your-email placeholder "Votre email ici ..."] </div>
	</div>
	[textarea* your-message 40x7 placeholder "Ecrire un message ici ..."]
	[submit "ENVOYER"]
</div>



<div class="row contact-form">
	<div class="col-md-7 col-xs-12 col-sm-12">
		[text* your-name placeholder "Nom complet*" ]
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">[text* your-name placeholder "Adresse email" ]</div>
		<div class="col-xs-12 col-md-6">[text* your-Téléphone placeholder "Téléphone"] </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">[text your-Fixe placeholder "Fixe"]</div>
		<div class="col-xs-12 col-md-6">[text* your-Société placeholder "Société"] </div>
	</div>
	<div class="col-md-7 col-xs-12 col-sm-12">
		[text* your-Sujet placeholder "Sujet*" ]
	</div>
	<div class="col-md-12 col-xs-12 col-sm-12">
		[textarea* your-message placeholder "Your Message*"]

		[submit "Send Message"]
	</div>
</div>
















<div class="row contact-form">

	<div class="col-md-7 col-xs-12 col-sm-12">
		[text* your-name placeholder "Your Name*" ]
		[email* your-email placeholder "Your Email*"]
		[tel* tel-783 placeholder "Your Phone*"]
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">[text* your-name placeholder "Votre nom ici ..." ]</div>
		<div class="col-xs-12 col-md-6">[email* your-email placeholder "Votre email ici ..."] </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">[text* your-name placeholder "Votre nom ici ..." ]</div>
		<div class="col-xs-12 col-md-6">[email* your-email placeholder "Votre email ici ..."] </div>
	</div>


	<div class="col-md-7 col-xs-12 col-sm-12">
		[textarea* your-message placeholder "Your Message*"]

		[submit "Send Message"]
	</div>
</div>


.col-md-7.col-xs-12.col-sm-12 {
padding-left: 2px;
width: 1195px;
}








.item-grid.grid-type10 .info-bottom {
padding: 30px 15px 54px;
display: none;
}


.modus-block-left-1 {
display: none;
}

.quantity {
display: none;
visibility: hidden;
}

.btn-share.btn-wishlist {
display: none;
}


element.style {
}
.btn-share.btn-compare {
display: none;
}















<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
global $product;
$review_count = $product->get_review_count();
$rating_count = $product->get_rating_count();

$shop_config = modus_settings();
$sidebars = 'product_single_sidebar';
$sidebar_position = 'left-sidebar';

if (isset($shop_config['product_single_sidebar_position'])) {
	$sidebar_position = $shop_config['product_single_sidebar_position'];
}
if (isset($shop_config['product_single_sidebar']) && $shop_config['product_single_sidebar'] != '') {
	$sidebars = $shop_config['product_single_sidebar'];
}
if (isset($_GET['sidebar']) && (in_array($_GET['sidebar'], array('left-sidebar', 'right-sidebar', 'none')))) {
	$sidebar_position = $_GET['sidebar'];
}
$class_sidebar = "";
if ($sidebar_position == 'left-sidebar') {
	$class_sidebar = 'sidebar_left';
	$wrap_content = 'col-md-9 col-xs-12 col-sm-12 right';
} else if ($sidebar_position == 'right-sidebar') {
	$class_sidebar = 'sidebar_right';
	$wrap_content = 'col-md-9 col-xs-12 col-sm-12';
} else {
	$wrap_content = 'col-md-12 col-xs-12 col-sm-12';
}
?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form();
	return;
}
?>
<?php  ?>
<div itemscope id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="<?php echo esc_attr($wrap_content); ?>">
			<div class="modus-single-product">
				<div class="row">
					<div class="col-md-5">
						<?php
						/**
						 * woocommerce_before_single_product_summary hook.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action('woocommerce_before_single_product_summary');
						?>
					</div>
					<div class="col-md-7">
						<div class="modus-block modus-border-bt">
							<div class="modus-block-left">
								<h1><?php the_title(); ?></h1>
								<div class="ct-product-right">
									<?php
									$rating_count = $product->get_rating_count();
									$review_count = $product->get_review_count();
									$average      = $product->get_average_rating();
									if ($rating_count > 0) : ?>
										<div class="rated">
											<?php echo wc_get_rating_html($average, $rating_count); // WPCS: XSS ok. 
											?>
										</div>
									<?php endif;
									if ($rating_count == 0) :
									?>
										<div class="rated">
											<div class="star-rating">
											</div>
										</div>
										<?php
										if (comments_open()) : ?>
											<div class="md-single-review">
												<span>
													<?php
													if ($review_count == 1) {
														printf(_n('%s review', '%s review', $review_count, 'modus'), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>');
													} else {

														printf(_n('%s reviews', '%s reviews', $review_count, 'modus'), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>');
													}
													?>

												</span>
												<a href="#reviews" class="woocommerce-review-link" rel="nofollow">
													<?php printf(_n('Add a review', 'Add a review', $review_count, 'modus'), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>'); ?></a>
											</div>
										<?php
										endif;
										?>
										<?php endif;
									if ($rating_count > 0) :
										if (comments_open()) : ?>
											<div class="md-single-review">
												<span>
													<?php printf(_n('%s review', '%s reviews', $review_count, 'modus'), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>'); ?>
												</span>
												<a href="#reviews" class="woocommerce-review-link" rel="nofollow">
													<?php printf(_n('Add a review', 'Add a review', $review_count, 'modus'), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>'); ?></a>
											</div>
									<?php
										endif;
									endif; ?>
								</div>
								<?php echo woocommerce_template_single_meta(); ?>
								<?php modus_get_terms(get_the_ID()); ?>

							</div>
							<?php echo woocommerce_template_single_excerpt(); ?>


							<div class="modus-block-left-1">
								<?php echo woocommerce_template_loop_price(); ?>
								<div class="uni-cpo-total"></div>
							</div>
						</div>
						<div class="buttons-block">
							<?php echo woocommerce_template_single_add_to_cart(); ?>
							<div class="list-bottom">
								<div class="share-yith">
									<?php
									if (class_exists('YITH_WCWL')) {
										echo ' <div class="btn-share btn-wishlist">';
										echo do_shortcode('[yith_wcwl_add_to_wishlist]');
										echo '</div>';
									}
									if (class_exists('YITH_WOOCOMPARE')) {
										echo '<div class="btn-share btn-compare">';
										printf('<div class="add-to"><a onclick="" data-toggle="tooltip" href="%s" class="%s" data-product_id="%d" title="%s"><i class="Pe-icon-7-stroke-copy-file"></i></a></div>', modus_add_compare_action(get_the_ID()), 'add_to_compare compare button', get_the_ID(), esc_attr__('Compare', 'modus'));
										echo '</div>';
									}
									?>
									<?php
									if (isset($shop_config['product_single_share']) && $shop_config['product_single_share'] == 'show') :
										if ($shop_config['modus_mail'] != '') : ?> <div class="btn-share">
												<div class="add-to"><a href="mailto:<?php echo esc_attr($shop_config['modus_mail']); ?>" title="<?php esc_attr_e('Send Mail', 'modus'); ?>" class="button"><i class="Pe-icon-7-stroke-mail"></i></a></div>
											</div>
									<?php endif;
									endif;
									?>

								</div>
								<?php
								$show_button = apply_filters('yith_ywraq-show_btn_single_page', 'yes');
								if ($show_button == 'yes' && class_exists('YITH_Request_Quote')) {
									if (!$product) {
										global $product;
									}

									if (!apply_filters('yith_ywraq_before_print_button', true, $product)) {
										return;
									}

									$style_button = (get_option('ywraq_show_btn_link') == 'button') ? 'button' : 'ywraq-link';

									$args         = array(
										'class'         => 'add-request-quote-button ' . $style_button,
										'wpnonce'       => wp_create_nonce('add-request-quote-' . $product->get_id()),
										'product_id'    => $product->get_id(),
										'label'         => apply_filters('ywraq_product_add_to_quote', get_option('ywraq_show_btn_link_text')),
										'label_browse'  => apply_filters('ywraq_product_added_view_browse_list', __('Browse the list', 'yith-woocommerce-request-a-quote')),
										'template_part' => 'button',
										'rqa_url'       => YITH_Request_Quote()->get_raq_page_url(),
										'exists'        => ($product->is_type('variable')) ? false : YITH_Request_Quote()->exists($product->get_id()),
									);
									$args['args'] = $args;

									wc_get_template('add-to-quote.php', $args, '', YITH_YWRAQ_TEMPLATE_PATH);
								}
								?>
							</div>
						</div>
						<?php if (isset($shop_config['product_single_share']) && $shop_config['product_single_share'] == 'show') : ?>
							<div class="share-links">
								<div class="addthis_sharing_toolbox">
									<div class="f-social"><?php echo esc_html__('Share this', 'modus'); ?></div>
									<ul>
										<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
										<li><a href="http://www.linkedin.com/shareArticle?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										</li>
										<li>
											<a class="whatsapp" target="_bank" href="https://web.whatsapp.com://send?text=<?php echo rawurlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" data-action="share/whatsapp/share">
												<i class="fa fa-whatsapp"></i>
											</a>
										</li>
									</ul>

								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ($sidebar_position != 'none') { ?>
			<div class="col-md-3 col-xs-12 col-sm-12 single_product_sidebar <?php echo  $class_sidebar; ?>">
				<div class="sidebar">
					<?php dynamic_sidebar($sidebars); ?>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<?php
	/**
	 * woocommerce_after_single_product_summary hook.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); 
?>





PORTES BLINDÉES
Coffres Forts DESIGN
Coffres Forts Pour Particuliers
Coffres Forts Pour Professionnels
Armoires Ignifuges
Coffres Classeurs À Tiroirs
DATA Safe (Pour Support Informatique)
Caisses Temporisée