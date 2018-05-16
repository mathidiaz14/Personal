@extends('layouts.app')

@section('css')
<style>
    .note
    {
        background: #e5e5e6;
        border-radius: 6px  ;
        padding: .5em;
        margin-bottom:1em;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$people->name}}</li>
          </ol>
        </nav>

        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">{{$people->name}}</h4>
                    <p class="category">{{$people->description}}</p>
                </div>
                <div class="col-xs-6 text-right">
                    
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <hr>
                        <div class="col-xs-12">
                            <p>Cumpleaños: <b>{{date('d/m/Y', strtotime($people->birthday))}}</b></p>
                            <p>Telefono: <b>{{$people->phone}}</b></p>
                            <p>Email: <b><a href="mailto:{{$people->email}}">{{$people->email}}</a></b></p>
                            <p>Dirección: <b>{{$people->address}}</b></p>
                            <p>Categoria: <b>{{$people->category->title}}</b></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Notas</h3>
                    </div>
                </div>
                <div class="row">
                    <form action="{{route('note.create')}}" method="POST" class="form-inline">
                        @csrf
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="">Contenido</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button class="btn btn-info">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @foreach($people->notes as $note)
                            <div class="col-xs-12 note">
                                <div class="col-xs-6">
                                    <h4>{{$note->title}}</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p>{{date('d/m/Y', strtotime($note->created_at))}}</p>
                                </div>
                                <div class="col-xs-12">
                                    <p>
                                        {{$note->description}}
                                    </p>
                                </div>
                                <div class="col-xs-12 text-right">
                                    <a href="" class="btn btn-danger btn-fill">
                                        <i class="pe-7s-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
