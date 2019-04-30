@extends('layout.layout')

@section('content')
    <div class="card shadow mb-5">
        <div class="card-header border-0">
            <h3 class="mb-0">Porosi&nbsp;&nbsp;<a href="/orders/create"> <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-plus"></i> Krijo Porosi</button></a>
            </h3>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            @foreach($orders as $order)
                @if($order->completed == false)
                    <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
                    <div class="card hoverable position-relative">
                        <span class="position-absolute d-none right-4 p-3 mt--2 rounded bg-red"></span>
                        <div class="card-body">
                            <h3 class="card-title text-center">{{ $order->table->table_name }} - <p class="d-none">@php $user_id = $order->user_id @endphp</p>
                                @if($user_id == 1)Geni
                                @elseif($user_id== 0)Enea
                                @elseif($user_id== 2)Esli
                                @endif</h3>

                                <table class="table border align-items-center table-flush">
                                    <tr class="order-details">
                                        <th>Artikulli</th>
                                        <th>Sasia</th>
                                        <th>Cmimi</th>
                                        <th>Vlera</th>
                                    </tr>
                                    @php($total_price = 0)
                                    @foreach($order->orderDetails as $key => $orderDetail)
                                        @if($key>2)
                                            <tr class="order-details">
                                                <td class="bg-gradient-cyan" colspan="4">Shiko me shume...</td>
                                            </tr>
                                            @break
                                        @endif
                                        <tr class="order-details">
                                            <td>{{ $orderDetail->product->product_name }}</td>
                                            <td>{{ $orderDetail->quantity }}</td>
                                            <td>{{ $orderDetail->product->selling_price_per_unit }}</td>
                                            <td>{{ $orderDetail->price }}</td>
                                        </tr>
                                        @php($total_price += $orderDetail->price)
                                    @endforeach
                                </table>
                                <div class="d-flex justify-content-center w-100 mt-1 align-items-center bg-secondary">
                                    <div class="row border p-2 w-100 d-flex justify-content-between">
                                        <div class="col-6 text-left"><strong>Totali</strong></div>
                                        <div class="col-6 text-right"><strong>= {{ $total_price }} Lekë</strong></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <form method="post" action="/orders/{{$order->id}}/pay" onsubmit="submit.disabled = true; return true;">
                                        @method('PATCH')
                                        @csrf

                                        <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fas fa-shopping-cart"></i>  Paguaj</button>
                                        <button class="btn btn-outline-default"><span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                            Faturë</button>
                                    </form>

                                </div>


                        </div>

                    </div>
                </div>
                @endif
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
