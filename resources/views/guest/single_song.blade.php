@extends('guest.home_master')
@section('content')
    <div class="main_content">
        <div class="main_content_single_post">
            <div class="info_detail">
                <div class="right">
                    <img src="<?= url("images/song_image/".$song->file[0]->image)?>">
                </div><!--right-->
                <div class="left">
                    <div class="title">
                        <en>{{$song->name}}</en>
                        <fa> {{$song->title}}</fa>
                        <fa>{{$song->artists[0]->name}}</fa>
                    </div><!--title-->
                    <div class="color">

                    </div><!--color-->
                    <div class="granti">
                        <div class="granti_title"></div>
                        <div class="granti_box">
                            <audio controls="controls" src="<?= url("music/128/".$song->file[0]->mp3_128)?>">
                                Your browser does not support the HTML5 Audio element.
                            </audio>

                        </div><!--granti_box-->
                    </div><!--granti-->

                    <div class="price">
                        @if($query=0)
                        <form  action="<?=url('music/like/'.$song->id)?>" method="post">
                            <button class="btn btn-success" type="submit" name="like">like</button>
                        </form>
                             @endif
                        @if($query=1)
                                <form  action="<?=url('music/like/'.$song->id)?>" method="post">
                                    @method('delete')
                                    <button class="btn btn-success" type="submit" name="like">unlike</button>
                                </form>
                            @endif

                    </div><!--price-->
                    <div class="add_box">

                        <!--add_box_icon-->
                        <div class="add_box_name">
                            <p>دانلود با کیفیت 128 </p>
                        </div>
                        <!--add_box_name-->
                    </div>

                    <div class="final_price">
                    </div><!--final_price-->
                    <div class="left_left">
                        <ul>
                            <li>متن اهنگ</li>

                            <li>{{$song->lyric}}</li>

                        </ul>
                    </div><!--left_left-->
                </div><!--left-->
            </div><!--info_detail-->
            <div class="description">
                <div class="description_title">
                    <p> معرفی اجمالی محصول </p>
                </div><!--description_title-->
                <div class="description_content">
                    <p>
                        پس از موفقیت‌های روز افزون کمپانی ال‌جی در زمینه‌ی فروش گوشی‌های میان رده در بازار جهانی، این بار این غول کره ای تصمیم به ساخت سری سوم گوشی‌های میان رده‌ی خود گرفت؛ تا بار دیگر نبض این قسمت از بازار تلفن‌های هوشمند را به خود اختصاص دهد. در ماه فوریه‌ی سال 2014 میلادی بود که شرکت ال‌جی در مراسم جهانی MWC، از گوشی‌های میان رده‌ی خود و چند گوشی نسبتا جدید دیگر مانند G2 min و G Pro 2 رونمایی به عمل آورد. محصولات میان رده‌ی معرفی شده شرکت ال‌جی در این مراسم شامل گوشی‌های L70، L40 و L90 بوده که هر کدام از آن‌ها دارای دو مدل تک سیم و دو سیم کارته می‌باشند. اما یکی از فناوری‌هایی که ال‌جی در این گوشی خودبه کار برده، قابلیت ناک کد (KnockCode) نام دارد. این روش باز کردن قفل صفحه نمایش به نوعی شبیه به روش الگو (Pattern) می‌باشد که پتنت آن کاملا به نام کمپانی خلاق ال‌جی ثبت شده است. حال اتفاق مثبت و بزرگی که افتاده است، استفاده‌ی از این قابلیت در تمام گوشی‌های نسل سوم سری "L" ال‌جی می‌باشد. به واقع این امکان به تنهایی مایه‌ی خرسندی ما از این گوشی‌های میان رده ال‌جی شده است. حال از بین این سه گوش قصد داریم به نقد و بررسی گوشی L70 Dual D325 بپردازیم. محصولی که می‌توان لقب میان رده‌ترین گوشی بین گوشی‌های میان رده‌ی ال‌جی در سال 2014 را به آن داد.
                    </p>
                </div><!--description_content-->
            </div><!--description-->
        </div><!--main_content_single_post-->
    </div>



    <!--Simplest syntax-->

    @endsection