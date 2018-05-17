@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">Conversaciones</h4>
                    <p class="category">guardada</p>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="{{url('conversation/create')}}" class="btn btn-success btn-fill">
                        <i class="pe-7s-plus"></i>
                        Agregar conversación
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Titulo</td>
                                <td>Fecha</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($conversations as $conversation)
                                <tr>
                                    <td>{{$conversation->title}}</td>
                                    <td>{{$conversation->created_at}}</td>
                                    <td>
                                        <a href="{{url('conversation', $conversation->id)}}" class="btn btn-info btn-fill">
                                            <i class="fa fa-eye"></i>
                                            Ver
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('conversation.edit', $conversation->id)}}" class="btn btn-primary btn-fill">
                                            <fa class="fa fa-edit"></fa>
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$conversation->id}}" action="{{ url('conversation', $conversation->id)}}" method="POST">
                                            @csrf
                                            <input type='hidden' name='_method' value='DELETE'>
                                            <button class="btn btn-danger btn-fill">
                                                <i class="fa fa-trash"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
