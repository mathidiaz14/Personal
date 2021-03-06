@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear persona</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <h4 class="title">Crear Persona</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" action="{{route('people.store')}}" method="post">
                            @csrf
                        
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" placeholder="Descripción" name="description">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Cumpleaños</label>
                                    <input type="date" class="form-control" placeholder="Cumpleaños" name="birthday">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" placeholder="Telefono" name="phone">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Dirección" name="address">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label for="category">Categoria</label>
                                    <select class="form-control" id="category" name="category">
                                        @foreach(Auth::user()->categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-info btn-fill pull-right">
                                    <i class="fa fa-save"></i>
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
