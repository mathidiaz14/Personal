@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('category')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <h4 class="title">Crear categoria</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" placeholder="Titulo" name="title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" placeholder="Descripción" name="description">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">
                                <i class="pe-7s-diskette"></i>
                                Guardar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
