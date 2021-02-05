@extends('front.layouts.master')

@section('content')
	

    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shopping Cart</h2>
    <hr>

    @if(Cart::instance('default')->count() > 0)

    	<h4 class="mt-5">{{Cart::instance('default')->count()}} item in Shopping Cart</h4>

    	<div class="cart-items">
        
        	<div class="row">
            
           	 <div class="col-md-12">
            	@include('front.layouts.message')
                
                <table class="table">
                    
                    <tbody>
                        @foreach(Cart::instance('default')->content() as $item)
	                        <tr>
	                            <td><img src="{{url('/uploads'.'/'.$item->model->image)}}" style="width: 5em"></td>
	                            <td>
	                                <strong>{{$item->model->name}}</strong><br>{{$item->model->description}}
	                            </td>
	                            
	                            <td>
	        						<form action="{{route('cart.destroy',$item->rowId)}}" method="post">
	        							@csrf
	        							@method('delete')
	                                <button type="submit" class="btn btn-link">Remove</button> 
	                                </form>
	                                
	                                <form action="{{ route('cart.savelater',$item->rowId) }}" method="post">
	                                	@csrf
	                                	<button type="submit" class="btn btn-link">Save for later</button>
	                                </form>

	                                

	                            </td>
	                            
	                            <td>
	                                <select name="" id="" class="form-control" style="width: 4.7em">
	                                    <option value="">1</option>
	                                    <option value="">2</option>
	                                </select>
	                            </td>
	                            
	                            <td>${{$item->total()}}</td>
	                        </tr>

                        @endforeach

                    </tbody>

                </table>

            	</div>   
            <!-- Price Details -->
                <div class="col-md-6">
                        <div class="sub-total">
                             <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td>Subtotal </td>
                                        <td>${{Cart::subtotal()}} </td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>${{Cart::tax()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>${{Cart::total()}}</th>
                                    </tr>
                             </table>           
                         </div>
                    </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="/front" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="/front/checkout" class="btn btn-outline-info">Proceed to checkout</a>
                <hr>

                </div>
    @else
    	<h3>There is no item in your cart</h3>
    	<a href="/front" class="btn btn-outline-dark">Continue Shopping</a>
    	<hr>
    @endif        

    @if(Cart::instance('saveForLater')->count() > 0)
                <div class="col-md-12">
                
                <h4>{{Cart::instance('saveForLater')->count()}} items Save for Later</h4>
                <table class="table">
                    
                    <tbody>
                        
                        @foreach(Cart::instance('saveForLater')->content() as $item)
	                        <tr>
	                            <td><img src="{{url('/uploads'.'/'.$item->model->image)}}" style="width: 5em"></td>
	                            <td>
	                                <strong>{{$item->model->name}}</strong><br>{{$item->model->description}}
	                            </td>
	                            
	                            <td>
	        						<form action="{{route('savelater.destroy',$item->rowId)}}" method="post">
	        							@csrf
	        							@method('delete')
	                                <button type="submit" class="btn btn-link">Remove</button> 
	                                </form>
	                                
	                                <form action="{{ route('moveToCart',$item->rowId) }}" method="post">
	                                	@csrf
	                                	<button type="submit" class="btn btn-link">Move to cart</button>
	                                </form>

	                                

	                            </td>
	                            
	                            <td>
	                                <select name="" id="" class="form-control" style="width: 4.7em">
	                                    <option value="">1</option>
	                                    <option value="">2</option>
	                                </select>
	                            </td>
	                            
	                            <td>${{$item->total()}}</td>
	                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>  

                </div>

    @endif            
            </div>
        
@endsection