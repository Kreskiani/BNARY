@extends('layouts.frontend')

@section('content')
	<main style="margin:10%">
		<div class="container">
			<section class="text-center mb-4">
				<div class="row justify-content-center">
					<div class="col">
						<h2>List Order</h2>
					</div>

					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th>#</th>
									<th>Harga Total</th>
									<th>Status</th>
									<th>Kode Pos</th>
									<th>Alamat Pengiriman</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{$order->id}}</td>
										<td>Rp. {{number_format($order->total_price)}}</td>
										<td>{{$order->status}}</td>
										<td>{{$order->zip_code}}</td>
										<td>{{$order->shipping_address}}</td>
										<td>
											<a href="{{route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-info">View Detail</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</main>
@endsection