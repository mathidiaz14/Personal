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

    .timelapse
    {
        border-left:solid 3px purple;
    }

    .timelapse:last-child
    {
        border-left-width: medium;
    }

    .timelapse .circle
    {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9px 0 9px 9px;
        border-color: transparent transparent transparent purple;
        position: absolute;
        left: 0px;
        top: 15px;
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
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h5 class="title">
                    Agregar nota
                </h5>
            </div>
            <div class="content">
                <div class="row">
                    <form action="{{url('note')}}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="people" value="{{$people->id}}">
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="">Contenido</label>
                                <textarea name="description" class="form-control" cols="30" ></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <button class="btn btn-info btn-block">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($people->notes as $note)
                <div class="col-xs-12 timelapse">
                    <div class="circle"></div>
                    <div class="card">
                        <div class="header">
                            <div class="col-xs-6">
                                <small style="color:purple;">
                                    {{date('d/m/Y', strtotime($note->created_at))}}
                                </small>
                            </div>
                            <div class="col-xs-6 text-right">
                                <form action="{{ url('note', $note->id)}}" method="POST">
                                    @csrf
                                    <input type='hidden' name='_method' value='DELETE'>
                                    <a>
                                        <i class="fa fa-close"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="col-xs-12">
                                <h4 class="title">{{$note->title}}</h4>
                            </div>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>{{$note->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
