<?php
/**
 * Created by IntelliJ IDEA.
 * User: amaraa
 * Date: 6/4/2019
 * Time: 1:06 PM
 */
?>
<section>
    <div class="container">
        <div class="services__header">
            <h1 class="services__header-title text-center"><?php echo $caseHeader ; ?></h1>
            <div class="text-center services__header-description"><?php echo $caseDescription ; ?></div>
        </div>
        <div class="services__list">
            <ul>
                <li class="services__list-item"><a target="_blank" href="https://www.newsweek.com/james-heaps-ucla-gynecologist-multiple-charges-1443298"><?php echo $caseTopOne ; ?></a></li>
                <li class="services__list-item"><a target="_blank" href="https://ktla.com/2019/06/12/former-patients-lawsuit-alleges-sex-assault-by-ucla-gynecologist-facing-criminal-charges/"><?php echo $caseTopTwo ; ?></a></li>
                <li class="services__list-item"><a target="_blank" href="https://www.latimes.com/local/lanow/la-me-ucla-gynecologist-review-abuse-20190611-story.html"><?php echo $caseTopThree ; ?></a></li>
                <li class="services__list-item"><a target="_blank" href="https://www.latimes.com/local/lanow/la-me-ucla-gynecologist-accusations-20190610-story.html"><?php echo $caseTopFour ; ?></a></li>
            </ul>
            <!-- <div class="row">
                <div class="col-12 services__list-item"><i class="fa fa-circle" aria-hidden="true"></i><a target="_blank" href="https://www.newsweek.com/james-heaps-ucla-gynecologist-multiple-charges-1443298"><?php echo $caseTopOne ; ?></a></div>
                <div class="col-12 services__list-item"><i class="fa fa-circle" aria-hidden="true"></i><a target="_blank" href="https://ktla.com/2019/06/12/former-patients-lawsuit-alleges-sex-assault-by-ucla-gynecologist-facing-criminal-charges/"><?php echo $caseTopTwo ; ?></a></div>
                <div class="col-12 services__list-item"><i class="fa fa-circle" aria-hidden="true"></i><a target="_blank" href="https://www.latimes.com/local/lanow/la-me-ucla-gynecologist-review-abuse-20190611-story.html"><?php echo $caseTopThree ; ?></a></div>
                <div class="col-12 services__list-item"><i class="fa fa-circle" aria-hidden="true"></i><a target="_blank" href="https://www.latimes.com/local/lanow/la-me-ucla-gynecologist-accusations-20190610-story.html"><?php echo $caseTopFour ; ?></a></div>
            </div> -->
        </div>
    </div>
    <div class="services-container">
        <div class="container">
            <div class="services">
                <div class="services__items">
                    <div class="services-items swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $order = 0;
                            shuffle_assoc($blogs);
                            foreach ($blogs as $title => $text) {
                                echo '
                                                <div class="swiper-slide">
                                                    <a class="services-items__item" href="'.$text["link"].'" target="_blank" >
                                                           <div class="services-item">
                                                                <div class="services-item__name">'.$title.'</div>
                                                                <div class="services-item__name-subject">
                                                                    '.$text["subject"].'
                                                                </div>
                                                                <div class="services-item__description">
                                                                    '.$text["text"].'
                                                                </div>
                                                            </div>
                                                    </a>
                                                </div>
                                            ';
                                $order++;
                            }
                            ?>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
