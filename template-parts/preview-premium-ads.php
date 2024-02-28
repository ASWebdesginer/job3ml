<?php /* Template Name: Premium Preview Page */ ?>

<?php
/**
 * The template for displaying Job Seekers Ad Forms Page
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
    if(!isset($_GET['id'])){
       wp_redirect(get_home_url()."/post-an-ad/publish-a-job-posting/");
       exit();
    }else{

        $postId = $_GET['id'];

        $post = get_post($postId);
        if (!$post) {
            wp_redirect(get_home_url()."/post-an-ad/publish-a-job-posting/");
            exit();
        } else {

          $getData = getPostById($postId,$post->post_type);
		  		  
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
          $getCategories = getCatByPost($postId,$arrayCatsList);
          $country = $getCategories['country'];
          $city = $getCategories['city'];
          $education = $getCategories['education'];
          $eng_pro = $getCategories['eng_pro'];
          $job_class = $getCategories['job_class'];
		  $service_class = $getCategories['service_class'];
		  $gender = $getCategories['gender'];
		  $marital = $getCategories['marital'];
          
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
            $email = get_field("email", $postId);
            $parts = explode('@', $email);
            $username = $parts[0];
            $domain = $parts[1];
            // Check if $hideEmail is set to "off"
            if (strtolower(trim($hideEmail)) == "off") {
                $maskedshowEmail = '<p class="fnt-12"><i class="fa-solid fa-envelope fa-mar-right"></i> <a href="mailto:' . $email . '">' . $email . '</a></p>';
            } else {
                // Mask the email username
                $encryptedUsername = $username[0] . str_repeat('*', max(strlen($username) - 2, 0)) . $username[strlen($username) - 1];
                $encryptedEmail = $encryptedUsername . '@' . $domain;
                $maskedshowEmail = '<p class="fnt-12"><i class="fa-solid fa-envelope fa-mar-right"></i> <a href="mailto:' . $email . '">' . $encryptedEmail . '</a></p>';
            }
		  if($hideMobile == "off"){
			  $mobile = get_field("mobile",$postId);
			  $cCode = get_field("country_code",$postId);
			  $fullMobile = $cCode.$mobile;
			  $showMobile = '<p class="fnt-12 dir-chng"><i class="fa-solid fa-phone-flip fa-mar-right icon-order"></i> <a href="tel:+'.$fullMobile.'">'.$fullMobile.'</a></p>';
			  $showMobileFull = '<p class="dir-chng">
					<img src="https://cms.job3ml.com/wp-content/themes/jobs/img/wallet.svg" class="svg-icon-20 fa-mar-right icon-order">
					<a class="fnt-orange" href="tel:'.$fullMobile.'">'.$fullMobile.'</a>
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
			  $spec1 = '<center><p class="smBox">'.forceTranslate("I am with special needs","أنا من ذوي الاحتياجات الخاصة").'</p></center>';
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
				if($salaryTo !== null){

			        $salaryTo=floatval($salaryTo);

			        $salary = number_format($salaryTo) . " " . $nego;

			    }
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
			  $mainTitle = forceTranslate("Job Seeker Advertisements", "إضافة الإعلان كباحث عن عمل");
		  }
		  
		  $attach1 = "";
		  $attach2 = "";
		  $attach3 = "";
		  
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
		  
		  
        }
    }
?>


<?php get_header(); ?>



<header>

    <?php include "navigation.php" ;?>

</header>

<div class="spacer-100"></div>

    <section>

        <div class="container">

            <center>

                <h1 class="fnt-bl fnt-bold"><?php print $mainTitle; ?></h1>

            </center>

        </div>

    </section>


    <div class="spacer-100"></div>



    <!-- section-2 -->
    <section>


        <div class="container">

            <!-- contents -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    
                    <div class="boxed-shadowed border-orange addPaddSide-60">

                        <div class="spacer-40"></div>

                        <center>
                            <h4 class="fnt-bl fnt-bold <?php print $fontLang;?>">
                                <?php print forceTranslate("This is how the advertisement appears on the site","هكذا يظهر الإعلان على الموقع") ?>
                            </h4>
                            <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid">
                        </center>

                        <div class="spacer-40"></div>


                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 txt-set">
                            <div class="standard fnt-12">
                                <div class="boxed-dark">
                                        <div class="row">
                                        <div class="col-11"></div>
                                        <div class="col-1 text-end remPad">
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-sm btn-action dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><?php print forceTranslate("Details","تفاصيل");?></a></li>
                                                <li><a class="dropdown-item" href="#"><?php print forceTranslate("Favorite","إضافة للمفضلة");?></a></li>
                                                <li><a class="dropdown-item" href="#"><?php print forceTranslate("Share","مشاركة");?></a></li>
                                              </ul>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <img src="<?php print $logo;?>" class="img-fluid">
											<?php if($postType == "jobseekers"){?>
												<div class="spacer-10"></div>
												<a href="<?php echo $cv;?>" class="btn btn-warning btn-sm btn-dark w-100" download>
													<i class="fa-solid fa-download fa-mar-right"></i> CV
												</a>
											<?php } ?>
                                        </div>
                                            <div class="col-8">
                                                <p class="fnt-orange fnt-12 allCaps">
													<b><?php print $jobName;?></b>
												</p>
												
                                            <div class="spacer-10"></div>
											
                                            <p class="fnt-12">
												<?php if($postType == "jobseekers"){?>
													<i class="fa-solid fa-user fa-mar-right"></i> 
												<?php }else{ ?>
													<i class="fa-solid fa-building fa-mar-right"></i> 
												<?php }?> 
													<font class="allCaps"><?php print $companyName; ?></font>
												</p>
                                            <p class="fnt-12">
												<i class="fa-solid fa-location-dot fa-mar-right"></i> 
												<?php print $city; ?>, <?php print $country; ?>
											</p>
											<?php print $maskedshowEmail;?>
											<?php print $showMobile;?>
											
												<?php if($postType == "jobseekers"){?>
													<div class="spacer-20"></div>
													<center class="btn btn-light btn-sm w-100" >
														<b class="allCaps"><?php print $position; ?></b>
													</center>
													
													<div class="spacer-5"></div>
													
													<div class="row">
														<div class="col-md-6"><?php print $rem4;?></div>
														<div class="col-md-6"><?php print $spec2;?></div>
													</div>
													
												<?php }?>											
                                            </div>
                                        </div>

                                    <div class="spacer-10"></div>

                                    <div class="row">
                                        <div class="col-6">
										<?php if($postType != "jobseekers"){?>
                                            <a href="" class="btn btn-warning btn-sm btn-dark w-100"><?php print $getCategories['shift']; ?></a>
										<?php }?>
                                        </div>
                                        <div class="col-6">
                                            <?php //print $rem2;?>
                                        </div>
                                    </div>

                                        <div class="spacer-10"></div>
										<?php if($postType != "jobseekers"){?>
											<div>
												<?php print $jobDescriptionExcerpt; ?>
											</div>
										<?php }?>

                                    <div class="spacer-20"></div>

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <a href="" class="btn btn-warning btn-default w-100"  onclick="return false;"><?php print forceTranslate("Details","قدم الان")?></a>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="spacer-20"></div>

                                    <p class="fnt-12">
										<?php print $datePosted;?> | 
										<i class="fa-solid fa-barcode"></i> <?php print get_field("ads_id",$postId);?>
									</p>
                                    <div class="spacer-20"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="spacer-40"></div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <center>
                                    <a href="<?php print home_url()."/preview-standard-ads?id=".$postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">
                                        <?php print forceTranslate("Back to page", "الرجوع للصفحه السابقه"); ?>
                                    </a>
                                </center>
                                
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="spacer-40"></div>
                    </div>

                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="spacer-60"></div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 txt-set">
                    
                    <div class="premium">
                        <div class="boxed-dark addPaddAll-40">
						
							<div class="row">
								<div class="col-md-8">
								
									<h4 class="fnt-orange fnt-bold allCaps <?php print $fontLang;?>">
										<?php print $jobName;?>
									</h4>
									
									<div class="spacer-20"></div>
									
									<div>
										<b class="allCaps fnt-20">
											<?php if($postType == "jobseekers"){?>
												<i class="fa-solid fa-user fnt-orange fa-mar-right"></i> 
											<?php }else{ ?>
												<i class="fa-solid fa-building fnt-orange fa-mar-right"></i> 
											<?php }?>
											 
											<?php print $companyName; ?>
										</b>
									</div>

									<div class="spacer-20"></div>
									
									<div class="row">
										<div class="col-md-6">
																				
											<p>
												<img src="<?php print get_theme_url();?>/img/briefcase-orange.svg" class="svg-icon-20 fa-mar-right"> 
												<?php print $experience;?>
												<?php print forceTranslate("year(s) experience","سنوات الخبرة");?>
											</p>
											
											<div class="spacer-20"></div>
											<?php if($postType != "jobseekers"){?>
												<p>
													<img src="<?php print get_theme_url();?>/img/wallet-orange.svg" class="svg-icon-20 fa-mar-right"> 
													<?php print $salary;?>
												</p>
												
												<div class="spacer-20"></div>
											<?php } ?>
											<p>
												<img src="<?php print get_theme_url();?>/img/droppin-orange.svg" class="svg-icon-20 fa-mar-right"> 
												<?php print $city; ?>, <?php print $country; ?>
											</p>
										
										</div>
										
										<div class="col-md-6">
										   <?php print $showEmailFull;?>
										   
										   <div class="spacer-20"></div>
										   
											<?php print $showMobileFull;?>
											
											<div class="spacer-20"></div>
										</div>
									</div>

								
								
								</div>
								<div class="col-md-4">
									<center><img src="<?php print $logo;?>" class="img-fluid"></center>
								</div>
							</div>

                            <div class="spacer-20"></div>
                            <hr>
                            <div class="spacer-20"></div>
							
							<?php if($postType != "jobseekers"){?>
								<h4 class="fnt-orange fnt-bold <?php print $fontLang;?>">
									<?php print forceTranslate("Job description", "الوصف الوظيفي"); ?>
								</h4>
								<div class="spacer-20"></div>

								<div class="fnt-20">
									<?php print $jobDescription; ?>
								</div>
							<?php }?>
	
                            <div class="spacer-40"></div>

                            <div class="row remPad content-14">
							
								<?php if($postType == "employers"){ ?>
								
									<div class="col-md-6">
										<div class="row">
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("Role","دور");?>:</p></div>
											<div class="col-8"><?php print $jobName;?></div>                                       
										</div>
										<div class="spacer-20"></div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("Industry Type","تصنيف الوظيفة");?>:</p></div>
											<div class="col-8"><?php print $employment; ?></div>                               
										</div>
										<div class="spacer-20"></div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("Degree","الدرجة العلمية");?>:</p></div>
											<div class="col-8"><?php print $education; ?></div>                               
										</div>
										<div class="spacer-20"></div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("English proficiency","مستوى إجادة اللغة الإنجليزية");?>:</p></div>
											<div class="col-8"><?php print $eng_pro;?></div>                           
										</div>
										<div class="spacer-20"></div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("Essential skills for the job","المهارات الأساسية للوظيفة");?>:</p></div>
											<div class="col-8">

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
											<div class="col-4"><p class="fnt-orange"><?php print forceTranslate("Job classification","تصنيف الوظيفة");?>:</p></div>
											<div class="col-8"><?php print $job_class;?></div>                                  
										</div>
										<div class="spacer-20"></div>
									</div> 

									<div class="col-md-6">
										<?php print $shift; ?> 
										<div class="spacer-20"></div>
									</div> 

									<div class="col-md-6">	
										<?php print $remo; ?> 
										<div class="spacer-20"></div>								
									</div> 
									
									<div class="col-md-12">
										<div class="row">
											<div class="col-2"><p class="fnt-orange"><?php print forceTranslate("Attachments","مرفقات");?>:</p></div>
											<div class="col-10">
												<?php print $attach1;?>
												<?php print $attach2;?>
												<?php print $attach3;?>

											</div>
										</div>
										<div class="spacer-20"></div>		
									</div>	
									
								<?php }?>
								
								
								<?php if($postType == "services"){ ?>
								
									<div class="col-md-6">
										<div class="row">
											<div class="col-4">
												<p class="fnt-orange">
													<?php print forceTranslate("Service Description","وصف الخدمة المختصر");?>:
												</p>
											</div>
											<div class="col-8"><?php print $jobName;?></div>                                       
										</div>
										<div class="spacer-20"></div>
									</div>
									
									<div class="col-md-6">
										<div class="row">
											<div class="col-4">
												<p class="fnt-orange">
													<?php print forceTranslate("Service Classification","نوع الخدمة");?>:
												</p>
											</div>
											<div class="col-8"><?php print $service_class;?></div>
										</div>
										<div class="spacer-20"></div>
									</div>
									
									<!--
									<div class="col-md-6">
										<div class="row">
											<div class="col-4">
												<p class="fnt-orange"><?php print forceTranslate("Service Rating","تصنيف الخدمة");?>:</p>
											</div>
											<div class="col-8"><?php print $ratingStars; ?></div>                               
										</div>
										<div class="spacer-20"></div>
									</div>
									-->

									<div class="col-md-6">
										<div class="row">
											<div class="col-4">
												<p class="fnt-orange">
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
												<p class="fnt-orange">
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
												<p class="fnt-orange">
													<?php print forceTranslate("Essential skills for the job","المهارات الأساسية للوظيفة");?>:
												</p>
											</div>
											<div class="col-8">

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

									<div class="col-md-6"></div> 
									
	                             <div class="col-md-6">
                                    <div class="row">
                                    <div class="col-12"><span class="smBox fnt-15">I am with special needs</span></div>                     
                                    </div>
                                    <div class="spacer-20"></div>
                                </div>

								<div class="col-md-12">
											<div class="row">
												<div class="col-2"><p class="fnt-orange"><?php print forceTranslate("Attachments","مرفقات");?>:</p></div>
												<div class="col-10">
													<?php print $attach1;?>
													<?php print $attach2;?>
													<?php print $attach3;?>
												</div>
											</div>
											<div class="spacer-20"></div>		
										</div>	

                                <div class="spacer-40"></div>

       							
								<?php }?>

								<?php if($postType == "jobseekers"){ ?>
									
									<!-- jobseekers content -->
									<div class="row content-sap">
									
										<div class="col-md-6">
											<div class="row">
												<div class="col-4"><p class="fnt-orange">
													<?php print forceTranslate("Gender","الجنس");?>:
													</p>
												</div>
												<div class="col-8"><?php print $gender;?></div>
											</div>
											<div class="spacer-20"></div>
										</div>

										<div class="col-md-6">
											<div class="row">
												<div class="col-4"><p class="fnt-orange">
													<?php print forceTranslate("Age","العمر");?>:</p>
												</div>
												<div class="col-8"><?php print $age; ?></div>
											</div>
											<div class="spacer-20"></div>
										</div>

										<div class="col-md-6">
											<div class="row">
												<div class="col-4">
													<p class="fnt-orange">
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
													<p class="fnt-orange">
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
													<p class="fnt-orange">
														<?php print forceTranslate("Education Level","الدرجه العلميه");?>:
													</p>
												</div>
												<div class="col-8"><?php print $education;?></div>
											</div>
											<div class="spacer-20"></div>
										</div>
										
										<div class="col-md-6">
											<div class="row">
												<div class="col-4">
													<p class="fnt-orange">
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
													<p class="fnt-orange">
														<?php print forceTranslate("Essential skills:","المهارات الأساسية:");?>:
													</p>
												</div>
												<div class="col-8">
													<?php print $getTags; ?>

												</div>
											</div>
											<div class="spacer-20"></div>
										</div>
										
										<div class="col-md-6"></div>
										
										
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
												<div class="col-2"><p class="fnt-orange"><?php print forceTranslate("Attachments","مرفقات");?>:</p></div>
												<div class="col-10">
													<?php print $attach1;?>
													<?php print $attach2;?>
													<?php print $attach3;?>
												</div>
												<!-- <div class="col-2">
														<?php if($postType == "jobseekers"){?>
															<a href="<?php echo $cv;?>" class="btn btn-warning btn-sm btn-dark w-100" download>
																<i class="fa-solid fa-download fa-mar-right"></i> CV
															</a>
														<?php } ?>
												</div> -->
											</div>
											<div class="spacer-20"></div>		
										</div>	
										
										
										<div class="spacer-40"></div>
										
									</div>
								
								<?php } ?>									



                                   



     							
								<div class="col-12">
                                    <center>
                                        <div class="spacer-40"></div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
											<?php if($postType == "jobseekers"){ ?>
											  <a href="" class="btn btn-warning btn-lg btn-job-orange w-100"  onclick="return false;"><?php print forceTranslate("Request for an interview","طلب إجراء مقابلة");?></a>
											<?php }else{ ?>
											  <a href="" class="btn btn-warning btn-lg btn-job-orange w-100"  onclick="return false;"><?php print forceTranslate("APPLY","قدم الان");?></a>
											<?php }?>
                                              
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </center>
                                </div>

                                <div class="spacer-60"></div>  


                                <p class="fnt-15 fnt-bold">
                                     
									<?php if($postType == "jobseekers"){ ?>
										<?php print forceTranslate("Posted","تم النشر");?>: <?php print $datePosted;?> 
									<?php }else{ ?> 
										<?php print forceTranslate("Posted","تم النشر");?>: <?php print $datePosted;?> | 
										<?php print forceTranslate("Openings","الوظائف الشاغرة");?>: <?php print $vacancy; ?> | 
										<?php print forceTranslate("Job Applicants","المتقدمون للوظيفة");?>: <?php print getJobCount('employers');?> | 
										<i class="fa-solid fa-barcode"></i> <?php print get_field("ads_id",$postId);?> 									
									<?php }?>
								</p>
                            </div>                      
                        </div>
                    </div>
                    <div class="spacer-60"></div>

                  <div class="row">
                        <div class="col-md-1"></div>
                        
						<?php if($lang == "en"){?>
						
						<div class="col-md-5">	
							<a href="<?php print home_url()."/preview-standard-ads?id=".$postId; ?>" class="btn btn-warning btn-lg btn-job-orange w-100">
                                <?php print forceTranslate("Cancel","الرجوع للصفحة السابقة");?>
                            </a>
						</div>
                        <div class="col-md-5">
                            <a href="<?php print home_url()."/pricing?id=".$postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">
                                <?php print forceTranslate("Check the pricing","تحقق من السعر");?>
                            </a>
                        </div>
							
						<?php }else{?>
						
						<div class="col-md-5">	
							<a href="<?php print home_url()."/preview-standard-ads-ar?id=".$postId; ?>" class="btn btn-warning btn-lg btn-job-orange w-100">
                                <?php print forceTranslate("Cancel","الرجوع للصفحة السابقة");?>
                            </a>
						</div>
                        <div class="col-md-5">
                            <a href="<?php print home_url()."/pricing-ar?id=".$postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">
                                <?php print forceTranslate("Check the pricing","تحقق من السعر");?>
                            </a>
                        </div>
						
						<?php }?>


                        <div class="col-md-1"></div>
                    </div>

                    <div class="spacer-60"></div>

                </div>
                <div class="col-md-1"></div>
            </div>

        </div>
    </section>

    <div class="spacer-100"></div>


<div class="spacer-100"></div>


<?php get_footer();?>





