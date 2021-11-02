@extends('frontend.layouts.master')
@section('content')

<!-- Title page -->
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('public/frontend/images/bg.png') }}');">
				<h2 class="ltext-105 cl0 txt-center">
					Contact US
				</h2>
			</section>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</section>
<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form method="post" action="{{route('info-store')}}" id="myForm">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Name <span style="color: red;font-weight: bold;">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Write Your Name">
								<font color="red">{{($errors->has('name'))? ($errors->first('name')) : ''}}</font>
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email <span style="color: red;font-weight: bold;">*</span></label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Write Your Email">
								<font style="color: red">{{($errors->has('email'))?($errors->first('email')) : ''}}</font>
							</div>
							<div class="form-group col-md-6">
								<label for="mobile">Mobile No <span style="color: red;font-weight: bold;">*</span></label>
								<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Write Your Mobile No">
								<font color="red">{{($errors->has('mobile'))? ($errors->first('mobile')) : ''}}</font>
							</div>
							<div class="form-group col-md-6">
								<label for="address">Address <span style="color: red;font-weight: bold;">*</span></label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Write Your Address">
								<font color="red">{{($errors->has('address'))? ($errors->first('address')) : ''}}</font>
							</div>
							<div class="form-group col-md-12">
								<label for="message">Message <span style="color: red;font-weight: bold;">*</span></label>
								<textarea name="message" class="form-control" id="message" placeholder="Write Your Message" rows="5"></textarea>
								<font color="red">{{($errors->has('message'))? ($errors->first('message')) : ''}}</font>
							</div>
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary">Send Message</button>
							</div>
						</div>
					</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							{{ $socials->address }}
						</span>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Lets Talk
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							{{ $socials->mobile }}
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sale Support
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							{{ $socials->email }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	

<!-- Map -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3746984.465708819!2d88.10026026270491!3d23.490583053663357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2z4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2!5e0!3m2!1sbn!2sbd!4v1630498567296!5m2!1sbn!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div><br/>


 <script>
      $(function () {
          $('#myForm').validate({
              rules: {
                  name: {
                      required: true,
                      name: true,
                  },
                  email: {
                      required: true,
                      email: true,
                  },
                  mobile: {
                      required: true,
                      minlength: 8
                  },
                  address: {
                      required: true,
                      minlength: 8
                  },
                  message: {
                      required: true,
                      minlength: 8
                  },
              },
              messages: {
                  name: {
                      required: "Please enter a valid name",
                  },
                  email: {
                      required: "Please enter a vaild email address",
                      email: "Please enter a vaild email address"
                  },
                  mobile: {
                      required: "Please provide your valid mobile no",
                  },
                  address: {
                      required: "Please provide Your address",
                  },
                  message: {
                      required: "Please share your opinion.",
                  },
                  terms: "Please accept our terms"
              },
              errorElement: 'span',
              errorPlacement: function (error, element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              },
              highlight: function (element, errorClass, validClass) {
                  $(element).addClass('is-invalid');
              },
              unhighlight: function (element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
              }
          });
      });
  </script>
    
@endsection