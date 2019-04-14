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

            <form method="post" action="/products">
                @csrf
                <div class="form-group">
                    <label for="name">Emri i produktit:</label>
                    <input type="text" class="form-control" name="product_name" required/>
                </div>
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
                <div class="form-group">
                    <label for="price">Çmimi i produktit:</label>
                    <input type="text" class="form-control" name="product_price" required/>
                </div>
                <div class="form-group">
                    <label for="quantity">Sasia e produktit:</label>
                    <input type="text" class="form-control" name="product_qty" required/>
                </div>
                <button type="submit" class="btn btn-primary">Shto</button>
            </form>
        </div>
    </div>

@endsection
