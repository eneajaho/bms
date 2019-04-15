@extends('layout.layout')

@section('content')



    <div class="card uper mt-5">
        <div class="card-header">
            Shto produkt të ri
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="/products" onsubmit="submit.disabled = true; return true;">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="name">Emri i produktit:</label>
                            <input type="text" class="form-control" name="product_name" required/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="name">Kategoria e produktit:</label>
                            <select name="category_id" id="category" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="barcode">Barkodi:</label>
                            <input type="number" class="form-control" name="barcode" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="price">Çmimi i produktit:</label>
                            <input type="text" class="form-control" name="price" required/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="quantity">Sasia e produktit:</label>
                            <input type="text" class="form-control" name="quantity" required/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">

                        <label for="unit">Njësia:</label>
                        <select name="unit" id="unit" class="form-control" required>
                            <option value="L">Litra</option>
                            <option value="Kg">Kilogram</option>
                            <option value="Cope">Copë</option>
                        </select>
                        </div>
                    </div>
                </div>







                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Shto</button>
            </form>
        </div>
    </div>

@endsection
