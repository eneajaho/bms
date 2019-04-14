
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


            <form method="post" action="/category/{{ $category->id }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">Emri i kategorisë:</label>
                    <input type="text" class="form-control" name="category_name" value={{ $category->category_name }} required/>
                </div>
                <div class="form-group">
                    <label for="name">Logo:</label>
                    <input type="text" class="form-control" name="logo" value={{ $category->logo }} required/>
                </div>

                <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> Modifiko</button>
            </form>
        </div>
    </div>
@endsection
