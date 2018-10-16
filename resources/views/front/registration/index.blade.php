@extends('front.layouts.master')

@section('content')

    <div class="row">

    <div class="col-md-12" id="register">

        <div class="card col-md-8">
            <div class="card-body">
                <h2 class="card-title">Sign Up</h2>
                <hr>
                <form action="/user/register" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control {{$errors->has('name') ? 'alert-danger':''}}">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Email" id="email" class="form-control {{$errors->has('email') ? 'alert-danger':''}}">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control {{$errors->has('password') ? 'alert-danger':''}}">
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'alert-danger':''}}">
                        @if($errors->has('password_confirmation'))
                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" placeholder="Address" id="address" class="form-control {{$errors->has('address') ? 'alert-danger':''}}"></textarea>
                        @if($errors->has('address'))
                            <p class="text-danger">{{$errors->first('address')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection
