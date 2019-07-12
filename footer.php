<?php
/**
 * Created by IntelliJ IDEA.
 * User: Amaraa
 * Date: 6/3/2019
 * Time: 10:26 AM
 */
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-0 footer-menu__col">
                <img src="assets/<?php echo $footerBanner ?>" class="img-fluid" title="Footer">
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
    <img id="displayBox" src="assets/ajax-loading-gif.gif" width="50" height="50" style="cursor: default; display: none;">
</footer>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollreveal.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/blockui-master/jquery.blockUI.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.inputmask.bundle.js"></script>
<script src="js/icodice.js"></script>
<script src="js/socket.io.js"></script>
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
			  "url" : "https://USCAbuseLawyers.com/"
			}
</script>
<script>
    $(document).ready(function() {
        var numOnlyLength = 0;
        $("#phoneNumber").keyup(function(e){
            var numOnly = $('#phoneNumber').val().replace(/\D/g,'');
            numOnlyLength = numOnly.length;
            var warningCount = 0;
            console.log(numOnlyLength);
            if(numOnly.substring(0,1) == 1){
                warningCount = 11;
                $("#phoneNumber").inputmask({"mask": "9-999-999-9999"});
            }else{
                warningCount = 10;
                $("#phoneNumber").inputmask({"mask": "999-999-9999"});
            }
            if(numOnlyLength > warningCount){
                $(this).addClass("warning");
            }else{
                $(this).removeClass("warning");
            }
        });
    });
</script>
<style>
    .warning{border: 2px solid red;}
</style>
<script>
    $(document).ready(function() {
        $.ajaxSetup({cache: false})

        $('#contact-form').submit(function (e) {
            e.preventDefault();

            $.blockUI({
                message: $('#displayBox'),
                centerX: true,
                centerY: true,
                css: {
                    border: 'none',
                    backgroundColor: 'none',
                    opacity: .6,
                    color: '#fff'
                }
            });
            if (grecaptcha === undefined) {
                alert('Recaptcha not defined');
                return;
            }

            var response = grecaptcha.getResponse();
            if (!response) {
                $( '#recaptcha' ).addClass( "error" );
                $.unblockUI();
                return;
            }
            if(response !== ''){
                $.ajax({
                    url: 'php/contact.php',
                    type: 'POST',
                    data: $('#contact-form').serialize(),
                    cache: false,
                    headers: {'cache-control': 'no-cache'},
                    success: function (response) {
                        console.log(response);
                        $.unblockUI();
                        window.location.replace("https://USCAbuseLawyers.com/thank-you/");
                    }
                });
            }
        });
    });
</script>
