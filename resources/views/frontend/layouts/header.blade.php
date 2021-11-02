<style>
	ul.social {
    	float: right;
	}
	ul.social li a {
	    color: #fff;
	}
</style>

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
						
						<div class="left-top-bar">
							<font size="3px" color="#fff">
		                        {{$socials->mobile}} &nbsp;&nbsp;&nbsp;
		                        {{$socials->email}}
		                    </font>
						</div>
					</div>

					<div class="col-md-6">
						<ul class="social">
	                        <li class="facebook"><a target="_blank" href="{{$socials->facebook}}"><i class="fa fa-facebook"></i></a></li>
	                        <li class="linkedin"><a target="_blank" href="{{$socials->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
	                        <li class="twitter"><a target="_blank" href="{{$socials->twitter}}"><i class="fa fa-twitter"></i></a></li>
	                        <li class="youtube"><a target="_blank" href="{{$socials->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
	                    </ul>
					</div>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ url('public/upload/logo_image/'.$logo->image)}}" alt="logo">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{ url('/') }}">HOME</a>
                        </li>
                        <li class="active-menu">
                            <a href="#">SHOPS</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('product-list')}}">Products</a></li>

                                @if (@Auth::user()->id != NULL && Session::get('shipping_id') ==NULL)
								<li>
									<a href="{{route('customer-checkout')}}">Checkout</a>
								</li>
								@elseif(@Auth::user()->id != NULL && Session::get('shipping_id') !=NULL)
								<li>
									<a href="{{route('customer-payment')}}">Checkout</a>
								</li>
								@else
								<li>
									<a href="{{route('customer-login')}}">Checkout</a>
								</li>
								@endif

                                <li><a href="{{ route('shoping-cart') }}">Cart</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}">ABOUT US</a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us') }}">CONTACT US</a>
                        </li>

                        @if (@Auth::user()->id !=NULL && @Auth::user()->usertype== 'customer')
						<li class="active-menu">
							<a href="#"> <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i> My Accounts</a>
							<ul class="sub-menu">
								<li><a href="{{route('customer-dashboard')}}">My Profile</a></li>
								<li><a href="{{route('cus-order-list')}}">My Orders</a></li>
								<li><a href="{{route('customer-pass-change')}}">Password Change</a></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									 {{ __('Logout') }}
								 </a>
								 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									 @csrf
								 </form>
								</li>
							</ul>
						</li>
						@else
						<li><a href="{{ route('customer-login') }}"> <i class="fa fa-user"></i> LOGIN</a></li>/
						<li><a href="{{ route('customer-signup') }}">REGISTER</a></li>
						@endif
                    </ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="#"><img src="{{ url('public/upload/logo_image/'.$logo->image)}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        {{$socials->mobile}} &nbsp;&nbsp;&nbsp;
		                    {{$socials->email}}com
	                    </font>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<ul class="social">
							<li class="facebook"><a target="_blank" href="{{$socials->facebook}}"><i class="fa fa-facebook"></i></a></li>
	                        <li class="linkedin"><a target="_blank" href="{{$socials->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
	                        <li class="twitter"><a target="_blank" href="{{$socials->twitter}}"><i class="fa fa-twitter"></i></a></li>
	                        <li class="youtube"><a target="_blank" href="{{$socials->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
	                    </ul>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li>
				<a href="">SHOPS</a>
				<ul class="sub-menu-m">
					<li><a href="{{route('product-list')}}">Products</a></li>

					@if (@Auth::user()->id != NULL && Session::get('shipping_id') ==NULL)
					<li>
						<a href="{{route('customer-checkout')}}">Checkout</a>
					</li>
					@elseif(@Auth::user()->id != NULL && Session::get('shipping_id') !=NULL)
					<li>
						<a href="{{route('customer-payment')}}">Checkout</a>
					</li>
					@else
					<li>
						<a href="{{route('customer-login')}}">Checkout</a>
					</li>
					@endif

                    <li><a href="{{ route('shoping-cart') }}">Cart</a></li>
				</ul>
				<span class="arrow-main-menu-m">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</span>
			</li>
			<li>
                <a href="{{ route('about-us') }}">ABOUT US</a>
            </li>
            <li>
                <a href="{{ route('contact-us') }}">CONTACT US</a>
            </li>
			@if (@Auth::user()->id !=NULL && @Auth::user()->usertype=='customer')
			<li>
				<a href="">Accounts</a>
				<ul class="sub-menu-m">
					<li><a href="{{route('customer-dashboard')}}">My Profile</a></li>
					<li><a href="{{route('cus-order-list')}}">My Orders</a></li>
					<li><a href="{{route('customer-pass-change')}}">Password Change</a></li>
                    <li>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				</ul>
				<span class="arrow-main-menu-m">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</span>
			</li>
			@else
			<li><a href="{{ route('customer-login') }}">LOGIN</a></li>
			@endif
            
		</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				@php
					$contents = Cart::content();
					$total = '0';
				@endphp
				<ul class="header-cart-wrapitem w-full">
					@foreach ($contents as $content)
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{asset('public/upload/product_images/'.$content->options->image)}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{$content->name}}
							</a>

							<span class="header-cart-item-info">
								{{$content->qty}} X {{$content->price}} Tk
							</span>
						</div>
					</li>
					@php
						$total += $content->subtotal;
					@endphp
					@endforeach

				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Grand Total: {{$total}}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{route('shoping-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						@if (@Auth::user()->id != NULL && Session::get('shipping_id') ==NULL)
						<a href="{{route('customer-checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
						@elseif(@Auth::user()->id != NULL && Session::get('shipping_id') !=NULL)
						<a href="{{route('customer-payment')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
						@else 
						<a href="{{route('customer-login')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
						@endif
						
					</div>
				</div>
			</div>
		</div>
	</div>
