@extends('layouts.default')

@section('content')

<!--<div class="col-md-4 col-md-offset-4">-->
      <div class="panel panel-info">
        <div class="panel-heading">Update Hotel</div>
        <div class="panel-body">
            {{ Form::open(['method' => 'PUT', 'route' => ['hotel.update', $model->id]]) }}
            {{ Form::hidden('id',$model->id) }}
             <div class="form-group">
                {{ Form::label('name', $model->labels('name')) }}
                {{ Form::text('name', $model->name, array('class' => 'form-control', 'placeholder' => 'Name Of Hotel')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('address_1', $model->labels('address_1')) }}
                {{ Form::text('address_1', $model->address_1, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('name', $model->labels('address_2')) }}
                {{ Form::text('address_2', $model->address_2, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('name', $model->labels('city_id')) }}
                {{ Form::select('city_id', $cities, $model->city_id, array('class' => 'form-control')) }}
            </div>
           
           
            <div class="form-group">
                {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                {{ HTML::link('hotel/', 'Cancel', array('class' => 'btn btn-danger')) }}
            </div>
            {{ Form::close() }}
        </div>
      </div>
<!--</div>-->


@stop