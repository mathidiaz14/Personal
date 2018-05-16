@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">Personas</h4>
                    <p class="category">Personas registradas</p>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="{{url('people/create')}}" class="btn btn-success btn-fill">
                        <i class="pe-7s-plus"></i>
                        Agregar persona
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="table table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                              <th scope="col" class="text-center">#</th>
                              <th scope="col" class="text-center">Nombre</th>
                              <th scope="col" class="text-center">Descripción</th>
                              <th scope="col" class="text-center">Email</th>
                              <th scope="col" class="text-center">Telefono</th>
                              <th scope="col" class="text-center">Categoria</th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->categories as $category)
                                @foreach($category->peoples as $people)
                                    <tr>
                                        <td scope="row">{{$people->id}}</td>
                                        <td>{{$people->name}}</td>
                                        <td>{{$people->description}}</td>
                                        <td><a href="mailto:{{$people->email}}">{{$people->email}}</a></td>
                                        <td>{{$people->phone}}</td>
                                        <td>{{$people->category->title}}</td>
                                        <td>
                                            <a href="{{url('people', $people->id)}}" class="btn btn-info btn-fill">
                                                <i class="pe-7s-look"></i>
                                                Ver
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('people.edit', $people->id)}}" class="btn btn-primary btn-fill">
                                                <i class="pe-7s-pen"></i>
                                                Editar
                                            </a>
                                        </td>
                                        <td>
                                            <form id="delete-form-{{$people->id}}" action="{{ url('people', $people->id)}}" method="POST">
                                                @csrf
                                                <input type='hidden' name='_method' value='DELETE'>
                                                <button class="btn btn-danger btn-fill">
                                                    <i class="pe-7s-trash"></i>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
