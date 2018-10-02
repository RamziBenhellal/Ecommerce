@extends('layouts.app')
@section('content')
<div class="women_main">

	<!--//area-->
	<div class="col-md-7 skil">
		<div class="content-top-1">
			<div class="col-md-7 top-content">
				<h5>Category</h5>
				<p>category_name</p>
			</div>
			<div class="col-md-6 top-content1">
				<div id="demo-pie-1" class="pie-title-center" data-percent="27">
					<span class="pie-value">25%</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="content-top-1">
			<div class="col-md-7 top-content">
				<h5>Product</h5>
				<p>product_name</p>
			</div>
			<div class="col-md-6 top-content1">
				<div id="demo-pie-2" class="pie-title-center" data-percent="50">
					<span class="pie-value">50%</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5>Cards</h5>
				<label>3401</label>
			</div>
			<div class="col-md-6 top-content1">
				<div id="demo-pie-3" class="pie-title-center" data-percent="75">
					<span class="pie-value">75%</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-md-7 mid-content-top">
		<div class="middle-content">
			<h3>Latest Products</h3>
			<!-- start content_slider -->
			<div id="owl-demo" class="owl-carousel text-center">
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na1.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na2.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na1.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na2.jpg"
						alt="name">
				</div>
				<div class="item">
					<img class="lazyOwl img-responsive" data-src="images/na.jpg"
						alt="name">
				</div>

			</div>
		</div>
		<!--//sreen-gallery-cursual---->
		<!-- requried-jsfiles-for owl -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<script src="js/owl.carousel.js"></script>
		<script>
										$(document).ready(function() {
											$("#owl-demo").owlCarousel({
												items : 3,
												lazyLoad : true,
												autoPlay : true,
												pagination : true,
												nav:true,
											});
										});
									</script>
		<!-- //requried-jsfiles-for owl -->
	</div>
	<div class="clearfix"></div>

	
	</div>

@endsection