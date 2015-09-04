@extends('layouts.default')

@section('content')

<!--<div class="col-md-4 col-md-offset-4">-->
      <div class="panel panel-info">
        <div class="panel-heading">Add City</div>
        <div class="panel-body">
            {{ Form::open(['route' => 'city.store'])}}
            
            <div class="form-group">
                {{ Form::label('name', $model->labels('name')) }}
                {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name Of City')) }}
            </div>
           
            <div class="form-group">
                {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                {{ HTML::link('city/', 'Cancel', array('class' => 'btn btn-danger')) }}
            </div>
            {{ Form::close() }}
        </div>
      </div>
<!--</div>-->


@stop