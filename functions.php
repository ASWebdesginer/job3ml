<?php

/**
 * jobs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jobs
 */

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
add_filter('wpcf7_autop_or_not', '__return_false');
//add_filter( 'widget_text', 'do_shortcode' );

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

ob_start();

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jobs_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on jobs, use a find and replace
		* to change 'jobs' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('jobs', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'jobs'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'jobs_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'jobs_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jobs_content_width()
{
	$GLOBALS['content_width'] = apply_filters('jobs_content_width', 640);
}
add_action('after_setup_theme', 'jobs_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jobs_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'jobs'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'jobs'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'jobs_widgets_init');

/**
 * Enqueue styles.
 */

function enqueue_styles()
{

	$lang = pll_current_language();

	if ($lang == "en") {

		/** REGISTER css/screen.css **/
		wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
		wp_enqueue_style('bootstrap');

		wp_register_style('selectpicker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css', array(), '1.0', 'all');
		wp_enqueue_style('selectpicker');

		wp_register_style('bootstrap-slider', get_template_directory_uri() . '/css/bootstrap-slider.min.css', array(), '1.0', 'all');
		wp_enqueue_style('bootstrap-slider');

		wp_register_style('moyasar', 'https://cdn.moyasar.com/mpf/1.7.3/moyasar.css', array(), '1.0', 'all');
		wp_enqueue_style('moyasar');

		wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
		wp_enqueue_style('main');

		wp_register_style('navigation', get_template_directory_uri() . '/css/navigation.css', array(), '1.0', 'all');
		wp_enqueue_style('navigation');

		wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all');
		wp_enqueue_style('responsive');
	}

	if ($lang == "ar") {

		/** REGISTER css/screen.css **/
		wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap-rtl.min.css', array(), '1.0', 'all');
		wp_enqueue_style('bootstrap');

		wp_register_style('selectpicker', get_template_directory_uri() . '/css/bootstrap-select-rtl.min.css', array(), '1.0', 'all');
		wp_enqueue_style('selectpicker');

		wp_register_style('bootstrap-slider', get_template_directory_uri() . '/css/bootstrap-slider.min.css', array(), '1.0', 'all');
		wp_enqueue_style('bootstrap-slider');

		wp_register_style('moyasar', 'https://cdn.moyasar.com/mpf/1.7.3/moyasar.css', array(), '1.0', 'all');
		wp_enqueue_style('moyasar');


		wp_register_style('main', get_template_directory_uri() . '/css/main-rtl.css', array(), '1.0', 'all');
		wp_enqueue_style('main');

		wp_register_style('navigation', get_template_directory_uri() . '/css/navigation-rtl.css', array(), '1.0', 'all');
		wp_enqueue_style('navigation');


		wp_register_style('responsive', get_template_directory_uri() . '/css/responsive-rtl.css', array(), '1.0', 'all');
		wp_enqueue_style('responsive');

		// wp_localize_script('ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php')));

	}
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/**
 * Enqueue scripts.
 */
function enqueue_javascript()
{

	$lang = pll_current_language();

	wp_enqueue_script('jquery',	'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', array(), '1.0', true);
	wp_enqueue_script('selectpicker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js', array(), '1.0', true);
	wp_enqueue_script('bootstrap-slider',  get_template_directory_uri() . '/js/bootstrap-slider.min.js', array(), '1.0', true);
	wp_enqueue_script('fontawesome',  'https://kit.fontawesome.com/c169c568b6.js', array(), '1.0', true);
	wp_enqueue_script('global',  get_template_directory_uri() . '/js/index.global.min.js', array(), '1.0', true);
	wp_enqueue_script('polyfill',  'https://polyfill.io/v3/polyfill.min.js?features=fetch', array(), '1.0', true);
	wp_enqueue_script('moyasar',  'https://cdn.moyasar.com/mpf/1.7.3/moyasar.js', array(), '1.0', true);

	wp_enqueue_script('main',  get_template_directory_uri() . '/js/main.js', array(), '1.2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_javascript');

/**
 * Enqueue scripts.
 */
function jobs_scripts()
{
	wp_enqueue_style('jobs-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('jobs-style', 'rtl', 'replace');

	wp_enqueue_script('jobs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'jobs_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Other custom functions.
 */
function get_theme_url()
{
	$url = get_template_directory_uri();
	return $url;
}

function custom_shortcode($code)
{
	return do_shortcode($code);
}

//language switcher
function getTranslatedLink($postId)
{

	$lang = pll_current_language();

	if ($lang == "en") {
		$slug = "ar";
	} else {
		$slug = "en";
	}


	$result = get_the_permalink(pll_get_post($postId, $slug));

	return $result;
}

function getLang()
{
	$lang = pll_current_language();
	return $lang;
}

function forceTranslate($en, $ar)
{
	$lang = pll_current_language();
	if ($lang == "en") {
		return $en;
	} else {
		return $ar;
	}
}

function get_custom_footer_menu_items()
{

	$lang = pll_current_language();
	// $lang = 'en';

	if ($lang == 'en') {
		$getMenu = wp_get_nav_menu_items(21);
	}
	if ($lang == 'ar') {
		$getMenu = wp_get_nav_menu_items(23);
	}


	//$getMenu = wp_get_nav_menu_items('main-menu');
	// print_r($getMenu);
	// exit();


	$arrayMainMenu = array();
	foreach ($getMenu as $item) {
		// $arrayMainMenu[]= '<li class="nav-item" ><a href="' . $item->url . '" class="nav-link-item">' . $item->title . '</a></li>';

		$arrayMainMenu[] = '
          <div class="col text-center">
           <p class="fnt-18">
               <a href="' . $item->url . '" class="ft-head"><b>' . $item->title . '</b></a>
           </p>
           <div class="spacer-10"></div>
       	</div>
		 ';
	}

	$mainMenuItems = implode('', $arrayMainMenu);

	return $mainMenuItems;
}

function get_custom_main_menu_items()
{

	$lang = pll_current_language();
	// $lang = 'en';

	if ($lang == 'en') {
		$getMenu = wp_get_nav_menu_items(24);
	}
	if ($lang == 'ar') {
		$getMenu = wp_get_nav_menu_items(25);
	}

	//$getMenu = wp_get_nav_menu_items('main-menu');
	//print_r($getMenu);
	//exit();

	$arrayMainMenu = array();
	foreach ($getMenu as $item) {
		$arrayMainMenu[] = '<li class="nav-item" ><a href="' . $item->url . '" class="nav-link-item">' . $item->title . '</a></li>';
	}

	$mainMenuItems = implode('', $arrayMainMenu);

	return $mainMenuItems;
}

function get_custom_main_menu_subs()
{

	$lang = pll_current_language();

	if ($lang == 'en') {
		$getMenu = wp_get_nav_menu_items(24);
	}
	if ($lang == 'ar') {
		$getMenu = wp_get_nav_menu_items(25);
	}


	//print_r($getMenu);

	//exit();

	$ParentArray = array();
	$count = 0;
	$submenu = false;
	$output = "";

	//print_r($getMenu);
	//exit();

	foreach ($getMenu as $menu_item) {

		//print_r($menu_item);

		$link = $menu_item->url;
		$title = $menu_item->title;

		$caret = '<i class="fas fa-angle-down"></i>';


		// print_r($menu_item);
		// exit();

		if ($menu_item->menu_item_parent == 0) {
			$parent_id = $menu_item->ID;
			// print_r($menu_item->classes);
			if ($menu_item->classes[0] == "dd") {

				$rightClassMenu = "";
				if (array_key_exists(2, $menu_item->classes)) {
					$rightClassMenu = $menu_item->classes[2];
				}

				$output .= '<li class="nav-item dropdown ' . $rightClassMenu . '">
					<a class="nav-link dropdown-toggle " href="" data-bs-toggle="dropdown">' . $menu_item->title . '</a>';

				$output .= '<ul class="dropdown-menu">';
				$output .= get_dropdown_menus($parent_id);
				$output .= '</ul>';
			} else {
				$output .= '<li class="nav-item"><a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
			}
		}
	}



	return $output;
}

function get_dropdown_menus($parent_id)
{

	$lang = pll_current_language();

	if ($lang == 'en') {
		$getMenu = wp_get_nav_menu_items(24);
	}
	if ($lang == 'ar') {
		$getMenu = wp_get_nav_menu_items(25);
	}
	//$menuitems = wp_get_nav_menu_items('main-menu');
	$output = '';

	$i = 0;
	$arraySubs = array();

	foreach ($getMenu as $menu_item) {


		$link = $menu_item->url;
		$title = $menu_item->title;

		if ($menu_item->menu_item_parent == $parent_id) {

			$divider = '';
			if (next($menu_item)) {
				$divider = '';
			}


			$arraySubs[] = '<li><a class="dropdown-item" href="' . $link . '">' . $title . '</a></li>';
			$arraySubs[] = '<li><hr class="dropdown-divider" /></li>';

			//$output .= '<div class="sub-menu--item col-md-2"><img src="'.	$icons.'" class="dd-icons"> <a href="'.$link.'">'.$title.'</a></div>';
		}
	}

	$remove = array_pop($arraySubs);

	$output = implode('', $arraySubs);

	return $output;
}

/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher()
{
	$output = '';
	if (function_exists('pll_the_languages')) {
		$args   = [
			'show_flags' => 1,
			'show_names' => 1,
			'echo'       => 0,
		];
		$output = '<ul class=" dropdown-menu polylang_langswitcher">' . pll_the_languages($args) . '</ul>';
	}

	return $output;
}
add_shortcode('polylang_langswitcher', 'custom_polylang_langswitcher');


/* employer add post*/
function addJobs()
{

	$lang = pll_current_language();
	//    global $wpdb;
	//    print_r($lang);
	//    die();
	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));
	//print_r($arr);

	// print_r($_FILES['fileAttach']);
	// print_r($_FILES['fileLogo']);


	$author = checkEmail($arr['email'], "employer", $arr['company']);

	$data = array(
		'post_title' => wp_strip_all_tags($arr['company']),
		'post_status' => 'draft',
		'post_type' => 'employers',
		'post_author' => $author,
		'post_category' => array(
			$arr['country'],
			$arr['city'],
			$arr['degree'],
			$arr['pType'],
			$arr['jobClass'],
			$arr['language'],
		),
		'tags_input' => explode(",", $arr['skills'])
	);


	$postIdEn = wp_insert_post($data, $wp_error);

	if ($postIdEn) {

		pll_set_post_language($postIdEn, 'en');

		if (!empty($_FILES['fileAttach'])) {

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdEn, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdEn, "logo", $arr['imgLogoDesc']);
		}

		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";

		if (isset($arr['hideEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['hideMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}

		update_field('ads_id', "EAP" . $postIdEn, $postIdEn);
		update_field('email', $arr['email'], $postIdEn);
		update_field('hide_email', $hideEmail, $postIdEn);
		update_field('country_code', $arr['cCode'], $postIdEn);
		update_field('mobile', $arr['mobile'], $postIdEn);
		update_field('hide_mobile', $hideMobile, $postIdEn);
		update_field('job_name', $arr['jobName'], $postIdEn);
		update_field('employment', $arr['empName'], $postIdEn);
		update_field('years_of_experience', $arr['yrExp'], $postIdEn);
		update_field('salary_from', intval($arr['fromSalary']), $postIdEn);
		update_field('salary_to', intval($arr['toSalary']), $postIdEn);
		update_field('negotiable', $nego, $postIdEn);
		update_field('vacancy', $arr['numVacant'], $postIdEn);
		update_field('remotely', $remotely, $postIdEn);
		update_field('job_description', $arr['jobDescription'], $postIdEn);
		$rdUrl = home_url() . '/preview-standard-ads?id=' . $postIdEn;
	}

	$postIdAr = wp_insert_post($data, $wp_error);

	if ($postIdAr) {

		pll_set_post_language($postIdAr, 'ar');

		if (!empty($_FILES['fileAttach'])) {

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdAr, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdAr, "logo", $arr['imgLogoDesc']);
		}

		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";
		if (isset($arr['hideEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['hideMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}
		var_dump($hideEmail);
		update_field('ads_id', "EAP" . $postIdAr, $postIdAr);
		update_field('email', $arr['email'], $postIdAr);
		update_field('hide_email', $hideEmail, $postIdAr);
		update_field('country_code', $arr['cCode'], $postIdAr);
		update_field('mobile', $arr['mobile'], $postIdAr);
		update_field('hide_mobile', $hideMobile, $postIdAr);
		update_field('job_name', $arr['jobName'], $postIdAr);
		update_field('employment', $arr['empName'], $postIdAr);
		update_field('years_of_experience', $arr['yrExp'], $postIdAr);
		update_field('salary_from', $arr['fromSalary'], $postIdAr);
		update_field('salary_to', $arr['toSalary'], $postIdAr);
		update_field('negotiable', $nego, $postIdAr);
		update_field('vacancy', $arr['numVacant'], $postIdAr);
		update_field('remotely', $remotely, $postIdAr);
		update_field('job_description', $arr['jobDescription'], $postIdAr);

		if ($lang == "ar") {
			$rdUrl = home_url() . '/preview-standard-ads-ar?id=' . $postIdAr;
		}
	}
	pll_save_post_translations(array('en' => $postIdEn, 'ar' => $postIdAr));


	print $rdUrl;

	die();
	// if (wp_safe_redirect($rdUrl)){
	// 	 exit();
	// }

}
add_action('wp_ajax_addJobs', 'addJobs');
add_action('wp_ajax_nopriv_addJobs', 'addJobs');

/* job seeker add post */
function addResume()
{

	$lang = pll_current_language();
	//    global $wpdb;
	//    print_r($lang);
	//    die();
	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));
	//print_r($arr);

	// print_r($_FILES['fileAttach']);
	// print_r($_FILES['fileLogo']);


	$author = checkEmail($arr['email'], "job_seeker", $arr['name']);

	$data = array(
		'post_title' => wp_strip_all_tags($arr['name']),
		'post_status' => 'draft',
		'post_type' => 'jobseekers',
		'post_author' => $author,
		'post_category' => array(
			$arr['country'],
			$arr['city'],
			$arr['nationality'],
			$arr['degree'],
			$arr['jobClass'],
			$arr['language'],
			$arr['marital'],
			$arr['gender'],
			$subtype
		),
		'tags_input' => explode(",", $arr['skills'])
	);


	$postIdEn = wp_insert_post($data, $wp_error);

	if ($postIdEn) {

		pll_set_post_language($postIdEn, 'en');

		if (!empty($_FILES['fileAttach'])) {

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdEn, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		print_r($_FILES['fileLogo']);
		print_r($_FILES['filesCv']);
		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdEn, "logo", $arr['imgLogoDesc']);
		}

		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";
		$special = "off";
		if (!empty($_FILES['filesCv'])) {
			uploadFiles($_FILES['filesCv'], $postIdEn, "cv", $arr['imgLogoDesc']);
		}
		if (isset($arr['showEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['showMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}
		if (isset($arr['special'])) {
			$special = "on";
		}

		update_field('ads_id', "JAP" . $postIdEn, $postIdEn);
		update_field('email', $arr['email'], $postIdEn);
		update_field('hide_email', $hideEmail, $postIdEn);
		update_field('country_code', $arr['cCode'], $postIdEn);
		update_field('mobile', $arr['mobile'], $postIdEn);
		update_field('hide_mobile', $hideMobile, $postIdEn);
		update_field('special', $special, $postIdEn);
		update_field('age', $arr['age'], $postIdEn);
		update_field('years_of_experience', $arr['yrExp'], $postIdEn);
		update_field('remotely', $remotely, $postIdEn);
		update_field('position', $arr['position'], $postIdEn);
		$rdUrl = home_url() . '/preview-standard-ads?id=' . $postIdEn;
	}

	$postIdAr = wp_insert_post($data, $wp_error);

	if ($postIdAr) {

		pll_set_post_language($postIdAr, 'ar');

		if (!empty($_FILES['fileAttach'])) {

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdAr, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdAr, "logo", $arr['imgLogoDesc']);
		}

		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";
		$special = "off";
		if (!empty($_FILES['filesCv'])) {
			uploadFiles($_FILES['filesCv'], $postIdAr, "cv", $arr['imgLogoDesc']);
		}

		if (isset($arr['showEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['showMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}
		if (isset($arr['special'])) {
			$special = "on";
		}

		update_field('ads_id', "JAP" . $postIdAr, $postIdAr);
		update_field('email', $arr['email'], $postIdAr);
		update_field('hide_email', $hideEmail, $postIdAr);
		update_field('country_code', $arr['cCode'], $postIdAr);
		update_field('mobile', $arr['mobile'], $postIdAr);
		update_field('hide_mobile', $hideMobile, $postIdAr);
		update_field('special', $special, $postIdAr);
		update_field('age', $arr['age'], $postIdAr);
		update_field('years_of_experience', $arr['yrExp'], $postIdAr);
		update_field('remotely', $remotely, $postIdAr);
		update_field('position', $arr['position'], $postIdAr);

		if ($lang == "ar") {
			$rdUrl = home_url() . '/preview-standard-ads-ar?id=' . $postIdAr;
		}
	}
	pll_save_post_translations(array('en' => $postIdEn, 'ar' => $postIdAr));


	print $rdUrl;

	die();
	// if (wp_safe_redirect($rdUrl)){
	// 	 exit();
	// }
}


add_action('wp_ajax_addResume', 'addResume');
add_action('wp_ajax_nopriv_addResume', 'addResume');


// Update resume data
function updateResume()
{


	if (isset($_POST['data'])) {
		$dataArray = $_POST['data'];
		parse_str($dataArray, $arr);

		$id = $_POST['id'];
		$post = get_post($id);
		if ($post) {
			// Update post data with $arr
			// Update post 37
			$my_post = array(
				'ID'           => $id,
				'post_title'   => $arr['name'],
			);

			// Update the post into the database
			wp_update_post( $my_post );
			$myarray=array();
			foreach ($arr as $key => $value) {
				update_post_meta($id, $key, $value);
				$arrray=[$key=>$value];
         		array_push($myarray,$arrray);
			}
			// wp_set_post_categories($id, array($arr['marital']));
			// wp_set_post_categories($id, array($arr['gender']));
			// wp_set_post_categories($id, array($arr['nationality']));
			// wp_set_post_categories($id, array($arr['country']));
			// wp_set_post_categories($id, array($arr['city']));
			// wp_set_post_categories($id, array($arr['degree']));
			// wp_set_post_categories($id, array($arr['language']));

			$categories = array();
            if (isset($arr['marital'])) {
                $categories[] = $arr['marital'];
            }
            if (isset($arr['gender'])) {
                $categories[] = $arr['gender'];
            }
			if (isset($arr['nationality'])) {
                $categories[] = $arr['nationality'];
            }
			if (isset($arr['country'])) {
                $categories[] = $arr['country'];
            }
			if (isset($arr['city'])) {
                $categories[] = $arr['city'];
            }
			if (isset($arr['degree'])) {
                $categories[] = $arr['degree'];
            }
			if (isset($arr['jobClass'])) {
                $categories[] = $arr['jobClass'];
            }
			if (isset($arr['language'])) {
                $categories[] = $arr['language'];
            }
            // Add more conditions for other categories as needed

            if (!empty($categories)) {
                wp_set_post_categories($id, $categories); // Set post categories
            }

			if (!empty($_FILES['filesCv'])) {
				$newCv = $_FILES['filesCv'];
				$existingCvFileName = get_field("cv", $id); // Assuming you're using Advanced Custom Fields or similar
			
				uploadFiles($newCv, $id, "cv", $arr['cvDesc']); // Assuming $arr['cvDesc'] contains relevant description

			}

			if (!empty($_FILES['fileAttach'])) {
				$countArrays = count($_FILES['fileAttach']['size']) - 1;
				$x = 0;
				$arrayList = array();
			
				for ($x = 0; $x <= $countArrays; $x++) {
					$arrayList[] = array(
						"name" => $_FILES['fileAttach']['name'][$x],
						"type" => $_FILES['fileAttach']['type'][$x],
						"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
						"error" => $_FILES['fileAttach']['error'][$x],
						"size" => $_FILES['fileAttach']['size'][$x],
					);
				}
			
				$j = 0;
				$h = 0;
				foreach ($arrayList as $rowList) {
					// Assuming $postIdEn contains the unique identifier for the file you want to update
					$attachmentFieldName = "attachments" . $j++;
					$existingFileName = get_field($attachmentFieldName, $id); // Get the existing filename from your database or storage
			
					uploadFiles($rowList, $id, $attachmentFieldName, $arr['imgMultiDesc'][$h++]);
				}
			}

			if (!empty($_FILES['fileLogo'])) {
				$newLogo = $_FILES['fileLogo'];
				$existingLogoFileName = get_field("logo", $id); // Assuming you're using Advanced Custom Fields
			
				uploadFiles($newLogo, $id, "logo", $arr['imgLogoDesc']);
			}
			// wp_set_post_categories($id, array($arr['marital']));
			// wp_set_post_categories($id, array($arr['marital']));
			// wp_set_post_categories($id, array($arr['marital']));
			// wp_set_post_categories($id, array($arr['marital']));
			$rdUrl = get_permalink($id);
			$posts = get_post($id); // Refresh post data after update
			$result = json_encode($posts);
			//wp_redirect(get_permalink($id));
			print $rdUrl;
			//print_r($arr);
			//echo "Successfully updated";
			die();
		}
	}
	// // Ensure the script terminates
	// die();
}

// // Function to update custom fields
// function updateCustomFields($postId, $arr) {
//     // Update custom fields based on $arr and $postId
//     // Example:
//     update_field('email', $arr['email'], $postId);
//     update_field('hide_email', isset($arr['showEmail']) ? 'on' : 'off', $postId);
// 	update_field('');
//     // Update other custom fields as needed
// }

// Hook the function to WordPress AJAX
add_action('wp_ajax_updateResume', 'updateResume');
add_action('wp_ajax_nopriv_updateResume', 'updateResume');

// update employer data
function updateEmployer() {
    if (isset($_POST['data'])) {
        $dataArray = $_POST['data'];
        parse_str($dataArray, $arr);

        $id = $_POST['id'];
        $post = get_post($id);
        if ($post) {
            // Update post data with $arr
            $my_post = array(
                'ID'           => $id,
                'post_title'   => $arr['company'],
            );

            // Update the post into the database
            wp_update_post($my_post);

            // Update post meta
            foreach ($arr as $key => $value) {
                update_post_meta($id, $key, $value);
            }

            // Set post categories
            $categories = array();
            $category_fields = ['marital', 'pType', 'nationality', 'country', 'city', 'degree', 'jobClass', 'language'];
            foreach ($category_fields as $field) {
                if (isset($arr[$field])) {
                    $categories[] = $arr[$field];
                }
            }
            if (!empty($categories)) {
                wp_set_post_categories($id, $categories);
            }

			if (!empty($_FILES['fileAttach'])) {
				$countArrays = count($_FILES['fileAttach']['size']) - 1;
				$x = 0;
				$arrayList = array();
			
				for ($x = 0; $x <= $countArrays; $x++) {
					$arrayList[] = array(
						"name" => $_FILES['fileAttach']['name'][$x],
						"type" => $_FILES['fileAttach']['type'][$x],
						"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
						"error" => $_FILES['fileAttach']['error'][$x],
						"size" => $_FILES['fileAttach']['size'][$x],
					);
				}
			
				$j = 0;
				$h = 0;
				foreach ($arrayList as $rowList) {
					// Assuming $postIdEn contains the unique identifier for the file you want to update
					$attachmentFieldName = "attachments" . $j++;
					$existingFileName = get_field($attachmentFieldName, $id); // Get the existing filename from your database or storage
			
					uploadFiles($rowList, $id, $attachmentFieldName, $arr['imgMultiDesc'][$h++]);
				}
			}

			if (!empty($_FILES['fileLogo'])) {
				$newLogo = $_FILES['fileLogo'];
				$existingLogoFileName = get_field("logo", $id); // Assuming you're using Advanced Custom Fields
			
				uploadFiles($newLogo, $id, "logo", $arr['imgLogoDesc']);
			}


			$rdUrl = get_permalink($id);

            // Refresh post data after update
            $posts = get_post($id);
            $result = json_encode($posts);
			print $rdUrl;
            //print_r($arr);
            die();
        }
    }
}

// Hook the function to WordPress AJAX
add_action('wp_ajax_updateEmployer', 'updateEmployer');
add_action('wp_ajax_nopriv_updateEmployer', 'updateEmployer');

//service update data
function updateService() {
    if (isset($_POST['data'])) {
        $dataArray = $_POST['data'];
        parse_str($dataArray, $arr);

        $id = $_POST['id'];
        $post = get_post($id);
        if ($post) {
            // Update post data with $arr
            $my_post = array(
                'ID'           => $id,
                'post_title'   => $arr['storeName'],
            );

            // Update the post into the database
            wp_update_post($my_post);

            // Update post meta
            foreach ($arr as $key => $value) {
                update_post_meta($id, $key, $value);
            }

            // Set post categories
            $categories = array();
            $category_fields = ['serviceClass', 'pType', 'nationality', 'country', 'city', 'degree', 'jobClass', 'language'];
            foreach ($category_fields as $field) {
                if (isset($arr[$field])) {
                    $categories[] = $arr[$field];
                }
            }
            if (!empty($categories)) {
                wp_set_post_categories($id, $categories);
            }

			
			if (!empty($_FILES['fileAttach'])) {
				$countArrays = count($_FILES['fileAttach']['size']) - 1;
				$x = 0;
				$arrayList = array();
			
				for ($x = 0; $x <= $countArrays; $x++) {
					$arrayList[] = array(
						"name" => $_FILES['fileAttach']['name'][$x],
						"type" => $_FILES['fileAttach']['type'][$x],
						"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
						"error" => $_FILES['fileAttach']['error'][$x],
						"size" => $_FILES['fileAttach']['size'][$x],
					);
				}
			
				$j = 0;
				$h = 0;
				foreach ($arrayList as $rowList) {
					// Assuming $postIdEn contains the unique identifier for the file you want to update
					$attachmentFieldName = "attachments" . $j++;
					$existingFileName = get_field($attachmentFieldName, $id); // Get the existing filename from your database or storage
			
					uploadFiles($rowList, $id, $attachmentFieldName, $arr['imgMultiDesc'][$h++]);
				}
			}

			if (!empty($_FILES['fileLogo'])) {
				$newLogo = $_FILES['fileLogo'];
				$existingLogoFileName = get_field("logo", $id); // Assuming you're using Advanced Custom Fields
			
				uploadFiles($newLogo, $id, "logo", $arr['imgLogoDesc']);
			}

			$rdUrl = get_permalink($id);


            // Refresh post data after update
            $posts = get_post($id);
            $result = json_encode($posts);
			print $rdUrl;
            //print_r($arr);
            die();
        }
    }
}

// Hook the function to WordPress AJAX
add_action('wp_ajax_updateService', 'updateService');
add_action('wp_ajax_nopriv_updateService', 'updateService');

/* services add post*/
function addService()
{

	$lang = pll_current_language();
	//    global $wpdb;
	//    print_r($lang);
	//    die();
	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));
	//print_r($arr);

	// print_r($_FILES['fileAttach']);
	// print_r($_FILES['fileLogo']);


	$author = checkEmail($arr['email'], "service_provider", $arr['storeName']);
	$subtypeEn = 36;
	$shiftEn = 1120;
	if ($lang == "ar") {
		$subtype = 46;
	}
	if ($lang == "ar") {
		$shift = 1699;
	}
	$data = array(
		'post_title' => wp_strip_all_tags($arr['storeName']),
		'post_status' => 'draft',
		'post_type' => 'services',
		'post_author' => $author,
		'post_category' => array(
			$arr['country'],
			$arr['city'],
			$arr['language'],
			$arr['serviceClass'],
			$shiftEn,
		),
		'tags_input' => explode(",", $arr['skills'])
	);


	$postIdEn = wp_insert_post($data, $wp_error);

	if ($postIdEn) {

		pll_set_post_language($postIdEn, 'en');

		if (!empty($_FILES['fileAttach'])) {

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdEn, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdEn, "logo", $arr['imgLogoDesc']);
		}
		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";
		if (isset($arr['showEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['showMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}

		update_field('ads_id', "SAP" . $postIdEn, $postIdEn);
		update_field('email', $arr['email'], $postIdEn);
		update_field('hide_email', $hideEmail, $postIdEn);
		update_field('country_code', $arr['cCode'], $postIdEn);
		update_field('mobile', $arr['mobile'], $postIdEn);
		update_field('hide_mobile', $hideMobile, $postIdEn);

		update_field('service_desc', $arr['description'], $postIdEn);
		update_field('years_of_experience', $arr['yrExp'], $postIdEn);
		update_field('rating', $arr['rating'], $postIdEn);
		update_field('ave_salary', $arr['averageSalary'], $postIdEn);
		update_field('negotiable', $nego, $postIdEn);
		update_field('job_description', $arr['jobDescription'], $postIdEn);

		$rdUrl = home_url() . '/preview-standard-ads?id=' . $postIdEn;
	}

	$postIdAr = wp_insert_post($data, $wp_error);

	if ($postIdAr) {

		pll_set_post_language($postIdAr, 'ar');

		if (!empty($_FILES['fileAttach'])) {

			print_r($_FILES['fileAttach']);

			$countArrays = count($_FILES['fileAttach']['size']) - 1;
			$x = 0;
			$arrayList = array();

			for ($x = 0; $x <= $countArrays; $x++) {

				$arrayList[] = array(
					"name" => $_FILES['fileAttach']['name'][$x],
					"type" => $_FILES['fileAttach']['type'][$x],
					"tmp_name" => $_FILES['fileAttach']['tmp_name'][$x],
					"error" => $_FILES['fileAttach']['error'][$x],
					"size" => $_FILES['fileAttach']['size'][$x],
				);
			}

			$j = 0;
			$h = 0;
			foreach ($arrayList as $rowList) {

				uploadFiles($rowList, $postIdAr, "attachments" . $j++, $arr['imgMultiDesc'][$h++]);
			}
		}

		if (!empty($_FILES['fileLogo'])) {

			uploadFiles($_FILES['fileLogo'], $postIdAr, "logo", $arr['imgLogoDesc']);
		}

		$hideEmail = "off";
		$hideMobile = "off";
		$nego = "off";
		$remotely = "off";
		if (isset($arr['showEmail'])) {
			$hideEmail = "on";
		}
		if (isset($arr['showMobile'])) {
			$hideMobile = "on";
		}
		if (isset($arr['negotiable'])) {
			$nego = "on";
		}
		if (isset($arr['remotely'])) {
			$remotely = "on";
		}

		update_field('ads_id', "SAP" . $postIdAr, $postIdAr);
		update_field('email', $arr['email'], $postIdAr);
		update_field('hide_email', $hideEmail, $postIdAr);
		update_field('country_code', $arr['cCode'], $postIdAr);
		update_field('mobile', $arr['mobile'], $postIdAr);
		update_field('hide_mobile', $hideMobile, $postIdAr);

		update_field('service_desc', $arr['description'], $postIdAr);
		update_field('years_of_experience', $arr['yrExp'], $postIdAr);
		update_field('rating', $arr['rating'], $postIdAr);
		update_field('ave_salary', $arr['averageSalary'], $postIdAr);
		update_field('negotiable', $nego, $postIdAr);
		update_field('job_description', $arr['jobDescription'], $postIdAr);

		if ($lang == "ar") {
			$rdUrl = home_url() . '/preview-standard-ads-ar?id=' . $postIdAr;
		}
	}
	pll_save_post_translations(array('en' => $postIdEn, 'ar' => $postIdAr));


	print $rdUrl;

	die();
	// if (wp_safe_redirect($rdUrl)){
	// 	 exit();
	// }

}
add_action('wp_ajax_addService', 'addService');
add_action('wp_ajax_nopriv_addService', 'addService');

/* verify id */
function verifyId()
{

	$lang = pll_current_language();
	//global $wpdb;

	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));
	//print_r($arr);

	$output = array();
	$postId = substr($arr['adNumber'], 3);

	//print $postId;


	$post = get_post($postId);
	if (!$post) {

		$output['adId'] = "";
		$output['id'] = "";
		$output['status'] = 0;
		$output['message'] = '<div class="alert alert-warning" role="alert"><small>' . forceTranslate("No records found. Please check your Ads Number.", "No records found. Please check your Ads Number.") . '</small></div>';
	} else {

		$output['adId'] = $arr['adNumber'];
		$output['id'] = $postId;
		$output['status'] = 1;
		$output['message'] = '<div class="alert alert-info" role="alert"><small>' . forceTranslate("Ads Id verified. Please select a payment method.", "تم التحقق من رمز الإعلان. نرجو اختيار طريقة التحويل") . '</small></div>';
	}

	$jsonReturn = json_encode($output);

	print $jsonReturn;

	die();
}
add_action('wp_ajax_verifyId', 'verifyId');
add_action('wp_ajax_nopriv_verifyId', 'verifyId');

/* get cities*/
function getCities()
{

	$lang = pll_current_language();

	if (isset($_POST['dataId'])) {
		print getSelectCat($_POST['dataId'], 0);
	}

	die();
}
add_action('wp_ajax_getCities', 'getCities');
add_action('wp_ajax_nopriv_getCities', 'getCities');

/* update subs */
function updateSubs()
{

	$lang = pll_current_language();
	//global $wpdb;
	$currentlangaueopposite = 'en';
	if ($_POST['datasubs'] == "standard") {
		if ($lang == "en") {
			$subsCat = 36;
			$currentlangaueopposite = 'ar';
		} else {
			$subsCat = 46;
		}
	}

	if ($_POST['datasubs'] == "premium") {
		if ($lang == "en") {
			$subsCat = 38;
			$currentlangaueopposite = 'ar';
		} else {
			$subsCat = 42;
		}
	}

	//print $_POST['datasubs'];
	//print $_POST['dataid'];

	$category = get_category($subsCat);
	if ($category) {
		wp_set_post_categories($_POST['dataid'], array($subsCat), true);
	}

	$post = get_post($_POST['dataid']);
	$post->post_status = 'publish';
	$updatedPost = wp_update_post($post);
	if (!$updatedPost) {
		$output['status'] = 0;
	} else {
		$output['status'] = 1;
	}

	$arabic_post_id = pll_get_post($post->ID, $currentlangaueopposite);
	$arabic_post = get_post($arabic_post_id);
	$arabic_post->post_status = 'publish';
	$updatedPost = wp_update_post($arabic_post);
	$jsonReturn = json_encode($output);

	print $jsonReturn;

	die();
}
add_action('wp_ajax_updateSubs', 'updateSubs');
add_action('wp_ajax_nopriv_updateSubs', 'updateSubs');



function guestApply()
{
	$lang = pll_current_language();
	global $wpdb;

	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));

	// file handling 
	$noempty = $_FILES['fileAttach'];
	$customtesting = array();
	if (isset($_FILES['fileAttach']['error']) && is_array($_FILES['fileAttach']['error'])) {
		$attachments = array();
		$message_attachments = "";

		for ($index = 0; $index < count($_FILES['fileAttach']['name']); $index++) {
			$file_tmp_name = $_FILES['fileAttach']['tmp_name'][$index];
			$file = array(
				'name' => $_FILES['fileAttach']['name'][$index],
				'type' => $_FILES['fileAttach']['type'][$index],
				'tmp_name' => $_FILES['fileAttach']['tmp_name'][$index],
				'error' => $_FILES['fileAttach']['error'][$index],
				'size' => $_FILES['fileAttach']['size'][$index]
			);
			$file_data = wp_handle_upload($file, array('test_form' => false));
			array_push($customtesting, $file_data);
			if (!empty($file_data['error'])) {
				echo json_encode(['success' => false, 'error' => 'Error uploading file: ' . $file_data['error']]);
				die();
			} else {
				array_push($attachments, $file_data['file']);
				$access_url = $file_data['url']; // Assuming a URL structure for access
				$attachdesc = $arr['imgMultiDesc'][$index];
				$message_attachments .= "Attachment Description : $attachdesc\n Download file: $access_url\n";
			}
		}
	}



	$postId = $arr['postId'];
	$post = get_post($postId);

	$mobile = get_field("mobile", $postId);
	$cCode = get_field("country_code", $postId);
	$fullMobile = $cCode . $mobile;

	$permalink = get_permalink($postId);
	$posterName = $post->post_title;
	$posterEmail = get_field("email", $postId);
    $totalapplicants=0;
	if($post->post_type == "employers" || $post->post_type == "services"){
		if(metadata_exists('post',$postId,'applicantscounting')){
			$applicants=get_post_meta($postId,'applicantscounting',true);
			$applicants=intval($applicants);
			$applicants=$applicants + 1;
			update_post_meta($postId,'applicantscounting',$applicants);
		}else{
			add_post_meta($postId, 'applicantscounting','1',true);
		}
		$totalapplicants=get_post_meta($postId,'applicantscounting',true);
	}

	$posterMobile = $fullMobile;

	$applicantName = $arr['name'];
	$applicantEmail = $arr['email'];
	$applicantMessage = $arr['message'];
	$applicantMobile = $arr['cCode'] . $arr['mobile'];


	$applicantMsg = 'Greetings ' . $applicantName . ':

    Thank you for having an interest in an ad(s) on our website. 
    For more inquiry or support, contact us at coms@job3ml.com.

    JOB3ML
    ';

	$posterMsg = 'Greetings ' . $posterName . ':

    Someone is interested in your ad(s). Below are the details.

    - Name: ' . $applicantName . ' 
    - Email Address: ' . $applicantEmail . '
    - Mobile Number: ' . $applicantMobile . '
    - Message: ' . $applicantMessage . '

    For more inquiry or support, contact us at coms@job3ml.com.

    JOB3ML
    ';

	$posterMsg .= "\nAttached files can be downloaded from the following links:\n$message_attachments";

	$emailApplicant = sendEmail($applicantEmail, "JOB3ML", $applicantMsg);

	// Handle errors in sending email to applicant
	// if (!$emailApplicant) {
	//     echo json_encode(['success' => false, 'error' => 'Error sending email to applicant.']);
	//     die();coms@job3ml.com
	// }

	$to = $posterEmail;
	$subject = 'You received a reply to your post on Job3ml.com';
	$headers = array();

	// Send email to poster with attachments
	$emailSent = wp_mail($to, $subject, $posterMsg, $headers, $attachments);

	// Handle errors in sending email to poster
	if (!$emailSent) {
		echo json_encode(['success' => false, 'error' => 'Error sending email to poster.']);
		die();
	}
	if ($lang == 'ar') {
		echo json_encode(['success' => true, 'successmessage' => "تم ارسال الطلب بنجاح",'applicants'=>$totalapplicants]);
	} else {
		echo json_encode(['success' => true, 'successmessage' => "form submitted successfully", 'dataarray' => $arr,'applicants'=>$totalapplicants]);
	}
	die();
}


add_action('wp_ajax_guestApply', 'guestApply');
add_action('wp_ajax_nopriv_guestApply', 'guestApply');

/*delete post */
function deletePost()
{

	$lang = pll_current_language();

	global $wpdb;

	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;

	$post_id = $_POST['data'];
	$deleteThisPost = wp_trash_post($post_id);

	if ($deleteThisPost) {
		print home_url() . "/user/" . $current_user->user_login;
	} else {
		print 0;
	}

	die();
}
add_action('wp_ajax_deletePost', 'deletePost');
add_action('wp_ajax_nopriv_deletePost', 'deletePost');

/*search post 
function searchPost(){
	
	$lang = pll_current_language();

    global $wpdb;
	$jsonEncode = json_encode(parse_str($_POST['data'], $arr));
	print_r($arr);

	
	die();
}
add_action('wp_ajax_searchPost', 'searchPost');
add_action('wp_ajax_nopriv_searchPost', 'searchPost');
*/

/* check user*/
function checkEmail($email, $type, $postname)
{

	$userId = "";
	$getCurrUser = get_current_user_id();

	if ($checkUserLoggedIn != 0) {

		$userId = $getCurrUser;
	} else {

		$emailExist = email_exists($email);
		if ($emailExist != false) {
			$userId = $emailExist;
		} else {
			$guestUserName = "Guest-" . $type . "-" . uniqid();
			$guestPass = "guest-" . $email;


			$addUser = wp_create_user($guestUserName, $guestPass, $email);
			if (!is_wp_error($addUser)) {
				$user = get_user_by('id', $addUser);
				$user->set_role($type);
				$userId = $addUser;
				$urlmp = str_replace(' ', '-', $postname);
				$completeurl = get_home_url() . '/' . $urlmp;
				$message = '
		        Greetings:

		        Thank you for registering. Below was your temporary password for you to edit and activate your posted ad.
		        Kindly change your password upon logging in.

		        Password: ' . $guestPass . '

		        For more inquiry or support, contact us at coms@job3ml.com.

		        JOB3ML
			    ';
				$newmessage = 'Greetings:
Thank you for Posting an advertisement on Job3ml. Click on the following link to publish your advertisement: ' . $completeurl . '.
You can also complete your registration process with this email address to edit and keep track of your ads. Below is your temporary password. Kindly change your password upon login.
Password: ' . $guestPass . '
For more inquiry or support, contact us at coms@job3ml.com.JOB3ML
				';

				sendEmail($email, "Publish your Job3ml advertisement", $newmessage);
			}
		}
	}

	return $userId;
}

function sendEmail($to, $subject, $message)
{

	// Set the email headers.
	$headers = array(
		'From' => 'info@job3ml.com',
		'Reply-To' => 'coms@job3ml.com',
		'Content-Type' => 'text/html'
	);
	// Send the email.
	// Set the "From" name using the wp_mail_from_name filter.
	add_filter('wp_mail_from_name', function () {
		return 'Job3ml';
	});
	wp_mail($to, $subject, $message, $headers);
}

/* upload files*/
function uploadFiles($file, $postId, $field, $caption)
{

	$fileName = $file['file'];
	$fileUrl = $file['url'];

	$uploaded_file = wp_upload_bits($file['name'], null, @file_get_contents($file['tmp_name']));
	$filetype = wp_check_filetype(basename($uploaded_file['file']), null);
	$wp_upload_dir = wp_upload_dir();
	$attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename($uploaded_file['file']),
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace('/\.[^.]+$/', '', basename($uploaded_file['file'])),
		'post_excerpt'   => $caption,
		'post_status'    => 'inherit'
	);

	$attach_id = wp_insert_attachment($attachment, $uploaded_file['file'], $postId);
	update_field($field, $attach_id, $postId);
}

function uploadInvoice($file, $postId, $field, $caption)
{

	$fileName = $file['file'];
	$fileUrl = $file['url'];

	$uploaded_file = wp_upload_bits($file['name'], null, @file_get_contents($file['tmp_name']));
	$filetype = wp_check_filetype(basename($uploaded_file['file']), null);
	$wp_upload_dir = wp_upload_dir();
	$attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename($uploaded_file['file']),
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace('/\.[^.]+$/', '', basename($uploaded_file['file'])),
		'post_excerpt'   => $caption,
		'post_status'    => 'inherit'
	);

	$attach_id = wp_insert_attachment($attachment, $uploaded_file['file'], $postId);

	return $attach_id;
}

/* get categories */
function getSelectCat($termIdEn, $termIdAr)
{

	$lang = pll_current_language();
	$termId = $termIdEn;
	if ($lang == "ar" && $termIdAr != 0) {
		$termId = $termIdAr;
	}

	$output = '';
	$categories = get_categories(
		array(
			'parent' =>  $termId,
			'orderby' => 'ID',
			'order' => 'ASC',
			'hide_empty' => false
		)
	);

	$arrayCats = array();

	/*
	$arrayCats[] = '
		<option value="0" selected disabled>'.forceTranslate('Please select','الرجاء التحديد').'</option>
	';
	*/
	foreach ($categories as $childCat) {
		$arrayCats[] = '
			<option value="' . $childCat->term_id . '">' . $childCat->name . '</option>
		';
	}

	$output = implode('', $arrayCats);

	return $output;

	die();
}

function getPostById($postId, $postType)
{

	$lang = pll_current_language();

	$post_ids_fetched = array($postId);
	$args = array(
		'post__in' => $post_ids_fetched,
		'post_type' => $postType,
		'post_status' => 'any, auto-draft',
	);

	$postData = get_posts($args);

	//print_r($postData);

	foreach ($postData as $rowData) {
		//print_r($rowData);
		return $rowData;
	}
}

function getCatByPost($postId, $listCat)
{

	$lang = pll_current_language();

	if (pll_get_post_language($postId) == "en") {

		$country = 840;
		$education = 868;
		$eng_pro = 1128;
		$gender = 48;
		$job_class = 900;
		$service_class = 1796;
		$nationality = 432;
		$shift = 1116;
		$subType = 40;
		$marital = 1749;
		$arrayParent = array(840, 868, 1128, 48, 900, 432, 1116, 40, 1749, 1796);
	} else if (pll_get_post_language($postId) == "ar") {

		$country = 842;
		$education = 870;
		$eng_pro = 1321;
		$gender = 50;
		$job_class = 902;
		$service_class = 1848;
		$nationality = 434;
		$shift = 1691;
		$subType = 44;
		$marital = 1765;
		$arrayParent = array(842, 870, 1321, 50, 902, 434, 1691, 44, 1765, 1848);
	}

	//print_r($listCat);

	$arrayList = array();

	$Pcountry = "";
	$Pcity = "";
	$Peducation = "";
	$Peng_pro = "";
	$Pgender = "";
	$Pjob_class = "";
	$Pservice_class = "";
	$Pnationality = "";
	$Pshift = "";
	$PsubType = "";
	$Pmarital = "";

	$currentcountry = "";
	foreach ($listCat as $catlistRow) {

		$checkParent =  get_term($catlistRow);


		if (!in_array($checkParent->parent, $arrayParent)) {

			$parentid = get_term($checkParent->parent);


			if ($checkParent->parent == $currentcountry || (isset($parentid->parent) && in_array($parentid->parent, $arrayParent))) {
				$Pcity = $checkParent->name;
			}

			$Pservice = $checkParent->name;
		} else {
			if ($checkParent->parent == $country) {
				$Pcountry = $checkParent->name;
				$currentcountry = $checkParent->term_id;
			}
			if ($checkParent->parent == $education) {
				$Peducation = $checkParent->name;
			}
			if ($checkParent->parent == $eng_pro) {
				$Peng_pro = $checkParent->name;
			}
			if ($checkParent->parent == $gender) {
				$Pgender = $checkParent->name;
			}
			if ($checkParent->parent == $job_class) {
				$Pjob_class = $checkParent->name;
			}
			if ($checkParent->parent == $service_class) {
				$Pservice_class = $checkParent->name;
			}
			if ($checkParent->parent == $nationality) {
				$Pnationality = $checkParent->name;
			}
			if ($checkParent->parent == $shift) {
				$Pshift = $checkParent->name;
			}
			if ($checkParent->parent == $subType) {
				$PsubType = $checkParent->name;
			}
			if ($checkParent->parent == $marital) {
				$Pmarital = $checkParent->name;
			}
		}
	}

	$arrayList["country"] = $Pcountry;
	$arrayList["city"] = $Pcity;
	$arrayList["education"] = $Peducation;
	$arrayList["eng_pro"] = $Peng_pro;
	$arrayList["gender"] = $Pgender;
	$arrayList["job_class"] = $Pjob_class;
	$arrayList["service_class"] = $Pservice_class;
	$arrayList["nationality"] = $Pnationality;
	$arrayList["shift"] = $Pshift;
	$arrayList["subType"] = $PsubType;
	$arrayList["marital"] = $Pmarital;

	return $arrayList;
}

function excerptThis($text, $cutOffLength)
{

	$charAtPosition = "";
	$titleLength = strlen($text);

	do {
		$cutOffLength++;
		$charAtPosition = substr($text, $cutOffLength, 1);
	} while ($cutOffLength < $titleLength && $charAtPosition != " ");

	return substr($text, 0, $cutOffLength) . '...';
}

function datePosted($date)
{
	$lang = pll_current_language();
	$post_date = date('Y-m-d', strtotime($date));
	$today = date('Y-m-d');
	$diff = abs(strtotime($today) - strtotime($post_date));
	$days = floor($diff / 86400);

	if ($days == 0) {
		return forceTranslate("Today", "اليوم");
	} else {
		if ($lang == 'ar') {
			$arabicNumber = convertToArabicNumerals($days);
			return $arabicNumber . " " . forceTranslate("days ago", "أيام مضت");
		} else {
			return $days . " " . forceTranslate("days ago", "أيام مضت");
		}
	}
}
function convertToArabicNumerals($number)
{
	$arabicNumerals = [
		'0' => '٠',
		'1' => '١',
		'2' => '٢',
		'3' => '٣',
		'4' => '٤',
		'5' => '٥',
		'6' => '٦',
		'7' => '٧',
		'8' => '٨',
		'9' => '٩',
	];

	$arabicNumber = '';
	$number = (string)$number;

	for ($i = 0; $i < strlen($number); $i++) {
		$arabicNumber .= isset($arabicNumerals[$number[$i]]) ? $arabicNumerals[$number[$i]] : $number[$i];
	}

	return $arabicNumber;
}



function getTags($postId)
{



	$output = "";

	$arrayList = array();

	$tags = get_the_tags($postId);

	if (!empty($tags)) {
		foreach ($tags as $tagRow) {
			$arrayList[] = '<span class="smBox">' . $tagRow->name . '</span>';
		}

		$output .= implode(" ", $arrayList);
	}



	return $output;
}

function is_admin_user()
{
	return current_user_can('manage_options');
}

function redirect_after_login($user_login, $user)
{

	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;

	$redirectLink = home_url() . "/user/" . $current_user->user_login;

	if (is_admin_user()) {
		$redirectLink = home_url() . "/wp-admin";
	}

	wp_redirect($redirectLink);
	exit;
}
add_action('wp_login', 'redirect_after_login', 10, 2);

// Your existing code...

function check_and_publish_posts_daily()
{
	error_log('Cron job started: ' . date('Y-m-d H:i:s'));

	global $wpdb;
	$current_date = current_time('Y-m-d');
	// Retrieve posts from wp_job_payments table
	$payment_posts = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT post_id FROM wp_jobs_payment WHERE payment_status = 'paid' AND date_start = %s",
			$current_date
		)

	);

	// Check and publish posts in wp_posts
	foreach ($payment_posts as $payment_post) {
		$post_id = $payment_post->post_id;
		$othrlangid = pll_get_post_translations($post_id);
		$englishpoststatus = get_post_status($othrlangid['en']);
		$arabicpoststatus = get_post_status($othrlangid['ar']);

		if ($arabicpoststatus == 'draft' || $arabicpoststatus == 'pending' || $englishpoststatus == 'draft' || $englishpoststatus == 'pending') {
			// Update post status to 'publish'


			$updated_eng_post = array(
				'ID'          => $othrlangid['en'],
				'post_status' => 'publish',
				'post_date'   => $current_date,
			);
			$updated_ara_post = array(
				'ID'          => $othrlangid['ar'],
				'post_status' => 'publish',
				'post_date'   => $current_date,
			);
			wp_update_post($updated_eng_post);
			wp_update_post($updated_ara_post);
		}
	}
	error_log('Cron job finished: ' . $arabicpoststatus);
}

// Schedule cron job to run check_and_publish_posts_daily() daily
if (!wp_next_scheduled('check_and_publish_cron_daily')) {
	wp_schedule_event(time(), 'hourly', 'check_and_publish_cron_daily');
}

// Hook the function to the scheduled cron job
add_action('check_and_publish_cron_daily', 'check_and_publish_posts_daily');

function manual_cron_execution_button()
{
	ob_start();
?>
	<form method="post" action="">
		<input type="hidden" name="manual_cron_execution" value="1">
		<button type="submit">Run Manual Cron</button>
	</form>
<?php
	return ob_get_clean();
}
add_shortcode('manual_cron_execution_button', 'manual_cron_execution_button');

function handle_manual_cron_execution()
{
	if (isset($_POST['manual_cron_execution'])) {
		// Run the function when the form is submitted
		check_and_update_post_status_daily();

		// Optionally, redirect or display a success message
		// header('Location: /your-success-page');
		// exit;
	}
}
add_action('init', 'handle_manual_cron_execution');

function check_and_update_post_status_daily()
{

	global $wpdb;

	// Get the current date in Y-m-d format
	$current_date = current_time('Y-m-d');

	// Get the end of the day in the current timezone
	$previous_day = date('Y-m-d', strtotime("$current_date -1 day"));
	//    $end_of_day = date('Y-m-d H:i:s', strtotime("$current_date 23:59:59"));

	// Retrieve posts from wp_job_payments table with paid status and date_end passed
	$payment_posts = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT post_id FROM wp_jobs_payment WHERE payment_status = 'paid' AND date_end = %s",
			$previous_day
		)
	);

	// Check and update post status in wp_posts
	foreach ($payment_posts as $payment_post) {
		$post_id = $payment_post->post_id;
		$othrlangid = pll_get_post_translations($post_id);
		$englishpoststatus = get_post_status($othrlangid['en']);
		$arabicpoststatus = get_post_status($othrlangid['ar']);
		// Check if the post is published
		$post_status = get_post_status($post_id);

		if ($post_status == 'publish') {
			// Update post status to 'draft'
			$updated_post_en = array(
				'ID'          => $othrlangid['en'],
				'post_status' => 'draft',
			);
			$updated_post_ar = array(
				'ID'          => $othrlangid['ar'],
				'post_status' => 'draft',
			);

			wp_update_post($updated_post_en);
			wp_update_post($updated_post_ar);
		}
	}
	error_log('Cron job finished: ' . $previous_day);
}
// Schedule cron job to run check_and_update_post_status_daily() daily
if (!wp_next_scheduled('check_and_update_status_cron_daily')) {
	wp_schedule_event(strtotime('00:01:00'), 'daily', 'check_and_update_status_cron_daily');
}

// Hook the function to the scheduled cron job
add_action('check_and_update_status_cron_daily', 'check_and_update_post_status_daily');


/**
 * Filter password reset request email's body.
 *
 * @param string $message
 * @param string $key 
 * @param string $user_login
 * @return string
 */
function wpdocs_retrieve_password_message($message, $key, $user_login)
{
	$user_data = get_user_by('login', $user_login);
	$user_email = $user_data->user_email;
	$site_name  = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
	$reset_link = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login');

	// Create new message
	$message = __('Someone has requested a password reset for an account associated with this email address: ' . $user_email) . "\n";
	$message .= sprintf(__('Site Name: %s'), network_home_url('/')) . "\n";
	$message .= sprintf(__('Username: %s', 'text_domain'), $user_login) . "\n";
	$message .= __('If this was a mistake, just ignore this email and nothing will happen.', 'text_domain') . "\n";
	$message .= __('To reset your password, visit the following address:', 'text_domain') . "\n";
	$message .= $reset_link . "\n";

	return $message;
}

add_filter('retrieve_password_message', 'wpdocs_retrieve_password_message', 20, 3);
// Set the "From" name using the wp_mail_from_name filter.
add_filter('wp_mail_from_name', function () {
	return 'Job3ml';
});



function check_payment_limits()
{

	if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'jobs_payment';
		$starting_date_value = sanitize_text_field($_POST['startDate']); // Sanitize input
		$end_date_value = sanitize_text_field($_POST['endDate']);
		$currentid = sanitize_text_field($_POST['postId']);
		$query = $wpdb->prepare(
			"SELECT * FROM $table_name WHERE (date_start BETWEEN %s AND %s) OR (date_end BETWEEN %s AND %s)",
			$starting_date_value,
			$end_date_value,
			$starting_date_value,
			$end_date_value
		);
		$results = $wpdb->get_results($query);
		// $arrabicengarray=array();
		// foreach ($results as $row){
		//      $arrayversion=pll_get_post_translations($row->post_id);
		// 	array_push($arrabicengarray,$arrayversion);

		// }


		wp_send_json($results); // Assuming you want to send JSON response

	}
}


add_action('wp_ajax_check_payment_limits', 'check_payment_limits');
add_action('wp_ajax_nopriv_check_payment_limits', 'check_payment_limits');

// post renew ajax request
function renewpost()
{

	if (isset($_POST['post_id'])) {
		// Assuming you want to send JSON response

		$current_date = current_time('mysql');
		$post_data = array(
			'ID' => $_POST['post_id'],
			'post_date' => $current_date,
			'post_date_gmt' => get_gmt_from_date($current_date)
		);


		wp_update_post($post_data);

		// updating arabic version

		$arpost = pll_get_post($_POST['post_id'], (pll_get_post_language($_POST['post_id']) == 'ar') ? 'en' : 'ar');

		$post_data = array(
			'ID' => $arpost,
			'post_date' => $current_date,
			'post_date_gmt' => get_gmt_from_date($current_date)
		);


		wp_update_post($post_data);
		wp_send_json('Publish date updated to the current date and time!');
	}
}


add_action('wp_ajax_renewpost', 'renewpost');
add_action('wp_ajax_nopriv_renewpost', 'renewpost');

// register new users 

function registerNewUser()
{
	echo 'registerNewUser';
}

add_action('wp_ajax_registerNewUser', 'registerNewUser');
add_action('wp_ajax_nopriv_registerNewUser', 'registerNewUser');

// my new cron job 

// Schedule the event when the theme is activated
// Add a new interval of 300 seconds (5 minutes)
function my_function_to_run_every_5_minutes()
{
	// Code to execute every 5 minutes
	error_log("Function executed at " . date("Y-m-d H:i:s")); // Example logging
}

add_filter('cron_schedules', 'my_custom_cron_interval');
function my_custom_cron_interval($schedules)
{
	$schedules['every_five_minutes'] = array(
		'interval' => 300,
		'display' => __('Every 5 Minutes')
	);
	return $schedules;
}

// Schedule the event
add_action('my_custom_cron_interval', 'my_function_to_run_every_5_minutes');


/**
 * Custom validation and error message for the E-mail Address field.
 */
add_action('um_custom_field_validation_user_email_details', 'um_custom_validate_user_email_details', 999, 3);
function um_custom_validate_user_email_details($key, $array, $args)
{
	if ($key == 'user_email' && isset($args['user_email'])) {
		if (isset(UM()->form()->errors['user_email'])) {
			unset(UM()->form()->errors['user_email']);
		}
		if (empty($args['user_email'])) {
			UM()->form()->add_error('user_email', __('E-mail Address is required', 'ultimate-member'));
		} elseif (!is_email($args['user_email'])) {
			UM()->form()->add_error('user_email', __('The email you entered is invalid', 'ultimate-member'));
		} elseif (email_exists($args['user_email'])) {
			UM()->form()->add_error('user_email', __('The email you entered is already registered', 'ultimate-member'));
			/*?>
			<script>
				alert('The email you entered is already registered');
			</script>
			<?php*/
		}
	}
}

// Hook to the um_before_form_submit action
add_action('um_before_form_submit', 'um_custom_display_errors_on_form', 10);

function um_custom_display_errors_on_form()
{
	// Check if there are any custom errors in Ultimate Member's form object
	if (isset(UM()->form()->errors) && is_array(UM()->form()->errors)) {
		// Loop through the errors and display them
		foreach (UM()->form()->errors as $field_key => $error_message) {
			echo '<div class="um-field um-field-' . esc_attr($field_key) . ' um-error">';
			echo '<strong>' . esc_html($error_message) . '</strong>';
			echo '</div>';
		}
	}
}
// function custom_um_email_validation($valid, $args)
// {
//     // Check if the email already exists
//     if (email_exists($args['user_email'])) {
//         $valid = new WP_Error('registration-error-email-exists', __('Email already exists.', 'job3'));
//     }

//     return $valid;
// }

// add_filter('um_registration_check', 'custom_um_email_validation', 10, 2);

// add options in customiser for logos

function theme_customizer_logo_section($wp_customize) {
    $wp_customize->add_section('theme_logo_section', array(
        'title' => __('Logo', 'Job3'),
        'priority' => 30,
    ));

    // Add setting for header logo image
    $wp_customize->add_setting('theme_english_logo_header', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add control for header english logo image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_english_logo_header', array(
        'label' => __('Upload English Header Logo', 'abyatona'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_english_logo_header',
    )));

    // Add setting for header arabic logo image
    $wp_customize->add_setting('theme_arabic_logo_header', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add control for header logo image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_arabic_logo_header', array(
        'label' => __('Upload Arabic Header Logo', 'abyatona'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_arabic_logo_header',
    )));

	   // Add setting for header logo image
	   $wp_customize->add_setting('theme_english_logo_footer', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add control for header english logo image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_english_logo_footer', array(
        'label' => __('Upload English Footer Logo', 'abyatona'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_english_logo_footer',
    )));

    // Add setting for header arabic logo image
    $wp_customize->add_setting('theme_arabic_logo_footer', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add control for header logo image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_arabic_logo_footer', array(
        'label' => __('Upload Arabic Footer Logo', 'abyatona'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_arabic_logo_footer',
    )));

    // // Add setting for normal logo image
    // $wp_customize->add_setting('theme_logo', array(
    //     'default' => '',
    //     'transport' => 'refresh',
    // ));

    // // Add control for header logo image
    // $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_logo', array(
    //     'label' => __('Upload  Logo', 'abyatona'),
    //     'section' => 'theme_logo_section',
    //     'settings' => 'theme_logo',
    // )));
}
add_action('customize_register', 'theme_customizer_logo_section');