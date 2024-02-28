<?php /* Template Name: Pricing Page */ ?>

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

$samefeatureposts;
$lang = pll_current_language();
$position = '';
$fontLang = "fnt-Montserrat";
if ($lang == "ar") {
    $fontLang = "fnt-NotoSansArabic";
}

function get_all_term_descendants($term_id, $taxonomy = 'category')
{
    $child_terms = get_term_children($term_id, $taxonomy);
    $descendants = array();

    foreach ($child_terms as $child_term_id) {
        $descendants[] = $child_term_id;
        $grandchild_terms = get_all_term_descendants($child_term_id, $taxonomy);
        $descendants = array_merge($descendants, $grandchild_terms);
    }

    return $descendants;
}



// $all_descendants will contain an array of all descendant term IDs.


$postId = 0;
$post_type='';
if (!isset($_GET['id'])) {
    wp_redirect(get_home_url() . "/post-an-ad/publish-a-job-posting/");
    exit();
} else {

    $postId = $_GET['id'];

    $post = get_post($postId);
    $post_type=$post->post_type;
    if (!$post) {
        wp_redirect(get_home_url() . "/post-an-ad/publish-a-job-posting/");
        exit();
    } else {
        $job_class_parent_id=0;
        $currentlanguage = pll_get_post_language($postId);
        $getData = getPostById($postId, $post->post_type);
        $adsId = get_field("ads_id", $postId);

        $adsType = "";
        if ($post->post_type == "employers") {
            $adsType = "Employer Ads";
            $job_class_parent_id = ($currentlanguage == 'en') ? 900 : 902;

        }
        if ($post->post_type == "jobseekers") {
            $adsType = "Job Seeker Ads";
            $job_class_parent_id = ($currentlanguage == 'en') ? 900 : 902;
        }
        if ($post->post_type == "services") {
            $adsType = "Service Provider Ads";
            $job_class_parent_id = ($currentlanguage == 'en') ? 1796 : 1848;

        }
        $getcategories = wp_get_post_categories($postId);
        // Usage:

       
        $parent_category_id = ($currentlanguage == 'en') ? 840 : 842; // Replace with the ID of your parent category
        $countrycity = checkchildrens($parent_category_id, $postId);
        $jobclass = checkchildrens($job_class_parent_id, $postId);
        //    $currentpostiton="";
        //    if($post->post_type == "jobseekers" ){
        //        $currentpostiton="position";
        //    }
        //    else if($post->post_type == "employers"){
        //          $currentpostiton="job_name";
        //    }
        //    else{
        //         $currentpostiton="";
        //    }
        //  if(!empty(get_field($currentpostiton,$postId))){ $position = get_field('position',$postId);}

        $premium_category_id = ($currentlanguage == 'en') ? 38 : 42; // Replace with the ID of your parent category
        $categories_to_include = array($countrycity['id'], $jobclass['id'], $premium_category_id); // Replace these with the actual category IDs you want to include
        // $categories_to_include = array($countrycity['id'], $jobclass['id'], $premium_category_id); // Replace these with the actual category IDs you want to include

        $args = array(
            'post_type' => $post->post_type,
            'category__and'  => $categories_to_include,
            'posts_per_page' => -1,
            'post_status' => 'any'
        );
        $idsarray=array();
        $query = new WP_Query($args);
        // var_dump($query);
        // Now you can loop through the results using $query->have_posts() and $query->the_post()
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_ids = get_the_ID();
                    array_push($idsarray, pll_get_post_translations($post_ids));

                }

                wp_reset_postdata(); // Reset post data to the main query
            };
             $samefeatureposts = json_encode($idsarray);
    }
}

function checkchildrens($parentud, $postid)
{

    $all_descendants = get_all_term_descendants($parentud);
    $getcategories = wp_get_post_categories($postid);

    $founditem = array();
    $founditemname = array();
    foreach ($all_descendants as $childs) {
        if (in_array($childs, $getcategories)) {
            array_push($founditem, $childs);
        }
    }
    // var_dump($founditem);
    if (!empty($founditem)) {
        foreach ($founditem as $childs) {
            $children = get_term_children($childs, 'category');
            if (empty($children)) {
                $category_name = get_cat_name($childs);
                $founditemname = ['name' => $category_name, 'id' => $childs];
            }
        }
    }
    return $founditemname;
}
?>

<?php get_header(); ?>



<header>

    <?php include "navigation.php"; ?>

</header>

<div class="spacer-100"></div>

<section>

    <div class="container">

        <center>

            <h1 class="fnt-bl fnt-bold"><?php print forceTranslate("Advantages of premium advertising", "صفحة حساب الإعلان المميز"); ?></h1>

        </center>

    </div>

</section>


<div class="spacer-100"></div>



<!-- section-1 -->

<section>



    <div class="container">




        <div class="spacer-40"></div>



        <div class="row">

            <div class="col-md-4">

                <center>

                    <p class="fnt-bl fnt-bold fnt-20 fnt-Montserrat"><?php print forceTranslate("Advertising", "الإعلان"); ?></p>

                    <div class="spacer-20"></div>

                    <p class="fnt-15 captionSH">
                        <?php
                        print forceTranslate(
                            "The advertisement for the selected city and job classification will become prominent in a unique color and will take one of three spaces for premium advertising at the top of the page.",
                            "بروز الإعلان في الموقع للمدينة والتصنيف الوظيفي المختار بلون فريد واحتلاله مكان واحد من ثلاث إعلانات مميزة في أعلى تلك الصفحة"
                        );
                        ?>
                    </p>

                </center>



                <div class="spacer-20"></div>



                <div class="premium">

                    <div class="boxed-dark">



                        <div class="spacer-20"></div>



                        <center>

                            <h5 class="fnt-orange fnt-bold fnt-Montserrat"><?php print forceTranslate("3 days", "إعلان ٣ أيام"); ?></h5>

                            <div class="spacer-40"></div>

                            <p><?php print forceTranslate("Make the advertisement premium for 3 days: 50 riyals", "اجعل الإعلان مميز لمدة ٣ أيام ٥٠ ريال"); ?> </p>

                            <div class="spacer-40"></div>

                        </center>



                        <div class="row">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <button class="btn btn-warning btn-job-orange w-100 btn-pay" data-converted="50" data-days="3" data-amount="5000""><?php print forceTranslate("Choose", "اختار"); ?></button>

                                </div>

                                <div class=" col-md-4">
                            </div>

                        </div>



                        <div class="spacer-20"></div>



                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <center>

                    <p class="fnt-bl fnt-bold fnt-20 fnt-Montserrat"><?php print forceTranslate("Commission", "العمولة"); ?></p>

                    <div class="spacer-20"></div>

                    <p class="fnt-15 captionSH">
                        <?php
                        print forceTranslate(
                            "To be exempted from the site commission for the selected advertisement",
                            "الإعفاء من عمولة الموقع لإعلان المختار"
                        );
                        ?>
                    </p>

                </center>



                <div class="spacer-20"></div>



                <div class="premium">

                    <div class="boxed-dark">



                        <div class="spacer-20"></div>



                        <center>

                            <h5 class="fnt-orange fnt-bold fnt-Montserrat"><?php print forceTranslate("7 days", "إعلان أسبوع"); ?></h5>

                            <div class="spacer-40"></div>

                            <p><?php print forceTranslate("Make the advertisement premium for 7 days: 100 riyals", "اجعل الإعلان مميز لمدة ٧ أيام: ١٠٠	 ريال"); ?></p>

                            <div class="spacer-40"></div>

                        </center>



                        <div class="row">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <button class="btn btn-warning btn-job-orange w-100 btn-pay" data-converted="100" data-days="7" data-amount="10000""><?php print forceTranslate("Choose", "اختار"); ?></button>

                                </div>

                                <div class=" col-md-4">
                            </div>

                        </div>



                        <div class="spacer-20"></div>



                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <center>

                    <p class="fnt-bl fnt-bold fnt-20 fnt-Montserrat">
                        <?php if ($post_type == "employers") { ?>
                            <?php print forceTranslate("Priority", "الاولويه"); ?>
                        <?php } ?>

                        <?php if ($post_type == "jobseekers") { ?>
                            <?php print forceTranslate("Priority", "الاولويه"); ?>
                        <?php } ?>

                        <?php if ($post_type == "services") { ?>
                            <?php print forceTranslate("Priority", "الاولويه"); ?>
                        <?php } ?>

                    </p>

                    <div class="spacer-20"></div>

                    <p class="fnt-15 captionSH">

                        <?php if ($post_type == "employers") { ?>
                            <?php
                            print forceTranslate(
                                "Priority in Job3ml’s search engine",
                                "الاولويه في محرك البحث الخاص بجوب عمل"
                             );
                            ?>
                        <?php } ?>

                        <?php if ($post_type == "jobseekers") { ?>
                            <?php
                            print forceTranslate(
                                "Priority in Job3ml’s search engine",
                                "الاولويه في محرك البحث الخاص بجوب عمل"
                            );
                            ?>
                        <?php } ?>

                        <?php if ($post_type == "services") { ?>
                            <?php
                            print forceTranslate(
                                "Priority in Job3ml’s search engine",
                                "الاولويه في محرك البحث الخاص بجوب عمل"
                             );
                            ?>
                        <?php } ?>

                    </p>

                </center>



                <div class="spacer-20"></div>



                <div class="premium">

                    <div class="boxed-dark">



                        <div class="spacer-20"></div>



                        <center>

                            <h5 class="fnt-orange fnt-bold fnt-Montserrat"><?php print forceTranslate("30 days", "إعلان مميز"); ?></h5>

                            <div class="spacer-40"></div>

                            <p><?php print forceTranslate("Make the advertisement premium for 30 days: 350 riyals", "اجعل الإعلان مميز لمدة ٣٠ يوم ٣٥٠ ريال"); ?></p>

                            <div class="spacer-40"></div>

                        </center>



                        <div class="row">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <button class="btn btn-warning btn-job-orange w-100 btn-pay" data-converted="350" data-days="30" data-amount="35000"><?php print forceTranslate("Choose", "اختار"); ?></button>

                            </div>

                            <div class="col-md-4"></div>

                        </div>



                        <div class="spacer-20"></div>



                    </div>

                </div>

            </div>

        </div>



        <div class="spacer-20"></div>





        <div class="row">
            <div class="col-md-4">
                <div class="form-check">

                    <input id="agree" name="agree" class="form-check-input" type="checkbox" data-cdays="" data-cAmount="" value="" disabled>

                    <label class="form-check-label">

                        <?php if ($lang == "en") { ?>
                            I agree to the <a href="<?php print home_url() . "/terms-and-conditions"; ?>">terms and conditions</a>
                        <?php } else { ?>
                            أنا أوافق على <a href="<?php print home_url() . "/الشروط-والأحكام/"; ?>">الشروط والأحكام</a>
                        <?php } ?>



                    </label>

                </div>

            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php if ($lang == "en") { ?>
                    <a href="<?php print home_url(); ?>/preview-premium-ads?id=<?php print $postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">Back to page</a>
                <?php } else { ?>
                    <a href="<?php print home_url(); ?>/preview-premium-ads?id=<?php print $postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">العودة إلى الصفحة</a>
                <?php } ?>
            </div>
        </div>

    </div>

</section>




<!-- section-2 -->

<section id="selectadate" class="hideThis">

    <div class="spacer-40"></div>

    <hr style="border-top: dotted 1px;" />

    <div class="spacer-40"></div>



    <div class="container">



        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6">

                <center>

                    <h4 class="fnt-bl fnt-bold fnt-Montserrat"><?php print forceTranslate("Select your dates", "حدد التواريخ الخاصة بك"); ?></h4>

                    <img src="<?php print get_theme_url(); ?>/img/divider.svg" class="img-fluid">

                </center>



                <div class="spacer-40"></div>

                <div id='calendar'></div>

                <div class="spacer-20"></div>

                <div class="selectedDate">

                    <div class="row hideThis">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-5">
                                    <center>
                                        <p class="dateSelect dateFrom"></p>
                                    </center>
                                </div>
                                <div class="col-2">
                                    <center>
                                        <p class="fnt-20"><?php print forceTranslate("To", "إلى"); ?></p>
                                    </center>
                                </div>
                                <div class="col-5">
                                    <center>
                                        <p class="dateSelect dateTo"></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </div>

                <!-- <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button id="my-button" class="btn btn-light btn-lg btn-job-orange-light w-100">Select</a>
                        </div>
                        <div class="col-md-4"></div>
                    </div> -->



            </div>

            <div class="col-md-3"></div>

        </div>



    </div>

    <div class="spacer-100"></div>

</section>







    <section id="doPayment" class="hideThis">

        <div class="container">

            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-8">

                    <center>
                        <h4 class="fnt-bl fnt-bold fnt-Montserrat"><?php print forceTranslate("Pay for Premium Advertising", "دفع للإعلان المميز"); ?></h4>

                        <img src="<?php print get_theme_url(); ?>/img/divider.svg" class="img-fluid">

                    </center>



                    <div class="spacer-40"></div>



                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs justify-content-center" id="paymentTransfer" role="tablist">

                        <!-- <li class="nav-item" role="presentation">

                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bank"><?php print forceTranslate("Bank Transfer", "تحويل بنكي"); ?></button>

                      </li> -->

                        <!-- <li class="nav-item" role="presentation">

                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#card"><?php print forceTranslate("Transfer Card", "تحويل بالبطاقة"); ?></button>

                      </li> -->



                    </ul>



                    <!-- Tab panes -->

                    <div class="tab-content">

                        <div class="tab-pane fade" id="bank">



                            <div class="spacer-40"></div>



                            <form action="" method="post" id="premiumPayment" enctype="multipart/form-data" autocomplete="off">



                                <div class="row">

                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Sender Account Holder Name", "اسم صاحب الحساب المحول منه"); ?> <font class="fnt-rd">*</font></label>

                                        <input name="senderName" type="text" class="form-control form-gry w-100" placeholder="" required />

                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Sender Account Number", "رقم الحساب المحمول منه"); ?> <font class="fnt-rd">*</font></label>

                                        <input name="senderNumber" type="text" class="form-control form-gry w-100" placeholder="" required />

                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Recepient Account Holder Name", "اسم صاحب الحساب المحول اليه"); ?> <font class="fnt-rd">*</font></label>

                                        <input type="text" class="form-control form-gry w-100" value="مؤسسة موقع عمل للتسويق الالكتروني" disabled />

                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Recepient Account Number", "رقم الحساب المحمول اليه"); ?> <font class="fnt-rd">*</font></label>

                                        <input type="text" class="form-control form-gry w-100" value="SA41 1000 0001 4000 1844 3808" disabled />


                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Mobile Number", "رقم الجوال"); ?> <font class="fnt-rd">*</font></label>

                                        <div id="payment">

                                            <div class="input-group mb-3">

                                                <span class="input-group-text">

                                                    <select name="cCode" id="cCode" class="form-control selectpicker remPad bgGrayFieldPad">

                                                        <option value="+966" data-content='<img  src="<?php print get_theme_url(); ?>/img/saudi.jpg" class="img-fluid"> +966' selected></option>

                                                        <option value="+965" data-content='<img  src="<?php print get_theme_url(); ?>/img/kuwait.jpg" class="img-fluid"> +965'></option>

                                                        <option value="+968" data-content='<img  src="<?php print get_theme_url(); ?>/img/oman.jpg" class="img-fluid"> +968'></option>

                                                        <option value="+971" data-content='<img  src="<?php print get_theme_url(); ?>/img/uae.jpg" class="img-fluid"> +971'></option>

                                                        <option value="+973" data-content='<img  src="<?php print get_theme_url(); ?>/img/bahrain.jpg" class="img-fluid"> +973'></option>

                                                        <option value="+974" data-content='<img  src="<?php print get_theme_url(); ?>/img/qatar.jpg" class="img-fluid"> +974'></option>

                                                    </select>

                                                </span>

                                                <input name="mobile" id="mobile" type="number" class="form-control bgGrayFieldPad remPad">

                                            </div>

                                        </div>

                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("Transfer amount (SAR)", "المبلغ المحول (ريال سعودي)"); ?> <font class="fnt-rd">*</font></label>

                                        <input id="transferAmountConverted" name="transferAmountConverted" type="text" class="form-control form-gry w-100" placeholder="SAR" disabled />

                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for=""><?php print forceTranslate("A copy of the transfer receipt", "صوره إيصال التحويل"); ?></label>

                                        <div class="attachBox">

                                            <div class="row">

                                                <div class="col-9">

                                                    <small class="caption"><?php print forceTranslate("Choose file", "اختار الملف"); ?></small>

                                                </div>

                                                <div class="col-3 d-flex align-items-center justify-content-end">

                                                    <i class="fa-solid fa-paperclip"></i>

                                                </div>

                                            </div>

                                            <input type="file" class="attachClick" name="imgMulti[]" accept="image/*,application/pdf" hidden>

                                        </div>



                                        <div class="spacer-20"></div>

                                    </div>



                                    <div class="col-md-6">

                                        <label for="">
                                            <font class="fnt-rd">*</font>
                                        </label>

                                        <input type="text" class="form-control form-gry w-100" value="<?php print $adsId ?>" disabled />


                                        <div class="spacer-20"></div>

                                    </div>



                                </div>



                                <div class="spacer-40"></div>



                                <div class="row">

                                    <div class="col-md-1"></div>

                                    <div class="col-md-5">

                                        <a href="<?php print home_url(); ?>/preview-premium-ads?id=<?php print $postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">
                                            <?php print forceTranslate("Back to page", "الرجوع للصفحه السابقه"); ?>
                                        </a>

                                    </div>

                                    <div class="col-md-5">

                                        <button class="btn btn-warning btn-lg btn-job-orange w-100 submitForm"><?php print forcetranslate("Send", "ارسل"); ?></button>

                                        <input name="adNumber" type="hidden" value="<?php print $adsId ?>" />
                                        <input name="id" type="hidden" value="<?php print $postId; ?>" />
                                        <input name="recepientName" type="hidden" value="مؤسسة موقع عمل للتسويق الالكتروني" />
                                        <input name="recepientNumber" type="hidden" value="SA4110000001400018443808" />
                                        <input id="transferAmount" name="transferAmount" type="hidden" value="" />
                                        <input id="dateF" name="dateFrom" type="hidden" value="" />
                                        <input id="dateT" name="dateTo" type="hidden" value="" />
                                        <input id="fAmount" name="fAmount" type="hidden" value="" />

                                    </div>



                                    <div class="col-md-1"></div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade show active" id="card">

                            <div class="spacer-40"></div>

                            <div id="alert-check" class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="alert alert-info" role="alert">
                                        <p><small>
                                                <b><?php
                                                    print forceTranslate(
                                                        "Please select a desired featured ad first...",
                                                        "من فضلك اختر إعلان معروض مطلوب أولًا..."
                                                    );
                                                    ?></b>
                                            </small></p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>


                            <div class="card-form"></div>

                            <div class="spacer-20"></div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <a href="<?php print home_url(); ?>/preview-premium-ads?id=<?php print $postId; ?>" class="btn btn-light btn-lg btn-job-orange-light w-100">
                                        <?php print forceTranslate("Back to page", "الرجوع للصفحه السابقه"); ?>
                                    </a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>


                        </div>

                    </div>



                </div>

                <div class="col-md-2"></div>

            </div>



        </div>

        <div class="spacer-100"></div>

    </section>








<!-- Modal -->
<div class="modal fade" id="thankyou-modal">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h3 class="fnt-bl <?php print $fontLang; ?>"><?php print forceTranslate("Advertisement Successfully Added", "تم إضافة الإعلان بنجاح"); ?></h3>
                    <div class="spacer-20"></div>
                    <p class="fnt-bl fnt-bold btn btn-light btn-lg btn-job-white"><?php print $adsId; ?></p>
                    <p><small><?php print forceTranslate("Please keep your advertisement number", "رجاء الاحتفاظ برقم الاعلان"); ?></small></p>
                </center>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <center><img src="<?php print get_theme_url(); ?>/img/thankyou.svg" class="img-fluid"></center>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="1"></div>
                    <div class="10">
                        <?php if (!is_user_logged_in()) { ?>
                            <div class="alert alert-info">
                                <p><small>
                                        <?php print forceTranslate("Check the link sent to your email to publish the advertisement. You can also login to edit your ad.", "من فضلك قم بتسجيل الدخول حتى تعدل الإعلان وإن كنت مستخدم جديد تحقق من صندوق البريد لكلمة سر مؤقتة"); ?>
                                    </small></p>
                            </div>
                            <div class="spacer-20"></div>
                            <div class="loginForm">
                                <?php print do_shortcode('[wp_login_form]'); ?>
                            </div>

                        <?php } ?>
                    </div>
                    <div class="1"></div>
                </div>
            </div>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button> -->

            </div>
        </div>
    </div>
</div>



<div class="spacer-100"></div>


<?php get_footer(); ?>

<script>
                   var duplicateValues=[];

    jQuery(document).ready(function($) { 
          
        $("#calendar").on("click touch",function(){
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            jQuery(".fc-day").each(function(){
                    var getDataDates= jQuery(this).attr("data-date");
                    var dayDate = new Date(getDataDates);
                    if(duplicateValues.includes(getDataDates) || dayDate < today ){
                        console.log(getDataDates);
                        jQuery(this).addClass("hidThis");
                        jQuery(this).removeClass("fc-day-future")
                    }
                })        
            });
        var loadfeatureposts=<?php echo  $samefeatureposts;?>;
           
           var stdate = new Date();
           var after30Days = new Date(stdate);
            after30Days.setDate(stdate.getDate() + 30);

            // Format the date as a string (e.g., "YYYY-MM-DD")
            var enDate = after30Days.toISOString().split('T')[0];
           var year = stdate.getFullYear();
            var month = ("0" + (stdate.getMonth() + 1)).slice(-2); // Months are zero-based
            var day = ("0" + stdate.getDate()).slice(-2);
                  // Get the current URL
                  var currentUrls = window.location.href;

                // Use the URLSearchParams API to parse the query string
                var urlParamsl = new URLSearchParams(currentUrls);
               var pidValue = urlParamsl.get("id");
            // Create the formatted date string
            var   SartDate = year + "-" + month + "-" + day;
            console.log(SartDate);
           console.log(enDate);
           var calldata={
                'action': 'check_payment_limits',
                'startDate': SartDate,
                'endDate': enDate,
                'postId': pidValue,
            };
            var alldate=[];
            jQuery.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                data:calldata,
                success:function(responses){ 
                //    console.log(responses);
                //    console.log(loadfeatureposts);
                   for(var i=0; i < responses.length;i++){
                        for(var j=0; j < loadfeatureposts.length; j++){ 
                             if(responses[i]['post_id']==loadfeatureposts[j]['ar'] || responses[i]['post_id']==loadfeatureposts[j]['en']){
                                // Example usage
                                var startDate = new Date(responses[i]['date_start']);
                                var endDate = new Date(responses[i]['date_end']);
                                var result = getDatesBetween(startDate, endDate);
                                console.log(loadfeatureposts[j]['ar']);
                                alldate.push(result);
                          
                             }
                        }
                    }
                    var flattenedArray = alldate.flat();
                    console.log(flattenedArray);
                    duplicateValues = findDuplicates(flattenedArray);

                    console.log(duplicateValues);
                }
            })
            function findDuplicates(arr) {
                let counts = {};
                let duplicates = [];

                for (let value of arr) {
                    counts[value] = (counts[value] || 0) + 1;
                    if (counts[value] === 3) {
                        duplicates.push(value);
                    }
                }

                return duplicates;
            }


            function formatDate(date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
            }
            function getDatesBetween(startDate, endDate) {
            var datesArray = [];
            var currentDate = new Date(startDate);

            while (currentDate <= endDate) {
                datesArray.push(formatDate(new Date(currentDate)));
                currentDate.setDate(currentDate.getDate() + 1);
            }

            return datesArray;
            }
        
        jQuery(".btn-pay").each(function() {

            jQuery(this).on("click touch", function() {

                jQuery(".btn-pay").parents(".boxed-dark").removeClass("border-yl");
                jQuery(this).parents(".boxed-dark").addClass(" border-yl");

                var getAmount = jQuery(this).attr("data-amount");
                var getCurrDays = jQuery(this).attr("data-days");
                var getAmtConverted = jQuery(this).attr("data-converted");

                jQuery('#agree').removeAttr("disabled");
                jQuery('#agree').attr({
                    "data-cdays": getCurrDays,
                    "data-cAmount": getAmount
                });
                jQuery("#alert-check").addClass(" hideThis");
                jQuery("#transferAmountConverted").val(getAmtConverted);
                jQuery("#fAmount").val(getAmtConverted);
                jQuery("#transferAmount").val(getAmount);
                //jQuery('#calendar').fullCalendar('rerenderEvents');
                //showCalendar(getAmount,'<?php print date("Y-m-d") ?>','<?php print $lang; ?>','<?php print $postId; ?>');

            });
        });

        jQuery('#agree').on('click', function() {
            jQuery('#selectadate').removeClass("hideThis");
            jQuery('#selectadate').addClass(" animateThis", 10000);
            var getAgreeAmt = jQuery(this).attr("data-cAmount");
            showCalendar(getAgreeAmt, '<?php print date("Y-m-d") ?>', '<?php print $lang; ?>', '<?php print $postId; ?>');
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            jQuery(".fc-day").each(function(){
                    var getDataDates= jQuery(this).attr("data-date");
                    var dayDate = new Date(getDataDates);
                    if(duplicateValues.includes(getDataDates) || dayDate < today ){
                        console.log(getDataDates);
                        jQuery(this).addClass("hidThis");
                        jQuery(this).removeClass("fc-day-future")
                    }
                })        
        });



        clickAttached();


        jQuery('#thankyou-modal').on('hide.bs.modal', function(event) {

            <?php if ($lang == "en") { ?>
                window.location.href = "<?php print home_url(); ?>";
            <?php } else { ?>
                window.location.href = "<?php print home_url(); ?>/ar";
            <?php } ?>

        });

    });
</script>

<script>
    jQuery(document).ready(function($){
       jQuery("#calendar").on("click",function(e){
          if(e.target.classList.contains("") ){
            
          }
        e.preventDefault();
       })
    })
    function showCalendar(getAmount, currDate, language, postId) {

        //jQuery(".fc-day").find(".fc-daygrid-day-top").removeClass(" fc-highlight");

        var calendarEl = document.getElementById('calendar');

        var today = new Date().toISOString().slice(0, 10);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: currDate,
            editable: true,
            selectable: true,
            dayMaxEvents: false,
            contentHeight: "auto",
            longPressDelay: 1,
            themeSystem: 'bootstrap3',
                selectAllow: function(select) {
                    const today = moment();
                    const endDate = moment(duplicateValues[duplicateValues.length - 1]);

                    // Check for disabled range and duplicate values
                    return (
                        moment(select.start).isBefore(today) || // Disable past dates
                        moment(select.start).isAfter(endDate) || // Disable future dates beyond the end date
                        duplicateValues.includes(moment(select.start))
                    );
                 },
            select: function(info) {
               // Get the current URL

                var currentUrl = window.location.href;

                // Use the URLSearchParams API to parse the query string
                var urlParams = new URLSearchParams(currentUrl);

                // Get the value of the "id" parameter
                var idValue = urlParams.get("id");
                var getSelDays = jQuery('#agree').attr("data-cdays");
                var getSelAmount = jQuery('#agree').attr("data-camount");

                var date = new Date(info.startStr);
                var day = date.getDate() + (getSelDays - 1);
                var newDate = new Date(date.setDate(day));
                var month = String(newDate.getMonth() + 1).padStart(2, '0');
                var day = String(newDate.getDate()).padStart(2, '0');
                var year = newDate.getFullYear();
                var endDate = year + "-" + month + "-" + day;

                var strDay = new Date(info.startStr);
               // Get individual components
                var year = strDay.getFullYear();
                var month = ("0" + (strDay.getMonth() + 1)).slice(-2); // Months are zero-based
                var day = ("0" + strDay.getDate()).slice(-2);

                // Create the formatted date string
                var   StartDate = year + "-" + month + "-" + day;
                // Create a Date object for the target date
                    var targetDate = new Date(StartDate); // Replace this with your target date

                    // Create a Date object for today
                    var today = new Date();

                    // Compare the target date with today
                    if (targetDate > today) {  
                var endDay = new Date(endDate);
                var year = endDay.getFullYear();
                var month = ("0" + (endDay.getMonth() + 1)).slice(-2); // Months are zero-based
                var day = ("0" + endDay.getDate()).slice(-2);

                // Create the formatted date string
                var   endDate = year + "-" + month + "-" + day;
                var countDays = endDay.getTime() - strDay.getTime();
                var calDate = new Date(countDays);

                var totalDays = calDate.getDate();
                var calldata={
                    'action': 'check_payment_limits',
                    'startDate': StartDate,
                    'endDate': endDate,
                    'postId': idValue,
                };

                var samefeaturepost=<?php echo  $samefeatureposts;?>;

                jQuery.ajax({
                    type: "POST",
                    url: "/wp-admin/admin-ajax.php",
                    data:calldata,
                    success:function(responses){ 
                        var samidarr=[];
                        if(jQuery("#sorrypremiumads")){
                                jQuery("#sorrypremiumads").remove();
                         }
                        for(var i=0; i < responses.length;i++){
                            for(var j=0; j < samefeaturepost.length; j++){ 
                                 if(responses[i]['post_id']==samefeaturepost[j]){
                                    samidarr.push(responses[i]['post_id']);
                                    console.log(samefeaturepost[j]);
                                    console.log(responses[i]['post_id'])
                                 }
                            }
                        }
                        if(samidarr.length > 2 ){
                            jQuery("#doPayment").hide();
                            jQuery("<p class='text-center mt-5' id='sorrypremiumads'>Sorry, we have reached the maximum premium ad limit in your City for these dates..</p>").insertBefore(jQuery("#doPayment"));
                         }
                         else{
                            jQuery("#doPayment").show();

                         }
                       console.log(samidarr);
                       console.log(responses);
                    }
                })
                //var getSelDays = jQuery('#agree').attr("data-cdays");

                //console.log(info.startStr);
                //console.log(endDate);

                //console.log("---");

                jQuery(".fc-day").find(".fc-daygrid-day-top").removeClass(" fc-highlight");

                jQuery(".fc-day").each(function() {

                    var getDataDate = jQuery(this).attr("data-date");
                    var attrDate = new Date(getDataDate);
                    
                   
                    if (attrDate >= strDay && attrDate <= endDay) {
                        jQuery(this).find(".fc-daygrid-day-top").addClass(" fc-highlight");

                    }

                    monthsButtons(attrDate, strDay, endDay);


                });

                jQuery(".dateFrom").text(info.startStr);
                jQuery(".dateTo").text(endDate);
                jQuery("#dateF").val(info.startStr);
                jQuery("#dateT").val(endDate);
                
                getPayment(getSelAmount, info.startStr, endDate, language, postId);

                jQuery('#doPayment').removeClass("hideThis");
                jQuery('#doPayment').addClass(" animateThis", 10000);

            }  
         },
        });

        //calendar.refetchEvents();
        calendar.render();
    }
  
    function isDateInDuplicateValues(date) {
        const dateString = date; 
        return duplicateValues.includes(dateString);
     }
    function monthsButtons(dates, dateStart, dateEnd) {

        jQuery('.fc-prev-button').on("click touch", function() {

            jQuery(".fc-day").find(".fc-daygrid-day-top").removeClass(" fc-highlight");

            jQuery(".fc-day").each(function() {

                var getDataDate = jQuery(this).attr("data-date");
                var attrDate = new Date(getDataDate)

                if (attrDate >= dateStart && attrDate <= dateEnd) {
                    jQuery(this).find(".fc-daygrid-day-top").addClass(" fc-highlight");
                }

            });
            console.log("prev");
        });

        jQuery('.fc-next-button').on("click touch", function() {

            jQuery(".fc-day").find(".fc-daygrid-day-top").removeClass(" fc-highlight");

            jQuery(".fc-day").each(function() {

                var getDataDate = jQuery(this).attr("data-date");
                var attrDate = new Date(getDataDate)

                if (attrDate >= dateStart && attrDate <= dateEnd) {
                    jQuery(this).find(".fc-daygrid-day-top").addClass(" fc-highlight");
                }

            });
            console.log("prev");

        });


    }

    function getPayment(amount, strDate, endDate, lang, postId) {

        Moyasar.init({
            element: '.card-form',
            language: '<?php print $lang; ?>',
            amount: amount,
            currency: 'SAR',
            description: 'Premium Advertising',
            publishable_api_key: 'pk_live_36gv8JaRPSmqfFF4rA1aRSg1Q6zuVmrmnfzrYC9f',
            callback_url: 'https://job3ml.com/thank-you?adsId=' + postId + '&strDate=' + strDate + '&endDate=' + endDate + '&pType=card',
            methods: [
                'applepay',
                'creditcard',
                'stcpay'
            ],
            apple_pay: {
                country: 'SA',
                label: 'Job3ml',
                validate_merchant_url: 'https://api.moyasar.com/v1/applepay/initiate',
            },

        });
    }
</script>