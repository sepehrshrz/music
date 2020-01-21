<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title> فروشگاه اینترنتی دیجی کالا</title>
	<!--START-----------------------main-->
	<script src="<?= url('script/jquery-1.11.1.min.js')?>"></script>
	<script src="<?= url('script/script.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= url('style/style.css')?>">
	<!--END-------------------------main-->
	<!--START-----------------------listproduct-->
	<script src="<?= url('script/listproduct/main.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= url('style/listproduct/styles.css')?>">
	<!--END-------------------------listproduct-->
	<!--START-----------------------font-awesome.min-->
	<link rel="stylesheet" type="text/css" href="<?= url('font/font-awesome-4.3.0/font-awesome-4.3.0/css/font-awesome.css')?>">
	<!--END-------------------------font-awesome.min-->
	<!--START-----------------------slider-->
	<script src="<?= url('script/slider/ddsmoothmenu.js')?>"></script>
	<script src="<?= url('script/slider/jquery.flexslider.js')?>"></script>
	<script src="<?= url('script/slider/common.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= url('style/slider/home_flexslider.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= url('style/slider/style.css')?>">
	<!--END-------------------------slider-->
	<!-------------------------------------->

	<!-------------------------------------->
</head>
<body>
<div class="main">
	<div class="main_top">
		<div class="main_top_top_right">
			<div class="main_top_top_right_top">
				<p><i class="fa fa-sign-in" style="float:right; font-size:20px; margin-left:10px; margin-top:-0.4%; "></i><a target="_blank" href="login.html" >سلام , به حساب کاربری خود وارد شوید</a></p>
				<p><i class="fa fa-user-plus" style="float:right; font-size:18px; margin-left:10px; margin-top:-0.7%; "></i> <a target="_blank" href="registration.html"> ثبت نام کنید </a></p>
			</div>
			<!--main_top_top_right_top-->
			<div class="main_top_top_right_bottom">
				<a href="cart.php"><div class="cart_box">
						<div class="cart_box_icon"> <i class="fa fa-cart-arrow-down"></i> </div>
						<!--cart_box_icon-->

						<!--cart_box_name-->
						<div class="cart_factor">
							<p>0</p>
						</div>
						<!--cart_box_count-->
					</div></a>
				<!--cart_box-->
				<input type="text" class="search_box" placeholder="محصول ، دسته یا برند مورد نظرتان را جستجو کنید ...">
				<div class="icon"> <i class="fa fa-search"></i> </div>
				<!--icon-->
			</div>
			<!--main_top_top_right_bottom-->
		</div>
		<!--main_top_top_right-->
		<div class="main_top_top_left">
			<a href="index.html"><div class="logo"> </div></a>
			<!--logo-->
		</div>
		<!--main_top_top_left-->
		<div class="main_top_bottom">
			<ul>
				<li> <i class="fa fa-angle-down" style="font-size:17px; margin-right:13px"></i> انواع موبایل
					<ul>
						<li> اپل </li>
						<li>  سامسونگ </li>
						<li> سونی </li>
						<li> الجی </li>
					</ul>
				</li>
				<li> <i class="fa fa-angle-down" style="font-size:17px; margin-right:13px"></i> لپ  تاب
					<ul>
						<li>سونی</li>
						<li>hp</li>
						<li>ایسوس</li>
						<li>اپل</li>
					</ul>
				</li>
				<li> <i class="fa fa-angle-down" style="font-size:17px; margin-right:13px"></i> تبلت
					<ul>
						<li>ایپد</li>
						<li>گلگسی تب</li>
						<li>هوآوی</li>
						<li>فبلت</li>
					</ul>
				</li>
				<li> <i class="fa fa-angle-down" style="font-size:17px; margin-right:13px"></i> قطعات کامپیوتر
					<ul>
						<li>رم</li>
						<li>گرافیک</li>
						<li>مادربرد</li>
						<li>پاور</li>
					</ul>
				</li>
				<li> <i class="fa fa-angle-down" style="font-size:17px; margin-right:13px"></i> قطعات جانبی
					<ul>
						<li> فلش </li>
						<li> هارد اکسترنال</li>
						<li> کابل </li>
					</ul>
				</li>
			</ul>
		</div>
		<!--main_top_bottom-->
	</div>


		<!--main_top-->
		@yield('content')

		<!--main_content-->
		<div class="main_bottom">
			<div class="top">
				<ul>
					<li><a href="index.html"> صفحه اصلی</a></li>
					<li><a href="user_panel.html"> پنل کاربری</a></li>
					<li><a href="login.html"> ورود </a></li>
					<li><a href="registration.html"> ثبت نام </a></li>
					<li><a href="cart.html"> سبد خرید </a></li>
				</ul>
			</div><!--top-->
			<div class="bottom">
				<div class="right"><p>طراحی شده توسط خانوم تاجیک (رشته ی مهندسی فناوری اطلاعات و ارتباطات موسسه روزبه)</p></div>
			</div>
		<!--main_bottom--></div>
	<!--main--></div>







</body>
</html>