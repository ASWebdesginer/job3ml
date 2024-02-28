<?php /* Template Name: Jobseeker's Avalable Ads */ ?>

<?php

/**

 * The template for displaying Jobseeker's Avalable Ads Page

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *3 Resumes





 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package jobs

 */



    $lang = pll_current_language();

    $fontLang = "fnt-Montserrat";

    if($lang == "ar"){

        $fontLang = "fnt-NotoSansArabic";

    }

	

	$premiumId = 38;

	if($lang == 'ar'){

		$premiumId = 42;

	}

	

	$standardId = 36;

	if($lang == 'ar'){

		$standardId = 46;

	}

							

	$getPremium = getPremiumSubs($premiumId,"jobseekers","");	

	$getStandard = getStandardSubs($standardId,"jobseekers","");	

	

	if(isset($_GET['search']) && $_GET['search'] == 1){

		$getPremium = getPremiumSubsSearch($premiumId,$_GET,"jobseekers");	

		$getStandard = getStandardSubsSearch($standardId,$_GET,"jobseekers");	

	}





?>





<?php get_header(); ?>







<header>



    <?php include "navigation.php" ;?>



</header>



<div class="spacer-100"></div>



	<!-- section-1 -->

  	<section>

  		<div class="container">

  			<center>

  				<h1 class="fnt-bl fnt-bold"><?php print forceTranslate("Job Seeker's Ads","إعلانات الباحثين عن العمل");?></h1>

  			</center> 

  		</div>

  	</section>



	<div class="spacer-100"></div>



 	<!-- section-2 -->

  	<section>





  		<div class="container">



  			<center>

  				<h4 class="fnt-Montserrat"><?php print forceTranslate("Job Seeker Publications","عدد السير الذاتية");?></h4>

  				<img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid">

  			</center>



  			<div class="spacer-40"></div>



			<div class="head-filter">

				<!--<p><b>Position: Accountant</b></p>-->

				<div class="spacer-10"></div>

				<div class="row">

					<div class="col-8">

						<!--

						<form action=""> 											

							<div class="row g-3 align-items-center">

						  <div class="col-auto">

						    <label class="col-form-label">Sort:</label>

						  </div>

						  <div class="col-auto">

							<select name="sort" id="sort" class="form-control selectpicker">

								<option value="0"><?php print forceTranslate("Please Select","Please Select");?></option>

								<option value="1"><?php print forceTranslate("Relevance - Date","Relevance - Date");?></option>

								<option value="1"><?php print forceTranslate("Relevance - City","Relevance - City");?></option>

								<option value="1"><?php print forceTranslate("Relevance - Job Type","Relevance - Job Type");?></option>

							</select>

						  </div>

						</div>

						</form>

						-->

					</div>

					<div class="col-4">

						<!--<p class="text-end"><?php print getJobCount('jobseekers');?> <?php print forceTranslate("Resumes","السير الذاتية");?></p>-->

					</div>

				</div>

			</div>



  		</div>

  	</section>



  	<div class="spacer-40"></div>



  	<!--section-3 -->

  	<section>

  		<div class="container">



  			<div class="row">	



	  			<div class="col-md-3">



	  				<div class="boxed-shadowed">



	  					<div class="filter-top">

	  						<div class="row d-flex align-content-center">



	  							<div class="col-6">

	  								<div class="bar-left">

	  									<h5 class="fnt-Montserrat remMar"><b><?php print forceTranslate("Filter","التصنيف");?></b></h5>

	  								</div>

	  							</div>



	  							<div class="col-6">



	  								<center>

	  									<a href="<?php if($lang == "en"){ print home_url('available-ads/job-seekers-ad/'); }else{print home_url('ar/available-ads-ar/job-seekers-ad-ar/');}?>" class="btn btn-primary btn-sm w-100 btn-job-blue"><?php print forceTranslate("RESET","إعادة ضبط");?> <i class="fa-solid fa-rotate-right fa-mar-left"></i></a>

	  								</center>



	  							</div>

	  						</div>

	  					</div>



	  					<div class="spacer-40"></div>



	  					<div class="filter-bottom">



	  						<form action="" method="post" id="searchForm">

							

								<input type="hidden" name="search" value="1" >

							

	  							<input name="profName" type="text" class="form-control w-100" placeholder="<?php print forceTranslate("Profession's Name","المسمى الوظيفي");?>">



	  							<div class="spacer-10"></div>



								<select name="jobClass" id="jobClass" class="form-control selectpicker remPad" data-live-search="true">

									<option value="0" selected disabled><?php print forceTranslate("Job Classification","تصنيف الوظيفة");?></option>

                                    <?php  print getSelectCat(900,902);?>

								</select>



								<div class="spacer-10"></div>



								<select name="country" id="country" class="form-control selectpicker remPad" data-language="en" data-live-search="true">

									<option value="0"><?php print forceTranslate("Country","الدولة");?></option>

									<?php  print getSelectCat(840,842);?>

								</select>



								<div class="spacer-10"></div>



								<select name="city" id="city" class="form-control selectpicker remPad" data-live-search="true" disabled>

									<option value="0" selected disabled><?php print forceTranslate("City","المدينة");?></option>

								</select>



								<div class="spacer-10"></div>



								

								<label class="form-label" for="age"><?php print forceTranslate("Age","العمر");?></label>

								<div class="row">

									<div class="col-6 text-start">

										<small><?php print forceTranslate("18","١٨");?></small>

									</div>

									<div class="col-6 text-end">

										<small><?php print forceTranslate("65+","+٦٥");?></small>

									</div>

								</div>



							  	<input id="age" name="age" type="text" class="form-range" value="" data-slider-min="18" data-slider-max="65" data-slider-step="1" data-slider-value="[18,65]" data-value="18,65">

								



	   							<div class="spacer-10"></div>



								<select name="gender" id="gender" class="form-control selectpicker remPad">

									<option value="0" selected disabled><?php print forceTranslate("Gender","الجنس");?></option>

									<?php  print getSelectCat(48,50);?>

								</select>



								<div class="spacer-10"></div>



								<select name="nationality" id="nationality" class="form-control selectpicker remPad" data-live-search="true">

									<option value="0" selected disabled><?php print forceTranslate("Nationality","الجنسية");?></option>

                                        <?php  print getSelectCat(432,434);?>

								</select>



								<div class="spacer-10"></div>



								<select name="marital" id="marital" class="form-control selectpicker remPad">

									<option value="0" selected disabled><?php print forceTranslate("Marital Status","الحالة الإجتماعية");?></option>

									<?php  print getSelectCat(1749,1765);?>

								</select>



								<div class="spacer-10"></div>



								<select name="degree" id="degree" class="form-control selectpicker remPad">

									<option value="0" selected disabled><?php print forceTranslate("Education Level","الدرجة العلمية");?></option>

									<?php  print getSelectCat(868,870);?>

								</select>



								<div class="spacer-10"></div>



							

								<select name="language" id="language" class="form-control selectpicker remPad">

									<option value="0" selected disabled><?php print forceTranslate("English Proficiency","مستوى اللغة الانجليزية");?></option>

									<?php print getSelectCat(1128,1321);?>

								</select>



								<div class="spacer-10"></div> 

								



								<div class="row">

									<div class="col-12">

										<div class="form-check">

										  <input name="disablity" class="form-check-input" type="checkbox" value="on" id="disablity">

										  <label class="form-check-label" for="disablity">

										    <?php print forceTranslate("Special Needs","من ذوي الاحتياجات الخاصة");?>

										  </label>

										</div>

									</div>

									<div class="col-12">

										<div class="form-check">

										  <input name="remotely" class="form-check-input" type="checkbox" value="on" id="remotely">

										  <label class="form-check-label" for="remotely">

										    <?php print forceTranslate("Remote Work","العمل عن بعد");?>

										  </label>

										</div>

									</div>

								</div>



								<div class="spacer-10"></div>



								<div class="range">

									<label class="form-label" for="exp"><?php print forceTranslate("Years of Experience","سنوات الخبرة");?></label>

									<div class="row">

										<div class="col-6 text-start">

											<small><?php print forceTranslate("0y","٠سنة");?></small>

										</div>

										<div class="col-6 text-end">

											<small><?php print forceTranslate("30y+","+٣٠ سنة");?></small>

										</div>

									</div>

								  	<!-- <input type="range" name="exp" class="form-range"  min="1y" max="25" id="exp" value=""/> -->

  								  	<input id="exp" name="yrExp" type="text" class="form-range" value="" data-slider-min="0" data-slider-max="30" data-slider-step="1" data-slider-value="[0,30]" data-value="0,30">

								</div>



								<div class="spacer-20"></div>

								

								<button class="btn btn-primary btn-lg w-100 btn-job-blue">

									<i class="fa-solid fa-magnifying-glass"></i>

									<?php print forceTranslate("SEARCH","بحث");?>

								</button>							



	  						</form>



	  					</div>

	  					



	  				</div>



	  				<div class="spacer-40"></div>



	  				<a href="<?php if($lang == "en"){ print home_url('post-an-ad/publish-your-resume/'); }else{print home_url('ar/post-an-ad-ar/publish-your-resume-ar/');}?>" class="btn btn-primary btn-lg w-100 btn-job-blue"><i class="fa-regular fa-file-lines fa-mar-right"></i> <?php print forceTranslate("Submit your resume","تقديم السيرة الذاتية");?></a>



	  				<div class="spacer-40">	</div>			



	  			</div>





	  			<div class="col-md-9 txt-set">

	  				<div class="premium fnt-12">

					

						<?php 

								

							if($getPremium['content'] == 0){

						?>

							<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لا يوجد نتائج..."); ?></div>

							

							<div class="spacer-40"></div>

							

						<?php }else{?>

						

							<div class="row primium-post">

								

								<?php print implode('',$getPremium['content']);?>

							

							</div>

							

							<div class="spacer-40"></div>

							

							

							<?php //print $getStandard['pagination'];?>

							

						<?php }?>



	  				</div>	



	  				<div class="spacer-10"></div>

	  				<hr>

	  				<div class="spacer-20"></div>



	  				<div class="standard fnt-12">

							<div class="availcounts mb-4">

					         	<p class="text-end"><?php print getJobCount('jobseekers');?> <?php print forceTranslate("Resumes","السير الذاتية");?></p>

				         	</div>

						<?php 

								

				// 			$standardId = 36;

				// 			if($lang == 'ar'){

				// 				$standardId = 46;

				// 			}

							

				// 			$getStandard = getStandardSubs($standardId,"jobseekers");

							

							if($getStandard['content'] == 0){

						?>

							<div class="alert alert-info" role="alert"><?php print forceTranslate("No result found...","لا يوجد نتائج..."); ?></div>

							

							<div class="spacer-40"></div>

							

						<?php }else{?>

						

							<div class="row">

								

								<?php print implode('',$getStandard['content']);?>

							

							</div>

							

							<div class="spacer-40"></div>

							

							

							<?php print $getStandard['pagination'];?>

							

						<?php }?>



	  				</div>

  					<div class="spacer-40"></div>

					<!--

					<nav>

					  <ul class="pagination justify-content-center">

					    <li class="page-item">

					      <a class="page-link" href="#" aria-label="Previous">

					       	<i class="fa-solid fa-angle-left"></i>

					      </a>

					    </li>

					    <li class="page-item"><a class="page-link" href="#">1</a></li>

					    <li class="page-item"><a class="page-link" href="#">2</a></li>

					    <li class="page-item"><a class="page-link" href="#">3</a></li>

					    <li class="page-item">

					      <a class="page-link" href="#" aria-label="Next">

					       	<i class="fa-solid fa-angle-right"></i>

					      </a>

					    </li>

					  </ul>

					</nav>

					-->

	  			</div>

  			</div>





		



  		</div>

  	</section>	







  	<div class="spacer-100"></div>





<?php get_footer();?>



