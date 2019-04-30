@extends('layout.layout')

@section('cards')
    <div class="p-0"></div>
@endsection

@section('content')

    <div class="card uper mt-5">
        <div class="card-header">
            Shto artikull të ri
        </div>
        <div class="card-body">

            @include('errors')

            <form method="post" action="/products" onsubmit="submit.disabled = true; return true;">
                @csrf
                    <div class="p-2 row">
                        {{--Name--}}
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">Emri:</label>
                                <input type="text" class="form-control" name="product_name" required/>
                            </div>
                        </div>
                        {{--Category--}}
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">Kategoria:</label>
                                <select name="category_id" id="category" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--Barcode--}}
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="barcode">Barkodi:</label>
                                <input type="number" class="form-control" name="barcode" required/>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 row">
                        {{--Buying Price--}}
                        <div class="col-md-5 col-sm-12">
                            <div class="form-group">
                                <label for="price">Çmimi i blerjes:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="buying_price_per_unit" required/>
                                    <div class="input-group-append">
                                        <select name="unit" id="unit" class="form-control btn btn-outline-primary" required>
                                            <option value="L">Lekë / Litër</option>
                                            <option value="Kg">Lekë / Kilogram</option>
                                            <option value="Cope">Lekë / Copë</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Selling Price--}}
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="price">Çmimi i shitjes:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="selling_price_per_unit" required/>
                                </div>
                            </div>
                        </div>
                        {{--Buying Quantity--}}
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="quantity">Sasia e blerjes:</label>
                                <input type="number" class="form-control" name="quantity" required/>
                            </div>
                        </div>
                        {{--Tax--}}
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="tax">TVSH:</label>
                                <input type="number" class="form-control" name="tax" value="0" required/>
                            </div>
                        </div>
                    </div>


                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Shto</button>
            </form>
        </div>
    </div>

@endsection
