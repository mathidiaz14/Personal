@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">Categorias</h4>
                    <p class="category">Categorias registradas</p>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="{{url('category    /create')}}" class="btn btn-success btn-fill">
                        <i class="pe-7s-plus"></i>
                        Agregar Categoria
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="table table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                              <th scope="col" class="text-center">#</th>
                              <th scope="col" class="text-center">Titulo</th>
                              <th scope="col" class="text-center">Descripción</th>
                              <th></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->categories as $category)
                                <tr>
                                    <td scope="row">{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary btn-fill">
                                            <i class="pe-7s-pen"></i>
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$category->id}}" action="{{ url('category', $category->id)}}" method="POST">
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
