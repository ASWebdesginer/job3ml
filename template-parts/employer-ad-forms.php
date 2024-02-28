<?php /* Template Name: Employer Ad Forms Page */ ?>



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

 *

 * @package jobs

 */



    $lang = pll_current_language();

    $fontLang = "fnt-Montserrat";

    if($lang == "ar"){

        $fontLang = "fnt-NotoSansArabic";

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

                <h1 class="fnt-bl fnt-bold"><?php print forceTranslate("Employment Advertisements", "إضافة إعلان كصاحب عمل")?></h1>

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



                            <h3 class="fnt-bl fnt-bold <?php print $fontLang;?>">

                                <?php print forceTranslate("Enter the advertisement details","أدخل بيانات الإعلان")?>

                            </h3>



                            <img src="<?php print get_theme_url();?>/img/divider.svg" class="img-fluid">



                        </center>







                        <div class="spacer-40"></div>







                        <form action="" method="post" id="addNewJobPost" enctype="multipart/form-data" autocomplete="off">







                            <div class="row">







                                <div class="col-md-6">



                                    <label for="">

                                        <?php print forceTranslate("Company Name or Institution","اسم الشركة أو المؤسسة")?>

                                        <font class="fnt-rd">*</font>

                                    </label>



                                    <input name="company" type="text" class="form-control form-gry w-100 limit-w-ten" id="" placeholder="<?php print forceTranslate("The Telecom Company","مؤسسة عمل للتسويق الالكتروني");?>" required>



                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Country","الدولة");?> <font class="fnt-rd">*</font></label>



                                    <select name="country" id="country" class="form-control selectpicker remPad"  data-live-search="true" required>

										<option value="" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>



                                        <?php  print getSelectCat(840,842);?>



                                    </select>



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">





                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("City","المدينة");?> <font class="fnt-rd">*</font></label>



                                    <select name="city" id="city" class="form-control form-gry selectpicker remPad" data-live-search="true" disabled required>



                                        <option value="" selected disabled><?php print forceTranslate("Please select a country first","الرجاء تحديد بلد أولا");?></option>



                                    </select>



                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <div class="row">



                                        <div class="col-6">



                                            <label for="">



                                                <?php print forceTranslate("E-mail","البريد الإلكتروني");?>  <font class="fnt-rd">*</font>



                                                <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print forceTranslate("When you hide the email, messages will be sent to the registered mail","عند إخفاء البريد الالكتروني سيتم ارسال الرسائل للبريد المسجل دون إظهاره في الإعلان");?>"></i>



                                            </label>



                                        </div>



                                        <div class="col-6 d-flex justify-content-end">



                                            <div class="form-check form-switch text-end">



                                              <input name="hideEmail" class="form-check-input" type="checkbox" role="switch">



                                              <i class="fa-sharp fa-regular fa-eye-slash"></i>



                                            </div>



                                        </div>



                                    </div>



                                    <input name="email" type="email" class="form-control form-gry w-100" placeholder="" required>



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Job Name","اسم المهنه المطلوبه");?> <font class="fnt-rd">*</font></label>



                                    <input name="jobName" id="" type="text" class="form-control form-gry w-100 limit-w-ten" placeholder="<?php print forceTranslate("Senior Accountant","محامي");?>" required>



                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <div class="row">



                                        <div class="col-6">



                                            <label for="">



                                                <?php print forceTranslate("Mobile Number","رقم الجوال");?>



                                                <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print forceTranslate("When you hide the mobile number, messages will be sent to the registered mobile number","عند إخفاء رقم الجوال ، سيتم إرسال الرسائل إلى رقم الجوال المسجل");?>"></i>







                                            </label>



                                        </div>



                                        <div class="col-6 d-flex justify-content-end">



                                            <div class="form-check form-switch text-end">



                                              <input name="hideMobile" class="form-check-input" type="checkbox" role="switch">



                                              <i class="fa-sharp fa-regular fa-eye-slash"></i>



                                            </div>



                                        </div>



                                    </div>



                                    <div id="payment">



                                        <div class="input-group mb-3">



                                          <span class="input-group-text">



                                            <select name="cCode" id="cCode" class="form-control selectpicker remPad bgGrayFieldPad" >



                                                <option value="+966" data-content='<img  src="<?php print get_theme_url();?>/img/saudi.jpg" class="img-fluid"> +966' selected></option>



                                                <option value="+965"data-content='<img  src="<?php print get_theme_url();?>/img/kuwait.jpg" class="img-fluid"> +965' ></option>



                                                <option value="+968"data-content='<img  src="<?php print get_theme_url();?>/img/oman.jpg" class="img-fluid"> +968' ></option>



                                                <option value="+971" data-content='<img  src="<?php print get_theme_url();?>/img/uae.jpg" class="img-fluid"> +971'></option>



                                                <option value="+973"data-content='<img  src="<?php print get_theme_url();?>/img/bahrain.jpg" class="img-fluid"> +973' ></option>



                                                <option value="+974"data-content='<img  src="<?php print get_theme_url();?>/img/qatar.jpg" class="img-fluid"> +974' ></option>





                                            </select>



                                          </span>



                                          <input name="mobile" id="mobile" type="number" class="form-control bgGrayFieldPad" min="1000000" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(^0+)|(\D)/g, '');" placeholder="555">



                                        </div>



                                    </div>



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Education Level","المستوى التعليمي");?></label>



                                    <select name="degree" id="degree" class="form-control form-gry selectpicker remPad" >

										<option value="0" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>



                                        <?php  print getSelectCat(868,870);?>



                                    </select>



                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Employment Sector","مجال العمل");?></label>



                                    <input name="empName" id="" type="text" class="form-control form-gry w-100 limit-w-ten" placeholder="<?php print forcetranslate("The Banking Industry","القانون الجنائي");?>">



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">



                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Shift Schedule Type","نوع الدوام");?> <font class="fnt-rd">*</font></label>



                                    <select name="pType" id="pType" class="form-control form-gry selectpicker remPad" required>

										<option value="" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>



                                        <?php  print getSelectCat(1116,1691);?>



                                    </select>







                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Years of experience","سنوات الخبرة المطلوبة");?> </label>



                                    <input name="yrExp" type="number" class="form-control form-gry w-100" placeholder="4" min="1" max="99" oninput="this.value = this.value.slice(0, 2);">



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Job Classification","تصنيف الوظيفة");?> <font class="fnt-rd">*</font></label>



                                    <select name="jobClass" id="jobClass" class="form-control form-gry selectpicker remPad" data-live-search="true" required>

										<option value="" selected disabled><?php print forceTranslate('Please select','الرجاء التحديد');?></option>



                                        <?php  print getSelectCat(900,902);?>



                                    </select>



                                    <div class="spacer-20"></div> 



                                </div>







                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("English Proficiency","مستوى إجادة اللغة الانجليزية");?></label>



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



                                            <label for=""><?php print forceTranslate("Average Salary","متوسط سعر الخدمة");?></label>



                                        </div>



                                        <div class="col-6 d-flex justify-content-end">



                                            <div class="form-check">



                                              <input name="negotiable" class="form-check-input" type="checkbox">



                                              <label class="form-check-label">



                                                <?php print forceTranslate("Negotiable","قابل للتفاوض");?>



                                              </label>



                                            </div>



                                        </div>



                                    </div>







                                    <div class="row">



                                        <div class="col-6">



                                            <input id="fromSalary" name="fromSalary" type="number" class="form-control form-gry w-100" placeholder="<?php print forceTranslate("From","من");?>" min="1" max="9999" oninput="this.value = this.value.slice(0, 4);">



                                        </div>



                                        <div class="col-6">



                                            <input id="toSalary" name="toSalary" type="number" class="form-control form-gry w-100" placeholder="<?php print forceTranslate("To","إلى");?>" min="1" max="99999" oninput="this.value = this.value.slice(0, 5);">



                                        </div>



                                    </div>







                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6">



                                    <label for="">



                                        <?php print forceTranslate("Essential skills for the job","المهارات الأساسية للوظيفة");?>



                                        <i class="fa-solid fa-info fa-dash-circled" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print forceTranslate("Please add comma (,) after each skill to include it","الرجاء إضافة فاصلة (،) بعد كل مهارة لتضمينها");?>"></i>



                                    </label>



                                    <input name="skills" id="" type="text" class="form-control form-gry w-100 limit-w-ten" placeholder="<?php print forceTranslate("C# Programing, Excel, Bookkeeping","برمجة #C، إكسل، مسك الدفاتر");?>">


                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">



                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Number of vacancy","عدد الوظائف الشاغرة");?></label>



                                    <input name="numVacant" type="number" class="form-control form-gry w-100" placeholder="" min="1" max="9999" oninput="this.value = this.value.slice(0, 4);">



                                    <div class="spacer-20"></div>



                                </div>







                                <div class="col-md-6 d-flex align-items-center">



                                    <div class="form-check">



                                      <input name="remotely" class="form-check-input" type="checkbox">



                                      <label class="form-check-label">



                                        <?php print forceTranslate("The job can be performed remotely","يمكن أداء الوظيفة عن بعد");?>



                                      </label>



                                    </div>



                                    <div class="spacer-20"></div>



                                </div>



                            </div>







                            <div class="row">



                                <div class="col-12">



                                    <label for=""><?php print forceTranslate("Job description summary","ملخص الوصف الوظيفي");?> <font class="fnt-rd">*</font></label>



                                    <textarea name="jobDescription" id="job-des-in" class="form-control form-gry w-100" required></textarea>



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



                                                    <small class="caption"><?php print forceTranslate("You can add attachments and a detailed job description","يمكنك اضافة المرفقات لتفصيل الوصف الوظيفي")?></small>



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



                            <div class="spacer-10"></div>





                            <div class="row">



                                <div class="col-md-6">



                                    <label for=""><?php print forceTranslate("Add the logo","أضف الشعار")?></label>



                                    <div class="attachboxLogo">



                                        <div class="row">



                                            <div class="col-9">



                                                <small class="caption"><?php print forceTranslate("You can add faces","يمكنك إضافة صورة شخصية")?></small>



                                            </div>



                                            <div class="col-3 d-flex align-items-center justify-content-end">



                                                <i class="fa-solid fa-paperclip"></i>



                                            </div>



                                        </div>



                                        <input type="file"  id="attachClickLogo" class="" name="imgLogo" accept="image/*" hidden>

                                        <input type="hidden" class="form-control form-gry" name="imgLogoDesc" value="Post Logo">



                                    </div>





                                    <div class="spacer-20"></div>



                                </div>



                                <div class="col-md-6"></div>



                            </div>







                            <div class="spacer-40"></div>







                            <div class="row">



                                <div class="col-md-4"></div>



                                <div class="col-md-4">

									

									<input type="hidden" name="postType" value="employers">

                                    <button class="btn btn-primary btn-job-blue w-100 submitForm"><?php print forcetranslate("Post an Ad","رؤية الإعلان قبل الإضافة");?></button>



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

    });


    const textareas = document.getElementsByClassName('limit-w-ten');
    const maxWords = 10;
    const maxCharacters = 100; // Adjust this value as needed

    for (let textarea of textareas) {
        textarea.addEventListener('input', function() {
            const words = this.value.trim().split(/\b\W+\b/).filter(word => word !== '').length;
            const characters = this.value.length;

            if (words > maxWords) {
                this.setCustomValidity("Please limit your input to 10 words.");
            } else if (characters > maxCharacters) {
                this.setCustomValidity("Please limit your input to 100 characters.");
            } else {
                this.setCustomValidity('');
            }
        });
    }

    const textarea2 = document.getElementById('job-des-in');
    const maxWords2 = 150;

    textarea2.addEventListener('input', function() {
        const words2 = this.value.trim().split(/\s+|,/).length;
        if (words2 > maxWords2) {
            this.setCustomValidity('Please limit your input to 150 words.');
        } else {
            this.setCustomValidity('');
        }
    });
    

</script>

