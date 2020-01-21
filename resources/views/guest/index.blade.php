




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



@extends('guest.home_master')
@section('content')







    <div class="main_content">
    <div class="main_content_right">
        <div class="right_menu">
            <div class="right_menu_top">
                <h3> جدیدترین محصولات</h3>
            </div>
            <!--right_menu_top-->
            <div class="right_menu_content">
                <ul>
                    @foreach($song as $son)
                    <li>
                        <div class="right"><img src="<?= url("images/song_image/".$son->file[0]->image)?>"></div>
                        <div class="left">
                            <p>{{$son->name}}</p>
                            <p style="color:#A7A0A0; font-size:16px;"> {{$son->title}}</p>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
            <!--right_menu_content-->
            <div class="right_menu_bottom"> <a href=""> + مشاهده محصولات بیشتر</a> </div>
        </div>
        <!--right_menu-->
        <div class="view_box"><img src="image/885e2c80.jpg"></div>
        <div class="view_box"><img src="image/bb693031-a89b-4190-8d2e-980ae16a2860.jpg"></div>
        <div class="right_menu">
            <div class="right_menu_top">
                <h3> تازه ترین خبرها</h3>
            </div>
            <!--right_menu_top-->
            <div class="right_menu_content">
                <ul>
                    <li>
                        <div class="right"><img src="image/eca008d4-05eb-49e3-a17b-6e91e8edaeff.jpg"></div>
                        <div class="left">
                            <p>بررسی گلکسی A7</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                    <li>
                        <div class="right"><img src="image/Mobile-Phone-Apple-iPhone-6s-64GB9b1ca1.jpg"></div>
                        <div class="left">
                            <p>نقد و بررسی ایفون6s</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                    <li>
                        <div class="right"><img src="image/Mobile-Phone-Apple-iPhone-6-128GBbf23a9.jpg"></div>
                        <div class="left">
                            <p>آیفون با حافظه ی 128گیگ</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                    <li>
                        <div class="right"><img src="image/Notebook-HP-Spectre-X360-13t-4185nr52cfcd.jpg"></div>
                        <div class="left">
                            <p> غول HP در راه است</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                    <li>
                        <div class="right"><img src="image/Notebook-HP-Pavilion-15-ab236neeae445.jpg"></div>
                        <div class="left">
                            <p>سری جدید پاویلون از hp</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                    <li>
                        <div class="right"><img src="image/Sony_Xperia_C5_Ultra_Review.jpg"></div>
                        <div class="left">
                            <p>فبلت سونی با نام C5 الترا</p>
                            <p style="color:#A7A0A0; font-size:16px;"> بازدید : 9032</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--right_menu_content-->
            <div class="right_menu_bottom"> <a href=""> + مشاهده اخبار بیشتر</a> </div>
            <!--right_menu_bottom-->
        </div>
        <!--right_menu-->
        <div class="view_banl_logo"><img src="images/song_image/Chrysanthemum"></div>
    </div>
    <div class="main_content_left">
        <div class="main_content_left_slider" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <img class="d-block w-100" src="<?= url('/images/song_image/Desert.jpg')?>" alt="First slide">

                    </div>


                    @foreach($slider as $slide)

                        @foreach($slide->file as $image )

                            <div class="carousel-item ">

                               <a href="<?=url("/music/home/view/".$slide->id)?>"> <img class="d-block w-100" src="<?= url('/images/song_image/'.$image->image)?>" alt="First slide"></a>
                            </div>
                        @endforeach
                    @endforeach



                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>        <!--main_content_left_slider-->
        <!--main_content_left_box_info-->






        <div class="main_content_left_listproduct">
            <div class="top">
                <h3> محبوب ترین کالاها</h3>
                <li><a href="view_page.html">  <h4> لیست کامل +</h4></a></li>
            </div>
            <div class="content_listproduct">
                <div class="wrap">
                    <div class="chain-box" id="chain-box-2">
                        <ul class="chain">
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">گلکسی A858</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">LG G5</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">نوت بوک اچ پی </a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">گلکسی s3</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">مودم سفید</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">مودم سیاه</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">هارد اکسترنال</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="<?= url("images/song_image/Desert.jpg")?>" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">سامسونگ</a>
                                <!--title--></li>

                        </ul>
                        <a href="#" class="arrow3-left"></a><!--arrow3-left-->
                        <a href="#" class="arrow3-right"></a><!--arrow3-right-->
                    </div>
                    <!--chain-box-->
                </div>
                <!--content-->
            </div>
            <!--main_content_left_listproduct-->
        </div>








        <div class="main_content_left_listproduct">
            <div class="top">
                <h3> پرفروش ترین کالاها</h3>
                <li><a href="view_page.html">    <h4> لیست کامل +</h4></a>
            </div>
            <div class="content_listproduct">
                <div class="wrap1">
                    <div class="chain-box1s" id="chain-box-21s">
                        <ul class="chain1s">
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Phone-Panasonic-KX-TG3611BXf66ccc.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">گوشی پاناسونیک</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="image/Mobile-Samsung-Galaxy-Star-Plus-S7262-Dual-SIM3eccab.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">گلکسی استار</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="image/Computer-HDD-Silicon-Armor-A80-1TB030b68.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">هارد اکسترنال</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Computer-HDD-WD-Elements-Portable-1TBa1558e.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">هارد اکسترنال WD</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="image/Mobile-Phone-Apple-iPhone-6s-64GB9b1ca1.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">آیفون 6</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/eca008d4-05eb-49e3-a17b-6e91e8edaeff.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">گلکسی A7</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="image/Mobile-Phone-LG-G506b1a5.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">LG G5</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Computer-Net-D-Link-DSL-2740U-ADSL2-Plus-Modem-with-Wireless.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">مودم دی لینک</a>
                                <!--title--></li>
                        </ul>
                        <a href="#" class="arrow3-left1s"></a><!--arrow3-left-->
                        <a href="#" class="arrow3-right1s"></a><!--arrow3-right-->
                    </div>
                    <!--chain-box-->
                </div>
                <!--content-->
            </div>
            <!--main_content_left_listproduct-->
        </div>
        <div class="main_content_left_listproduct">
            <div class="top">
                <h3> جدید ترین کالاها</h3>
                <li><a href="view_page.html">          <h4> لیست کامل +</h4></a>
            </div>
            <div class="content_listproduct">
                <div class="wrap2">
                    <div class="chain-box2s" id="chain-box-22s">
                        <ul class="chain2s">
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Phone-Panasonic-KX-TG3611BXf66ccc.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">گوشی پاناسونیک</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="image/Mobile-Samsung-Galaxy-S3-I9300I-Dual-SIM0102e8.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">گلکسی اس 3</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="image/Mobile-Phone-LG-G506b1a5.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">LG G5</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Mobile-LG-L70-Dual-D325d3ffd2.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">LG L70</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-3-col.php"><img src="image/Notebook-HP-Pavilion-15-ab236neeae445.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-3-col.php" class="title">اچ پی پاویلون</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Notebook-HP-Spectre-X360-13t-4185nr52cfcd.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">اچ پی Spectre-X360</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-1-col.php"><img src="image/Notebook-Lenovo-E5080-A04c9ac.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-1-col.php" class="title">نوت بوک لنوو</a>
                                <!--title--></li>
                            <li>
                                <div class="image"><a href="portfolio-2-col.php"><img src="image/Notebook-ASUS-UX303UB-Cafd9fc.jpg" alt="" /></a></div>
                                <!--image-->
                                <a href="portfolio-2-col.php" class="title">نوت بوک ایسوس</a>
                                <!--title--></li>
                        </ul>
                        <a href="#" class="arrow3-left2s"></a><!--arrow3-left-->
                        <a href="#" class="arrow3-right2s"></a><!--arrow3-right-->
                    </div>
                    <!--chain-box-->
                </div>
                <!--content-->
            </div>
            <!--main_content_left_listproduct-->
        </div>

        <!--main_content_left-->
    </div>
</div>
    @endsection