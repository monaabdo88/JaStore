@extends('admin.layouts.master')
@section('page')
    Orders List
    @endsection
@section('content')
                <div class="row">

                    <div class="col-md-12">
                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders</h4>
                                <p class="category">List of all orders</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orders)
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>
                                                    @foreach($order->products as $item)
                                                        {{$item->name}}
                                                        @endforeach
                                                </td>
                                                <td>
                                                    @foreach($order->orderitems as $item)
                                                        {{$item->quantity}}
                                                    @endforeach
                                                </td>
                                                <td>{{$order->address}}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <span class="label label-warning">Pending</span>
                                                    @else
                                                        <span class="label label-success">Confirmed</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($order->status == 1)
                                                        {{ link_to_route('order.pending','Pending',$order->id,['class'=>'btn btn-warning btn-sm']) }}
                                                    @else
                                                        {{ link_to_route('order.confirm','Confirm',$order->id,['class'=>'btn btn-success btn-sm']) }}
                                                    @endif
                                                    {{link_to_route('orders.show','',$order->id,['class'=>'btn btn-sm btn-primary ti-view-list-alt'])}}
                                                    <button class="btn btn-sm btn-success ti-close"
                                                            title="Cancel Order"></button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
@endsection