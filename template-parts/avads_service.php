<?php /* Template Name: Service Provider's Avalable Ads */ ?>



<?php

/**

 * The template for displaying Service Provider's Avalable Ads Page

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

	

	$premiumId = 38;

	if($lang == 'ar'){

		$premiumId = 42;

	}

	

	$standardId = 36;

	if($lang == 'ar'){

		$standardId = 46;

	}


	$getPremium = getPremiumSubs($premiumId,"services","");	

	$getStandard = getStandardSubs($standardId,"services","");	

	

	if(isset($_GET['search']) && $_GET['search'] == 1){

		$getPremium = getPremiumSubsSearch($premiumId,$_GET,"services");	

		$getStandard = getStandardSubsSearch($standardId,$_GET,"services");	

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

  				<h1 class="fnt-bl fnt-bold"><?php print forceTranslate("Service and Freelance Advertisements","إعلانات الخدمات والعمل الحر");?></h1>

  			</center> 

  		</div>

  	</section>



	<div class="spacer-100"></div>



 	<!-- section-2 -->

  	<section>

  		<div class="container">



  			<center>

  				<h4 class="fnt-Montserrat"><?php print forceTranslate("Advertised Services","الخدمات المقدمة");?></h4>

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

						<p class="text-end"><?php print getJobCount('services');?> <?php print forceTranslate("Services","خدمة");?></p>

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

	  									<a href="<?php if($lang == "en"){ print home_url('available-ads/service-and-freelance-ads/'); }else{print home_url('ar/available-ads-ar/service-and-freelance-ads-ar/');}?>" class="btn btn-primary btn-sm w-100 btn-job-blue"><?php print forceTranslate("RESET","إعادة ضبط");?> <i class="fa-solid fa-rotate-right fa-mar-left"></i></a>

	  								</center>



	  							</div>

	  						</div>

	  					</div>



	  					<div class="spacer-40"></div>



	  					<div class="filter-bottom">



	  						<form action="" method="post" id="searchForm">

							

								<input type="hidden" name="search" value="1" >



	  							<input name="servName" id="servName" type="text" class="form-control w-100" placeholder="<?php print forceTranslate("Name of Service","اسم مقدم الخدمة");?>">



	  							<div class="spacer-10"></div>



								<select name="servClass" id="servClass" class="form-control selectpicker remPad" data-live-search="true" required>

									<option value="0" selected disabled><?php print forceTranslate("Service Classification","تصنيف الخدمة");?></option>

									<?php  print getSelectCat(1796,1848);?>

								</select>



	  							<div class="spacer-10"></div>



								<select name="country" id="country" class="form-control selectpicker remPad"  data-live-search="true" required>

									<option value="0"><?php print forceTranslate("Country","الدولة");?></option>

									<?php  print getSelectCat(840,842);?>



								</select>



								<div class="spacer-10"></div>



								<select name="city" id="city" class="form-control form-gry selectpicker remPad" data-live-search="true" disabled required>



									<option value="0" selected disabled><?php print forceTranslate("City","المدينة");?></option>



								</select>



								<div class="spacer-10"></div>





								<label class="form-label" for="salary"><?php print forceTranslate("Service Starting Price","بداية سعر الخدمة");?></label>

								<div class="row">

									<div class="col-6 text-start">

										<small><?php print forceTranslate("5","٥");?></small>

									</div>

									<div class="col-6 text-end">

										<small><?php print forceTranslate("10000+","+١٠٠٠٠");?></small>

									</div>

								</div>



							  	<input id="salary" name="salary" type="text" class="form-range" value="" data-slider-min="5" data-slider-max="10000" data-slider-step="100" data-slider-value="[100,10000]" data-value="100,10000">





	   							<div class="spacer-10"></div>



								<!--

								<select name="degree" id="degree" class="form-control selectpicker remPad">

									<option value="" selected disabled>Educational Level</option>

									<option value="1">Option 1</option>

									<option value="1">Option 2</option>

									<option value="1">Option 3</option>

								</select>

								-->



								<div class="spacer-20"></div>	 

								

								<button class="btn btn-primary btn-lg w-100 btn-job-blue">

									<i class="fa-solid fa-magnifying-glass"></i>

									<?php print forceTranslate("SEARCH","بحث");?>

								</button>



	  						</form>



	  					</div>





	  				</div>



	  				<div class="spacer-40"></div>



	  				<a href="<?php if($lang == "en"){ print home_url('post-an-ad/advertise-your-service/'); }else{print home_url('ar/post-an-ad-ar/advertise-your-service-ar/');}?>" class="btn btn-primary btn-lg w-100 btn-job-blue"><img src="<?php print get_theme_url();?>/img/megaphone.svg" class="fa-mar-right" style="width: 33px;">

	  					<?php print forceTranslate('Publish Your Service','الإعلان عن خدمة مقدمة');?>

	  				</a>



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

						

							<div class="row">

								

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

						

						<?php 

								

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



