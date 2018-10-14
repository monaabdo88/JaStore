@extends('admin.layouts.master')
@section('page')
    Products
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.message')
            <div class="card">
                <div class="header">
                    <h4 class="title">All Products</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="25%">Desc</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td><img src="{{url('uploads').'/'.$product->image}}" alt="{{$product->name}}" class="img-responsive img-thumbnail"
                                             style="width: 100px"></td>
                                    <td>
                                        {{ Form::open(['route'=>['products.destroy',$product->id],'method'=>'DELETE']) }}
                                            {{ Form::button('<span class="fa fa-trash"></span>',['type'=>'submit','class'=>'btn btn-sm btn-danger','onclick'=>'return confirm("Are you sure you want to delete this product")']) }}
                                            {{link_to_route('products.edit','',$product->id,['class'=>'btn btn-info btn-sm ti-pencil-alt'])}}
                                            {{link_to_route('products.show','',$product->id,['class'=>'btn btn-sm btn-primary ti-view-list-alt'])}}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                   <div class="text-center col-md-offset-2 col-md-8"> {{$products->links()}}</div>
                </div>
            </div>
        </div>
    </div>

@endsection