@extends('layout.layout')

@section('cards')
        {{--<div class="container-fluid pt-3">--}}
            {{--<div class="header-body">--}}
                {{--<!-- Card stats -->--}}
                {{--<div class="row">--}}
                {{--<div class="col-xl-3 col-lg-6">--}}
                    {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>--}}
                                    {{--<span class="h2 font-weight-bold mb-0">350,897</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-auto">--}}
                                    {{--<div class="icon icon-shape bg-danger text-white rounded-circle shadow">--}}
                                        {{--<i class="fas fa-chart-bar"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                {{--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
                                {{--<span class="text-nowrap">Since last month</span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xl-3 col-lg-6">--}}
                    {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<h5 class="card-title text-uppercase text-muted mb-0">New users</h5>--}}
                                    {{--<span class="h2 font-weight-bold mb-0">2,356</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-auto">--}}
                                    {{--<div class="icon icon-shape bg-warning text-white rounded-circle shadow">--}}
                                        {{--<i class="fas fa-chart-pie"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                {{--<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>--}}
                                {{--<span class="text-nowrap">Since last week</span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xl-3 col-lg-6">--}}
                    {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>--}}
                                    {{--<span class="h2 font-weight-bold mb-0">924</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-auto">--}}
                                    {{--<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">--}}
                                        {{--<i class="fas fa-users"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                {{--<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
                                {{--<span class="text-nowrap">Since yesterday</span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xl-3 col-lg-6">--}}
                    {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>--}}
                                    {{--<span class="h2 font-weight-bold mb-0">49,65%</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-auto">--}}
                                    {{--<div class="icon icon-shape bg-info text-white rounded-circle shadow">--}}
                                        {{--<i class="fas fa-percent"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                {{--<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>--}}
                                {{--<span class="text-nowrap">Since last month</span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
@endsection

@section('content')


    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header border-0">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-12 mb-sm-2">
                            <h3 class="mb-0">Artikuj në magazinë &nbsp;&nbsp;<a href="/products/create"> <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-plus"></i> Shto artikull</button></a>
                            </h3>
                        </div>

                        <div class="col-md-3 col-sm-12 mb-sm-2">
                            <div class="input-group">
                                <input type="text" class="form-control input-group-sm" id="productName" onkeyup="searchProduct()" placeholder="Kërkoni për produkt/kategori" title="Kërkoni për produkt/kategori" style="height: 30px;font-size: 14px;">
                                <div class="input-group-append" style="height: 30px;font-size: 14px;">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 text-right mb-sm-1">
                            <div data-toggle="tooltip" data-placement="top" title="Grid" class="btn btn-primary btn-sm"><i class="fas fa-th-large"></i></div>
                            <div class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Tabelë"><i class="far fa-list-alt"></i></div>
                        </div>
                    </div>


                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="products">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Emri</th>
                            <th scope="col">Gjendje</th>
                            <th scope="col">Kategoria</th>
                            <th scope="col">Çmimi</th>
                            <th scope="col">Sasia</th>
                            <th scope="col">Barkodi</th>
                            <th scope="col">Opsione</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="/products/{{ $product->id }}">{{ $product->product_name }}</a></td>
                                <td><i class='far fa-check-circle {{ $product->quantity > 0 ? 'text-green':'text-red'}}'></i></td>
                                <td><i class="{{ $product->category->logo }}"></i> {{ $product->category->category_name }}</td>
                                <td>{{ $product->selling_price_per_unit }} Lekë / {{ $product->unit }}</td>
                                <td>{{ $product->quantity }} {{ $product->unit }}</td>
                                <td>{{ $product->barcode }}</td>
                                <td>
                                    <div class="row">
                                        <a href="/products/{{ $product->id }}/edit" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <a href="/products/{{$product->id}}" class="btn btn-success" data-toggle="modal" data-target="#furnizoModal">   <i class="fas fa-cart-arrow-down"></i> </a>
                                        {{--<form action="/products/{{ $product->id }}" method="post">--}}
                                            {{--@csrf--}}
                                            {{--@method('DELETE')--}}
                                            {{--<button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>--}}
                                        {{--</form>--}}
                                    </div>

                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="furnizoModal" tabindex="-1" role="dialog" aria-labelledby="Furnizo" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title h3">Furnizo produktin: {{$product->product_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/products/{{$product->id}}/add" onsubmit="submit.disabled = true; return true;">
                                                    @method('PATCH')
                                                    @csrf
                                                      <div class="form-group">
                                                        <label for="quantity">Sasia e furnizimit:</label>
                                                        <input type="number" class="form-control" name="add_quantity" required/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Shto</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="justify-content-center row p-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>


    <script>
    function searchProduct() {
        //it works don't change anything
        var input, products, name, category;
        input = document.getElementById("productName").value.toUpperCase();
        products = document.getElementById("products").rows;

        for (let i = 1; i <= products.length; i++) {
            name = products[i].cells[1].textContent.toUpperCase();
            category = products[i].cells[3].textContent.toUpperCase();

            if (name.indexOf(input) > -1 || category.indexOf(input) > -1) {
                products[i].style.display = "";
            } else {
                products[i].style.display = "none";
            }
        }
    }

</script>


@endsection
