@extends('admin.layouts.master')
@section('page')
    Add Product
    @endsection
@section('content')
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                            </div>
                            <div class="content">
                                @include('admin.layouts.message')
                                {{Form::open(['url'=>'products','files'=>'true'])}}
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('admin.products._fields')
                                    </div>
                                </div>
                                    <div class="">
                                        {{Form::submit('Add Product',['class'=>'btn btn-info btn-fill btn-wd'])}}
                                    </div>
                                    <div class="clearfix"></div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
       @endsection