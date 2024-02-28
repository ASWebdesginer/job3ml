<?php

/**

 * Template part for displaying posts

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

    if(get_the_ID() == "null"){

       wp_redirect(get_home_url());

       exit();

    }else{

		

		$user_id = get_current_user_id();

        $postId = get_the_ID();

				

        $post = get_post($postId);

        if (!$post) {

            wp_redirect(get_home_url()."/post-an-ad/publish-a-job-posting/");

            exit();

        } else {



          $getData = getPostById($postId,$post->post_type);

		  

		  //print_r($post);

		  

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

		  $gender = $getCategories['gender'];

		  $marital = $getCategories['marital'];

		  $subType = $getCategories['subType'];

		  $nationality = $getCategories['nationality'];

		  

		  $getSubType = "standard";

		  $subColor = "bl";

		  $btnColor = "blue";

		  $boxed = "-light";

		  $imgIcons = "";

		  $salary = "";

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

			  $showMobile = '<p class="fnt-12 dir-chng"><i class="fa-solid fa-phone-flip fa-mar-right icon-order"></i> <a href="tel:+'.$fullMobile.'">'.$fullMobile.'</a></p>';

			  $showMobileFull = '<p class="dir-chng">

					<img src="https://cms.job3ml.com/wp-content/themes/jobs/img/wallet'.$imgIcons.'.svg" class="svg-icon-20 fa-mar-right icon-order">

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

            $rem2 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("Can be performed remotely","إمكانية أداء الوظيفة عن بعد").'</a>';

			$rem3 = '<center><p class="smBox">'.forceTranslate("I have the possibility to work remotely","لدي إمكانية العمل عن بعد").'</p></center>';

			$rem4 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("Can work remotely","يمكن العمل عن بعد").'</a>';

          }

		  

		  $spec1 = "";

		  $spec2 = "";

		  if($special == "on"){

			  $spec1 = '<center><p class="smBox">'.forceTranslate("I am with special needs","انا من ذوي الاحتياجات الخاصة").'</p></center>';

			  $spec2 = '<a href="" class="btn btn-light btn-sm w-100">'.forceTranslate("With special needs","ذوي الاحتياجات الخاصة ").'</a>'; 

		  }



          $nego = "";

          if($negotiable == "on"){

            $nego = forceTranslate("(Negotiable)","(قابل للتفاوض)");

          }

		  		  

		  $degree = "";



			

		  if($postType == "employers"){

			  $jobName = get_field( "job_name", $postId);

			  if($salaryFrom == 0 || $salaryFrom == null){

				if($salaryTo !== null){

			        $salaryTo=floatval($salaryTo);

			        				$salary = number_format($salaryTo) . " " . $nego;

			    }

			  }else{
				$salaryTo=floatval($salaryTo);
				$salaryFrom=floatval($salaryFrom);

				$salary = number_format($salaryFrom)." - ".number_format($salaryTo)." ".$nego;

			  }

			  

			  $mainTitle = forceTranslate("Employment Advertisements", "أصحاب الشركات والمؤسسات");

			  

		  }

		  

		  if($postType == "services"){

			  $jobName = get_field( "service_desc", $postId);

			  $salary = number_format(floatval($ave_salary))." ".$nego;

			  $mainTitle = forceTranslate("Service Provider Advertisements", "إعلانات الخدمات والعمل الحر");

		  }

		  

		  if($postType == "jobseekers"){

			  $jobName = get_field( "job_name", $postId);

			  $salary = "";

			  $mainTitle = forceTranslate("Job Seeker Advertisements", "إعلانات الباحثين عن العمل");

		  }

		  

		  $attach1 = "";

		  $attach2 = "";

		  $attach3 = "";

		  $resume = "";

		  

		  if(get_field( "attachments0", $postId)){

			  $imageId1 = attachment_url_to_postid(get_field( "attachments0", $postId));

			  $imgCap1 = get_post_field('post_excerpt', $imageId1);

			  $attach1 = '<span><a class="smBox allCaps" href="'.get_field( "attachments0", $postId).'" download>

					'.$imgCap1.' <i class="fa-solid fa-download"></i></a>

				</span>';

		  }

		  if(get_field( "attachments1", $postId)){

			  $imageId2 = attachment_url_to_postid(get_field( "attachments0", $postId));

			  $imgCap2 = get_post_field('post_excerpt', $imageId2);

			  $attach2 = '<span><a class="smBox allCaps" href="'.get_field( "attachments1", $postId).'" download>

				'.$imgCap2.' <i class="fa-solid fa-download"></i></a>

				</span>';

		  }

		  if(get_field( "attachments2", $postId)){

			  $imageId3 = attachment_url_to_postid(get_field( "attachments0", $postId));

			  $imgCap3 = get_post_field('post_excerpt', $imageId3);			  

			  $attach3 = '<span><a class="smBox allCaps" href="'.get_field( "attachments2", $postId).'" download>

			  '.$imgCap3.' <i class="fa-solid fa-download"></i></a>

			  </span>';

		  }
		  if(get_field( "cv", $postId)){
			$resume = '<span><a class="smBox allCaps" href="'.get_field( "cv", $postId).'" download><i class="fa-solid fa-download"> CV</i></a>

			</span>';
		  }

		  

		  $postStatus = "fnt-red";

		  if($post->post_status == "publish"){

			$postStatus = "fnt-green";

		  }

		  

		  $editLink = home_url()."/update-ads/".$postType."?id=".$post->ID;

		  if($lang == "ar"){

			  $editLink = home_url()."/update-ads-ar/".$postType."?id=".$post->ID;

		  }

		  



        }

    }


?>
<style>
	.boxed-dark .pen-hide{
		display: none;
	}
</style>

<article id="post-<?php the_ID(); ?> asdasdasd" <?php post_class(); ?>>



	<header class="entry-header">

		<?php include "navigation.php";?>

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













    <!-- section-2 -->

    <section>





        <div class="container">



            <!-- contents -->

			

			<?php if (is_user_logged_in() && $user_id == $post->post_author || is_admin_user()){ ?>

			

				<div class="row">

					<div class="col-md-1"></div>

					<div class="col-md-10">

			

						<div class="row">

							<div class="col-md-4"></div>

							<div class="col-md-4"></div>

							<div class="col-md-4 text-end">

								<div class="editPost">

									

									<span>

										<i class="fa-solid fa-circle <?php print $postStatus;?>" data-bs-toggle="tooltip" data-bs-title="Active"></i>

									</span>

								

									<span>

										<a href="#" data-id="<?php echo the_ID();  ?>" id="renewpostmi">

											<i class="fa-solid fa-arrows-spin" data-bs-toggle="tooltip" data-bs-title="Renew"></i>

										</a>

									</span>

									<span>

										<a href="<?php print $editLink;?>" id="penpostmi">

											<i class="fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-title="Edit"></i>

										</a>

									</span>

									<span>

										<a href="" onClick="return false;" data-bs-toggle="modal" data-bs-target="#deleteModal">

											<i class="fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-title="Delete"></i>

										</a>

									</span>

									

									<!-- Delete Modal -->

									<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

									  <div class="modal-dialog modal-dialog-centered">

										<div class="modal-content">

										  <div class="modal-header">

											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

										  </div>

										  <div class="modal-body">

											<center>

												<h4 class="<?php print $fontLang;?>">

												<?php print forceTranslate("Please confirm the deletion of Advertisment ID","- الرجاء تأكيد حذف الإعلان رقم
");?>: <br />

												<b><?php print $adsId;?></b>

											</h4>

											</center>

										  </div>

										  <div class="modal-footer">

											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

												<?php print forceTranslate("Cancel","إلغاء");?>

											</button>

											<button type="button" class="btn btn-primary" id="deletePost" data-id="<?php print $postId;?>">

												<?php print forceTranslate("Delete","مسح");?>

											</button>

										  </div>

										</div>

									  </div>

									</div>

									

								</div>

							</div>

						</div>

					</div>

					<div class="col-md-1 text-end"></div>				

				</div>

				<div class="spacer-20"></div>

			<?php } ?>



            <div class="row">

                <div class="col-md-1"></div>

                <div class="col-md-10 txt-set">



                    <div class="<?php print $getSubType;?>">

                        <div class="boxed<?php print $boxed;?> addPaddAll-40">

						

							<div class="row">

								<div class="col-md-8">

									<?php if($postType != "jobseekers"){?>

									<h4 class="fnt<?php print $subColor;?> fnt-bold allCaps <?php print $fontLang;?>"><?php print $jobName;?></h4>

								

									<div class="spacer-20"></div>

										

									<b class="allCaps fnt-20"><i class="fa-solid fa-building fa-mar-right"></i> <?php print $companyName; ?></b>

										

									<div class="spacer-40"></div>

									<?php }else{ ?>

									

									<h4 class="fnt<?php print $subColor;?> fnt-bold allCaps <?php print $fontLang;?>"><?php print $position;?></h4>

								

									<div class="spacer-20"></div>

										

									<b class="allCaps fnt-20"><i class="fa-solid fa-user fa-mar-right"></i> <?php print $companyName; ?></b>

										

									<div class="spacer-20"></div>

									

									<?php } ?>

															

									<div class="row">

										<div class="col-md-6">

										

											<p>

												<img src="<?php print get_theme_url();?>/img/briefcase<?php print $imgIcons;?>.svg" class="svg-icon-20 fa-mar-right">

												<?php print $experience;?>

												<?php print forceTranslate("year(s) experience","سنوات الخبرة");?>

											</p>

											<div class="spacer-20"></div>

											

										   <?php if($postType != "jobseekers"){?>

											   <p>

													<img src="<?php print get_theme_url();?>/img/wallet<?php print $imgIcons;?>.svg" class="svg-icon-20 fa-mar-right"> 

													<?php print $salary;?>

												</p>

												<div class="spacer-20"></div>

										   <?php } ?>

											

										

											<p>

												<img src="<?php print get_theme_url();?>/img/droppin<?php print $imgIcons;?>.svg" class="svg-icon-20 fa-mar-right">

												<?php print $city; ?>, <?php print $country; ?>

											</p>

											<div class="spacer-20"></div>

											

										</div>

										

										<div class="col-md-6">

										   <?php print $showEmailFull;?>

										   

										   <div class="spacer-20"></div>

										   

											<?php print $showMobileFull;?>

											

											<div class="spacer-20"></div>

										</div>



									</div>



									<div class="spacer-20"></div>

								</div>

								

								<div class="col-md-4">

									<center><img src="<?php print $logo;?>" class="img-fluid"></center>

								</div>

							

							</div>

						

                            <div class="spacer-20"></div>

                            <hr>

                            <div class="spacer-20"></div>

							

							<?php if($postType != "jobseekers"){?>

							

								<h4 class="fnt-bold <?php print $fontLang;?>">

									<?php print forceTranslate("Job description", "الوصف الوظيفي"); ?>

								</h4>

								<div class="spacer-20"></div>



								<div class="fnt-20">

									<?php print $jobDescription; ?>

								</div>

								

								<div class="spacer-40"></div>

							

							<?php }?>



                            <div class="row remPad content-14">

							

								<?php if($postType == "employers"){ ?>

									

									<!-- employer content -->

									<div class="row content-eap">

									

										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Role","دور");?>:</p></div>

												<div class="col-8"><?php print $jobName;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Industry Type","تصنيف الوظيفة");?>:</p></div>

												<div class="col-8"><?php print $employment; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Degree","الدرجة العلمية");?>:</p></div>

												<div class="col-8"><?php print $education; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("English proficiency","مستوى إجادة اللغة الانجليزية");?>:</p></div>

												<div class="col-8"><?php print $eng_pro;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Essential skills:",":المهارات الأساسية");?>:</p></div>

												<div class="col-8 txt-padding">



													<?php print $getTags; ?>



													<!--<span class="smBox">Word</span>

													<span class="smBox">Excel</span>

													<span class="smBox">JAVA</span> -->

												</div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4 mijob"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Job classification","تصنيف الوظيفة ");?>:</p></div>

												<div class="col-8"><?php print $job_class;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<?php print $shift; ?>

											<div class="spacer-20"></div>

										</div>
										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Nationality"," جنسية ");?>:</p></div>

												<div class="col-8"><?php print $nationality;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-12">

											<div class="row">

												<div class="col-md-2"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Attachments","المرفقات");?>:</p></div>

												<div class="col-md-10">

													<?php print $attach1;?>

													<?php print $attach2;?>

													<?php print $attach3;?>

													<?php print $resume;?>
 
												</div>

											</div>

											<div class="spacer-20"></div>		

										</div>	



										<?php print $remo; ?>

										

										<div class="spacer-20"></div>

										

									</div>

								

								<?php } ?>

								

								<?php if($postType == "services"){ ?>

									

									<!-- service content -->

									<div class="row content-sap">

									

										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Service Description","وصف الخدمة المختصر");?>:

													</p>

												</div>

												<div class="col-8"><?php print $jobName;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Service Rating","تصنيف الخدمة");?>:</p>

												</div>

												<div class="col-8"><?php print $ratingStars; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Years of Experience","سنوات الخبرة");?>:

													</p>

												</div>

												<div class="col-8"><?php print $experience; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate("English proficiency","مستوى إجادة اللغة الإنجليزية");?>:

													</p>

												</div>

												<div class="col-8"><?php print $eng_pro;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate("Essential skills:",":المهارات الأساسية");?>:

													</p>

												</div>

												<div class="col-8 txt-padding">



													<?php print $getTags; ?>



													<!--<span class="smBox">Word</span>

													<span class="smBox">Excel</span>

													<span class="smBox">JAVA</span> -->

												</div>

											</div>

											<div class="spacer-20"></div>

										</div>

										

										<div class="col-md-6"></div>

	

										<div class="col-md-6">

											<?php print $shift; ?>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-12">

											<div class="row">

												<div class="col-md-2"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Attachments","المرفقات");?>:</p></div>

												<div class="col-md-10">

													<?php print $attach1;?>

													<?php print $attach2;?>

													<?php print $attach3;?>
													<?php print $resume;?>

												</div>

											</div>

											<div class="spacer-20"></div>		

										</div>	

										

									</div>

								

								<?php } ?>	



								<?php if($postType == "jobseekers"){ ?>

									

									<!-- jobseekers content -->

									<div class="row content-jap">

									

										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Gender","الجنس");?>:

													</p>

												</div>

												<div class="col-8"><?php print $gender;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Age","العمر");?>:</p>

												</div>

												<div class="col-8"><?php print $age; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

													<?php print forceTranslate("Years of Experience","سنوات الخبرة");?>:

													</p>

												</div>

												<div class="col-8"><?php print $experience; ?></div>

											</div>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate("English proficiency","مستوى إجادة اللغه الإنجليزية");?>:

													</p>

												</div>

												<div class="col-8"><?php print $eng_pro;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>

										

										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate 

														("Education Level","الدرجة العلمية");?>:

													</p>

												</div>

												<div class="col-8"><?php print $education;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>

										

										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate("Job Classification","تصنيف الوظيفة");?>:

													</p>

												</div>

												<div class="col-8"><?php print $job_class;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>										



										<div class="col-md-6">

											<div class="row">

												<div class="col-4">

													<p class="fnt<?php print $subColor;?>">

														<?php print forceTranslate("Essential skills",":المهارات الأساسية");?>:

													</p>

												</div>

												<div class="col-8 txt-padding">

													<?php print $getTags; ?>



												</div>

											</div>

											<div class="spacer-20"></div>

										</div>

										

										<div class="col-md-6">

											<div class="row">

												<div class="col-4"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Nationality"," جنسية ");?>:</p></div>

												<div class="col-8"><?php print $nationality;?></div>

											</div>

											<div class="spacer-20"></div>

										</div>									

										

										<div class="col-md-6">

											<?php print $rem3; ?>

											<div class="spacer-20"></div>

										</div>

																				

										<div class="col-md-6">

											<?php print $spec1; ?>

											<div class="spacer-20"></div>

										</div>



										<div class="col-md-12">

											<div class="row">

												<div class="col-md-2"><p class="fnt<?php print $subColor;?>"><?php print forceTranslate("Attachments","المرفقات");?>:</p></div>

												<div class="col-md-10" id="jobseekermifiles">

													<?php print $attach1;?>

													<?php print $attach2;?>

													<?php print $attach3;?>
													<?php print $resume;?>

												</div>

											</div>

											<div class="spacer-20"></div>		

										</div>	

										

									</div>

								

								<?php } ?>										

								



                                <div class="col-12">

                                    <center>

                                        <div class="spacer-40"></div>

                                        <div class="row">

                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">

											

												<?php if ($user_id > 0) {?>

											

												<?php if($postType == "jobseekers"){ ?>

													

													<button id="apply" data-post="<?php print $postId;?>" data-user="<?php print $user_id;?>" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100"  data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("Request for an interview","طلب إجراء مقابلة");?></button>

												

												<?php } ?>

												

												<?php if($postType == "employers"){ ?>

													

													<button id="apply" data-post="<?php print $postId;?>" data-user="<?php print $user_id;?>" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100"  data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("APPLY","قدم الان");?></button>

												

												<?php } ?>

												

												<?php if($postType == "services"){ ?>

													

													<button id="apply" data-post="<?php print $postId;?>" data-user="<?php print $user_id;?>" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100"  data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("HIRE","توظيف");?></button>

												

												<?php } ?>

											

											<?php }else{?>

												<?php if($postType == "jobseekers"){ ?>

													<a href="<?php print home_url();?>/login" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100" data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("Request for an interview","طلب أجراء مقابلة");?></a>

												<?php } ?>											

												<?php if($postType == "employers"){ ?>

													<a href="<?php print home_url();?>/login" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100" data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("APPLY","قدم الان");?></a>

												<?php } ?>												

												<?php if($postType == "services"){ ?>

													<a href="<?php print home_url();?>/login" class="btn btn<?php print $bsBtnColor;?> btn-lg btn-job<?php print $btnColor;?> w-100" data-bs-toggle="modal" data-bs-target="#thankyou-modal"><?php print forceTranslate("HIRE","توظيف");?></a>

												<?php } ?>

											<?php } ?>	                  

                                            </div>

                                            <div class="col-md-4"></div>

                                        </div>

                                    </center>

                                </div>

                                <div class="spacer-60"></div>

                                <p class="fnt-15 fnt-bold">
                                    

									<?php if($postType == "jobseekers"){ ?>

										<?php print forceTranslate("Posted","تم النشر");?>: <?php print $datePosted;?> | 

										<i class="fa-solid fa-barcode"></i> <?php print get_field("ads_id",$postId);?>							

									<?php }else{ ?> 

										<?php print forceTranslate("Posted","تم النشر");?>: <?php print $datePosted;?> | 

										<?php print forceTranslate("Openings","الوظائف الشاغرة");?>: <?php print $vacancy; ?> | 

										<?php print forceTranslate("Job Applicants","المتقدمون للوظيفة");?>: <?php print $applicants; ?> | 

										<i class="fa-solid fa-barcode"></i> <?php print get_field("ads_id",$postId);?> 									

									<?php }?>

								</p>

                            </div>

                        </div>

                    </div>

                    <div class="spacer-60"></div>



                    <div class="spacer-60"></div>



                </div>

                <div class="col-md-1"></div>

            </div>



        </div>

    </section>



<div class="spacer-100"></div>



</article><!-- #post-<?php the_ID(); ?> -->



<!-- Modal -->

<div class="modal fade" id="thankyou-modal">

  <div class="modal-dialog  modal-lg modal-dialog-centered">

	<div class="modal-content">

	  <div class="modal-header">

		<h5 class="modal-title"></h5>

		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

	  </div>

	  <div class="modal-body">

		<div class="row">

			<div class="1"></div>

			<div class="10">




						<div class="row">

						<div class="col-md-12">

							<div class="alert alert-info">

								<center>

									<p><small><?php print forceTranslate("Message Advertiser","التواصل مع المعلن");?></small></p>

								</center>

							</div>

							

							<div class="spacer-20"></div>

							

							<form method="post" action="" id="guestApply" enctype="multipart/form-data">

								<label for=""><?php print forceTranslate("Name","الاسم");?> <font class="fnt-rd">*</font></label>

								<input name="name" type="text" class="form-control form-gry w-100" placeholder="" required>

								<div class="spacer-10"></div>

								

								<label for=""><?php print forceTranslate("E-mail","البريد الإلكتروني");?> <font class="fnt-rd">*</font></label>

								<input name="email" type="email" class="form-control form-gry w-100" placeholder="" required>

								<div class="spacer-10"></div>

								

								<div class="col-6">

									<label for=""><?php print forceTranslate("Mobile Number","رقم الجوال");?></label>

								</div>

								<div id="payment">

									<div class="input-group mb-3">

									  <span class="input-group-text">

										<select name="cCode" id="cCode" class="form-control selectpicker remPad bgGrayFieldPad">

											<option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected></option>



											<option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



											<option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



											<option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



											<option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



											<option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>

										</select>

									  </span>

									  <input name="mobile" id="mobile" type="number" class="form-control bgGrayFieldPad remPad" placeholder="555">

									</div>

								</div>



								<div class="spacer-10"></div>



                            	 <div class="col-12">



                                    <label for=""><?php print forceTranslate("Message","النص");?> <font class="fnt-rd">*</font></label>



                                    <textarea name="message" id="message-in" class="form-control form-gry w-100" required></textarea>



                                    <div class="spacer-20"></div>



                                </div>



                                <div class="row">



                                    <div class="col-md-6">



                                        <div class="row">



                                            <div class="col-md-6">



                                                <label for=""><?php print forceTranslate("Attachments","مرفقات")?></label>



                                            </div>



                                            <div class="col-md-6 d-flex justify-content-end">



                                                <div class="exceededCont hideThis">

                                                    <small style="color:red"><?php print forceTranslate("Attachment exceeded","تجاوز الحد المسموح للمرفقات")?></small>

                                                </div>



                                                <div class="addMoreCont">



                                                    <small><?php print forceTranslate("Add another attachment","أضف مرفقًا آخر")?></small>



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



                                                        <small class="caption"><?php print forceTranslate("More than one attachment can be uploaded","يمكن تحميل أكثر من مرفق")?></small>



                                                    </div>



                                                    <div class="col-3 d-flex align-items-center justify-content-end">



                                                        <i class="fa-solid fa-paperclip"></i>



                                                    </div>



                                                </div>



                                                <input type="file" class="attachClick" name="imgMulti[]" accept="image/*,application/pdf" multiple hidden>



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

								

								<div class="spacer-20"></div>

								<input type="hidden" name="postId" value="<?php print $postId;?>">

								<button class="btn btn-warning btn-job-orange w-100"><?php print forceTranslate("Submit","إرسال");?></button>								

							</form>



							<div class="spacer-10"></div>						

			

					</div>

					



					

					

					</div>




			</div>

			

		</div>

	  </div>

	  <div class="modal-footer">



		<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

		<button type="button" class="btn btn-primary">Understood</button> -->



	  </div>

	</div>

  </div>

</div>



