
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


            <form method="post" action="/products/{{ $product->id }}" onsubmit="submit.disabled = true; return true;">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="name">Emri i produktit:</label>
                            <input type="text" class="form-control" name="product_name" value={{ $product->product_name }} required />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
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
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="barcode">Barkodi:</label>
                            <input type="number" class="form-control" value={{ $product->barcode }} name="barcode" required/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="price">Çmimi i produktit:</label>
                            <input type="text" class="form-control" name="price" value={{ $product->price }} required />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="quantity">Sasia e produktit:</label>
                            <input type="text" class="form-control" name="quantity" value={{ $product->quantity }} required/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="unit">Njësia:</label>
                            <select name="unit" id="unit" class="form-control" required>
                                @php $type = $product->unit @endphp
                                <option {{ $type == 'L' ? 'selected="selected"': ''}} value="L">Litra</option>
                                <option {{ $type == 'Kg' ? 'selected="selected"': ''}} value="Kg">Kilogram</option>
                                <option {{ $type == 'Cope' ? 'selected="selected"': ''}} value="Cope">Copë</option>
                            </select>
                        </div>
                    </div>
                </div>


                <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-edit"></i> Modifiko</button>
            </form>
        </div>
    </div>
@endsection
