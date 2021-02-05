@extends('front.layouts.master')

@section('content')
	<div class="row">
		
        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">

                    <h2 class="card-title">Login</h2>
                    <hr>
                    @if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>
										{{$error}}
									</li>
								@endforeach
							</ul>
						</div>
					@endif
                    <form action="/front/user/login" method="post">
                    	@csrf

                        <div class="form-group">
                            <label for="email_id">Email:</label>
                            <input type="email" name="email_id" placeholder="Email" id="email_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="passowrd"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Login</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>
@endsection