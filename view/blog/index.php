<?php
$page = $data['limit'];
$pageindex = $data['pageindex'];
$countpost = $data['countpost'];
?>
<!--Start Breadcrumb Text area-->
<section class="breadcrumb-area">
    <div class="breadcrumb-text-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb-text text-center">
                        <h1>مطالب</h1>
                        <ul class="breadcrumbs">
                            <li><a href="#">مطالب</a><i class="fa fa-angle-left"></i></li>
                            <li><a href="#">صفحه اصلی</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Start blog v1 area-->
<section id="blog-v1-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="blog-items">
                    <?php foreach ($page as $row){ ?>
                    <!--Start Single blog item-->
                    <div class="single-blog-item">
                        <img src="public/img/blog-1.jpg" alt="">
                        <div class="fix blog-post-date">
                            <h1><b>02</b> <br> مهر</h1>
                        </div>
                        <div class="single-bolg-title">
                            <h3><?= $row['title'] ?></h3>
                            <div class="post-resource">
                                <ul>
                                    <li class="authors"><a href="">توسط:<span>مهربانی</span></a></li>
                                    <li class="tags"><a href="">قانون ازدواج</a></li>
                                    <li class="comments"><a href="">نظر: 5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-blog-text">
                            <p><?= $row['detail'] ?></p>
                            <div class="single-blog-read-more">
                                <a href="">بیشتر <i class="fa fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--End Single blog item-->
                   <?php } ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <?= pagination('blog/index/',$pageindex,$countpost); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once ("view/sidebar.php"); ?>
        </div>
    </div>
</section>
<!--End blog v1 area-->