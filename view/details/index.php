<?php
$detail = $data['detail'];
echo "<pre>";print_r($detail);echo "</pre>";die();
$tags = rtrim($detail['tags'],',');
?>
<!--Start Breadcrumb Text area-->
    <section class="breadcrumb-area">
        <div class="breadcrumb-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb-text text-center">
                            <h1>محتوای مطلب</h1>
                            <ul class="breadcrumbs">
                                <li><a href="#">محتوای مطلب</a><i class="fa fa-angle-left"></i></li>
                                <li><a href="#">صفحه اصلی</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End Breadcrumb Text area-->

    <!--Start blog details area-->
    <section id="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="blog-items blog-details-part">
                        <!--Start blog details-->
                        <div class="blog-details">
                            <img src="public/img/post/<?= $detail['image']; ?>" alt="">
                            <div class="fix blog-post-date">
                                <h1><b>02</b> <br> مهر</h1>
                            </div>
                            <div class="single-bolg-title">
                                <h3><?= $detail['title']; ?></h3>
                                <div class="post-resource">
                                    <ul>
                                        <li class="authors"><a href=""> توسط: <span> مهربانی </span></a></li>
                                        <li class="tags"><a href=""><?= $tags; ?></a></li>
                                        <li class="comments"><a href="">نظر: 5</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Start blog details top text-->
                            <div class="blog-details-top-text">
                                <?= $detail['detail']; ?>
                            </div>
                            <!--End blog details top text-->
                            <!--Start blog details middle text-->
                            <!--<div class="blog-details-middle-info">
                                <div class="blog-details-image dtc">
                                    <img src="img/blog-detalis-img.jpg" alt="">
                                </div>
                                <div class="blog-detalis-text-middle dtc">
                                    <p>هرکس بر خلاف ماده ۱۰۴۱ قانون مدنی با کسی که هنوز به سن قانونی برای ازدواج نرسیده است مزاوجت کند به شش ماه الی دو سال حبس تأدیبی محکوم خواهد شد.

                                        در صورتی که دختر به سن ۱۳ تمام نرسیده باشد لااقل به دو الی سه سال حبس تأدیبی محکوم می‌شود و در هر دو مورد ممکن است علاوه بر مجازات حبس، به جزای نقدی از دو هزار ریال الی ۲۰ هزار ریال محکوم گردد و اگر در اثر ازدواج بر خلاف مقررات فوق، مواقعه منتهی به نقص یکی از اعضا یا مرض دائم زن گردد، مجازات زوج از ۵ الی ده سال حبس با اعمال شاقه است و اگر منتهی به فوت زن شود مجازات زوج، حبس دائم با اعمال شاقه است. عاقد و خواستگار و سایر اشخاصی که شرکت در جرم داشته‌اند نیز به همان مجازات یا مجازاتی که برای معاون جرم مقرر است، محکوم می‌شوند. محاکمه‌ی این اشخاص را وزارت عدلیه می‌تواند به محاکم مخصوص که اصول تشکیلات و ترتیب رسیدگی آن به موجب نظامنامه معین می‌شود رجوع نماید و در صورت عدم تشکیل محکمه‌ی مخصوصی، رسیدگی در محاکم عمومی به عمل خواهد آمد.</p>
                                    <p>طرفین عقد ازدواج می‌توانند هر شرطی که مخالف با مقتضای عقد مزبور نباشد در ضمن عقد ازدواج یا عقد لازم دیگر بنمایند، مثل این که شرط شود هر گاه شوهر در مدت معینی غایب شده یا ترک انفاق نموده یا بر علیه حیات زن سوءقصد کرده یا سوءرفتاری نماید که زندگانی زناشویی غیرقابل تحمل شود، زن وکیل و وکیل در توکیل باشد که پس از اثبات تحقق شرط در محکمه و صدور حکم قطعی، خود را به طلاق باین مطلقه سازد.

                                        تبصره در مورد این ماده: محاکمه بین زن و شوهر در محکمه ابتدایی مطابق اصول محاکمات حقوقی به عمل خواهد آمد .حکم بدایت قابل استیناف و تمیز است. مدت مرور زمان شش ماه از وقوع امری است که حق استفاده شرط، می‌دهد.</p>
                                </div>
                            </div>-->
                            <!--End blog details middle text-->
                            <!--Start blog details bottom text-->
                            <!--<div class="fix blog-details-bottom-text">
                                <p>ازدواج مسلمه با غیر مسلم، ممنوع است. ازدواج زن ایرانی با تبعه خارجه در مواردی که مانع قانونی ندارد موکول به اجازه‌ی مخصوص بوده و دولت باید در هر نقطه مرجعی را برای دادن اجازه، معین نماید. هر خارجی که بدون اجازه‌ی مذکور در فوق، زن ایرانی را ازدواج نماید به حبس تأدیبی از یک سال تا سه سال محکوم خواهد شد.</p>
                            </div>-->
                            <!--End blog details bottom text-->
                            <!--Start John michile info text-->
                            <!--<div class="fix john-michaila-info">
                                <div class="fix john-michila-img">
                                    <img src="public/img/john-michila-photo.png" alt="">
                                </div>
                                <div class="fix john-michila-text">
                                    <img src="public/img/cotation.png" alt="">
                                    <p>تعقیب جزایی در مورد دو ماده فوق بسته به شکایت زن یا مردی است که طرف او را فریب داده است و هر گاه قبل از صدور حکم قطعی، مدعی خصوصی شکایت خود را مسترد داشت تعقیب جزایی موقوف خواهد شد.</p>
                                    <h4>استاد رفیعی -</h4>
                                </div>
                            </div>-->
                            <!--End John michile info text-->
                            <!--Start Two colum text-->
                            <!--<div class="fix two-colum-text">
                                <h3>روزنامه وار</h3>
                                <div class="fix two-colum-text-left">
                                    <p>در مورد ماده فوق مادام که محاکمه بین زوجین خاتمه نیافته، محل سکنای زن به تراضی طرفین معین می‌شود و در صورت عدم تراضی، محکمه با جلب نظر اقربای نزدیک طرفین، منزل زن را تعیین خواهد نمود و در صورتی که اقربایی نباشد محکمه خود محل مورد اطمینانی را معین خواهد کرد.</p>
                                </div>
                                <div class="fix two-colum-text-right">
                                    <p>در مواردی که زن، ثابت کند ترک منزل به سبب خوف ضرر بدنی یا مالی است که عادتاً نمی‌توان تحمل کرد و در صورت ثبوت مظنه‌ی ضرر مزبور، محکمه حکم بازگشت به منزل نخواهد داد و مادام که زن در بازنگشتن به منزل معذور است نفقه بر عهده‌ی شوهر خواهد بود.</p>
                                </div>
                            </div>-->
                            <!--End Two colum text-->
                            <!--Start Blog details social link -->
                            <div class="fix blog-details-social-links">
                                <div class="fix socila-link-left-text">
                                    <p><?= $tags; ?></p>
                                </div>
                                <div class="fix blog-details-social-right">
                                    <a href=""><i class="fa fa-facebook mysocial_style"></i></a>
                                    <a href=""><i class="fa fa-twitter mysocial_style"></i></a>
                                    <a href=""><i class="fa fa-google-plus mysocial_style"></i></a>
                                    <a href=""><i class="fa fa-linkedin mysocial_style"></i></a>
                                    <a href=""><i class="fa fa-pinterest mysocial_style"></i></a>
                                    <a href=""><i class="fa fa-dribbble mysocial_style"></i></a>
                                </div>
                            </div>
                            <!--End Blog details social link -->
                            <!--Start adminostrator info -->
                            <div class="adminostrator">
                                <div class="adminostrator-img">
                                    <img src="public/img/adminostrator-photo.jpg" alt="">
                                </div>
                                <div class="adminostrator-text">
                                    <h4>مدیر سایت</h4>
                                    <p>من از 10 سال پیش به علوم قضایی علاقه مند شدم و در این حوزه تحصیل کرده ام و این ایده رو در سر داشتم که از طریق تکنولوژی بتوانم مشکلات شهروندان و جامعه را رفع کنم.</p>
                                </div>
                            </div>
                            <!--End adminostrator info -->
                            <!--Start comment part -->
                            <div class="comment-part">
                                <div class="comment-title">
                                    <h4><span>نظرات</span></h4>
                                </div>
                                <!--Start comment box-->
                                <div class="comment-box">
                                    <!--Start single comment box-->
                                    <div class="single-comment-box">
                                        <div class="comment-image-holder">
                                            <img src="public/img/comment-img.jpg" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <h5>علی نظری -<span>26 مهر</span></h5>
                                            <p>خیلی از این مطلب توانستم چیز یاد بگیرم و در رابطه با قانون ازدواج بیشتر مطلع باشم و با دید باز به این مهم فکر کنم.</p>
                                            <a href="">پاسخ</a>
                                        </div>
                                    </div>
                                    <!--End single comment box-->
                                    <!--Start single comment box-->
                                    <div class="single-comment-box">
                                        <div class="comment-image-holder">
                                            <img src="public/img/comment-img-2.jpg" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <h5>فاطمه صمدی -<span>26 مرداد</span></h5>
                                            <p>خیلی از این مطلب توانستم چیز یاد بگیرم و در رابطه با قانون ازدواج بیشتر مطلع باشم و با دید باز به این مهم فکر کنم.</p>
                                            <a href="">پاسخ</a>
                                        </div>
                                        <!--Start comment Reply box-->
                                        <div class="comment-reply-box">
                                            <div class="comment-image-holder">
                                                <img src="public/img/comment-reply.jpg" alt="">
                                            </div>
                                            <div class="comment-text">
                                                <h5>محمد مهربانی-<span>26 تیر</span></h5>
                                                <p>خیلی از این مطلب توانستم چیز یاد بگیرم و در رابطه با قانون ازدواج بیشتر مطلع باشم و با دید باز به این مهم فکر کنم.</p>
                                                <a href="">پاسخ</a>
                                            </div>
                                        </div>
                                        <!--End comment Reply box-->
                                    </div>
                                    <!--End single comment box-->
                                    <!--Start single comment box-->
                                    <div class="single-comment-box">
                                        <div class="comment-image-holder">
                                            <img src="public/img/comment-img-3.jpg" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <h5>آیدین فرحزادی-<span>26 خرداد</span></h5>
                                            <p>خیلی از این مطلب توانستم چیز یاد بگیرم و در رابطه با قانون ازدواج بیشتر مطلع باشم و با دید باز به این مهم فکر کنم.</p>
                                            <a href="">پاسخ</a>
                                        </div>
                                    </div>
                                    <!--End single comment box-->
                                </div>
                                <!--End comment box-->
                            </div>
                            <!--End comment part -->
                            <!--Start meet attorney form-->
                            <div class="meet-attorneys">
                                <div class="comment-title">
                                    <h4><span>ارسال نظر</span></h4>
                                </div>
                                <div class="comment-form">
                                    <form action="#">
                                        <input class="name" type="text" placeholder="نام و نام خانوادگی">
                                        <input class="email" type="text" placeholder="ایمیل">
                                        <textarea class="comment" placeholder="نظر"></textarea>
                                        <button type="submit">ارسال<i class="fa fa-arrow-left"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!--End meet attorney form-->
                        </div>
                        <!--End blog details-->
                    </div>
                </div>
                <?php require_once("view/sidebar.php"); ?>
            </div>
        </div>
    </section>
    <!--End blog details area-->