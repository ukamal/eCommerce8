@extends('frontend.layouts.master')
@section('content')

<style>
	.sss{
		float: left;
	}
	.s888{
		height: 42px;
		margin-top: 0px;
	}
</style>

<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('public/frontend/images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Payment Method
		</h2>
	</section>
		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th>Product Name</th>
								<th>Product Image</th>
								<th>Product Size</th>
								<th>Product Color</th>
								<th>Product Price</th>
								<th>Product Quantity</th>
								<th>Total Price</th>
								<th>Action</th>
							</tr>

							@php
								$contents = Cart::content();	
								$total = '0';
							@endphp
							{{-- @dd($contents->toArray()) --}}
							@foreach($contents as $content)
							<tr class="table_row">
								<td>{{$content->name}}</td>
								<td>
									<div class="how-itemcart1">
										<img style="width:100%!important" src="{{asset('public/upload/product_images/'.$content->options->image)}}" alt="product-image">
									</div>
								</td>
								<td>{{$content->options->size_name}}</td>
								<td>{{$content->options->color_name}}</td>
								<td>$ {{$content->price}}</td>
								<td>
									<form action="{{route('update-cart')}}" method="post">
										@csrf
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="{{$content->qty}}" form-control>
											<input type="hidden" name="rowId" value="{{$content->rowId}}">
											<input type="submit" value="Update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn-3 p-lr-15 trans-04 pointer m-tb-10">
										</div>
									</form>
								</td>
								<td>$ {{$content->subtotal}}</td>
								<td>
									<a href="{{route('delete-cart',$content->rowId)}}" title="Remove" class="btn btn-danger btn-sm">
										<i class="fa fa-times"></i>
									</a>
								</td>
								@php
									$total += $content->subtotal;
								@endphp
							</tr>
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>Grand Total:</strong></td>
                                <td><strong> Tk: {{$total}} </strong></td>
                            </tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-3">
                    <h3>Payment Method ></h3>
                </div>
                <div class="col-md-6">
                    <form action="{{route('customer-payment-store')}}" method="post" id="">
                        @csrf

						@if(Session::get('message'))
						<div class="alert alert-danger dissmissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>{{Session::get('message')}}</strong>
						</div>
						@endif

                        <input type="hidden" name="order_total" value="{{$total}}">
                        <select name="payent_method" id="payent_method" class="form-control">
                            <option value="">Select Payment Method</option>
                            <option value="Hand Cash">Hand Cash</option>
                            <option value="Bkash">Bkash</option>
                        </select>
						<font style="color: red">{{($errors->has('payent_method'))?($errors->first('payent_method')):''}}</font>
                        <div class="show_field" style="display: none">
                            <span>Bkash no is: 01910000000</span>
                            <input type="text" name="transaction_no" class="form-control" placeholder="Write Trasaction no">
                        </div>
						{{-- @dd(Session::get('shipping_id')) --}}
                        <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</div>

    <script type="text/javascript">
    $(document).on('change','#payent_method',function(){
        var payent_method = $(this).val();
        if(payent_method == 'Bkash'){
            $('.show_field').show();
        }else{
            $('.show_field').hide();
        }
    });
    </script>

@endsection