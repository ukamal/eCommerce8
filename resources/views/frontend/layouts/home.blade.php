
@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.slider')
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--------For Carousel ---------->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
	 body {
     background-color: #4A148C
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .card {
     position: relative;
     display: flex;
     width: 600px;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 11px;
     -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
     -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
     box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
 }

 .card .card-body {
     padding: 1rem 1rem
 }

 .card-body {
     flex: 1 1 auto;
     padding: 1.25rem
 }

 p {
     font-size: 0.875rem;
     margin-bottom: .5rem;
     line-height: 1.5rem
 }

 h4 {
     line-height: .2 !important
 }

 .items {
     width: 90%;
     margin: 0px auto;
     margin-top: 100px
 }

 .slick-slide {
     margin: 10px
 }

 .media iframe,
 .media-content {
     position: absolute;
     top: 0;
     bottom: 0;
     left: 0;
     right: 0;
     border: 0;
     border-radius: inherit;
     background-size: cover;
     background-repeat: no-repeat;
     background-position: 50% 50%;
     background-color: rgba(120, 120, 120, .1);
     display: flex;
     -webkit-box-pack: center;
     -ms-flex-pack: center;
     justify-content: center;
     -webkit-box-align: center;
     -ms-flex-align: center;
     align-items: center
 }

 .media-content:before {
     content: '';
     position: absolute;
     height: 10%;
     width: 90%;
     left: 5%;
     bottom: 0;
     background: inherit;
     background-position-y: 100%;
     filter: blur(10px)
 }

 .circle .media-content:before {
     width: 40%;
     left: 30%
 }

 .profile-image {
     width: 100%;
     height: 200px;
     border-top-left-radius: 11px !important;
     border-top-right-radius: 11px
 }

 .card-title {
     font-size: 19px;
     font-weight: 200
 }
 .carouselTitle h1{
 	text-shadow:0px 3px 2px red;
 }
 .carouselTitle i{
 	text-shadow:0px 3px 2px red;
 }



</style>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="{{route('product-list')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						All Products
					</a>

					@foreach ($categories as $category)
						<a href="{{route('category-wise-product',$category->category_id)}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">{{$category['category']['name']}}</a>       
					@endforeach
					
				</div>

			@include('frontend.layouts.search')
			
				<!-- Filter -->
				<div class="dis-none panel-filter w-full">
					<div class="wrap-filter flex-w w-full" style="background-color: #858585;">
				        <div>
				            <div style="padding: 20px; font-size: 25px; color: #fff">
				                Brands
				            </div>
				            <div style="padding: 0px 20px 20px 20px;">
								@foreach ($brands as $brand)
								<a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{route('brand-wise-product',$brand->brand_id)}}" class="filter-link stext-106 trans-04" style="color: #fff">
				                    {{$brand['brand']['name']}}
				                </a>
								@endforeach
				              
				            </div>
				        </div>
				    </div>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach ($products as $product)
					
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height: 200px" src="{{ url('public/upload/product_images/'.$product->image)}}" alt="IMG-PRODUCT">

							<a href="{{ route('product.details.info',[$product->id,$product->slug])}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Add to Card
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</a>

								<span class="stext-105 cl3">
									{{$product->price}} TK
								</span>
							</div>

						</div>
					</div>
				</div>
				@endforeach
			</div>
			{{$products->links()}}
			
		</div>
	</section>

	<!----------Carousel Area-------->
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center carouselTitle">
				<h1>Latest updates</h1>
				<i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="items">
		@foreach($carousels as $carousel)
	    <div class="card">
	        <div class="media media-2x1 gd-primary"> <img class="profile-image" src="{{ url('public/upload/carousel_image/'.$carousel->image)}}"> </div>
	        <div class="card-body">
	            <h5 class="card-title">{{ $carousel->short_title }}</h5>
	            <p class="card-text">"{{ $carousel->long_title }}"</p>
	        </div>
	    </div>
	    @endforeach
	    
	</div>


<script>
	$(document).ready(function(){
	$('.items').slick({
		dots: true,
		infinite: true,
		speed: 800,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 5,
		slidesToScroll: 4,
		responsive: [
			{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 2
			}
			},
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 1,
			slidesToScroll: 1
			}
			}

		]
		});
	});
</script>

@endsection




