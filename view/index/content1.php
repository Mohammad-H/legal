<?php //echo "<pre>"; print_r($data['post']);echo "</pre>"; ?>
<!--Start welcome area-->
<section id="welcome-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="our-law">
                    <a href="#"><img src="public/img/Bads5.gif" alt="" style="height: auto;width: 250px;"></a>
                </div>
            </div>
            <?php
                $post=$data['post'];
                foreach ($post as $content1) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="our-law">
                    <img class="" src="public/img/post/<?= $content1->image; ?>" alt="<?= $content1->alt_image; ?>">
                    <h4><?= $content1->title; ?> </h4>
                    <p><?= $content1->detail; ?></p>
                    <a href="details/index/<?= $content1->id; ?>">بیشتر</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--End welcome area-->