@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">
                    	<a href="{{url('conversation/search', $conversation->people->id)}}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    	{{$conversation->title}}
                    </h4>
                </div>
                <div class="col-xs-6 text-right">
                	{{$conversation->created_at}}
                </div>
            </div>
            <div class="content">
                <div class="row">
                	<form action="{{route('conversation.update', $conversation->id)}}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" class="form-control" name="title" value="{{$conversation->title}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="">Contenido</label>
                                <textarea name="description" class="form-control" rows="10" cols="30" >{{$conversation->content}}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" name="date" value="{{date('Y-m-d', strtotime($conversation->created_at))}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <button class="btn btn-info btn-block btn-fill">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
