@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('people', $conversation->people->id)}}">{{$conversation->people->name}}</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{url('conversation/search', $conversation->people->id )}}">Conversaciones</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$conversation->title}}</li>
          </ol>
        </nav>
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">
                    	{{$conversation->title}}
                    </h4>
                </div>
                <div class="col-xs-6 text-right">
                	{{$conversation->created_at}}
                </div>
            </div>
            <div class="content">
                <div class="row">
                	<br><br>
                	<div class="col-xs-12">
                		<p>{{$conversation->content}}</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
