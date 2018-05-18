@extends('layouts.app')

@section('css')
<style>
    a
    {
        cursor:pointer;
    }

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
        position:relative;
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

    .date
    {
        position:absolute;
        left:-75px;
        top: 15px;
    }

    .date p
    {
        font-size: .9em;
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
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="title">{{$people->name}}</h4>
                        <p class="category">{{$people->description}}</p>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="{{url('conversation/search', $people->id)}}" class="btn btn-success btn-fill">
                           <i class="fa fa-comment"></i>
                            Chats
                        </a>
                        <button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i>
                            Agregar
                        </button>

                        <!-- Modal -->
                        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content text-left">
                                    <div class="modal-header">
                                        <div class="col-xs-6">
                                            <h5 class="modal-title" id="exampleModalLabel">Agregar nota</h5>
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
                                                <form action="{{url('note')}}" method="POST" class="form-horizontal">
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
                                                            <textarea name="description" class="form-control" rows="5" cols="30" ></textarea>
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
                <div class="row">
                    <div class="col-xs-12">
                        <hr>
                        <div class="col-xs-12">
                            @if ($people->birthday != null)
                                <p>Cumpleaños: <b>{{date('d/m/Y', strtotime($people->birthday))}}</b></p>
                            @endif
                            @if ($people->phone != null)
                                <p>Telefono: <b>{{$people->phone}}</b></p>
                            @endif
                            @if ($people->email != null)
                                <p>Email: <b><a href="mailto:{{$people->email}}">{{$people->email}}</a></b></p>
                            @endif
                            @if ($people->address != null)
                                <p>Dirección: <b>{{$people->address}}</b></p>
                            @endif
                            <p>Categoria: <b>{{$people->category->title}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($notes as $note)
                <div class="col-xs-10 col-xs-offset-2 col-md-8 col-md-offset-2 timelapse">
                    <div class="circle"></div>
                    <div class="date">
                        <p style="color:purple;">
                            {{date('d/m/Y', strtotime($note->created_at))}}
                        </p>
                    </div>
                    <div class="card">
                        <div class="header">
                            <div class="col-xs-6">
                                <h4 class="title">{{$note->title}}</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <form id="delete-form-{{$note->id}}" action="{{ url('note', $note->id)}}" method="POST">
                                    @csrf
                                    <input type='hidden' name='_method' value='DELETE'>
                                </form>
                                
                                <a type="button" data-toggle="modal" data-target="#editModal" class="editModal" id="{{$note->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a onclick="event.preventDefault(); document.getElementById('delete-form-{{$note->id}}').submit();" class="text-danger">
                                    <i class="fa fa-close"> </i>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12" style="margin-left: 15px;">
                                    <p>{{$note->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xs-12 text-center">
                {{$notes->links()}}
            </div>
            
            <!-- Modal -->
            <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-left">
                        <div class="modal-header">
                            <div class="col-xs-6">
                                <h5 class="modal-title" id="editModalLabel">Agregar nota</h5>
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
                                    <form action="" method="POST" class="form-horizontal" id="form-edit">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="">Titulo</label>
                                                <input type="text" class="form-control" name="title" id="title-edit">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="">Contenido</label>
                                                <textarea name="description" class="form-control" rows="5" cols="30" id="description-edit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="">Fecha</label>
                                                <input type="date" class="form-control" name="date" id="date-edit">
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
@endsection

@section('scripts')
    <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $('.modal-backdrop').remove();
            $('#myInput').trigger('focus');
        });

        $('#editModal').on('shown.bs.modal', function () {
            $('.modal-backdrop').remove();
            $('#myInput').trigger('focus');
        });

        $('.editModal').click(function(){
            var id = $(this).attr('id');

            $.get( "/personal/note/"+id+"/edit", function( data ) 
            {
                $('#form-edit').attr('action', "{{url('note')}}/"+id);
                $('#title-edit').val(data.title);
                $('#description-edit').append(data.description);
                $('#date-edit').val(data.created_at);
            });
        });
    </script>
@endsection