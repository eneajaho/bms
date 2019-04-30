@extends('layout.layout')

@section('content')

    <script
        src="https://code.jquery.com/jquery-3.4.0.slim.min.js"
        integrity="sha256-ZaXnYkHGqIhqTbJ6MB4l9Frs/r7U4jlx7ir8PJYBqbI="
        crossorigin="anonymous"></script>

    <div class="card uper mt-5 mb-5">
        <div class="card-header">
            Krijo Porosi
        </div>

        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-2 mb-3 pb-3 border rounded">

                        <div class="card-header text-dark text-center">
                            Kategoritë
                        </div>
                        <div class="pt-2" id="categories">
                            @foreach($categories as $category)
                                <div cat_id="{{$category->id}}" class="btn btn-{{$category->color}} btn-lg btn-block mb-1 category hover">
                                    <i class="{{$category->logo}}"></i>  {{$category->category_name}}
                                </div>
                            @endforeach
                        </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3 pb-3 card">
                    <div class="card-header text-center">
                        Produktet
                    </div>

                    <div class="input-group mt-2 pl-1">
                        <input type="text" class="form-control" id="productName" onkeyup="searchProduct()" placeholder="Kërkoni" title="Kërkoni për produkt">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>

                    <div id="products" class="pt-2 cursor-pointer d-flex align-items-stretch justify-content-around align-content-center flex-wrap">

                        @foreach($products as $product)
                            <div id="add_product" class="btn-responsive col-md-5 col-sm-12 col-3-lg btn btn-{{$product->category->color}} btn-lg m-1 product" p_id="{{$product->id}}" p_price="{{$product->selling_price_per_unit}}" p_name="{{$product->product_name}}" p_cat="{{$product->category_id}}">
                               <span> {{$product->product_name}}  -  {{$product->selling_price_per_unit}} L </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 mb-3 pb-3 card">
                    <div class="card-header text-center">
                        Detaje
                    </div>
                    <div class="pt-2">
                        <form method="post" action="/orders" onsubmit="submit.disabled = true; return true;">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
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
                                <div class="col-6">
                                    <div class="form-group">
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

                            <table class="border table align-items-center table-flush mb-2" id="dynamic-field">
                                <tr class="order-details">
                                    <th></th>
                                    <th>Artikulli</th>
                                    <th>Sasia</th>
                                    <th>Cmimi</th>
                                    <th>Vlefta</th>
                                </tr>
                            </table>
       <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Krijo porosi</button>
                        </form>

                    </div>
                </div>
            </div>
            @include('errors')
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){

        let products = [];

        $(document).on('click', '#add_product', function(){
            // it works dont change anything
            let product_id = $(this).attr("p_id");
            let product_name = $(this).attr("p_name");
            let product_price = $(this).attr("p_price");
            let product_quantity = 1;

            if (products.includes(product_id)) {
                let quantity = document.getElementById('quantity'+product_id+'').value;
                document.getElementById('quantity'+product_id+'').value = parseInt(quantity, 10)+1;
            } else {
                products.push(product_id);
                $('#dynamic-field').append('' +
                    '<tr id="product'+product_id+'" class="order-details">' +
                    '<td><span id="'+product_id+'" remove="'+product_id+'" class="btn btn-sm btn-danger products-remove"><i class="fas fa-times"></i></span></td>'+
                    '<td><input class=" d-none form-control" name="product_id[]" value="'+product_id+'"/>'+product_name+'</td>' +
                    '<td><input onchange="input_changed(this)" type="number" min="1" id="quantity'+product_id+'" q="'+product_id+'" class="form-control input-quantity" name="quantity[]" value="'+product_quantity+'" required/></td>' +
                    '<td>'+product_price+' Lekë</td>' +
                    '<td><span id="qp'+product_id+'">'+product_quantity * product_price+'  Lekë </td>' +
                    '</tr>');
            }
        });

    $(document).on('click', '.products-remove', function(){
        let id = $(this).attr("remove");
        if (products.includes(id)) {
            let indexOfId = products.indexOf(id);
            products.splice(indexOfId,1);
            $('#product'+id+'').remove();
        }
    });


    $(document).on('click', '.category', function(){
        //it works dont change anything
        var id = $(this).attr("cat_id");
        var catId, container, product;
        container = document.getElementById("products");
        product = container.getElementsByClassName("product");
        for (let i = 0; i < product.length; i++) {
            catId = product[i].getAttribute("p_cat");
            if (catId.indexOf(id) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
        });

    });


    function input_changed(obj){

        var value = obj.value;
        console.log(value);
    }


    function searchProduct() {
        //it works dont change anything
        var input, filter, container, product, name;
        input = document.getElementById("productName");
        filter = input.value.toUpperCase();
        container = document.getElementById("products");
        product = container.getElementsByClassName("product");

        for (let i = 0; i < product.length; i++) {
            name = product[i].getElementsByTagName("span")[0].textContent;
            if (name.toUpperCase().indexOf(filter) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
    }

</script>

@endsection
