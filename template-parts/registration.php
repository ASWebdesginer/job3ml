<?php /* Template Name: Registration Page */ ?>



<?php

/**

 * The template for displaying Registration Forms Page

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package jobs

 */



    $lang = pll_current_language();

    $fontLang = "fnt-Montserrat";

    if($lang == "ar"){

        $fontLang = "fnt-NotoSansArabic";

    }

	if(!isset($_GET['type']) && $_GET['type'] == null){

		wp_redirect(get_home_url());

		exit();

	}else{

		

		$mainTitle = "";

		switch ($_GET['type']) {

			case "employers":

				$mainTitle = forceTranslate("Employer's Registration", "التسجيل كصاحب عمل");

				break;

			case "jobseekers":

				$mainTitle = forceTranslate("Job Seeker's Registration", "التسجيل كباحث عن عمل");

				break;

			case "services":

				$mainTitle = forceTranslate("Service Provider's Registration", "التسجيل كمقدم الخدمات");

				break;

		}

		

		

	}


	$formMsg = "";

	if(isset($_GET['status']) && $_GET['status'] == "success"){

		$formMsg = '<div class="alert alert-info" role="alert">

			'.forceTranslate("Thank you for your registration. An email has been sent you to activicate your account.","شكرًا لتسجيلك. تم إرسال بريد إلكتروني إليك لتفعيل حسابك.").'

			</div><div class="spacer-20"></div>';

	}else{
	
	$formMsg = '<div class="alert alert-danger" role="alert" id="dangerdivmi">

		'.forceTranslate("<div id='en-txt'></div>","<div id='ar-txt'></div>").'

		</div><div class="spacer-20"></div>';
	}
	?>




				<!-- <script>
				document.addEventListener('DOMContentLoaded', function () {
					// Fetch the element with the specified class
					var displayContainer = document.querySelector('.um-field-error');

					// Check if the element is found
					if (displayContainer) {
						// Simulate fetching data (you can replace this with an actual API call)
						var fetchData = "Content fetched dynamically.";

						// Display the fetched data inside the element
						displayContainer.innerHTML = fetchData;
					} else {
						console.error('Element with class "display-container" not found.');
					}
				});
			</script> -->
<?php

	

   



?>





<?php get_header(); ?>







<header>



    <?php include "navigation.php" ;?>



</header>



<div class="spacer-100"></div>



    <section>



        <div class="container">



            <center>



                <h1 class="fnt-bl fnt-bold"><?php print $mainTitle;?></h1>



            </center>



        </div>



    </section>





    <div class="spacer-100"></div>







    <!-- section-1 -->



    <section>



        <div class="container">

			<div id="regist" class="boxed-shadowed">

				

				<center><h4 class="fnt-bl fnt-Montserrat">

					<b><?php print forcetranslate("Enter your data","ادخل بياناتك");?></b>

					</h4>

				</center>

			

				<div class="spacer-40"></div>

				

				<?php print $formMsg;?>

				

				<?php if($_GET['type'] == "jobseekers"){?>

					<div id="jobskeers-section" class="section-forms">

						<form action="">

							<div class="row">



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Name","الاسم");?> <font class="fnt-rd">*</font></label>

									<input name="js_fName" id="js_fName" type="text" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="first_name-582" required>

									<div class="spacer-20"></div>					  				

								</div>



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Family Name","اسم العائلة");?></label>

									<input name="js_lName" id="js_lName" type="text" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="last_name-582" required>

									<div class="spacer-20"></div>					  				

								</div>



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Email","البريد الالكتروني الخاص");?> <font class="fnt-rd">*</font></label>

									<input name="js_email" id="js_email" type="email" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_email-582" required>

									<div class="spacer-20"></div>					  				

								</div>

								

								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Mobile number","رقم الجوال");?></label>

									<div class="input-group mb-3">

									  <span class="input-group-text">

										<select name="js_cCode" id="js_cCode" class="form-control selectpicker remPad bgGrayFieldPad regField" data-form="ccode-582" required>

										

										  <option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected ></option>



											<option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



											<option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



											<option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



											<option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



											<option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>

										</select>

									  </span>

									  <input name="js_mobile" id="js_mobile" type="number" class="form-control bgGrayFieldPad regField" data-form="mobile-582" required>

									</div>

									<div class="spacer-20"></div>					  				

								</div>					  							  							  			

														



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Password","كلمة السر");?> <font class="fnt-rd">*</font></label>

									<input name="js_password" id="js_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-582" required>
									
									<div id="passmsg"></div>

									<div class="spacer-20"></div>					  				

								</div>

                                <div class="col-md-6">

                                    <label for=""><?php print forcetranslate("Confirm Password","تأكيد كلمة المرور");?> <font class="fnt-rd">*</font></label>

                                    <input name="js_confirm_password" id="js_confirm_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-582" required>

                                    <div class="spacer-20"></div>

                                </div>

								

							</div>

							

							<div class="row">

							<div class="col-md-4"></div>

							<div class="col-md-4">

								<div class="spacer-20"></div>	

								<center>

									<button id="registerBtn" class="btn btn-warning btn-default btn-lg w-100">

										<?php print forceTranslate("Register","تسجيل");?>

									</button>

									

								</center>

								<div class="spacer-20"></div>	

							</div>

							<div class="col-md-4"></div>	

						</div>	



						</form> 

				

					</div>

						

					<div class="um-form-custom">

						<?php echo do_shortcode('[ultimatemember form_id="582"]'); ?>

					</div>	

					

				<?php } ?>

				

				<?php if($_GET['type'] == "employers"){?>

				

					<div id="employers-section" class="section-forms">

						<form action="">

							<div class="row">



					  			<div class="col-md-6">

									<label for=""> <?php print forcetranslate("Name","الاسم");?>  <font class="fnt-rd">*</font></label>

									<input name="fName" id="fName" type="text" class="form-control w-100 bgGrayFieldPad regField" data-form="first_name-592" required>

									<div class="spacer-20"></div>					  				

					  			</div>



					  			<div class="col-md-6">

									<label for=""> <?php print forcetranslate("Family Name","اسم العائلة") ?></label>

									<input name="lName" id="lName" type="text" class="form-control w-100 bgGrayFieldPad regField" data-form="last_name-592" required>

									<div class="spacer-20"></div>					  				

					  			</div>



					  			<div class="col-md-6">

									<label for=""><?php print forcetranslate("Email","البريد الالكتروني");?> <font class="fnt-rd">*</font></label>

									<input name="email" id="email" type="email" class="form-control w-100 bgGrayFieldPad regField" data-form="user_email-592" required>

									<div class="spacer-20"></div>					  				

					  			</div>



								  <div class="col-md-6">

										<label for=""><?php print forcetranslate("Password","كلمة السر");?> <font class="fnt-rd">*</font></label>

										<input name="js_password" id="js_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-592" required>

										<div id="passmsg"></div>

										<div class="spacer-20"></div>					  				

									</div>

									<div class="col-md-6">

										<label for=""><?php print forcetranslate("Confirm Password","تأكيد كلمة المرور");?> <font class="fnt-rd">*</font></label>

										<input name="js_confirm_password" id="js_confirm_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-592" required>

										<div class="spacer-20"></div>

								  </div>

					  			<div class="col-md-6">

									<label for=""> <?php print forcetranslate("Company Name","اسم الشركة");?></label>

									<input name="company" id="company" type="text" class="form-control w-100 bgGrayFieldPad regField" data-form="company-592" required>

									<div class="spacer-20"></div>					  				

					  			</div>	



					  			<div class="col-md-6">

					  				<label for=""> <?php print forcetranslate(" Company Location (Country)","موقع الشركة (الدولة)");?> </label>

									<select name="country" id="country" class="form-control selectpicker remPad bgGrayFieldPad regField" data-form="company_location-592" required>

										<option value="0"> <?php print forcetranslate("Please Select","الرجاء التحديد");?> </option>

										<option value="Kingdom of Saudi Arabia"><?php print forcetranslate("Kingdom of Saudi Arabia","المملكة العربية السعودية");?></option>

										<option value="Kuwait"> <?php print forcetranslate("Kuwait","الكويت");?>  </option>

										<option value="Bahrain"><?php print forcetranslate("Bahrain","مملكة البحرين");?> </option>

										<option value="United Arab Emirates"> <?php print forcetranslate("United Arab Emirates","الامارات العربية المتحدة");?>  </option>

										<option value="Sultanate of Oman"> <?php print forcetranslate("Sultanate of Oman","سلطنة عمان");?>  </option>

										<option value="Qatar">  <?php print forcetranslate("Qatar","قطر");?>  </option>

									</select>

					  			</div>



					  			<div class="col-md-6">

		  							<label for="">  <?php print forcetranslate("Mobile number","رقم الجوال");?>  </label>

	  								<div class="input-group mb-3">

									  <span class="input-group-text">

		  								<select name="cCode" id="cCode" class="form-control selectpicker remPad bgGrayFieldPad regField" data-form="ccode-592" required>

										  <option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected ></option>



											<option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



											<option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



											<option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



											<option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



											<option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>

										</select>

									  </span>

									  <input name="mobile" id="mobile" type="text" class="form-control bgGrayFieldPad regField" data-form="mobile-592" required>

									</div>

		  							<div class="spacer-20"></div>					  				

					  			</div>					  							  							  			

							

					  			<div class="col-md-6"></div>

							</div>

							

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4">

									<div class="spacer-20"></div>	

									<center>

										<button id="registerBtn" class="btn btn-warning btn-default btn-lg w-100">

											<?php print forceTranslate("Register","التسجيل");?>

										</button>

										

									</center>

									<div class="spacer-20"></div>	

								</div>

								<div class="col-md-4"></div>	

							</div>	



						</form> 

					</div>

				

					

					<div class="um-form-custom">

						<?php echo do_shortcode('[ultimatemember form_id="592"]'); ?> 

					</div>

					

				<?php } ?>

				

				<?php if($_GET['type'] == "services"){?>

				

					<div id="services-section" class="section-forms">

						<form action="">

							<div class="row">



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Name","الاسم");?> <font class="fnt-rd">*</font></label>

									<input name="js_fName" id="js_fName" type="text" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="first_name-595" required>

									<div class="spacer-20"></div>					  				

								</div>



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Family Name","اسم العائلة");?></label>

									<input name="js_lName" id="js_lName" type="text" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="last_name-595" required>

									<div class="spacer-20"></div>					  				

								</div>



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Email","البريد الالكتروني الخاص");?> <font class="fnt-rd">*</font></label>

									<input name="js_email" id="js_email" type="email" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_email-595" required>

									<div class="spacer-20"></div>					  				

								</div>

								

								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Mobile number","رقم الجوال");?></label>

									<div class="input-group mb-3">

									  <span class="input-group-text">

										<select name="js_cCode" id="js_cCode" class="form-control selectpicker remPad bgGrayFieldPad regField" data-form="ccode-595" required>

										

										  <option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected ></option>



											<option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



											<option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



											<option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



											<option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



											<option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>

										</select>

									  </span>

									  <input name="js_mobile" id="js_mobile" type="number" class="form-control bgGrayFieldPad regField" data-form="mobile-595" required>

									</div>

									<div class="spacer-20"></div>					  				

								</div>					  							  							  			

														



								<div class="col-md-6">

									<label for=""><?php print forcetranslate("Password","كلمة السر");?> <font class="fnt-rd">*</font></label>

									<input name="js_password" id="js_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-595" required>

									<div id="passmsg"></div>

									<div class="spacer-20"></div>					  				

								</div>

                                <div class="col-md-6">

                                    <label for=""><?php print forcetranslate("Confirm Password","تأكيد كلمة المرور");?> <font class="fnt-rd">*</font></label>

                                    <input name="js_confirm_password" id="js_confirm_password" type="password" class="form-control w-100 bgGrayFieldPad regField" placeholder="" data-form="user_password-595" required>

                                    <div class="spacer-20"></div>

                                </div>

								

							</div>

							

							<div class="row">

							<div class="col-md-4"></div>

							<div class="col-md-4">

								<div class="spacer-20"></div>	

								<center>

									<button id="registerBtn" class="btn btn-warning btn-default btn-lg w-100">

										<?php print forceTranslate("Register","تسجيل");?>

									</button>

									

								</center>

								<div class="spacer-20"></div>	

							</div>

							<div class="col-md-4"></div>	

						</div>	



						</form> 

				

					</div>

										

				

				

					<div class="um-form-custom">

						<?php echo do_shortcode('[ultimatemember form_id="595"]'); ?> 

					</div>

				<?php } ?>

				

				 

				



			</div>





        </div>



    </section>

	

	<section>

		<div class="container"> 

			<?php //the_content();?>

		</div>

	</section>

	





<div class="spacer-100"></div>



 

<?php get_footer();?>



<script>

	jQuery(document).ready(function(){

		

		jQuery(".regField").each(function(){

			

			var getDataForm = jQuery(this).attr("data-form");

			

			

			jQuery(this).on('keyup change', function(){

				

				var getDataValue = jQuery('*[data-form="'+getDataForm+'"]').val();

				

				//console.log(getDataForm);

				//console.log(getDataValue);

				

				jQuery("#"+getDataForm+"").val(getDataValue);

				

			});

			

		});

		

		jQuery(".section-forms").on("submit",function(e){

			e.preventDefault();

			

			jQuery("#um-submit-btn").trigger("click");

			

			

		});

		 

		

	});
	
	jQuery(document).ready(function($){
		$("#dangerdivmi").hide();
		if($('.um-field-error').length > 0){
			$("#en-txt").text('Sorry! , This Email was Already used.');
			$("#ar-txt").text('آسف! ، تم استخدام هذا البريد الإلكتروني بالفعل.');
			$("#dangerdivmi").show();
				}
	});
</script>

