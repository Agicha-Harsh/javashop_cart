@extends('front.layouts.master')

@section('content')
	<h1>Profile</h1>
	<hr>
    @include('front.layouts.message')
	<h3>User Details</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th colspan="2">
					User Details <form action="{{ route('user.edit',$users->id) }}" method="post">                                        @csrf

                                        <button type="submit" class="btn btn-link pull-right">Edit User</button>
                                    </form>
				</th>
			</tr>
		</thead>
		<tr>
			<th>ID</th>
			<td> {{ $users->id }} </td>
		</tr>
		<tr>
			<th>Name</th>
			<td> {{ $users->name }} </td>
		</tr>
		<tr>
			<th>Email</th>
			<td> {{ $users->email_id }} </td>
		</tr>
		<tr>
			<th>Address</th>
			<td> {{ $users->address }} </td>
		</tr>
		<tr>
			<th>Registered At</th>
			<td> {{ $users->created_at->diffForHumans() }} </td>
		</tr>
	</table>
	
                            
                            <h4 class="title">Orders</h4>
         					<hr>                       
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users->order as $order)    
                                        <tr>
                                            <td> {{ $order->id }} </td>
                                            <td>{{ $order->user->name }}</td>                       
                                            <td>
                                            @foreach($order->products as $item)
                                                {{ $item->name }}    
                                            @endforeach
                                            </td>
                                            <td>
                                            @foreach($order->orderitems as $item)
                                                {{ $item->quantity }}    
                                            @endforeach
                                            </td>                                            
                                            <td>
                                                @if($order->status)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                            	<a href=" {{ url('/front/user/order'.'/'.$order->id) }} " class="btn btn-outline-dark btn-sm">Details</a>
                                            </td>
                                            
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            
@endsection