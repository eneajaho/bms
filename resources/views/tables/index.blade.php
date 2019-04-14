@extends('layout.layout')

@section('content')
    <div class="card shadow mb-5">
        <div class="card-header border-0">
            <h3 class="mb-0">Tavolina &nbsp;&nbsp;<a href="/tables/create"> <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-plus"></i> Shto tavolinë</button></a>
            </h3>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            @foreach($tables as $table)
                <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
                    <div class="card hoverable">
                        <div class="rounded-circle mt-2  m-auto tables-icon d-flex justify-content-center align-content-center align-items-center">
                            <i class="fas fa-utensils"></i>
                            <span class="table-size bg-primary" data-toggle="tooltip" data-placement="top" title="{{ $table->table_size }} vende">{{ $table->table_size }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center">{{ $table->table_name }}</h3>
                            <div class="d-flex flex-wrap justify-content-center">
                                <a href="/tables/{{ $table->id }}/edit" class="btn btn-primary mb-2"><i class="far fa-edit"></i> Modifiko</a>
                                <form action="/tables/{{ $table->id }}" method="post">
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
