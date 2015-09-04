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
                {{ Form::button('Delete',array('class'=>'btn btn-link','id'=>'btn_delete')) }}
                
            </div>
            {{ Form::close() }}
        </div>
      </div>

                {{Form::open(['method' => 'DELETE', 'route' => ['hotel.destroy', $model->id],'class'=>'delete_form']) }}
                {{ Form::hidden('id',$model->id) }}
                {{ Form::close() }}
<!--</div>-->


@stop


@section('scripts')



<script type='text/javascript'>
var placeholder_html = '<br><span class="loader" style="margin-left:45%;"><img src="<?php echo url(); ?>/images/loading.gif" alt="Loading...") /></span><br><br>';

$(document).ready(function() {
   $('#btn_delete').click(function(event){
    
   //console.log('ok');
   $('.delete_form').submit();
    
    
});




});

</script>
@stop