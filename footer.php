<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jobs
 */

 $lang = pll_current_language();

 $footer_logo_en = get_theme_mod('theme_english_logo_footer', '');
 $footer_logo_ar = get_theme_mod('theme_arabic_logo_footer', '');
?>



	<section id="footer">
	    <div class="container-fluid">
	        <div class="top h-100">
	            <div class="spacer-40"></div>
	            <div class="row">
	                <div class="col-md-2 dlex">
	                    <div class="logo-footer d-flex align-items-center justify-content-center">
	                        <center><img src="<?php echo $lang == 'en' ? $footer_logo_en : $footer_logo_ar ?>" class="img-fluid" /></center>
	                    </div>
	                </div>
	                <div class="col-md-8">
	                    <div class="spacer-40"></div>
	                    <div class="container menu-footer">
	                        <div class="row">
	                        	<?php print get_custom_footer_menu_items();?>
	                        	
	                            <!-- <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="faq.php" class="ft-head"><b>FAQ</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="about-us.php" class="ft-head"><b>About Us</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="terms-conditions.php" class="ft-head"><b>Terms & Conditions</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="contact-us.php" class="ft-head"><b>Contact Us</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="privacy-policy.php" class="ft-head"><b>Privacy Policy</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="code-conduct.php" class="ft-head"><b>Code of Conduct</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div>
	                            <div class="col text-center">
	                                <p class="fnt-18">
	                                    <a href="banned-ads.php" class="ft-head"><b>Prohibited Ads</b></a>
	                                </p>
	                                <div class="spacer-10"></div>

	                            </div> -->
	                        </div>
	                    </div>
	                    <div class="spacer-40"></div>
	                </div>
	                <div class="col-md-2">
	                    <div class="social-footer d-flex align-items-center justify-content-center">
	                        <center>
	                            <span>
	                                 <a href="https://www.facebook.com/profile.php/?id=100090984047198" target="_new"> <i class="fa-brands fa-facebook-f"></i></a>
	                            </span>
	                            <span>
	                                <a href="https://www.instagram.com/job3ml" target="_new"> <i class="fa-brands fa-square-instagram"></i></a>
	                            </span>
	                            <span>
	                                <a href="https://twitter.com/job3ml" target="_new"> <i class="fa-brands fa-x-twitter"></i></a>
	                            </span>
	                        </center>
	                    </div>
	                </div>
	            </div>
	            <div class="spacer-60"></div>
	        </div>
	    </div>
	</section>
	<section id="copyright">
	    <center>
	        <p class="remMar"><small>Copyright © <?php print date("Y");?> | All rights reserved</small></p>
	    </center>
	</section>

	<?php wp_footer(); ?>

	<script>
	   //jQuery.fn.slider = null;
	</script>

	</body>
</html>
