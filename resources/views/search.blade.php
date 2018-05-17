@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Busqueda</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">Busqueda</h4>
                </div>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Email</td>
                                <td>Telefono</td>
                                <td></td>
                            </tr>
                        </thead>
                        @foreach($peoples as $people)
                            <tr>
                                <td>{{$people->id}}</td>
                                <td>
                                    <a href="{{url('people', $people->id)}}">
                                        {{$people->name}}
                                    </a>
                                </td>
                                <td>{{$people->description}}</td>
                                <td>{{$people->email}}</td>
                                <td>{{$people->phone}}</td>
                                <td>
                                    <a href="{{url('people', $people->id)}}" class="btn btn-success btn-fill">
                                        <i class="fa fa-eye"></i>
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
