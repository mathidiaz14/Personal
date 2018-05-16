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
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
