<?php
/**
 * Created by IntelliJ IDEA.
 * User: amaraa
 * Date: 6/4/2019
 * Time: 12:41 PM
 */
?>
<div class="review-container">
    <div class="container" style="padding:0 !important;">
        <div class="review" >
            <div class="review__items">
                <div class="review-items swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $counter = 0;
                        shuffle_assoc($testimonial);
                        foreach ($testimonial as $title => $text) {
                            echo '<div class="swiper-slide">
                                    <div class="review-items__item">
                                        <div class="review-item">
                                            <span class="text-center review-item__header">Client Testimonials</span>
                                            <div class="review-item__text">'.$text["text"].'</div>
                                        </div>
                                    </div>
                                </div>';
                            $counter++;
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
