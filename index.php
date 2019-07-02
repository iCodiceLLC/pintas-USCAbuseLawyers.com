<?php
/**
 * Created by IntelliJ IDEA.
 * User: Amaraa
 * Date: 6/3/2019
 * Time: 10:26 AM
 */
?>
<?php ob_start(); ?>
<?php include "database.php";?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "head.php"; ?>
    </head>
    <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N37BBXN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- Main -->
    <main>
        <!-- Slider -->
        <section class="services__slider">
            <div class="services__slider-inside">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="services__slider-title"><?php echo $pintasSlide; ?></h1>
                        </div>
                        <div class="col-lg-6">
                            <div class="services__slider-left">
                                <p><?php echo $pintasDescription; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services__slider-right">
                                <ul class="list-unstyled">
                                    <li>Every aspect of your case – from the first phone call forward – <b>is completely confidential</b></li>
                                    <li><b>We investigate</b> every case for free</li>
                                    <li><b>No fees charged</b> unless we win justice for you</li>

                                </ul>
                                <div class="footer-top-bottom">
                                    <a href="#section-form">
                                        Get Your Free Case Evaluation <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Awards -->
        <?php include 'awards.php' ?>
        <!-- Form -->
        <section id="section-form">
            <div class="container">
                <h1 class="text-center services__header-title ">Our Firm Will Fight for Your Abuse Claim</h1>
                <div class="services__talcum-space">
                    <div class="row">
                        <div class="order-2 order-md-2 order-lg-1 col-lg-6">
                            <div class="services__cases">
                                <h2 class="services__header-subtitle text-center"><?php echo $pintasHeader; ?></h2>
                                <p>
                                    <?php echo $pintasTitle; ?>
                                </p>
                                <ul>
                                    <li><strong>An all-female</strong> legal team</li>
                                    <li><strong>Available 24/7</strong> for case support</li>
                                    <li><strong>We will travel</strong> to you</li>

                                </ul>
                            </div>
                            <?php include 'testimonial.php' ?>
                        </div>
                        <div class="order-1 order-md-1 order-lg-2 col-lg-6">
                            <div class="services__cases-form">
                                <h1 class="text-center"> Get Your Own Free Case Evaluation</h1>
                                <p>After you fill out the form below, you will receive a confirmation email and one of our compassionate female attorneys or paralegals will contact you within 1 business day.<b> Our case evaluations are completely free and confidential.</b></p>
                                <?php include 'contact.php' ?>
                            </div>
                        </div>
                        

                    </div>

                </div>
            </div>
        </section>
        <!-- Talcum -->
        <?php include "talcum.php"; ?>
        <!-- Headline -->
        <?php include "blog.php"; ?>
        <!-- Photo -->
        <section class="services__footer">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="height: 105px;">
                        <div class="footer-top">
                            <p>
                                No Fees Charged, <br/>
                                <i>Until We Win Your Case.</i>
                            </p>
                        </div>
                        <div class="footer-bottom">
                            <a href="#section-form">
                                Get Your Free Case Evaluation <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'footer.php' ?>

    </body>
    </html>
<?php
ob_end_flush();
?>