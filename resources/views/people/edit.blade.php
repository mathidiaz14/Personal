@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$people->name}}</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <h4 class="title">Editar Persona</h4>
            </div>
            <div class="content">
                <form class="form-horizontal" action="{{route('people.update', $people->id)}}" method="post">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
                    
                    <div class="col-xs-12 col-md-6 col-md-offset-3" >
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{$people->name}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>Descripción</label>
                            <input type="text" class="form-control" placeholder="Descripción" name="description" value="{{$people->description}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>Cumpleaños</label>
                            <input type="date" class="form-control" placeholder="Cumpleaños" name="birthday" value="{{$people->birthday}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" class="form-control" placeholder="Telefono" name="phone" value="{{$people->phone}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$people->email}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" placeholder="Dirección" name="address" value="{{$people->address}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" id="category" name="category" value="{{$people->category}}">
                                @foreach(Auth::user()->categories as $category)
                                    @if($category->id == $people->category_id)
                                    	<option value="{{$category->id}}" selected="">{{$category->title}}</option>
                                    @else
										<option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>
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
@endsection
