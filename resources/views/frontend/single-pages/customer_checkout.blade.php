@extends('frontend.layouts.master')
@section('content')

<style>
    
    
    * {
      box-sizing: border-box;
    }
    
    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }
    
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
    
    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
    
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
    
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
    
    
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    label {
      margin-bottom: 10px;
      display: block;
    }
    
    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }
    
    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
    
    .btn:hover {
      background-color: #45a049;
    }
    
    a {
      color: #2196F3;
    }
    
    hr {
      border: 1px solid lightgrey;
    }
    
    span.price {
      float: right;
      color: grey;
    }
    
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to 
    each other (also change the direction - make the "cart" column go on top) */

    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>

<!-- Product -->
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('public/frontend/images/bg.png') }}');">
        <h2 class="ltext-105 cl0 txt-center">
          Shipping Address
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
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form action="{{route('customer-check-store')}}" method="post" id="checkOut">
            @csrf
          
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="name"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="name" name="name" placeholder="John M. Doe">
                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>

                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">

                <label for="mobile_no"><i class="fa fa-address-card-o"></i> Mobile No</label>
                <input type="text" id="mobile_no" name="mobile_no" placeholder="+1-202-555-0183">
                <font style="color: red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>

                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
              </div>
              <input type="submit" value="Submit" class="btn">
              
          </form>
        </div>
       </div>
    </div>
</section>	

<script>
  $(function () {
      $('#checkOut').validate({
          rules: {
              name: {
                  required: true,
                  name: true,
              },
              mobile_no: {
                  required: true,
                  mobile_no: true,
              },
              address: {
                  required: true,
                  address: true,
              },
          },
          messages: {
            name: {
                  required: "Please enter a real full name",
              },
              mobile_no: {
                  required: "Please enter a valid number",
              },
              address: {
                  required: "Please enter a email address",
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
