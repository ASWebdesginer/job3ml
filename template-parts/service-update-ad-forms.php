<?php /* Template Name: Services Update Ad Forms Page */ ?>



<?php

/**

 * The template for displaying Services Ad Forms Page

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



    $postId = 0;

    if(empty($_GET['id']) || $_GET['id'] == "null" || !is_user_logged_in() && $user_id != $post->post_author || !is_user_logged_in() && !is_admin_user()){

       wp_redirect(get_home_url());

       exit();

    }else{



        $postId = $_GET['id'];

		$user_id = get_current_user_id();

		

        $post = get_post($postId);

        if (!$post) {

            wp_redirect(get_home_url()."/post-an-ad/publish-a-job-posting/");

            exit();

        } else {

			

			



          $getData = getPostById($postId,$post->post_type);

		  

		//   print_r($post);

		  

		  $postType = $post->post_type;

          $noImg = get_theme_url()."/img/no-img.jpg";

          $logo = get_field( "logo", $postId);

          if(!$logo){$logo = $noImg;}

		  



          $companyName = $post->post_title;

          

          $categories = get_the_category($postId);

          $arrayCatsList = array();

          foreach($categories as $catlist){

            $arrayCatsList[] = $catlist->term_id;

          }

		  

		  //print_r($arrayCatsList);

		  

          $getCategories = getCatByPost($postId,$arrayCatsList);

          $country = $getCategories['country'];

          $city = $getCategories['city'];

          $education = $getCategories['education'];

          $eng_pro = $getCategories['eng_pro'];

          $job_class = $getCategories['job_class'];

		  $service_class = $getCategories['service_class'];

		  $gender = $getCategories['gender'];

		  $marital = $getCategories['marital'];

		  $subType = $getCategories['subType'];

		  

		  $getSubType = "standard";

		  $subColor = "bl";

		  $btnColor = "blue";

		  $boxed = "-light";

		  $imgIcons = "";

		  $bsBtnColor = "-primary";

		  if(in_array(38,$arrayCatsList) || in_array(42,$arrayCatsList)){

			  $getSubType = "premium";

			  $subColor = "-orange";

			  $btnColor = "-orange";

			  $boxed = "-dark";

			  $imgIcons = "-orange";

			  $bsBtnColor = "-warning";

		  }

		            

          $jobDescriptionExcerpt = excerptThis(get_field("job_description",$postId), 500);

          $jobDescription = get_field("job_description",$postId);

          $datePosted = datePosted($post->post_date);

          $experience = get_field("years_of_experience",$postId);

          $negotiable = get_field("negotiable",$postId);

          $salaryFrom = get_field("salary_from",$postId);

          $salaryTo = get_field("salary_to",$postId);

		  $ave_salary = get_field("ave_salary",$postId);

          $remotely = get_field("remotely",$postId);

		  $service_desc = get_field("service_desc",$postId);

		  $shift = '<center><p class="smBox">'.$getCategories['shift'].'</p></center>';

		  $employment = get_field("employment",$postId);

          $vacancy = get_field("vacancy",$postId);

		  $rating = get_field("rating",$postId);

		  $position = get_field("position",$postId);

		  $cv = get_field("cv",$postId);

		  $age = get_field("age",$postId);

		  $special = get_field("special",$postId);

          $lg = basename(get_field("logo",$postId));

		  

		  $ratingStars = "";

		  if($rating > 0 || $rating != ""){

			$ratingArray = array();

			for ($r = 1; $r <= $rating; $r++) {

				$ratingArray[] = '<i class="fa-solid fa-star fnt-orange"></i>';

			}

			

			$ratingStars = implode("",$ratingArray);

		  }



          $applicants = 0;

          $getTags = getTags($postId);

		  

		  $hideEmail = get_field("hide_email",$postId);

		  $hideMobile = get_field("hide_mobile",$postId);

		  

		  $email = "";

		  $mobile = "";

		  $cCode = "";

		  $fullMobile = "";

		  $showEmail = "";

		  $showMobile = "";

		  $showEmailFull = "";

		  $showMobileFull = "";

		  if($hideEmail == "off"){

			  $email = get_field("email",$postId);

			  $showEmail = '<p class="fnt-12"><i class="fa-solid fa-envelope fa-mar-right"></i> <a href="mailto:'.$email.'">'.$email.'</a></p>';

			  $showEmailFull = '<p>

				<img src="https://cms.job3ml.com/wp-content/themes/jobs/img/wallet'.$imgIcons.'.svg" class="svg-icon-20 fa-mar-right">

				<a href="mailto:'.$email.'">'.$email.'</a>

				</p>';

		  }

		  if($hideMobile == "off"){

			  $mobile = get_field("mobile",$postId);

			  $cCode = get_field("country_code",$postId);

			  $fullMobile = $cCode.$mobile;

			  $showMobile = '<p class="fnt-12"><i class="fa-solid fa-phone-flip fa-mar-right"></i> <a href="tel:+'.$fullMobile.'">'.$fullMobile.'</a></p>';

			  $showMobileFull = '<p>

					<img src="https://cms.job3ml.com/wp-content/themes/jobs/img/wallet'.$imgIcons.'.svg" class="svg-icon-20 fa-mar-right">

					<a href="tel:'.$fullMobile.'">'.$fullMobile.'</a>

				</p>';

		  }

		  

		  

          $adsId = get_field("ads_id",$postId);



          $remo = "";

          $rem2 = "";

		  $rem3 = "";

		  $rem4 = "";

          if($remotely == "on"){

            $remo = '<center><p class="smBox">'.forceTranslate("The job can be performed remotely","يمكن أداء الوظيفة عن بعد").'</p></center>';

            $rem2 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("Can be performed remotely","إمكانيةأداء الوظيفة عن بعد").'</a>';

			$rem3 = '<center><p class="smBox">'.forceTranslate("I have the possibility to work remotely","لدي إمكانية العمل عن بعد").'</p></center>';

			$rem4 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("Can work remotely","يمكن العمل عن بعد").'</a>';

          }

		  

		  $spec1 = "";

		  $spec2 = "";

		  if($special == "on"){

			  $spec1 = '<center><p class="smBox">'.forceTranslate("I am with special needs","انا من ذوي الاحتياجات الخاصة").'</p></center>';

			  $spec2 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("With special needs","ذوي الاحتياجات الخاصة").'</a>'; 

		  }



          $nego = "";

          if($negotiable == "on"){

            $nego = forceTranslate("(Negotiable)","(قابل للتفاوض)");

          }

		  		  

		  $degree = "";



			

		  if($postType == "employers"){

			  $jobName = get_field( "job_name", $postId);

			  if($salaryFrom == 0 || $salaryFrom == null){

				$salary = number_format($salaryTo)." ".$nego;

			  }else{

				$salary = number_format($salaryFrom)." - ".number_format($salaryTo)." ".$nego;

			  }

			  

			  $mainTitle = forceTranslate("Employment Advertisements", "أصحاب الشركات والمؤسسات");

			  

		  }

		  

		  if($postType == "services"){

			  $jobName = get_field( "service_desc", $postId);

			  $salary = number_format($ave_salary)." ".$nego;

			  $mainTitle = forceTranslate("Service Provider Advertisements", "إضافة الإعلان كمقدم الخدمات");

		  }

		  

		  if($postType == "jobseekers"){

			  $jobName = get_field( "job_name", $postId);

			  $salary = "";

			  $mainTitle = forceTranslate("Job Seeker Advertisements",  "إضافة الإعلان كباحث عن العمل");

		  }

		  

		  $attach1 = "";

		  $attach2 = "";

		  $attach3 = "";

          $at1 = basename(get_field( "attachments0", $postId));
          $at2 = basename(get_field( "attachments1", $postId));
          $at3 = basename(get_field( "attachments2", $postId));

		  

		  if(!empty(get_field( "attachments0", $postId)) || get_field( "attachments0", $postId) == ""){

			  $attach1 = '<span><a class="smBox" href="'.get_field( "attachments0", $postId).'" download><i class="fa-solid fa-download"></i></a></span>';

		  }

		  if(!empty(get_field( "attachments1", $postId)) || get_field( "attachments1", $postId) == ""){

			  $attach2 = '<span><a class="smBox" href="'.get_field( "attachments1", $postId).'" download><i class="fa-solid fa-download"></i></a></span>';

		  }

		  if(!empty(get_field( "attachments2", $postId)) || get_field( "attachments2", $postId) == ""){

			  $attach3 = '<span><a class="smBox" href="'.get_field( "attachments2", $postId).'" download><i class="fa-solid fa-download"></i></a></span>';

		  }

		  

		  $postStatus = "fnt-red";

		  if($post->post_status == "publish"){

			$postStatus = "fnt-green";

		  }



        }

    }

?>





<?php get_header(); ?>







<header>



    <?php include "navigation.php";?>



</header>



<div class="spacer-100"></div>



    <section>



        <div class="container">



            <center>

                <h1 class="fnt-bl fnt-bold"><?php print forceTranslate('Service Provider Advertisements','إضافة الإعلان كمقدم الخدمات');?></h1>

            </center>



        </div>



    </section>





    <div class="spacer-100"></div>







    <!-- section-2 -->

    <section>





        <div class="container">



            <!-- contents -->



            <div class="row">

                <div class="col-md-1"></div>

                <div class="col-md-10">

                    <div class="boxed-shadowed addPaddSide-60">



                        <div class="spacer-40"></div>

                        

                        <center>

                            <h3 class="fnt-bl fnt-bold fnt-Montserrat">

							<?php 

								print forceTranslate(

									'Enter the advertisement details',

									'ادخل بيانات الإعلان'

								);

							?>

							</h3>

                            <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid">

                        </center>



                        <div class="spacer-40"></div>



                        <form action="" method="post" id="editServicePost" enctype="multipart/form-data" autocomplete="off">

                                

                            <div class="row">



                                <div class="col-md-6">

                                    <label for="">

									<?php 

										print forceTranslate(

											'The name of the advertiser / the name of the store',

											'اسم جهة المعلنة/اسم المتجر'

										);

									?> 

									<font class="fnt-rd">*</font>

									</label>

                                    <input name="storeName" type="text" class="form-control form-gry w-100"  placeholder="<?php print forceTranslate("Amperes electrical solutions","أمبير للحلول الكهربائية");?>" required value="<?php echo $companyName;?>">

                                    <div class="spacer-20"></div>

                                </div>



                                <div class="col-md-6">

                                    <label for="">

										<?php print forceTranslate(

											"Brief Description of the Service",

											"وصف الخدمة المختصر"

										);

										?> 

										<font class="fnt-rd">*</font></label>

                                    <input name="service_desc" type="text" class="form-control form-gry w-100" placeholder="<?php print forceTranslate("Electrician","فني كهربائي");?>" required value="<?php echo $service_desc;?>" >

                                    <div class="spacer-20"></div>                                   

                                </div>  





                            </div>



                            <div class="row">

							

							  <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Service Classification","تصنيف الخدمة");?></label>



                                    <select name="serviceClass" id="serviceClass" class="form-control form-gry selectpicker remPad" data-live-search="true" required>

										<option value="0" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>

											



                                        <?php  print getSelectCat(1796,1848);?>



                                    </select>



                                    <div class="spacer-20"></div>



                                </div>

								

								<!--

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-12">

                                            <label for="">

                                                <?php 

													print forceTranslate(

														"Service rating",

														"تصنيف الخدمة"

													);

												?> <font class="fnt-rd">*</font> 

                                                <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="Rate the service 1-10"></i>



                                            </label>

                                        </div>

                                    </div>

                                    <input name="rating" type="number" class="form-control form-gry w-100" min="1" max="10" placeholder="" required>

                                    <div class="spacer-20"></div>                                   

                                </div>

								

								-->



                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-6">

                                            <label for="">

                                                <?php 

													print forceTranslate(

														"E-mail",

														"البريد الإلكتروني"

													);

												?> 

												<font class="fnt-rd">*</font> 

                                                <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print forceTranslate("When you hide the email, messages will be sent to the registered mail","عند إخفاء البريد الالكتروني سيتم ارسال الرسائل للبريد المسجل دون إظهاره في الإعلان");?>"></i>



                                            </label>

                                        </div>

                                        <div class="col-6 d-flex justify-content-end">

                                            <div class="form-check form-switch text-end">
                                            <?php
                                                // Check if the ACF field is true
                                                $checked_attribute = $hideEmail ? 'checked' : '';
                                                ?>

                                              <input name="showEmail" class="form-check-input" type="checkbox" role="switch" <?php echo $checked_attribute; ?>>

                                              <i class="fa-sharp fa-regular fa-eye-slash"></i>

                                            </div>

                                        </div>

                                    </div>

                                    <input name="email" type="text" class="form-control form-gry w-100" value="<?php echo get_field("email",$postId);?>" placeholder="" required>

                                    <div class="spacer-20"></div>

                                </div>  

                                

                            </div>   



                            <div class="row">

                                

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-6">

                                            <label for="">

                                                <?php 

													print forceTranslate(

														"Mobile Number",

														"رقم الجوال"

													);

												?>

												<!--<font class="fnt-rd">*</font>--> 

                                                <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="When you hide the mobile number, messages will be sent to the registered mobile number"></i>



                                            </label>

                                        </div>

                                        <div class="col-6 d-flex justify-content-end">

                                            <div class="form-check form-switch text-end">
                                                <?php
                                                // Check if the ACF field is true
                                                $checked_attribute = $hideMobile ? 'checked' : '';
                                                ?>

                                              <input name="showMobile" class="form-check-input" type="checkbox" role="switch" <?php echo $checked_attribute; ?>>

                                              <i class="fa-sharp fa-regular fa-eye-slash"></i>

                                            </div>

                                        </div>

                                    </div>

                                    <div id="payment">

                                        <div class="input-group mb-3">

                                          <span class="input-group-text">

                                             <select name="country_code" id="cCode" class="form-control selectpicker remPad bgGrayFieldPad" >



                                                <option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected></option>



                                                <option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



                                                <option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



                                                <option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



                                                <option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



                                                <option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>





                                            </select>

                                          </span>

                                          <input name="mobile" id="mobile" type="number" class="form-control bgGrayFieldPad remPad" placeholder="555" value="<?php echo get_field("mobile",$postId);?>">

                                        </div>

                                    </div>

                                    <div class="spacer-20"></div>

                                </div>





                                <div class="col-md-6">

                                    <label for="">

									<?php 

										print forceTranslate(

											"Years of experience required",

											"سنوات الخبرة "

										);

									?></label>

                                    <input name="years_of_experience" type="number" class="form-control form-gry w-100" value="<?php echo $experience;?>" placeholder="" min="1" max="99" oninput="this.value = this.value.slice(0, 2);">

                                    <div class="spacer-20"></div>

                                </div>



                            </div> 



                            <div class="row">               



                                <div class="col-md-6">

                                    <label for="">

										<?php 

											print forceTranslate(

												"Country",

												"الدولة"

											);										

										?> 

										<font class="fnt-rd">*</font></label>

										

                                    <select name="country" id="country" class="form-control selectpicker remPad" data-language="en" data-live-search="true" required>

										<option value="0" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>

                                       <?php  print getSelectCat(840,842);?>

                                    </select>

									

                                    <div class="spacer-20"></div>

                                </div>                              



                                <div class="col-md-6">

                                    <label for="">

										<?php 

											print forceTranslate(

												"City",

												"المدينة"

											);										

										?> 										 

									<font class="fnt-rd">*</font></label>

                                    <select name="city" id="city" class="form-control form-gry selectpicker remPad" data-live-search="true" disabled>

                                        <option value="0" selected disabled>

										<?php 

											print forceTranslate(

												"Please select a country first",

												"الرجاء تحديد الدولة أولاً"

											);										

										?> 												

										</option>

                                    </select>

                                    <div class="spacer-20"></div>

                                </div>



                            </div>



                            <div class="row">



                            <div class="col-md-6">



                                    <label for="">



                                        <?php print forceTranslate("Essential skills for the job","المهارات الأساسية للوظيفة");?>



                                        <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print forceTranslate("Please add comma (,) after each skill to include it","الرجاء إضافة فاصلة (،) بعد كل مهارة لتضمينها");?>"></i>



                                    </label>



                                    <input name="skills" type="text" class="form-control form-gry w-100" placeholder="<?php print forceTranslate("C# Programing, Excel, Bookkeeping","برمجة #C، إكسل، مسك الدفاتر");?>">



                                    <div class="spacer-20"></div>



                                </div>





                                <div class="col-md-6">

                                    <label for="">

										<?php 

											print forceTranslate(

												"English Proficiency",

												"مستوى إجادة اللغة الإنجليزية"

											);										

										?> 

									</label>

                                    <select name="language" id="language" class="form-control form-gry selectpicker remPad">

										<option value="0" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>

										<?php print getSelectCat(1128,1321);?>

                                    </select>

                                    <div class="spacer-20"></div>

                                </div>



                            </div>



                            <div class="row">



                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-6">

                                            <label for="">

												<?php 

													print forceTranslate(

														"Average Salary",

														"بداية سعر الخدمة"

													);										

												?>

												<font class="fnt-rd">*</font>												

											</label>

                                        </div>

                                        <div class="col-6 d-flex justify-content-end">

                                            <div class="form-check">
                                                <?php
                                                // Check if the ACF field is true
                                                $checked_attribute = $negotiable ? 'checked' : '';
                                                ?>

                                              <input name="negotiable" class="form-check-input" type="checkbox" <?php echo $checked_attribute; ?> >

                                              <label class="form-check-label">

												<?php 

													print forceTranslate(

														"Negotiable",

														"قابل للتفاوض"

													);										

												?> 

                                              </label>

                                            </div>

                                        </div>

                                    </div>



                                    <input name="ave_salary" type="number" class="form-control form-gry w-100" placeholder="3000" required value="<?php echo $ave_salary; ?>">

                                    <div class="spacer-20"></div>

                                </div>



                                <div class="col-md-6">

								

                                   

                                    <label for=""><?php print forceTranslate("Add the logo","اضف الشعار")?></label>



                                    <div class="attachboxLogo">



                                        <div class="row">



                                            <div class="col-9">



                                                <small class="caption"><?php print forceTranslate("You can add faces","يمكنك اضافة صورة شخصية")?></small>



                                            </div>



                                            <div class="col-3 d-flex align-items-center justify-content-end">



                                                <i class="fa-solid fa-paperclip"></i>



                                            </div>



                                        </div>



                                        <input type="file"  id="attachClickLogo" class="" name="imgLogo" accept="image/*" hidden>

                                        <input type="hidden" class="form-control form-gry" name="imgLogoDesc" value="Post Logo">
                                        <?php echo $lg; ?>



                                    </div>





                                    <div class="spacer-20"></div>



                                </div>



                            </div>

								

								

                            <div class="row">



                                <div class="col-md-6">



                                    <div class="row">



                                        <div class="col-md-6">



                                            <label for=""><?php print forceTranslate("Attachments","مرفقات")?></label>



                                        </div>



                                        <div class="col-md-6 d-flex justify-content-end">



                                            <div class="exceededCont hideThis">

                                                <small style="color:red"><?php print forceTranslate("Attachement exceeded","تجاوزت الحد المسموح من المرفقات")?></small>

                                            </div>



                                            <div class="addMoreCont">



                                             <small><?php print forceTranslate("Add another attachment","اضف مرفق اخر")?></small>



                                             <i class="fa-solid fa-circle-plus fa-mar-left addMore"></i>



                                            </div>







                                        </div>



                                    </div>



                                </div>



                                <div class="col-md-6"></div>



                            </div>

							

						    <div id="multiAttach">



								<div class="attachedRow row">



									<div class="col-md-6">



										<label for="" style="width:100%;">



											<div class="d-flex justify-content-end hideThisLabel">



												<small><?php print forceTranslate("Delete attachment","حذف المرفق")?></small>



												<i class="fa-solid fa-circle-minus fa-mar-left deleteAttachment"></i>



											</div>



										</label>



										<div class="attachBox">



											<div class="row">



												<div class="col-9">



													<small class="caption"><?php print forceTranslate("you can add attachments and a detailed service description","يمكنك اضافة المرفقات لتفصيل وصف الخدمة")?></small>



												</div>



												<div class="col-3 d-flex align-items-center justify-content-end">



													<i class="fa-solid fa-paperclip"></i>



												</div>



											</div>



											<input type="file" class="attachClick" name="imgMulti[]" accept="image/*,application/pdf" multiple hidden>
                                            <?php
                                            echo $at1;
                                            echo " , ";
                                            echo $at2;
                                            echo " , ";
                                            echo $at3;
                                            
                                            ?>



										</div>



										<div class="spacer-20"></div>



									</div>



									<div class="col-md-6">



										<label for=""><?php print forceTranslate("Attachment description","وصف المرفق")?></label>



										<input type="text" class="form-control form-gry" name="imgMultiDesc[]" placeholder="<?php print forcetranslate("You can explain the attachments here","يمكنك شرح المرفقات هنا");?>">



										<div class="spacer-20"></div>



									</div>



								</div>



							</div>





                            <div class="row">



                                <div class="col-12"> 



                                    <label for=""><?php print forceTranslate("Service description summary","ملخص وصف الخدمة");?> <font class="fnt-rd">*</font></label>



                                    <textarea name="job_description" class="form-control form-gry w-100" required><?php echo $jobDescription; ?></textarea>



                                    <div class="spacer-20"></div>



                                </div>



                            </div>                          



                            <div class="spacer-40"></div>



                            <div class="row">



                                <div class="col-md-4"></div>



                                <div class="col-md-4">

									

									<input type="hidden" name="postType" value="services">

									<input type="hidden" name="rating"  value="1">

                                    <button class="btn btn-primary btn-job-blue w-100 submitForm"><?php print forcetranslate("Post an Ad","رؤيه الإعلان قبل الاضافه");?></button>

									



                                    <!-- <input type="submit" class="btn btn-primary btn-job-blue w-100" value="See the ad before adding"> -->



                                </div>



                                <div class="col-md-4"></div>



                            </div>



                        </form>



                     

					</div>                  

                </div>

                <div class="col-md-1"></div>

            </div>







        </div>

    </section>



<div class="spacer-100"></div>





<?php get_footer();?>



<script>



jQuery(document).ready(function(){

clickAttached();


//    education
var education=<?php echo get_cat_ID($education); ?>;
var educationname='<?php echo $education;?>';

adddropdownvalue("#degree",educationname,education);

//    job_class
var job_class=<?php echo get_cat_ID($service_class); ?>;
var educatiojob_classnname='<?php echo $service_class;?>';

adddropdownvalue("#serviceClass",educatiojob_classnname,job_class);



//    eng_pro
var eng_pro=<?php echo get_cat_ID($eng_pro); ?>;
var eng_proname='<?php echo $eng_pro;?>';

adddropdownvalue("#language",eng_proname,eng_pro);

//    eng_pro
var country=<?php echo get_cat_ID($country); ?>;
var countryname='<?php echo $country;?>';

adddropdownvalue("#country",countryname,country);
//    eng_pro
var city=<?php echo get_cat_ID($city); ?>;
var cityname='<?php echo $city;?>';

adddropdownvalue("#city",cityname,city);

//    nationality
var shift=<?php echo get_cat_ID($getCategories['shift']); ?>;
var shiftname='<?php echo $getCategories['shift'];?>';

adddropdownvalue("#pType",shiftname,shift);


});


function adddropdownvalue(id,value_name,val_id){
    if(val_id != ''){
 jQuery(`${id}`).val(val_id);
jQuery(`${id}`).find(`option[value="${val_id}"]`).attr("selected",'selected');
jQuery(`${id}`).siblings('.dropdown-toggle').find('.filter-option-inner-inner').text(value_name);
    }
}

</script>











