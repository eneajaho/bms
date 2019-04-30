
@extends('layout.layout')

@section('content')

    <div class="card uper mt-5">
        <div class="card-header">
            Modifiko tavolinën
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


            <form method="post" action="/tables/{{ $table->id }}" onsubmit="submit.disabled = true; return true;">
                @method('PATCH')
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tavolina:</label>
                            <input type="text" class="form-control" name="table_name" value="{{ $table->table_name }}" required/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Madhësia:</label>
                            <input type="number" class="form-control" name="table_size" value="{{ $table->table_size }}" required/>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-edit"></i> Modifiko</button>
            </form>
        </div>
    </div>
@endsection
