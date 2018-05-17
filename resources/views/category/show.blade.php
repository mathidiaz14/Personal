@extends('layouts.app')

@section('css')
    <style>
        .table th:hover
        {
           cursor: pointer; 
        }
    </style>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="title">{{$category->title}}</h4>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="{{url('people/create')}}" class="btn btn-success btn-fill">
                            <i class="fa fa-plus"></i>
                            Agregar
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="table table-responsive">
                    <table id="table" class="table table-striped ">
                        <thead>
                            <tr>
                              <th scope="col">Nombre <small><i class="fa fa-sort"></i></small></th>
                              <th scope="col">Descripción <small><i class="fa fa-sort"></i></small></th>
                              <th scope="col">Email <small><i class="fa fa-sort"></i></small></th>
                              <th scope="col">Telefono <small><i class="fa fa-sort"></i></small></th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peoples as $people)
                                <tr>
                                    <td>
                                        <a href="{{url('people', $people->id)}}">
                                            {{$people->name}}
                                        </a>
                                    </td>
                                    <td>{{$people->description}}</td>
                                    <td><a href="mailto:{{$people->email}}">{{$people->email}}</a></td>
                                    <td>{{$people->phone}}</td>
                                    <td>
                                        <a href="{{url('people', $people->id)}}" class="btn btn-info btn-fill">
                                            <i class="fa fa-eye"></i>
                                            Ver
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('people.edit', $people->id)}}" class="btn btn-primary btn-fill">
                                            <fa class="fa fa-edit"></fa>
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$people->id}}" action="{{ url('people', $people->id)}}" method="POST">
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
       $(document).ready(function(){ 
            $("#table").tablesorter(); 
        }); 
    </script>
@endsection