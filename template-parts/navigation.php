

<?php 

	$lang = pll_current_language();

    $header_logo_en = get_theme_mod('theme_english_logo_header', '');
    $header_logo_ar = get_theme_mod('theme_arabic_logo_header', '');
    


?>





<div class="desktop-view">

    <div id="main-menu-desktop" class="container-fluid">

        <div class="container">

            <nav class="navbar navbar-expand-lg">

                <div class="container-fluid">

                    <a class="navbar-brand logo" href="<?php print get_home_url();?>"> <img src="<?php echo $lang == 'en' ? $header_logo_en : $header_logo_ar ?>" class="img-fluid" /> </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"><i class="fa-solid fa-bars"></i></button>

                    <div class="collapse navbar-collapse" id="navbarScroll">





                         <ul class="navbar-nav me-auto my-2 my-lg-0 menu-left">

                             <?php print get_custom_main_menu_subs();?>

                         </ul>



                        <ul class="navbar-nav ms-auto my-2 my-lg-0 menu-right social-media">

                            <li class="nav-item">

                                <a class="nav-link active" href="https://www.facebook.com/profile.php/?id=100090984047198" target="_new"> <i class="fa-brands fa-facebook-f"></i> </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="https://www.instagram.com/job3ml" target="_new"> <i class="fa-brands fa-square-instagram"></i> </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="https://twitter.com/job3ml" target="_new"> <i class="fa-brands fa-x-twitter"></i> </a>

                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 

                                    <?php if($lang == "en"){ ?>

                                         <img src="<?php print get_theme_url();?>/img/ls-en.svg" class="img-fluid" /> 

                                     <?php }?>

                                     <?php if($lang == "ar"){ ?>

                                         <img src="<?php print get_theme_url();?>/img/ls-ar.svg" class="img-fluid" /> 

                                     <?php }?>

                                </a>

                                <!--<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">-->



                                    <?php print custom_polylang_langswitcher(); ?>



                                    

                                    <!-- 

                                    <li>

                                        <a class="dropdown-item" href="https://dev.job3ml.com/ar"><img src="<?php print get_theme_url();?>/img/ls-ar.svg" class="img-fluid" /> Arabic</a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item" href="https://dev.job3ml.com"><img src="<?php print get_theme_url();?>/img/ls-en.svg" class="img-fluid" /> English</a>

                                    </li> 

                                </ul> -->

                            </li>

							

							<?php if (!is_user_logged_in()) {?>

							

								<li class="nav-item">

									<div class="dropdown login-dropdown">

										<button class="nav-link btn btn-primary btn-sm login-btn dropdown-toggle" type="button" id="login" data-bs-toggle="dropdown" aria-expanded="false"><?php print forceTranslate("LOGIN","تسجيل الدخول");?></button>

										<ul class="dropdown-menu loginmenu">

											<li>

												<div class="loginform">

													<?php print do_shortcode('[wp_login_form redirect="$redirectLink"]'); ?>

												</div>

											</li>

											<li><hr class="dropdown-divider" /></li>

											<li>

												<center><b><?php print forceTranslate("REGISTER","تسجيل");?></b></center>

											</li>

											<li>

												<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=jobseekers","/user-registration-ar?type=jobseekers");?>">

													<?php print forceTranslate("Job Seeker","الباحث عن عمل");?>

												</a>

											</li>

											<li>

												<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=employers","/user-registration-ar?type=employers");?>">

													<?php print forceTranslate("Employer","صاحب العمل");?>

												</a>

											</li>

											<li>

												<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=services","/user-registration-ar?type=services");?>">

													<?php print forceTranslate("Service Provider","مقدم الخدمة");?>

												</a>

											</li>

										</ul>

									</div>

								</li>

							

							<?php }else{ ?>

							

								<li class="nav-item">

									<div class="dropdown login-dropdown">

										<button class="nav-link btn btn-primary btn-sm login-btn dropdown-toggle" type="button" id="login" data-bs-toggle="dropdown" aria-expanded="false"><?php print forceTranslate("My Account","الحساب الخاص بي");?></button>

										<ul class="dropdown-menu loginmenu">

											<li>

												<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user","/user");?>">

													<i class="fa-solid fa-user fa-mar-right"></i> <?php print forceTranslate("Account","حساب");?>

												</a>

											</li>



											<li>

												<a class="dropdown-item" href="<?php print home_url().forceTranslate("/account","/account");?>">

													<i class="fa-solid fa-gear fa-mar-right"></i> <?php print forceTranslate("Settings","إعدادات");?>

												</a>

											</li>

											

											<li><hr class="dropdown-divider" /></li>

											

											<li style="padding: 0px 12px;">

												<div class="spacer-5"></div>

												<a class="nav-link btn btn-danger btn-sm login-btn" href="<?php print wp_logout_url( home_url() ); ?>"><?php print forceTranslate("LOGOUT","تسجيل الخروج");?></a>

												

											</li>

										</ul>

									</div>

								</li>

							

							<?php }?>

							

                        </ul>

                    </div>

                </div>

            </nav>

        </div>

    </div>

</div>



<div class="mobile-view">

    <nav id="main-menu-mobile" class="navbar fixed-none">

        <div class="spacer-10"></div>

        <div class="container-fluid">

            <div class="row w-100" style="margin: unset;">

                <div class="col-2"></div>

                <div class="col-8">

                    <center>

                        <a class="navbar-brand" href="">

                            <center><img src="<?php print get_theme_url();?>/img/logo/logo-en.svg" class="img-fluid" /></center>

                        </a>

                    </center>

                </div>

                <div class="col-2 d-flex align-items-center">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarExample-expand-lg"><i class="fa-solid fa-bars" data-bs-target="#offcanvasNavbarExample-expand-lg"></i></button>

                </div>

            </div>

            <div class="offcanvas offcanvas-start" data-bs-hideresize="true" id="offcanvasNavbarExample-expand-lg">

                <div class="offcanvas-header"><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button></div>

                <div class="offcanvas-body">

                    <ul class="navbar-nav me-auto my-2 my-lg-0 menu-left">



                        <?php print get_custom_main_menu_subs();?>

						

						<?php if (!is_user_logged_in()) {?>



							<li class="nav-item dropdown">

			

                            <div class="spacer-10"></div>

                            <div class="dropdown login-dropdown">

                                <button class="nav-link btn btn-primary btn-sm login-btn dropdown-toggle w-50" type="button" id="login" data-bs-toggle="dropdown" aria-expanded="false">LOGIN</button>

                                <ul class="dropdown-menu loginmenu">

                                    <li>

                                        <div class="loginform">

                                            <form action="">

                                                <input name="username" id="loginUsernameMobile" type="text" class="form-control w-100" placeholder="Username" required />

                                                <div class="spacer-10"></div>

                                                <input name="password" id="loginPasswordMobile" type="password" class="form-control w-100" placeholder="Password" required />

                                                <div class="spacer-10"></div>

                                                <center><button class="btn btn-warning btn-default btn-sm w-100">SUBMIT</button></center>

                                                <div class="spacer-10"></div>

                                                <center><a href="#"><?php print forceTranslate("Forget Username","نسيت اسم المستخدم");?></a></center>

                                                <center><a href="#"><?php print forceTranslate("Forget Password","نسيت كلمة المرور");?></a></center>

                                                <div class="spacer-10"></div>

                                            </form>

                                        </div>

                                    </li>

                                    <li><hr class="dropdown-divider" /></li>

      

									<li>

										<center><b><?php print forceTranslate("REGISTER","تسجيل");?></b></center>

									</li>

									<li>

										<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=jobseekers","/user-registration-ar?type=jobseekers");?>">

											<?php print forceTranslate("Job Seeker","الباحث عن عمل");?>

										</a>

									</li>

									<li>

										<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=employers","/user-registration-ar?type=employers");?>">

											<?php print forceTranslate("Employer","صاحب العمل");?>

										</a>

									</li>

									<li>

										<a class="dropdown-item" href="<?php print home_url().forceTranslate("/user-registration?type=services","/user-registration-ar?type=services");?>">

											<?php print forceTranslate("Service Provider","مقدم الخدمة");?>

										</a>

									</li>

                                </ul>

                            </div>

                        </li>

                   

						<?php }else{ ?>

								

							<li class="nav-item">

								<div class="spacer-10"></div>

								<a class="nnav-link btn btn-danger btn-sm login-btn" href="<?php print wp_logout_url( home_url() ); ?>"><?php print forceTranslate("LOGOUT","تسجيل الخروج");?></a>

							</li>

						

						<?php }?>



				   </ul>

                    <div class="spacer-5"></div>

                    <hr class="dropdown-divider" />

                    <div class="spacer-5"></div>

                    <center>

                        <ul class="navbar-nav ms-auto my-2 my-lg-0 menu-right list-group list-group-horizontal">

                            <li class="list-group-item">

                                <a class="nav-link active" href="https://www.facebook.com/profile.php/?id=100090984047198" target="_new"> <i class="fa-brands fa-facebook-f"></i></a>

                            </li>

                            <li class="list-group-item">

                                <a class="nav-link" href="https://www.instagram.com/job3ml" target="_new"> <i class="fa-brands fa-square-instagram"></i></a>

                            </li>

                            <li class="list-group-item">

                                <a class="nav-link" href="https://twitter.com/job3ml" target="_new"> <i class="fa-brands fa-x-twitter"></i></a>

                            </li>

                            <li class="list-group-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img src="<?php print get_theme_url();?>/img/ls-ar.svg" class="img-fluid" /> </a>

                                <?php print custom_polylang_langswitcher(); ?>


                                <!-- <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

                                    <li>

                                        <a class="dropdown-item" href="https://dev.job3ml.com/ar"><img src="<?php print get_theme_url();?>/img/ls-ar.svg" class="img-fluid" /> Arabic</a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item" href="https://dev.job3ml.com"><img src="<?php print get_theme_url();?>/img/ls-en.svg" class="img-fluid" /> English</a>

                                    </li>

                                </ul> -->

                            </li>

                        </ul>

                    </center>

                    <!--<div class="row"> <div class="col"> <a class="nav-link btn btn-primary btn-sm login-btn" href="#" >SIGN UP</a> </div></div>-->

                </div>

            </div>

        </div>

    </nav>

</div>

