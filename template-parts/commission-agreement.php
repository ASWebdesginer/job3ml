<?php /* Template Name: Commision Agreement Page */ ?>



<?php

/**

 * The template for displaying Employer Ad Forms Page

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *test

 * @package jobs

 */



$lang = pll_current_language();

$fontLang = "fnt-Montserrat";

if ($lang == "ar") {

    $fontLang = "fnt-NotoSansArabic";
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



            <h1 class="fnt-bl fnt-bold"><?php print forceTranslate("Commission Agreement", "اتفاقية العمولة") ?></h1>



        </center>



    </div>



</section>





<div class="spacer-100"></div>







<!-- section-2 -->



<section>











    <div class="container">







        <div class="row d-flex align-items-center">



            <div class="col-md-6 order-2 order-md-1">







                <h3 class="fRtl fnt-NotoSansArabic"><b>بسم الله الرحمن الرحيم</b></h3>







                <div class="spacer-20"></div>







                <p class="fRtl fnt-bl fnt-20 fnt-NotoSansArabic">قال الله تعالى:" وَأَوْفُواْ بِعَهْدِ اللهِ إِذَا عَاهَدتُّمْ وَلاَ تَنقُضُواْ الأَيْمَانَ بَعْدَ تَوْكِيدِهَا وَقَدْ جَعَلْتُمُ اللهَ عَلَيْكُمْ كَفِيلاً "صدق الله العظيم</p>







                <div class="spacer-20"></div>







                <p><?php print forceTranslate("I pledge and swear that I will pay the site commission, which is 1% of the value of a month’s salary or 1% of the value of any service provided in a single payment, whether employment or the service is done through the website or because of it.", "أتعهد وأقسم بالله أنا المستخدم أن أدفع عمولة الموقع وهي1% من قيمة راتب شهر او مبلغ اجر عمل او خدمه مقدمه دفعه واحده سواء تم التوظيف او الحصول على الخدمه عن طريق الموقع او بسببه."); ?></p>







                <div class="spacer-20"></div>







                <p><?php print forceTranslate("I also undertake to pay the commission within 10 days of employment or the completion of the service provided.", "كما اتعهد بدفع العموله خلال ١٠ ايام من التوظيف او اكتمال الخدمه المقدمه."); ?></p>







                <div class="spacer-20"></div>







                <form action="">



                    <div class="form-check">



                        <input name="agreed" id="agreed" class="form-check-input" type="checkbox" value="">



                        <label class="form-check-label" for="remotely">



                            <b><?php print forceTranslate("I agree to adhere to the commission agreement", "أوافق على الالتزام باتفاقية العمولة"); ?></b>



                        </label>



                    </div>



                </form>







                <div class="spacer-20"></div>



            </div>







            <div class="col-md-6 order-1 order-md-2">



                <center>



                    <img src="<?php print get_theme_url(); ?>/img/com-agrmt.svg" class="img-fluid">



                </center>



                <div class="spacer-20"></div>



            </div>



        </div>







    </div>



</section>







<div class="spacer-40"></div>



<hr class="dashed-2">



<div class="spacer-40"></div>







<section>



    <div class="container">



        <div class="calculator">







            <div class="row">



                <div class="col-1 col-md-4"></div>



                <div class="col-10 col-md-4">



                    <center>



                        <h5 class="boxed-blue fnt-Montserrat"><?php print forceTranslate("Commission Calculator", "حاسبة العمولة"); ?></h5>



                    </center>



                </div>



                <div class="col-1 col-md-4"></div>



            </div>







            <div class="spacer-40"></div>







            <div class="row">



                <div class="col-1"></div>



                <div class="col-10">







                    <form action="">







                        <div class="row">







                            <div class="col-md-6">



                                <label for=""><?php print forceTranslate("Enter salary or service fee", "أدخل الراتب/ مبلغ الخدمة "); ?></label>



                                <input name="salServFee" id="salServFee" type="number" class="form-control w-100 bgGrayFieldPad" placeholder="">



                                <div class="spacer-20"></div>



                            </div>







                            <div class="col-md-6">



                                <label for=""><?php print forceTranslate("The required commission", "العمولة المطلوبة"); ?></label>



                                <input name="reqCom" id="reqCom" type="text" class="form-control w-100 bgGrayFieldPad" placeholder="" disabled>



                                <div class="spacer-20"></div>







                            </div>



                        </div>







                    </form>







                </div>



                <div class="col-1"></div>



            </div>







        </div>



        <div class="row">

            <div class="col-md-4"></div>

            <div class="col-md-4">



                <form id="verifyId" action="" method="post">



                    <center><label for=""><?php print forceTranslate("Ad Number", "رقم الإعلان"); ?></label></center>



                    <div class="input-group mb-3">

                        <input name="adNumber" type="text" class="form-control bgGrayFieldPad" placeholder="<?php print forcetranslate("Veify your Ads ID", "تحقق من رقم الإعلان"); ?>" required>

                        <button id="btn-verify" class="input-group-text">

                            <?php if ($lang == "en") { ?>

                                <i class="fa-solid fa-arrow-right"></i>

                            <?php } else { ?>

                                <i class="fa-solid fa-arrow-left"></i>

                            <?php } ?>



                        </button>

                    </div>



                </form>



                <div id="alert-verify"></div>



                <div class="spacer-20"></div>



            </div>

            <div class="col-md-4"></div>

        </div>



    </div>







</section>







<div class="spacer-60"></div>







<section>







    <div class="container">



        <div id="payment" class="hideThis">



            <ul class="nav justify-content-center" id="tabs">



                <li class="nav-item">



                    <a class="nav-link active" href="#" id="home-tab" data-bs-toggle="tab" data-bs-target="#bank"><?php print forceTranslate("Bank Transfer", "تحويل بنكي"); ?></a>



                </li>



                <li class="nav-item">



                    <a class="nav-link" href="#" id="home-tab" data-bs-toggle="tab" data-bs-target="#card"><?php print forceTranslate("Card Transfer", "تحويل بالبطاقة"); ?></a>



                </li>



            </ul>







            <div class="spacer-40"></div>





            <div class="row">



                <div class="col-1"></div>



                <div class="col-10">



                    <div id="alert-check" class="row">

                        <div class="col-md-2"></div>

                        <div class="col-md-8">

                            <div class="alert alert-info" role="alert">

                                <center>

                                    <p><small>

                                            <b><?php

                                                print forceTranslate(

                                                    "Make sure Ad Number was typed-in and the salary must be 100 SR and above",

                                                    "تأكد من إدخال رقم الإعلان بشكل صحيح وأن المبلغ يجب أن يكون 100 ريال سعودي أو أكثر"

                                                );

                                                ?></b>

                                        </small></p>

                                </center>



                            </div>

                        </div>

                        <div class="col-md-2"></div>

                    </div>



                    <div class="tab-content hideThis">



                        <div class="tab-pane fade show active" id="bank" role="tabpanel" aria-labelledby="home-tab">







                            <form id="commissionPayment" action="" method="post" enctype="multipart/form-data">



                                <div class="row">







                                    <div class="col-md-6">



                                        <label for=""><?php print forceTranslate("Sender Account Holder Name", "اسم صاحب الحساب المحول منه"); ?></label>



                                        <input name="senderName" id="senderName" type="text" class="form-control w-100 bgGrayFieldPad" placeholder="">



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">



                                        <label for=""><?php print forceTranslate("Sender’s Account Number", "رقم الحساب المحول منه"); ?></label>



                                        <input name="senderNumber" id="senderAccount" type="text" class="form-control w-100 bgGrayFieldPad" placeholder="">



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">



                                        <label for=""><?php print forceTranslate("Recepient Account Holder Name", "اسم صاحب الحساب المحول اليه"); ?> <font class="fnt-rd">*</font></label>



                                        <input type="text" class="form-control form-gry w-100 bgGrayFieldPad" value="مؤسسة موقع عمل للتسويق الالكتروني" disabled />



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">





                                        <label for=""><?php print forceTranslate("Recepient Account Number", "رقم الحساب المحول اليه"); ?> <font class="fnt-rd">*</font></label>



                                        <input type="text" class="form-control form-gry w-100 bgGrayFieldPad" value="SA41 1000 0001 4000 1844 3808" disabled />



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">



                                        <label for=""><?php print forceTranslate("Mobile number", "رقم الجوال"); ?></label>



                                        <div class="input-group mb-3" style="height: 3.5rem;">



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



                                            <input name="mobile" id="mobile" type="number" class="form-control bgGrayFieldPad">



                                        </div>



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">



                                        <label for=""><?php print forceTranslate("Transfer Amount (SAR)", "المبلغ المحول (ريال سعودي)"); ?></label>



                                        <input name="fAmount" id="amount" type="text" class="form-control w-100 bgGrayFieldPad" min="1000000" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(^0+)|(\D)/g, '');" placeholder="555">



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">





                                        <label for=""><?php print forceTranslate("A copy of the transfer receipt", "صورة إيصال التحويل"); ?> <font class="fnt-rd">*</font></label>



                                        <div class="attachBox" style="padding: 12px 13px;">



                                            <div class="row">



                                                <div class="col-9">



                                                    <small class="caption"><?php print forceTranslate("Choose file", "اختر ملف"); ?></small>



                                                </div>



                                                <div class="col-3 d-flex align-items-center justify-content-end">



                                                    <i class="fa-solid fa-paperclip"></i>



                                                </div>



                                            </div>



                                            <input type="file" class="attachClick" name="imgMulti[]" accept="image/*,application/pdf" hidden required>



                                        </div>
                                        <div id="errorMessage" style="display: none; color: red;"><?php print forceTranslate("Please attach a bank receipt.", "يرجى إرفاق إيصال البنك."); ?></div>



                                        <div class="spacer-20"></div>



                                    </div>







                                    <div class="col-md-6">

                                        <!--

                                        <label for=""><?php print forceTranslate("Ad Number", "رقم الإعلان"); ?></label>



                                        <input  type="text" class="form-control w-100 bgGrayFieldPad" placeholder="" >



                                        <div class="spacer-20"></div>

                                         -->

                                    </div>







                                </div>











                                <div class="row">



                                    <div class="col-md-4"></div>



                                    <div class="col-md-4">



                                        <div class="spacer-20"></div>



                                        <center>



                                            <button id="submitButton" class="btn btn-warning btn-default btn-lg w-100">

                                                <?php print forceTranslate("Submit", "ارسال"); ?>

                                            </button>



                                            <input id="adsId" name="adNumber" type="hidden" value="" />

                                            <input id="postId" name="id" type="hidden" value="" />

                                            <input name="recepientName" type="hidden" value="مؤسسة موقع عمل للتسويق الالكتروني" />

                                            <input name="recepientNumber" type="hidden" value="SA4110000001400018443808" />

                                            <input id="com" name="com" type="hidden" value="commission" />



                                        </center>



                                        <div class="spacer-20"></div>



                                    </div>



                                    <div class="col-md-4"></div>



                                </div>


                            </form>



                        </div>







                        <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="profile-tab">



                            <div class="spacer-40"></div>





                            <div class="card-form"></div>

                            <p id="postIdCard" class="hideThis" />
                            </p>

                        </div>



                    </div>



                </div>



                <div class="col-1"></div>



            </div>





        </div>





    </div>



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

                <!-- <center>

                    <h3 class="fnt-bl <?php print $fontLang; ?>"><?php print forceTranslate("Advertisement Successfully Added", "تمت إضافة الإعلان بنجاح"); ?></h3>

                    <div class="spacer-20"></div>

                    <p id="confirmed-adsid" class="fnt-bl fnt-bold btn btn-light btn-lg btn-job-white"></p>

                    <p><small onclick="navigator.clipboard.writeText(jQuery(this).text());"><?php print forceTranslate("Please Keep your advertisement number", "الرجاء الاحتفاظ برقم الإعلان"); ?></small></p>

                </center> -->



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


                            <div class="alert alert-info">

                                <p><small>

                                        <?php print forceTranslate("Bank Transfer Form Submitted Successfully.", "تم إرسال نموذج التحويل البنكي بنجاح    "); ?>

                                    </small></p>

                            </div>

                            <div class="spacer-20"></div>

                            <!-- <div class="loginForm">

                                <?php print do_shortcode('[wp_login_form]'); ?>

                            </div> -->



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
    jQuery(document).ready(function() {



        clickAttached();



        jQuery('#salServFee').on('keyup', function() {

            var value = jQuery(this).val();

            var percent = Math.round(value / 100);

            jQuery('#reqCom').val(percent);



            if (value >= 100) {

                getPayment(percent + "00");

                jQuery(".tab-content").removeClass("hideThis");

                jQuery("#alert-check").addClass("hideThis");

                jQuery("#amount").val(percent);

            } else {

                jQuery(".tab-content").addClass(" hideThis");

                jQuery("#alert-check").removeClass("hideThis");

                jQuery("#amount").val();

            }



        });



        jQuery('#thankyou-modal').on('hide.bs.modal', function(event) {



            <?php if ($lang == "en") { ?>

                window.location.href = "<?php print home_url(); ?>";

            <?php } else { ?>

                window.location.href = "<?php print home_url(); ?>/ar";

            <?php } ?>



        });



    });



    function getPayment(amount) {





        var postIdCard = jQuery('#postIdCard').text();

        var com = jQuery("#com").val();



        //console.log(postIdCard);



        Moyasar.init({

            element: '.card-form',

            language: '<?php print $lang; ?>',

            amount: amount,

            currency: 'SAR',

            description: 'Commision Agreement',

            publishable_api_key: 'pk_live_36gv8JaRPSmqfFF4rA1aRSg1Q6zuVmrmnfzrYC9f',

            callback_url: 'https://job3ml.com/thank-you?adsId=' + postIdCard + '&ctype=' + com + '&pType=transfer',

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

    document.getElementById('submitButton').addEventListener('click', function() {
        var fileInput = document.querySelector('.attachClick');
        if (!fileInput.files || fileInput.files.length === 0) {
            document.getElementById('errorMessage').style.display = 'block'; // Display error message
        }
    });

    document.querySelector('.attachClick').addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            document.getElementById('errorMessage').style.display = 'none'; // Hide error message if file attached
        }
    });

</script>