@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('people', $people->id)}}">{{$people->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Conversaciones</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="title">
                            Conversaciones
                        </h4>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="button" class="btn btn-success btn-fill" data-toggle="modal" data-target="#conversationModal">
                            <i class="fa fa-plus"></i>
                            Agregar
                        </button>

                        <!-- Modal -->
                        <div class="modal" id="conversationModal" tabindex="-1" role="dialog" aria-labelledby="conversationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content text-left">
                                    <div class="modal-header">
                                        <div class="col-xs-6">
                                            <h5 class="modal-title" id="conversationModalLabel">Agregar Conversación</h5>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form action="{{url('conversation')}}" method="POST" class="form-horizontal">
                                                    @csrf
                                                    <input type="hidden" name="people" value="{{$people->id}}">
                                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                                        <div class="form-group">
                                                            <label for="">Titulo</label>
                                                            <input type="text" class="form-control" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                                        <div class="form-group">
                                                            <label for="">Contenido</label>
                                                            <textarea name="description" class="form-control" rows="10" cols="30" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                                        <div class="form-group">
                                                            <label for="">Fecha</label>
                                                            <input type="date" class="form-control" name="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                                        <button class="btn btn-info btn-block">Enviar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="modal-footer">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

@section('scripts')
    <script>
        $('#conversationModal').on('shown.bs.modal', function () {
            $('.modal-backdrop').remove();
            $('#myInput').trigger('focus');
        });
    </script>
@endsection