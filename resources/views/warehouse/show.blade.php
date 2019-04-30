@extends('layout.layout')

@section('content')


    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header border-0">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-12 justify-content-center">
                            <div class="row p-7 justify-content-center bg-default">
                                <h1 class="text-center text-white display-3">
                                    {{$product->product_name}}
                                </h1>
                            </div>
                            <div class="row">
                                <table class="table border  align-items-center table-flush">
                                    <tr class="product-details">
                                        <td class="border bg-secondary">Kategoria</td>
                                        <td>{{$product->category->category_name}}</td>
                                    </tr>
                                    <tr class="product-details">
                                        <td class="border bg-secondary">Çmimi i shitjes</td>
                                        <td>{{$product->selling_price_per_unit}} Lekë/{{$product->unit}}</td>
                                    </tr>
                                    <tr class="product-details">
                                        <td class="border bg-secondary">Sasia</td>
                                        <td>{{$product->quantity}} {{$product->unit}}</td>
                                    </tr>

                                    <tr class="product-details">
                                        <td class="border bg-secondary">Çmimi i blerjes</td>
                                        <td>{{$product->buying_price_per_unit}} Lekë/{{$product->unit}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row justify-content-center p-2">
                                <a href="/products/{{$product->id}}/edit" class="btn btn-outline-primary">   <i class="far fa-edit"></i> Modifiko  </a>
                                <br>
                                <a href="/products/{{$product->id}}" class="btn btn-outline-success" data-toggle="modal" data-target="#furnizoModal">   <i class="fas fa-cart-arrow-down"></i> Furnizo  </a>
                            </div>
                        </div>

                        <div class="col-md-7 col-sm-12">
                    <h1 class="text-center">Statistika</h1>
                            <img class="img-fluid" src="https://fedoraproject.org/w/uploads/6/6e/Fedora_stats_charts_Edits_to_Fedora_wiki.jpg" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="furnizoModal" tabindex="-1" role="dialog" aria-labelledby="Furnizo" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Furnizo produktin: {{$product->product_name}}</h5>
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



@endsection
