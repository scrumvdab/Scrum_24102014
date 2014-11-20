@extends('templates.default')
@section('content')
<div class="container" id="content">
    <div class="navbar">
        <div class="jumbotron" style="min-height:700px">
            <div class="container">
                <div class="clearfix">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
                        <li><a href="{{ URL::route('forum-category', $thread->category_id) }}">{{ $thread->category->title }}</a></li>
                        <li class="active">{{ $thread->title }}</li>
                    </ol>
                    @if(Auth::user())
                    @if(Auth::user()->isAdmin() || Auth::user()->id == $thread->author_id)
                    
                    <a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger pull-right">Verwijder</a>
                    @endif
                    @endif
                   
                </div>
                <div class="well">
                    <h2>{{ $thread->title }}</h2>
                    <img style="border:1px red; height:100px; width:100px; float:right;" src="/Scrum/public/uploads/{{$user = DB::table('users')->where('id', $thread->author_id)->first()->id}}.jpg">
                    <br>
                    <h4>Verzonden door: {{ $author }} op {{ $thread->created_at }}</h4>
                    <hr>
                    <p>{{ nl2br(BBCode::parse($thread->body)) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{ HTML::script('http://code.jquery.com/jquery-2.1.1.min.js') }}
{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
@stop
