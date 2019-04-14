
@extends('layout.layout')

@section('content')

    <div class="card uper mt-5">
        <div class="card-header">
            Modifiko produktin
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


            <form method="post" action="/products/{{ $product->id }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Emri i produktit:</label>
                    <input type="text" class="form-control" name="product_name" value={{ $product->product_name }} required />
                </div>
                <div class="form-group">
                    <label for="name">Kategoria:</label>

                    <select name="category_id" id="category_id" class="form-control" required>

                        {{ $category_id = $category->id }}
                        @foreach($categories as $category)
                            <option  {{ $category->id == $category_id ? 'selected="selected"': ''}}   value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Çmimi i produktit:</label>
                    <input type="text" class="form-control" name="product_price" value={{ $product->product_price }} required />
                </div>
                <div class="form-group">
                    <label for="quantity">Sasia:</label>
                    <input type="text" class="form-control" name="product_qty" value={{ $product->product_qty }} required />
                </div>
                <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> Modifiko</button>
            </form>
        </div>
    </div>
@endsection
