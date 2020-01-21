<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= url('css/bootstrap/bootstrap-rtl.css')?>"/>
    <script src="<?= url('script/jquery-1.10.2.min.js')?>"></script>
    <script src="<?= url('script/bootstrap-rtl.js')?>"></script>
</head>
<body>
<div class="container">
    <div id="header" class="row">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://toplearn.com">TopLearn.Com</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">خانه <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">درباره ما</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">گروه های خبری <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">ورزشی</a></li>
                                <li><a href="#">سیاسی</a></li>
                                <li><a href="#">هنری</a></li>
                                <li><a href="#">فرهنگی</a></li>

                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="جستجو">
                        </div>
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="row" style="margin-top: 62px">

        <div id="content" class="col-lg-8 col-md-9 col-sm-6 col-xs-12 pull-left">


            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="ImagesSlider/1.jpg"  width="100%" alt="...">
                        <div class="carousel-caption">
                            تصویر شماره 1
                        </div>
                    </div>
                    <div class="item">
                        <img src="ImagesSlider/2.jpg" width="100%" alt="...">
                        <div class="carousel-caption">
                            تصویر شماره 2

                        </div>
                    </div>
                    <div class="item">
                        <img src="ImagesSlider/3.jpg"  width="100%" alt="...">
                        <div class="carousel-caption">
                            تصویر شماره 3
                        </div>
                    </div>
                </div>


            </div>



            <div class="row" style="margin-top: 10px">
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <img src="https://toplearn.com/img/course/img-course-%D8%B3%D9%87-%D8%B4%D9%86%D8%A8%D9%87-%DB%B5-%D8%AF%DB%8C-%DB%B1%DB%B3%DB%B9%DB%B6-54859757-1114.jpg" alt="...">
                        <div class="caption">
                            <h3>آموزش بوت استرپ (BootStrap) </h3>
                            <p>Bootstrap مجموعه ای از ابزارهای رایگان برای ایجاد صفحات وب و نرم افزارهای تحت وب است که شامل دستورات HTML، CSS و توابع جاوا اسکریپت جهت تولید و نمایش فرم ها، دکمه ها، تب ها، ستون ها و سایر المان های مورد نیاز طراحی وب می باشد.</p>
                            <p><a href="#" class="btn btn-primary" role="button">جزئیات</a> <a href="#" class="btn btn-default" role="button">باز نشر</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <img src="https://toplearn.com/img/course/img-course-%D8%AF%D9%88-%D8%B4%D9%86%D8%A8%D9%87-%DB%B2%DB%B7-%D8%A2%D8%B0%D8%B1-%DB%B1%DB%B3%DB%B9%DB%B6-57906034-1014.jpg" alt="...">
                        <div class="caption">
                            <h3> آموزش حرفه ای کار با Alexa  </h3>
                            <p> در دنیای پر رقابت امروز تحلیل و برسی رقبا یکی از مهمترین اقدامات محسوب می شود . وب سایت بزرگ الکسا که در  آوریل سال ۱۹۹۶ کار خود را شروع کرده روز به روز محبوبیتش را توسط کاربران خود افزایش داد . اگر شما هم جزو کسانی هستید که کسب و کار خود را در بستر </p>
                            <p><a href="#" class="btn btn-primary" role="button">جزئیات</a> <a href="#" class="btn btn-default" role="button">باز نشر</a></p>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <img src="https://toplearn.com/img/course/img-course-%D8%B3%D9%87-%D8%B4%D9%86%D8%A8%D9%87-%DB%B5-%D8%AF%DB%8C-%DB%B1%DB%B3%DB%B9%DB%B6-54859757-1114.jpg" alt="...">
                        <div class="caption">
                            <h3>آموزش بوت استرپ (BootStrap) </h3>
                            <p>Bootstrap مجموعه ای از ابزارهای رایگان برای ایجاد صفحات وب و نرم افزارهای تحت وب است که شامل دستورات HTML، CSS و توابع جاوا اسکریپت جهت تولید و نمایش فرم ها، دکمه ها، تب ها، ستون ها و سایر المان های مورد نیاز طراحی وب می باشد.</p>
                            <p><a href="#" class="btn btn-primary" role="button">جزئیات</a> <a href="#" class="btn btn-default" role="button">باز نشر</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <img src="https://toplearn.com/img/course/img-course-%D8%AF%D9%88-%D8%B4%D9%86%D8%A8%D9%87-%DB%B2%DB%B7-%D8%A2%D8%B0%D8%B1-%DB%B1%DB%B3%DB%B9%DB%B6-57906034-1014.jpg" alt="...">
                        <div class="caption">
                            <h3> آموزش حرفه ای کار با Alexa  </h3>
                            <p> در دنیای پر رقابت امروز تحلیل و برسی رقبا یکی از مهمترین اقدامات محسوب می شود . وب سایت بزرگ الکسا که در  آوریل سال ۱۹۹۶ کار خود را شروع کرده روز به روز محبوبیتش را توسط کاربران خود افزایش داد . اگر شما هم جزو کسانی هستید که کسب و کار خود را در بستر </p>
                            <p><a href="#" class="btn btn-primary" role="button">جزئیات</a> <a href="#" class="btn btn-default" role="button">باز نشر</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 pull-right" id="sidebar" >

            <div class="panel panel-primary">
                <div class="panel-heading">حساب کاربری</div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل شما</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">کلمه عبور</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="کلمه عبور">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> مرا به خاطر بسپار
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">ورود به سایت</button>
                    </form>
                </div>
            </div>


            <div class="list-group">
                <a href="#" class="list-group-item active">
                    گروه های خبری
                </a>
                <a href="#" class="list-group-item">
                    <span class="badge">14</span>
                    هنری</a>
                <a href="#" class="list-group-item">
                    <span class="badge">14</span>
                    سیاسی</a>
                <a href="#" class="list-group-item">
                    <span class="badge">14</span>
                    اقتصادی</a>
                <a href="#" class="list-group-item">
                    <span class="badge">14</span>
                    هنری</a>
            </div>


            <div class="list-group">
                <a href="https://toplearn.com" class="list-group-item">
                    <h4 class="list-group-item-heading">تاپ لرن</h4>
                    <p class="list-group-item-text">مرجع فیلم های تخصصی برنامه نویسی</p>
                </a>


                <a href="https://topdev.ir" class="list-group-item">
                    <h4 class="list-group-item-heading">شبکه اجتماعی برنامه نویسان</h4>
                    <p class="list-group-item-text">
                        انجمن تخصصی مهندسان ایرانی
                    </p>
                </a>

                <a href="https://barnamenevisan.org" class="list-group-item">
                    <h4 class="list-group-item-heading">مرجع تخصصی برنامه نویسان</h4>
                    <p class="list-group-item-text">مرجع تخصصی برنامه نویسان</p>
                </a>
            </div>

        </div>

    </div>
    <div id="footer" class="row">
        <section class="container">
            <nav class=" col-lg-12  ">
                <ul class="breadcrumb">
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">ارتباط با ما</a></li>
                    <li><a href="#">پیوست</a></li>
                </ul>
            </nav>
        </section>

        </ul>


        </nav>

    </div>
</div>
</body>
</html>