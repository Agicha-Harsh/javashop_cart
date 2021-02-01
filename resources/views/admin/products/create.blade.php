@extends('admin.layouts.master')

@section('page')
	Add Products
@endsection

@section('content')
	<div class="row">
                    <div class="col-lg-10 col-md-10">
                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                            </div>

                            
                            <div class="content">
                                {!! Form::open(['url' => 'admin/products' , 'files'=>'true']) !!}
                                    <div class="row">
                                        @include('admin.products._fields')

                                        </div>

                                    </div>
                                    <div class="">
                                    	{{ Form::submit('Add Product',['class'=>'btn btn-primary']) }}
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection