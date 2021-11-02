@extends('frontend.layouts.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('public/frontend/images/bg.png') }}');">
				<h2 class="ltext-105 cl0 txt-center">
					About Us
				</h2>
			</section>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<!-- Content page -->
<section class="about_us bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3 style="border-bottom: 1ps solid #000;">
				About Us
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis quibusdam repudiandae, eaque facere ducimus sunt velit esse nihil consequatur obcaecati voluptates itaque vitae autem molestiae dolor tempore delectus laboriosam? Commodi.</p>
			</div>
		</div>
	</div>
</section>	


@endsection
