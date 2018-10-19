@extends('front.layouts.master')
@section('content')
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h5 class="display-3"><strong>Welcome,</strong></h5>
        <p class="display-4"><strong>SALE UPTO 50%</strong></p>
        <p class="display-4">&nbsp;</p>
        <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
    </header>
    @if(session()->has('msg'))
        <div class="alert alert-success">
            <p class="text-center">{{session()->get('msg')}}</p>
        </div>
    @endif
    <!-- Page Features -->
    <div class="row text-center">

        @if($products)
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{url('uploads').'/'.$product->image}}" alt="{{$product->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">
                                {{str_limit($product->description,100,'')}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <strong>${{$product->price}}</strong> &nbsp;
                            <form action="{{url('/cart')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="price" value="{{$product->price}}" >
                                <input type="hidden" name="user" value="">
                            <button type="submit" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                                Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif



    </div>
    <!-- /.row -->
@endsection