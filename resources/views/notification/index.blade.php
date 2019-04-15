@extends('layout.layout')

@section('content')
    <div class="card shadow mb-5 pb-3">
        @if($notifications->count())
            <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Njoftime </h3>
                @if(!(Request::get('showHidden') == true))
                <a data-toggle="tooltip" data-placement="top" title="Shfaq njoftimet e fshehura" href="?showHidden=true"> <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-eye"></i></button>
                </a>
                @endif

            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-around">

                @foreach($notifications as $notification)
                    @if(($notification->visible == true) || (Request::get('showHidden') == true) )
                        <div class="alert alert-primary col-md-5 col-sm-12 p-sm-2 p-md-4 m-2 d-flex justify-content-between align-items-center" role="alert">
                            <div class="col-8">
                                <strong class="lead">{{$notification->description}}</strong>
                            </div>
                           <div class="col-4 d-flex justify-content-end">
                               <form action="/notification/{{ $notification->id }}" method="post">
                                   @csrf
                                   @method('PATCH')
                                   <button class="btn btn-sm btn-warning mr-2" type="submit"><i class="fas fa-times"></i></button>
                               </form>
                               <form action="/notification/{{ $notification->id }}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-sm btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                               </form>
                           </div>
                       </div>
                    @endif

                @endforeach

        </div>
            @endif
        </div>

@endsection
