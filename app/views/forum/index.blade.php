@extends ('layouts.master')

@section('head')

@stop

@section('content')
@if (Auth::check() && Auth::user()->isAdmin())
<div>
    <!-- group_form want het betreft een id -->
    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#group_form">Voeg groep toe</a>
</div>
@endif

@foreach($groups as $group)
<div class="panel panel-primary">
    <div class="panel-heading">
        <!--toegevoegde div voor delete group 16/10/2014 -->
        <div class="clearfix">
            <h3 class="panel-title pull-left">{{ $group->title }}</h3>
            <a href="#" id="{{ $group->id}}" data-toggle="modal" data-target="#group_delete" class="btn btn-danger btn-xs pull-right delete_group">Verwijder</a>
        </div>
        <!-- einde div -->
    </div>
    <div class="panel-body panel-list-group">
        <div class="list-group">
            @foreach($categories as $category)
            @if($category->group_id == $group->id)
            <a href= "{{URL::route('forum-category', $category->id)}}" class="list-group-item">{{ $category->title }}</a>
            @endif
            @endforeach
        </div>

    </div>
</div>
@endforeach

@if (Auth::check() && Auth::user()->isAdmin())
<div class="modal fade" id="group_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Nieuwe groep</h4>
            </div>
            <div class="modal-body">
                <form id="target_form" method="post" action="{{URL::route('forum-store-group')}}">
                    <div class="form-group{{ ($errors->has('group_name')) ? ' has-error' : ''}}">
                        <label for="group_name">Naam groep:</label>
                        <input type="text" id="group_name" name="group_name" class="form-control"> 
                    </div>
                    @if($errors->has('group_name'))
                    <p>{{$errors->first('group_name')}}</p>
                    @endif

                    {{Form::token()}}
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="form_submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- code voor bevestiging delete 16/10/2014 -->
<div class="modal fade" id="group_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Verwijder groep</h4>
            </div>
            <div class="modal-body">
                <h3> Ben je zeker dat je deze groep wenst te verwijderen?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
                <a href="#" type="button" class="btn btn-primary" id="btn_delete_group">Verwijder</a>
            </div>
        </div>
    </div>
</div>
<!-- einde code delete controle 16/10/2014 -->

@endif

@stop

@section('javascript')
@parent
{{ HTML::script('bootstrap/js/forumjs.js') }} 
@if(Session::has('modal'))
<script type="text/javascript">
$("{{Session::get('modal')}}").modal('show');
</script>
@endif

@stop



