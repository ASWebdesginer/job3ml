<?php /* Template Name: Thank You Page */ ?>



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

    if(!isset($_GET['id']) && !isset($_GET['adsId'])){

       wp_redirect(get_home_url());

       exit();

    }else{



        $postId = $_GET['adsId'];
     
        $payment_type=(isset($_GET['ctype'])) ? $_GET['ctype'] : 'payment';

        $post = get_post($postId);

        if (!$post) {

            wp_redirect(get_home_url());

            exit();

        } else {



          $getData = getPostById($postId,$post->post_type);



          //print_r($getData);



          switch ($getData->post_type) {

                case "employers":

                    $addType = "EAP";

                    break;

                case "jobseekers":

                    $addType = "JAP";

                    break;

                case "services":

                    $addType = "SAP";

                    break;

            }



          $subtype = "";

          switch ($_GET['amount']) {

                case 5000:

                    $subtype = "3 days";

                    break;

                case 10000:

                    $subtype = "7 days";

                    break;

                case 35000:

                    $subtype = "31 days";

                    break;

            }



          $dateStart = "";

          if(!isset($_GET['strDate'])){

            $dateStart = date('Y-m-d');

          }else{

            $dateStart = $_GET['strDate'];

          }



          $dateEnd = "";

          if(!isset($_GET['endDate'])){

            $dateEnd = date('Y-m-d');

          }else{

            $dateEnd = $_GET['endDate'];

          }



          $arrayList = array();

          $arrayList['post_id'] = $getData->ID;

          $arrayList['ads_id'] = $addType.$postId;

          $arrayList['post_type'] = $getData->post_type;

          $arrayList['user_id'] = $getData->post_author;

          $arrayList['payment_type'] = $_GET['pType'];

          $arrayList['sub_type'] = $subtype;

          $arrayList['amount'] = substr($_GET['amount'],0,-2);

          $arrayList['invoice_num'] = $_GET['id'];

          $arrayList['invoice_attach'] = "N/A";

          $arrayList['senderName'] = "N/A";

          $arrayList['senderAccount'] = "N/A";

          $arrayList['cCode'] = "N/A";

          $arrayList['mobile'] = "N/A";

          $arrayList['payment_status'] = $_GET['status'];

          $arrayList['payment_msg'] = $_GET['message'];

          $arrayList['date_start'] = $dateStart;

          $arrayList['date_end'] = $dateEnd;



          saveDetails($arrayList,$payment_type);



          if($_GET['status'] == "failed"){

            $mainTitle = forceTranslate("Sorry..."," ...عذرًا");

            $msg = forceTranslate("Your payment has failed. Please check on your bank or call our customer support", "فشل الدفع الخاص بك. يرجى التحقق من البنك الذي تتعامل معه أو الاتصال بدعم العملاء لدينا");

			$img = '<img src="'.get_theme_url().'/img/sorry-en.png" class="img-fluid">';

			$adsIdBox = "";

			

          }elseif($_GET['status'] == "processing"){

             $mainTitle = forceTranslate("Thank You","شكرًا لك");

             $msg = forceTranslate("Your post is under processing, kindly take note of your Ads number.","منشورك قيد المراجعة ، يرجى ملاحظة رقم الإعلانات الخاص بك.");

			 $img = '<img src="'.get_theme_url().'/img/thankyou.svg" class="img-fluid">';

			 $adsIdBox = '

					<p class="fnt-bl fnt-bold btn btn-light btn-lg btn-job-white" onclick="navigator.clipboard.writeText(jQuery(this).text());">

						'.$addType.$getData->ID.'

					</p>

			 ';

			 

          }else{

            $mainTitle = forceTranslate("Thank You","شكرًا لك");

            $msg = forceTranslate("Your payment has been successful. Kindly keep track of your advertisement number.","تم استلام دفعتك بنجاح ، يرجى ملاحظة رقم الإعلانات الخاص بك");

			$img = '<img src="'.get_theme_url().'/img/thankyou.svg" class="img-fluid">';

			 $adsIdBox = '

					<p class="fnt-bl fnt-bold btn btn-light btn-lg btn-job-white" onclick="navigator.clipboard.writeText(jQuery(this).text());">

						'.$addType.$postId.'

					</p>

			 ';

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



                <h1 class="fnt-bl fnt-bold"><?php print $mainTitle;?></h1>

				

				<div class="spacer-10"></div>

				

				<p><?php print $msg;?></p>



            </center>

			

			<div class="spacer-20"></div>

			

			<div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-8">

					<center>	

						<?php print $adsIdBox;?>

					</center>

					

					<div class="spacer-20"></div>

					

                    <center><?php print $img;?></center>

                </div>

                <div class="col-md-2"></div>

            </div>



        </div>



    </section>





    <div class="spacer-100"></div>







    <!-- section-1 -->



    <section>







        <div class="container">







        </div>



    </section>





<div class="spacer-100"></div>





<?php get_footer();?>

