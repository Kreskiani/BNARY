@extends('layouts.frontend')

@section('content')
<!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form action="{{route('admin.orders.store')}}" method="POST" class="card-body">
            	@csrf

              <!--Grid row-->
              <div class="row">
              	@if(count($errors))
					<div class="form-group">
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)						
									<li>{{$error}}</li>	
								@endforeach
							</ul>
						</div>
					</div>
				@endif

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="address" name="shipping_address" class="form-control" placeholder="1234 Main St">
                <label for="address" class="">Address</label>
              </div>

              <!--address-2-->
              <div class="md-form mb-5">
                <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                <label for="address-2" class="">Address 2 (optional)</label>
              </div>

              <!--Grid row-->
              <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="country">Province</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option>Jakarta</option>
                    <option>Jawa Barat</option>
                    <option>Jawa Tengah</option>
                    <option>Jawa Timur</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="zip">Zip Code</label>
                  <input type="text" name="zip_code" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <hr>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ (null != (session('cart'))) ? count(session('cart')) : 0}}</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
          	@php
          		$total = 0;
          	@endphp
            @if(session('cart') != null)
                @foreach(session('cart') as $index => $row)
                    <?php $id = $index?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">{{$row['name']}} ( {{number_format($row['qty'])}} )</h6>
							<small class="text-muted">RepublicOfGamers Products</small>
						</div>
						<span class="text-muted">Rp. {{number_format($row['price'])}}</span>
					</li>
                    <?php $total = $total+($row['price']*$row['qty']) ?>
                @endforeach
            @endif
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (IDR)</span>
              <strong>Rp. {{number_format($total)}}</strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
@endsection