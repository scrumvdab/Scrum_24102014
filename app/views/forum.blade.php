@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <div class="jumbotron" style="min-height:700px">

        @if(Auth::check() && Auth::user()->isAdmin())
        <div>
            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#group_form">Add Group</a>
        </div>
        @endif

        @foreach($groups as $group)
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $group->title }}</h3>
            </div>
            <div class="list-group">
                @foreach($categories as $category)
                @if($category->group_id == $group->id)
                <a href="{{ URL::route('forum-category', $category->id) }}" class="list-group-item">{{ $category->title }}</a>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach

        @if(Auth::check() && Auth::user()->isAdmin())
        <div>
            <div class="modal fade" id="group_form" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Groep toevoegen</h4>
                        </div>
                        <div class="modal-body">
                            <form id="target_form">
                                <div class="form-group">
                                    <label for="group_name">Group Name:</label>
                                    <input type="text" id="group_name" name="group_name" class="form-control">
                                </div>
                                {{ Form::token() }}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="form_submit">Opslaan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@if(Session::has('modal'))
<script>
    $("{{ Session::get('modal') }}").modal('show');
</script>
@endif
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('js/forum.js') }}
@stop