@extends('layout.layout')

@section('content')
    <div class="card shadow mb-5">
        <div class="card-header border-0">
            <h3 class="mb-0">Kategoritë &nbsp;&nbsp;<a href="/category/create"> <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-plus"></i> Shto kategori</button></a>
            </h3>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            @foreach($categories as $category)
                <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
                    <div class="card hoverable">
                        <div class="rounded-circle mt-2  m-auto tables-icon d-flex justify-content-center align-content-center align-items-center">
                            <i class="{{ $category->logo }}"></i>
                            <span class="table-size bg-primary" data-toggle="tooltip" data-placement="top" title="{{ $category->products->count() }} produkte">{{ $category->products->count() }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center">{{ $category->category_name }}</h3>
                            <div class="d-flex flex-wrap justify-content-center">
                                <a href="/category/{{ $category->id }}/edit" class="btn btn-primary mb-2"><i class="far fa-edit"></i> Modifiko</a>
                                <form action="/category/{{ $category->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Fshi</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>

@endsection
