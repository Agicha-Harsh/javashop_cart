@extends('front.layouts.master')

@section('content')
	<h3>User order details</h3>
	<hr>
	<div class="row">

        <div class="col-md-12">
            <div class="card">
               
                <div class="content table-responsive table-full-width">
                    <table class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        		<th colspan="6">Order Details</th>
                        	</tr>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    @if ($order->status)
                                        <span class="badge badge-success">Confirmed</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                
                <div class="content table-responsive table-full-width">
                    <table class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        		<th colspan="2">User Details</th>
                        	</tr>
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->user->email_id }}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td>{{ $order->user->created_at->diffForHumans() }}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="card">
                
                <div class="content table-responsive table-full-width">
                    <table class="table table-bordered table-striped">
                    	<tr>
                        		<th colspan="5">Product Details</th>
                        	</tr>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->quantity }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em"></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('/front/user/profile') }}" class="btn btn-outline-success">Back to Profile</a>
@endsection