@extends('front.layouts.master')

@section('content')
	<div class="row">

        <div class="col-md-12" id="edit">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Edit User details</h2>
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('user.update',$users->id)}}" method="post">
                        @csrf
                        @include('front.layouts.message')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{$users->name}}">
                        </div>

                        <div class="form-group">
                            <label for="email_id">Email:</label>
                            <input type="text" name="email_id" placeholder="Email" id="email_id" class="form-control" value="{{$users->email_id}}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" placeholder="Address" id="address" class="form-control" >{{$users->address}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info col-md-2"> Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
@endsection