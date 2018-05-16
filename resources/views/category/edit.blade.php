@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Editar categoria</h4>
            </div>
            <div class="content">
                <form class="form-horizontal" action="{{route('category.update', $category->id)}}" method="post">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-offset-3" style="padding-left:6px;">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" class="form-control" placeholder="Titulo" name="title" value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" placeholder="Descripción" name="description" value="{{$category->description}}">
                            </div>
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
