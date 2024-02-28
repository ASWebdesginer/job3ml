<?php

/**

 * Template for the profile page

 *

 * This template can be overridden by copying it to yourtheme/ultimate-member/templates/profile.php

 *

 * Page: "Profile"

 *

 * @version 2.6.9

 *

 * @var string $mode

 * @var int    $form_id

 * @var array  $args

 */

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

$description_key = UM()->profile()->get_show_bio_key( $args );

?>



<style>

	.um-profile-note,.um-profile-nav{display:none !important;}

</style>



<?php 

	$lang = pll_current_language();

    $fontLang = "fnt-Montserrat";

    if($lang == "ar"){

        $fontLang = "fnt-NotoSansArabic";

    }



?>



<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?> um-role-<?php echo esc_attr( um_user( 'role' ) ); ?> ">



	<div class="um-form" data-mode="<?php echo esc_attr( $mode ) ?>">



		<?php

		/**

		 * UM hook

		 *

		 * @type action

		 * @title um_profile_before_header

		 * @description Some actions before profile form header

		 * @input_vars

		 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage add_action( 'um_profile_before_header', 'function_name', 10, 1 );

		 * @example

		 * <?php

		 * add_action( 'um_profile_before_header', 'my_profile_before_header', 10, 1 );

		 * function my_profile_before_header( $args ) {

		 *     // your code here

		 * }

		 * ?>

		 */

		do_action( 'um_profile_before_header', $args );



		if ( um_is_on_edit_profile() ) { ?>

			<form method="post" action="" data-description_key="<?php echo esc_attr( $description_key ); ?>">

		<?php }



		/**

		 * UM hook

		 *

		 * @type action

		 * @title um_profile_header_cover_area

		 * @description Profile header cover area

		 * @input_vars

		 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage add_action( 'um_profile_header_cover_area', 'function_name', 10, 1 );

		 * @example

		 * <?php

		 * add_action( 'um_profile_header_cover_area', 'my_profile_header_cover_area', 10, 1 );

		 * function my_profile_header_cover_area( $args ) {

		 *     // your code here

		 * }

		 * ?>

		 */

		do_action( 'um_profile_header_cover_area', $args );



		/**

		 * UM hook

		 *

		 * @type action

		 * @title um_profile_header

		 * @description Profile header area

		 * @input_vars

		 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage add_action( 'um_profile_header', 'function_name', 10, 1 );

		 * @example

		 * <?php

		 * add_action( 'um_profile_header', 'my_profile_header', 10, 1 );

		 * function my_profile_header( $args ) {

		 *     // your code here

		 * }

		 * ?>

		 */

		do_action( 'um_profile_header', $args );



		/**

		 * UM hook

		 *

		 * @type filter

		 * @title um_profile_navbar_classes

		 * @description Additional classes for profile navbar

		 * @input_vars

		 * [{"var":"$classes","type":"string","desc":"UM Posts Tab query"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage

		 * <?php add_filter( 'um_profile_navbar_classes', 'function_name', 10, 1 ); ?>

		 * @example

		 * <?php

		 * add_filter( 'um_profile_navbar_classes', 'my_profile_navbar_classes', 10, 1 );

		 * function my_profile_navbar_classes( $classes ) {

		 *     // your code here

		 *     return $classes;

		 * }

		 * ?>

		 */

		$classes = apply_filters( 'um_profile_navbar_classes', '' ); ?>



		<div class="um-profile-navbar <?php echo esc_attr( $classes ); ?> hideThis">

			<?php

			/**

			 * UM hook

			 *

			 * @type action

			 * @title um_profile_navbar

			 * @description Profile navigation bar

			 * @input_vars

			 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

			 * @change_log

			 * ["Since: 2.0"]

			 * @usage add_action( 'um_profile_navbar', 'function_name', 10, 1 );

			 * @example

			 * <?php

			 * add_action( 'um_profile_navbar', 'my_profile_navbar', 10, 1 );

			 * function my_profile_navbar( $args ) {

			 *     // your code here

			 * }

			 * ?>

			 */

			//do_action( 'um_profile_navbar', $args ); ?>

			<div class="um-clear"></div>

		</div>



		<?php

		/**

		 * UM hook

		 *

		 * @type action

		 * @title um_profile_menu

		 * @description Profile menu

		 * @input_vars

		 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

		 * @change_log

		 * ["Since: 2.0"]

		 * @usage add_action( 'um_profile_menu', 'function_name', 10, 1 );

		 * @example

		 * <?php

		 * add_action( 'um_profile_menu', 'my_profile_navbar', 10, 1 );

		 * function my_profile_navbar( $args ) {

		 *     // your code here

		 * }

		 * ?>

		 */

		do_action( 'um_profile_menu', $args );



		if ( um_is_on_edit_profile() || UM()->user()->preview ) {



			$nav = 'main';

			$subnav = UM()->profile()->active_subnav();

			$subnav = ! empty( $subnav ) ? $subnav : 'default'; ?>



			<div class="um-profile-body <?php echo esc_attr( $nav . ' ' . $nav . '-' . $subnav ); ?>">



				<?php

				/**

				 * UM hook

				 *

				 * @type action

				 * @title um_profile_content_{$nav}

				 * @description Custom hook to display tabbed content

				 * @input_vars

				 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

				 * @change_log

				 * ["Since: 2.0"]

				 * @usage add_action( 'um_profile_content_{$nav}', 'function_name', 10, 1 );

				 * @example

				 * <?php

				 * add_action( 'um_profile_content_{$nav}', 'my_profile_content', 10, 1 );

				 * function my_profile_content( $args ) {

				 *     // your code here

				 * }

				 * ?>

				 */

				do_action("um_profile_content_{$nav}", $args);



				/**

				 * UM hook

				 *

				 * @type action

				 * @title um_profile_content_{$nav}_{$subnav}

				 * @description Custom hook to display tabbed content

				 * @input_vars

				 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

				 * @change_log

				 * ["Since: 2.0"]

				 * @usage add_action( 'um_profile_content_{$nav}_{$subnav}', 'function_name', 10, 1 );

				 * @example

				 * <?php

				 * add_action( 'um_profile_content_{$nav}_{$subnav}', 'my_profile_content', 10, 1 );

				 * function my_profile_content( $args ) {

				 *     // your code here

				 * }

				 * ?>

				 */

				do_action( "um_profile_content_{$nav}_{$subnav}", $args ); ?>



				<div class="clear"></div>

			</div>



			<?php if ( ! UM()->user()->preview ) { ?>



			</form>



			<?php }

		} else {

			$menu_enabled = UM()->options()->get( 'profile_menu' );

			$tabs = UM()->profile()->tabs_active();



			$nav = UM()->profile()->active_tab();

			$subnav = UM()->profile()->active_subnav();

			$subnav = ! empty( $subnav ) ? $subnav : 'default';



			if ( $menu_enabled || ! empty( $tabs[ $nav ]['hidden'] ) ) { ?>

				

				<div class="um-profile-body <?php echo esc_attr( $nav . ' ' . $nav . '-' . $subnav ); ?>">



					<?php

					// Custom hook to display tabbed content

					/**

					 * UM hook

					 *

					 * @type action

					 * @title um_profile_content_{$nav}

					 * @description Custom hook to display tabbed content

					 * @input_vars

					 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

					 * @change_log

					 * ["Since: 2.0"]

					 * @usage add_action( 'um_profile_content_{$nav}', 'function_name', 10, 1 );

					 * @example

					 * <?php

					 * add_action( 'um_profile_content_{$nav}', 'my_profile_content', 10, 1 );

					 * function my_profile_content( $args ) {

					 *     // your code here

					 * }

					 * ?>

					 */

					do_action("um_profile_content_{$nav}", $args);



					/**

					 * UM hook

					 *

					 * @type action

					 * @title um_profile_content_{$nav}_{$subnav}

					 * @description Custom hook to display tabbed content

					 * @input_vars

					 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]

					 * @change_log

					 * ["Since: 2.0"]

					 * @usage add_action( 'um_profile_content_{$nav}_{$subnav}', 'function_name', 10, 1 );

					 * @example

					 * <?php

					 * add_action( 'um_profile_content_{$nav}_{$subnav}', 'my_profile_content', 10, 1 );

					 * function my_profile_content( $args ) {

					 *     // your code here

					 * }

					 * ?>

					 */

					do_action( "um_profile_content_{$nav}_{$subnav}", $args ); ?>



					<div class="clear"></div>

				</div>

				

			<?php }

		}



		do_action( 'um_profile_footer', $args ); ?>

		

		

		<h3 class="<?php print $fontLang;?>"><?php echo ($lang == 'ar') ? 'الإعلانات الأخيرة' : 'Recent Ads';?></h3>

		<div class="spacer-20"></div>

		<?php 

		

			



			$profile_id = um_profile_id();

			

			//print $profile_id;

			

			$args = array(

				'post_type'     => array( 'employers','jobseekers','services' ),

				'author'   =>  $profile_id,

				'orderby'       =>  'post_date',

				'order'         =>  'DESC',

				'posts_per_page' => '-1',

			);

			

			$author_posts =  get_posts($args);

		?>

			

		<?php

			if($author_posts){

				

				$getPost = array();

				$getPostArray = array();

				

				foreach($author_posts as $rowPost){

				

					$post_categories = wp_get_post_categories($rowPost->ID);



					//print $rowPost->post_author;

					if($rowPost->post_author == $profile_id){

						    // Determine the standard ID based on the language

					    if($lang == 'en'){
							$standardId = 36;
							// $notstandardId=21;
	
							// Check if the post belongs to the standard category
						
	
							if (in_array($standardId, $post_categories)) {
	
								$getPost[] = getStandardSubsUser($standardId, $rowPost->post_type, $rowPost->post_author);	
								$standardId = 46;				    
								$getPost[] = getStandardSubsUser($standardId, $rowPost->post_type, $rowPost->post_author);					    
								
							}
	
					
	
							// Determine the premium ID based on the language
	
							$premiumId =38;
							$notpremiumId=21;
					
	
							// Check if the post belongs to the premium category
	
							if (in_array($premiumId, $post_categories)) {
	
								$getPost[] = getPremiumSubsUser($premiumId, $rowPost->post_type, $rowPost->post_author);	
								$premiumId = 42;
								$getPost[] = getPremiumSubsUser($premiumId, $rowPost->post_type, $rowPost->post_author);	
							}
						}	
						else{
							$standardId = 46;
							// $notstandardId=21;
	
							// Check if the post belongs to the standard category
						
	
							if (in_array($standardId, $post_categories)) {
	
								$getPost[] = getStandardSubsUser($standardId, $rowPost->post_type, $rowPost->post_author);	
								$standardId = 36;				    
								$getPost[] = getStandardSubsUser($standardId, $rowPost->post_type, $rowPost->post_author);					    
								
							}
	
					
	
							// Determine the premium ID based on the language
	
							$premiumId =42;
							$notpremiumId=21;
					
	
							// Check if the post belongs to the premium category
	
							if (in_array($premiumId, $post_categories)) {
	
								$getPost[] = getPremiumSubsUser($premiumId, $rowPost->post_type, $rowPost->post_author);	
								$premiumId = 38;
								$getPost[] = getPremiumSubsUser($premiumId, $rowPost->post_type, $rowPost->post_author);	
	
	
							}
						}	


												
					}

					



					
	

					//print_r($post_categories);

				

					//print_r($rowPost);

					

				}

				

                foreach ($getPost as $rowGetPost) {

                    $content = $rowGetPost["content"];

                    if (!in_array($content, $getPostArray)) {

                        $getPostArray[] = $content;

                    }

                }



				$jsonString = json_encode($getPostArray);

				

		?>	

		 <script> console.log(<?php echo $jsonString; ?>);</script>

			<div class="fnt-12">

				<div class="row">

				    			

					<?php foreach($getPostArray as $getPostArrayitem) {

				  print	implode("",$getPostArrayitem);

					}?>

				</div>

			</div>



	

				

		<?php }else{ ?>

			<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لم يتم العثور على نتائج..."); ?></div>

		<?php } ?>

		

	</div>

</div>

