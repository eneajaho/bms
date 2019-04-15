@extends('layout.layout')

@section('content')



    <div class="card uper mt-5">
        <div class="card-header">
            Shto tavolinë
        </div>
        <div class="card-body">

        @include('errors')

            <form method="post" action="/orders" onsubmit="submit.disabled = true; return true;">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Tavolina:</label>
                            <select name="table_id" id="table_id" class="form-control" required>
                                @foreach($tables as $table)
                                    @if($table->free == true)
                                        <option value="{{ $table->id }}">
                                            {{ $table->table_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Kamarieri:</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                @foreach($users as $id=>$user)
                                    <option value="{{ $id }}">
                                        {{ $user }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="product">Produkti:</label>

                            <select class="form-control" name="product_id">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" >{{$product->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="quantity">Sasia e produktit:</label>
                            <input type="text" class="form-control" name="quantity" required/>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Krijo porosi</button>
            </form>
        </div>
    </div>

@endsection
