@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="title">Categorias</h4>
                        <p class="category">Categorias registradas</p>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="{{url('category/create')}}" class="btn btn-success btn-fill">
                            <i class="fa fa-plus"></i>
                            Agregar
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="table table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Titulo</th>
                              <th scope="col">Descripción</th>
                              <th></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->categories as $category)
                                <tr>
                                    <td>
                                        <a href="{{url('category', $category->id)}}">
                                            {{$category->title}}
                                        </a>
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary btn-fill">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('category', $category->id)}}" method="POST">
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
            </div>
        </div>
    </div>
</div>
@endsection
