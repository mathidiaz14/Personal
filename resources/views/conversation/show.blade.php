@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="col-xs-6">
                    <h4 class="title">
                    	<a href="{{url('conversation/search', $conversation->people->id)}}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
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
