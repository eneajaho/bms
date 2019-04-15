@extends('layout.layout')

@section('content')
    <div class="card shadow mb-5">
        <div class="card-header border-0">
            <h3 class="mb-0">Porosi&nbsp;&nbsp;<a href="/orders/create"> <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-plus"></i> Krijo Porosi</button></a>
            </h3>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            @foreach($orders as $order)
                <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
                    <div class="card hoverable">
                        <div class="card-body">
                            <h3 class="card-title text-center">{{ $order->table->table_name }}</h3>
                            <h3 class="card-title">Kamarieri:
                               <p class="d-none">@php $user_id = $order->user_id @endphp</p>
                                @if($user_id == 1)
                                    Geni
                                @elseif($user_id== 0)
                                    Enea
                                @elseif($user_id== 2)
                                    Esli
                                @endif
                            </h3>

                            {{--<h3 class="card-title text-center">{{$order->orderDetails }}</h3>--}}

                            <div class="lead">Produktet:</div>

                            @foreach($order->orderDetails as $orderDetail)

                                {{ $orderDetail->product->product_name }} x {{ $orderDetail->quantity }} = {{ $orderDetail->price }} Lekë

                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>

@endsection


{{--<div class="col-md-6 col-sm-12 col-lg-4 mb-4">--}}
    {{--<div class="card hoverable">--}}
        {{--<div class="rounded-circle mt-2  m-auto tables-icon d-flex justify-content-center align-content-center align-items-center">--}}
            {{--<i class="fas fa-utensils"></i>--}}
            {{--<span class="table-size bg-primary" data-toggle="tooltip" data-placement="top" title="{{ $order->id }} vende">{{ $order->id }}</span>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
            {{--<h3 class="card-title text-center">{{ $order->order_name }}</h3>--}}
            {{--<div class="d-flex flex-wrap justify-content-center">--}}
                {{--<a href="/orders/{{ $order->id }}/edit" class="btn btn-primary mb-2"><i class="far fa-edit"></i> Modifiko</a>--}}
                {{--<form action="/orders/{{ $order->id }}" method="post">--}}
                    {{--@csrf--}}
                    {{--@method('DELETE')--}}
                    {{--<button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Fshi</button>--}}
                {{--</form>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
