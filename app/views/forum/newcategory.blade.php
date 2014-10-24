@extends ('layouts.master')

@section('head')
@parent
<title>Forum | {{ $category->title }}</title>
@stop

@section('content')
@if (Auth::check())
<div>
    <!-- group_form want het betreft een id -->
    <a href="{{ URL::route('forum-get-new-thread', $category->id) }}" class="btn btn-default">Voeg thread toe</a>
</div>
@endif


<div class="panel panel-primary">
    <div class="panel-heading">
        <!--toegevoegde div voor delete group 16/10/2014 -->
        @if(Auth::check() && Auth::user()->isAdmin())
        <div class="clearfix">
            <h3 class="panel-title pull-left">{{ $category->title }}</h3>
            <a href="{{ URL::route('forum-get-new-thread',$category->id) }}" id="add-category-{{ $category->id}}" class="btn btn-success btn-xs pull-right new_category">Nieuwe thread</a>
            <a href="#" id="{{ $category->id}}" data-toggle="modal" data-target="#category_delete" class="btn btn-danger btn-xs pull-right delete_category">Verwijder</a>
        </div>
        @else
        <h3 class="panel-title pull-left">{{ $category->title }}</h3>
        <a href="{{ URL::route('forum-get-new-thread',$category->id) }}" id="add-category-{{ $category->id}}" class="btn btn-success btn-xs pull-right new_category">Nieuwe thread</a>
            
        @endif
    </div>
    <div class="panel-body panel-list-group">
        <div class="list-group">
            @foreach($threads as $thread)
            @if($thread->thread_id == $category->id)
            <a href= "{{URL::route('forum-thread', $thread->id)}}" class="list-group-item">{{ $thread->title }}</a>
            @endif
            @endforeach
        </div>

    </div>
</div>

@if (Auth::check() && Auth::user()->isAdmin())
<div class="modal fade" id="thread_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Nieuwe thread</h4>
            </div>
            <div class="modal-body">
                <form id="category_form" method="post">
                    <div class="form-group{{ ($errors->has('thread_name')) ? ' has-error' : ''}}">
                        <label for="category_name">Naam thread:</label>
                        <input type="text" id="thread_name" name="thread_name" class="form-control"> 
                    </div>
                    @if($errors->has('thread_name'))
                    <p>{{$errors->first('thread_name')}}</p>
                    @endif

                    {{Form::token()}}
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="thread_submit">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Verwijder categorie</h4>
            </div>
            <div class="modal-body">
                <h3> Ben je zeker dat je deze categorie wenst te verwijderen?</h3>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Maak ongedaan</button>
                <a href="" type="button" class="btn btn-primary" id="btn_delete_category">Verwijder</a>
            </div>
        </div>
    </div>
</div>
@endif
@stop

@section('javascript')
@parent
<script type="text/javascript" src="bootstrap/js/forumjs.js">
</script>
@stop