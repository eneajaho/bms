@extends('layout.layout')

@section('content')



    <div class="card uper mt-5">
        <div class="card-header">
            Shto tavolinë
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

            <form method="post" action="/tables" onsubmit="submit.disabled = true; return true;">
                @csrf
                <div class="form-group">
                    <label for="name">Tavolina:</label>
                    <input type="text" class="form-control" name="table_name" required/>
                </div>
                <div class="form-group">
                    <label for="name">Madhësia:</label>
                    <input type="number" class="form-control" name="table_size" required/>
                </div>

                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Shto</button>
            </form>
        </div>
    </div>

@endsection
