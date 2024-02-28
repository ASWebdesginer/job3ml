<?php /* Template Name: Front Page */ ?>



<?php

/**

 * The template for displaying Front Page

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







$linkEAP = home_url("post-an-ad/publish-a-job-posting/");

$linkJAP = home_url("post-an-ad/publish-your-resume/");

$linkSAP = home_url("post-an-ad/advertise-your-service/");



$linkJA = home_url("available-ads/job-seekers-ad/");

$linkEA = home_url("available-ads/employers-ads/");

$linkSA = home_url("available-ads/service-and-freelance-ads/");



if($lang == "ar"){

	$linkEAP = home_url("ar/post-an-ad-ar/publish-a-job-posting-ar/");

	$linkJAP = home_url("ar/post-an-ad-ar/publish-your-resume-ar/");

	$linkSAP = home_url("ar/post-an-ad-ar/advertise-your-service-ar/");



	$linkJA = home_url("ar/available-ads-ar/job-seekers-ad-ar/");

	$linkEA = home_url("ar/available-ads-ar/employers-ads-ar/");

	$linkSA = home_url("ar/available-ads-ar/service-and-freelance-ads-ar/");

}







?>



<?php get_header(); ?>







<header>







    <?php include "navigation.php" ;?>



  <div id="banner" class="container-fluid" style="background-image: url('<?php print get_theme_url();?>/img/banner1.jpg');">



    <div class="spacer-80 d-none d-md-block"></div>



    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

            <center><h2 class="h2"><?php print forceTranslate("Job3ml is the best platform to connect employers with job seekers and service providers in the Kingdom of Saudi Arabia and the Gulf region.","جوب عمل هي المنصة الأفضل لالتقاء صاحب العمل بالباحث عن العمل بالإضافة لاكتشاف مقدمي الخدمات في المملكة العربية السعودية ومنطقة الخليج العربي.")?></h2></center>

            <div class="spacer-20"></div>



			<?php

				if(isset($_POST['home-search-submit'])){



					//print_r($_POST);



					//print get_home_url()."/available-ads/employers-ads/?search=1&profName=".$_POST['home-search-input']."&compName=&country=0&empName=&aveSalary=1000%2C20000";



					wp_redirect(get_home_url()."/available-ads/employers-ads/?search=1&profName=".$_POST['home-search-input']."&compName=&country=0&empName=&aveSalary=1000%2C20000");



						exit();



				}

			?>



            <div class="home-search">

                <form action="" method="post">

                    <div class="input-group">



					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span><input name="home-search-input" type="text" class="form-control" placeholder="<?php print forcetranslate("look for a job now...","ابحث عن وظيفة الان");?>" required />

					<span class="input-group-text"><small class="d-none d-md-block fnt-bl"><?php print forceTranslate("6500 job opportunities","فرصة عمل 6500");?></small></span>

					<span class="input-group-text"><input type="submit" name="home-search-submit" class="btn btn-primary btn-job-blue" value="<?php print forceTranslate("Search","ابحث"); ?>" /></span>





                    </div>

                </form>

            </div>



            <div class="spacer-40"></div>



            <div class="desktop-view">

                <div class="banner-column">

                    <div class="row display-flex">

                        <div class="col-12 col-md-4">

                            <div class="col-card">

                                <h4><?php print forceTranslate("Job Seeker","باحث عن عمل"); ?></h4>

                                <div class="spacer-10"></div>

                                <div class="row">

                                    <div class="col-12 col-md-8 order-2 order-md-1">

                                        <p><?php print forceTranslate("Are you looking for a job that matches your skills and experience?","هل تبحث عن وظيفة تناسب مهاراتك وخبراتك؟"); ?></p>

                                        <div class="spacer-10"></div>

                                    </div>

                                    <div class="col-12 col-md-4 order-1 order-md-2 d-flex">

                                        <img src="<?php print get_theme_url();?>/img/banner-col1.svg" class="img-fluid" />

                                        <div class="spacer-10"></div>

                                    </div>

                                </div>

                                <div class=""><a href="<?php print $linkEA; ?>" class="btn btn-primary btn-job-blue"><?php print forceTranslate("Search now","ابحث الآن"); ?></a></div>

                            </div>

                            <div class="spacer-20"></div>

                        </div>

                        <div class="col-6 col-md-4">

                            <div class="col-card">

                                <h4><?php print forceTranslate("Business Owner","صاحب عمل"); ?></h4>

                                <div class="spacer-10"></div>

                                <div class="row">

                                    <div class="col-12 col-md-8 order-2 order-md-1">

                                        <p><?php print forceTranslate("Are you looking for a highly qualified employee for your business?","هل تبحث عن موظف عالي الكفاءة لمؤسستك؟"); ?></p>

                                        <div class="spacer-10"></div>

                                    </div>

                                    <div class="col-12 col-md-4 order-1 order-md-2 d-flex">

                                        <img src="<?php print get_theme_url();?>/img/banner-col2.svg" class="img-fluid" />

                                        <div class="spacer-10"></div>

                                    </div>

                                </div>

                                <div class=""><a href="<?php print $linkJA; ?>" class="btn btn-primary btn-job-blue"><?php print forceTranslate("Search now","ابحث الآن"); ?></a></div>

                            </div>

                            <div class="spacer-20"></div>

                        </div>

                        <div class="col-12 col-md-4">

                            <div class="col-card">

                                <h4><?php print forceTranslate("Freelance <span id='andbetweenfsmi'>&</span> Services","الخدمات والعمل الحر"); ?></h4>

                                <div class="spacer-10"></div>

                                <div class="row">

                                    <div class="col-12 col-md-8 order-2 order-md-1">

                                        <p><?php print forceTranslate("Are you looking for services provided by creatives in a variety of fields?","هل تبحث عن خدمات مقدمه في مختلف المجالات؟



"); ?></p>

                                        <div class="spacer-10"></div>

                                    </div>

                                    <div class="col-12 col-md-4 order-1 order-md-2 d-flex">

                                        <img src="<?php print get_theme_url();?>/img/banner-col3.svg" class="img-fluid" />

                                        <div class="spacer-10"></div>

                                    </div>

                                </div>

                                <div class=""><a href="<?php print $linkSA; ?>" class="btn btn-primary btn-job-blue"><?php print forceTranslate("Search now","ابحث الآن"); ?></a></div>

                            </div>

                            <div class="spacer-20"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-2"></div>

    </div>





  </div>

</header>





<!-- section - steps -->

<section id="steps">

    <div class="spacer-100"></div>

    <div class="container">

        <center>

            <h2 class="fnt-bl fnt-bold"><?php print forceTranslate("3 steps to finding the right Job, service, or employee","3 خطوات لتجد الوظيفة، الخدمة أو الموظف المناسب"); ?></h2>

            <div class="spacer-20"></div>

            <p class="fnt-bold"><?php print forceTranslate("Job3ml is a platform where you can find different companies and the best specialists for your organization.","منصة جوب عمل هي طريقك للعثور على مختلف الشركات وأفضل الخبراء والخدمات لمؤسستك.



"); ?></p>

        </center>

        <div class="spacer-60"></div>

        <div class="row display-flex">

            <div class="col-md-4">

                <!-- <a href="" onclick="return false;"> -->

                    <div class="step-card">

                        <center><h2 class="fnt-bl fnt-bold"><?php print forceTranslate("Search","ابحث"); ?></h2></center>

                        <div class="spacer-40"></div>

                        <div class="step-img">

							<?php if($lang == "en"){?>

								<center><img src="<?php print get_theme_url();?>/img/step-1.svg" class="img-fluid" /></center>

							<?php }else{ ?>

								<center><img src="<?php print get_theme_url();?>/img/step-1-ar.svg" class="img-fluid" /></center>

							<?php }?>



                        </div>

                    </div>

                <!-- </a> -->

                <div class="spacer-20"></div>

            </div>

            <div class="col-md-4">

                <!-- <a href="" onclick="return false;"> -->

                    <div class="step-card">

                        <center><h2 class="fnt-bl fnt-bold"><?php print forceTranslate("Explore","اكتشف"); ?></h2></center>

                        <div class="spacer-40"></div>

                        <div class="step-img">

                            <center><img src="<?php print get_theme_url();?>/img/step-3.svg" class="img-fluid" /></center>

                        </div>

                    </div>

                <!-- </a> -->

                <div class="spacer-20"></div>

            </div>

            <div class="col-md-4">

                <!-- <a href="" onclick="return false;"> -->

                    <div class="step-card">

                        <center><h2 class="fnt-bl fnt-bold"><?php print forceTranslate("Communicate","تواصل"); ?></h2></center>

                        <div class="spacer-40"></div>

                        <div class="step-img">

                            <center><img src="<?php print get_theme_url();?>/img/step-2.svg" class="img-fluid" /></center>

                        </div>

                    </div>

                <!-- </a> -->

                <div class="spacer-20"></div>

            </div>

        </div>

    </div>

</section>



<div class="spacer-100"></div>





<!-- section - vacancies -->

<section id="filters">

  <div class="container">

      <center><h2 class="fnt-bl fnt-bold"><?php print forceTranslate("Latest Vacancies","أحدث الفرص المتاحة"); ?></h2></center>

      <div class="spacer-60"></div>

      <div class="content-filter">

          <div class="spacer-20"></div>

          <div class="row">



              <div class="col-md-4">



				<div class="postJob">

                      <center style="height:13vh;display: flex;flex-direction: column;justify-content: space-evenly;">

                          <h5><?php print forceTranslate("Post a Job Vacancy","اعلن عن وظائف شركتك المتاحة للباحثين عن فرص عمل"); ?></h5>

                          <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid"/>

                      </center>



                      <div class="spacer-40"></div>



                      <div class="body-filter">



						<?php



							$standardId = 36;

							if($lang == 'ar'){

								$standardId = 46;

							}



							$getStandard = getStandardSubsHome($standardId,"employers");



							if($getStandard['content'] == 0){

						?>

							<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لم يتم العثور على نتائج..."); ?></div>



							<div class="spacer-20"></div>



						<?php }else{?>



								<?php print implode('',$getStandard['content']);?>



						<?php }?>



						  <div class="spacer-40"></div>



                          <div class="form-filter">

                              <div class="row">

                                  <div class="col-md-2"></div>

								  <div class="col-md-8">

									<a href="<?php print $linkEA; ?>" class="btn btn-primary btn-lg btn-job-blue w-100"><?php print forceTranslate("More Employer's Ads","المزيد من إعلانات الباحثين عن العمل");?></a>



								  </div>

                                  <div class="col-md-2"></div>

                              </div>

                              <div class="spacer-60"></div>

                          </div>

                      </div>

                  </div>



				<div class="spacer-20"></div>

              </div>



			  <div class="col-md-4">



				<div class="postJob">

                      <center class="ar-img-adjust" style="height:13vh;display: flex;flex-direction: column;justify-content: space-evenly;">

						<h5><?php print forceTranslate("Submit Your Resume","انشر سيرتك الذاتية وابحث عن وظيفتك التالية على موقع عمل"); ?></h5>



                          <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid"/>

                      </center>

                      <div class="spacer-40"></div>

                      <div class="body-filter">



						<?php



							$standardId = 36;

							if($lang == 'ar'){

								$standardId = 46;

							}



							$getStandard = getStandardSubsHome($standardId,"jobseekers");



							if($getStandard['content'] == 0){

						?>

							<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لم يتم العثور على نتائج..."); ?></div>



							<div class="spacer-20"></div>



						<?php }else{?>



								<?php print implode('',$getStandard['content']);?>



						<?php }?>

					  </div>

                      <div class="spacer-40"></div>

                      <div class="form-filter">

                          <div class="row">

                              <div class="col-md-2"></div>

							  <div class="col-md-8">

								 <a href="<?php print $linkJA; ?>" class="btn btn-primary btn-lg btn-job-blue w-100"><?php print forceTranslate("More Job Seeker's Ads","المزيد من إعلانات أصحاب الاعمال");?></a>

							  </div>



                              <div class="col-md-2"></div>

                          </div>

                          <div class="spacer-60"></div>

                      </div>

                  </div>



				<div class="spacer-20"></div>

			  </div>



			 <div class="col-md-4">

                  <div class="postJob">

                      <center style="height:13vh;display: flex;flex-direction: column;justify-content: space-evenly;" >

                          <h5><?php print forceTranslate("Post a Service","اعلن عن خدماتك و عملك الحر."); ?></h5>

                          <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid"  <?php if($lang == 'ar') { ?> style="margin-top: 23px;" <?php } ?>/>

                      </center>

                      <div class="spacer-40"></div>

                      <div class="body-filter">



						<?php



							$standardId = 36;

							if($lang == 'ar'){

								$standardId = 46;

							}



							$getStandard = getStandardSubsHome($standardId,"services");



							if($getStandard['content'] == 0){

						?>

							<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لم يتم العثور على نتائج..."); ?></div>



							<div class="spacer-20"></div>



						<?php }else{?>



								<?php print implode('',$getStandard['content']);?>



						<?php }?>

					  </div>



                      <div class="spacer-40"></div>

                      <div class="form-filter">

                          <div class="row">

                              <div class="col-md-2"></div>

                              <div class="col-md-8"><a href="<?php print $linkSA; ?>" class="btn btn-primary btn-lg btn-job-blue w-100"><?php print forceTranslate("More Available Services","المزيد من إعلانات الخدمات والعمل الحر");?></a></div>

                              <div class="col-md-2"></div>

                          </div>

                          <div class="spacer-60"></div>

                      </div>

                  </div>



				  <div class="spacer-20"></div>

              </div>



		  </div>

      </div>

  </div>

  <div class="container">

      <div class="row">

          <div class="col-md-4">

              <div class="boxed-shadowed h-100">

                  <div class="spacer-20"></div>

                  <center>

                      <h4 class="fnt-bl"><?php print forceTranslate("Publish a Job Posting","للإعلان عن الوظيفة المطلوبه"); ?></h4>

                      <div class="spacer-20"></div>

                      <img src="<?php print get_theme_url();?>/img/front-bottom-img1.svg" class="img-fluid same-height-14" />

                  </center>

                  <div class="spacer-20"></div>

                  <div class="row">

                      <div class="col-md-2"></div>

                      <div class="col-md-8"><a href="<?php print $linkEAP;?>" class="btn btn-primary btn-job-blue w-100"><?php print forceTranslate("Click Here","اضغط هنا"); ?></a></div>

                      <div class="col-md-2"></div>

                  </div>

                  <div class="spacer-20"></div>

              </div>

          </div>

          <div class="col-md-4">

              <div class="boxed-shadowed h-100">

                  <div class="spacer-20"></div>

                  <center>

                      <h4 class="fnt-bl"><?php print forceTranslate("Publish Your Resume","لتقديم سيرتك الذاتيه"); ?></h4>

                      <div class="spacer-20"></div>

                      <img src="<?php print get_theme_url();?>/img/front-bottom-img2.svg" class="img-fluid same-height-14" />

                  </center>

                  <div class="spacer-20"></div>

                  <div class="row">

                      <div class="col-md-2"></div>

                      <div class="col-md-8"><a href="<?php print $linkJAP;?>" class="btn btn-primary btn-job-blue w-100"><?php print forceTranslate("Click Here","اضغط هنا"); ?></a></div>

                      <div class="col-md-2"></div>

                  </div>

                  <div class="spacer-20"></div>

              </div>

          </div>

          <div class="col-md-4">

              <div class="boxed-shadowed h-100">

                  <div class="spacer-20"></div>

                  <center>

                      <h4 class="fnt-bl"><?php print forceTranslate("Advertise Your Service","للإعلان عن خدمة مقدمة"); ?></h4>

                      <div class="spacer-20"></div>

                      <div class="spacer-20"></div>

                      <img src="<?php print get_theme_url();?>/img/ad-service.svg" class="img-fluid same-height-14" />

                  </center>

                  <div class="spacer-20"></div>

                  <div class="row">

                      <div class="col-md-2"></div>

                      <div class="col-md-8"><a href="<?php print $linkSAP;?>" class="btn btn-primary btn-job-blue w-100"><?php print forceTranslate("Click Here","اضغط هنا"); ?></a></div>

                      <div class="col-md-2"></div>

                  </div>

                  <div class="spacer-20"></div>

              </div>

          </div>

      </div>

  </div>

  <div class="spacer-100"></div>

</section>



<div class="spacer-100"></div>





<?php get_footer();?>





