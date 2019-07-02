<?php
/**
 * Created by IntelliJ IDEA.
 * User: Amaraa
 * Date: 6/3/2019
 * Time: 10:26 AM
 */
?>
<?php ob_start(); ?>
<?php include "../database.php";?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo $title ?> </title>

        <!-- Meta tags -->
        <meta name="keywords" content="<?php echo $metaKeywords ?>"/>
        <meta name="description" content="<?php echo $metaDescription ?>"/>
        <meta name="subject" content="<?php echo $metaSubject ?>">
        <meta name="copyright" content="iCodice">
        <meta name="language" content="EN">
        <meta name="robots" content="index,follow" />
        <meta name="abstract" content="">
        <meta name="topic" content="">
        <meta name="summary" content="">
        <meta name="Classification" content="Business">
        <meta name="author" content="iCodice, developer@icodice.com">
        <meta name="designer" content="">
        <meta name="copyright" content="">
        <meta name="reply-to" content="<?php echo $metaReplyTo ?>">
        <meta name="owner" content="">
        <meta name="url" content="<?php echo $metaUrl ?>">
        <meta name="identifier-URL" content="<?php echo $metaUrl ?>">
        <meta name="directory" content="submission">
        <meta name="category" content="">
        <meta name="coverage" content="Worldwide">
        <meta name="distribution" content="Global">
        <meta name="rating" content="General">
        <meta name="revisit-after" content="7 days">

        <!-- Share Facebook Meta -->
        <meta property="description" content=""/>
        <meta property="keywords" content="<?php echo $metaKeywords ?>"/>
        <meta property="og:site_name" content="<?php echo $metaUrl ?>"/>
        <meta property="og:url" content="http://<?php echo $metaUrl ?>"/>
        <link rel="canonical" href="http://<?php echo $metaUrl ?>"/>
        <meta property="og:title" content="<?php echo $metaDescription ?>"/>
        <meta property="og:description" content=".: <?php echo $metaDescription ?> :."/>
        <meta property="og:type" content="website"/>

        <!-- Share Twitter Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="http://<?php echo $metaUrl ?>">
        <meta name="twitter:title" content="<?php echo $metaDescription ?>">
        <meta name="twitter:description" content=".: <?php echo $metaDescription ?> :.">

        <!-- Link Tag -->
        <link rel='shortcut icon'  href='../assets/favicon.png'>
        <link rel='index' title='iCodice' href='http://<?php echo $metaUrl ?>/'>

        <!-- Styles -->
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css"/>
        <link rel="stylesheet" href="../css/swiper.min.css"/>
        <link rel="stylesheet" href="../css/normalize.css"/>
        <link rel="stylesheet" href="../css/icodice.css?v=0.5"/>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <!-- Icon -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Script -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N37BBXN');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50966305-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-50966305-1');
        </script>
        <script>
            gtag('config', 'AW-823327012/YqKaCJqZ-6IBEKTyy4gD', {
                'phone_conversion_number': '800-479-2666'
            });
        </script>


<!-- Global site tag (gtag.js) - Google Ads: 823327012 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-823327012"></script>
 <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-823327012');
  </script>


        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '560225548095190');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=560225548095190&ev=PageView&noscript=1"
            /></noscript>
    </head>
    <body>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N37BBXN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <nav class="navbar navbar-expand-md navbar-color">
       <a class="navbar-brand navbar-desktop" href="/"><img class="img-fluid" src="../assets/USCAbuseLawyers.com@300.png" style="max-width: 400px;"/></a>
        <a class="navbar-brand navbar-mobile" href="javascript:void(0);"><img class="img-fluid" src="../assets/mobile.png" style="max-width: 100px !important;"/></a>
        <div class="contact-info contact-mobile">
            <div class="contact-info-top" id="HeaderPanelV16TopInfo">
                <p>Available <span>24/7</span></p>
            </div>
            <a class="phone-number" href="tel:<?php echo $phone; ?>" id="HeaderPanel_1"><?php echo $phone; ?></a>
            <div class="contact-info-bottom" id="HeaderPanelV16BottomInfo"><a href="javascript:void(0);">Free Consultation</a></div>
            <div class="bottom-tagline" id="BottomTagline"><span>Nationally</span></div>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <div class="contact-info">
                    <div class="contact-info-top" id="HeaderPanelV16TopInfo">
                        <p>Available <span>24/7</span></p>
                    </div>
                    <a class="phone-number" href="tel:<?php echo $phone; ?>" id="HeaderPanel_1"><?php echo $phone; ?></a>
                    <div class="contact-info-bottom" id="HeaderPanelV16BottomInfo"><a href="javascript:void(0);">Free Consultation</a></div>
                    <div class="bottom-tagline" id="BottomTagline"><span>Nationally</span></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main -->
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thank-you-left">
                        <div class="thank-you-text capitalize"><h1>THANK YOU FOR CONTACTING</h1></div>
                        <div class="thank-you-logo"><h2>Pintas & Mullins Law Firm</h2></div>
                        <div class="thank-you-text"><h4>We have received your information and will be in touch with you shortly. If this is an emergency, please call us right away at <?php echo $phone ?></h4></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-container">
                        <div class="thanks-img">
                            <img alt="Pintas &amp; Mullins Law Firm" src="../assets/<?php echo $thankYouImage ?>" title="Pintas &amp; Mullins Law Firm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 order-0 footer-menu__col">
                    <img src="../assets/<?php echo $footerBanner ?>" class="img-fluid" title="Footer">
                </div>
                <div class="col-md-6 order-1 footer-menu__col">
                    <h1>Services</h1>
                    <div class="justify-content-start d-flex">
                        <div class="col-6">
                            <div class="row">
                                <ul class="list-unstyled order-0">
                                    <?php
                                    foreach($leftLinks as $text=>$link) {
                                        echo '<li class="text-capitalize"><a href="'.$link.'" target="_blank"> '.$text.' </a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <ul class="list-unstyled order-1">
                                    <?php
                                    foreach($rightLinks as $text=>$link) {
                                        echo '<li class="text-capitalize"><a href="'.$link.'" target="_blank"> '.$text.' </a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 order-2 footer-menu__col">
                    <h1>Contact Us</h1>
                    <ul class="list-unstyled footer-email">
                        <li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                    </ul>
                    <div class="footer-icon">
                        <a href="<?php echo $instagram; ?>" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="<?php echo $facebook; ?>" target="_blank">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a href="<?php echo $twitter; ?>" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img id="displayBox" src="../assets/ajax-loading-gif.gif" width="50" height="50" style="cursor: default; display: none;">
    </footer>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <script src="../js/swiper.min.js"></script>
    <script src="../js/blockui-master/jquery.blockUI.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/icodice.js"></script>
    <script type="application/ld+json">
                {
                  "@context" : "http://schema.org",
                  "@type" : "Article",
                  "name" : "Military Hearing Loss from Defective Earplugs",
                  "author" : {
                    "@type" : "Person",
                    "name" : "Pintas & Mullins Law Firm"
                  },
                  "image" : "https://StoptheAbuse.com/assets/images/BillLaura.png",
                  "articleBody" : "If you were in any branch of the military between 2003 and 2015 and suffered hearing loss, you may be entitled to a significant settlement.</SPAN></DIV>\n\t\t\t\t\t<DIV id=\"formSub\" class=\"top-title-text animated fadeInRight text-bold text-white\"><SPAN>3M recently paid millions of dollars to the U.S. military for selling it defective earplugs, leading to hearing loss – including tinnitus, or ringing in the ears – among service members.<BR/><BR/>You have a short amount of time to file a claim, so don’t wait. Fill out the contact form to find out if you qualify.",
                  "url" : "https://StoptheAbuse.com/"
                }
    </script>

   <script type="text/javascript">
        $(document).ready(function() {
            window.setTimeout(function() {
                window.location.href = "https://USCAbuseLawyers.com/";
            }, 5000);
        });
    </script>
    </body>
    </html>
<?php
ob_end_flush();
?>