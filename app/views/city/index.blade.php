@extends('layouts.default')

@section('content')


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>


<!--<div class="col-md-4 col-md-offset-4">-->
      <div class="panel panel-info">
        <div class="panel-heading">Cities</div>
        <div class="panel-body">
            {{ Datatable::table()
            ->addColumn('Id','Name','Action')       // these are the column headings to be shown
            ->setUrl(route('api.cities'))   // this is the route where data will be retrieved
            ->render() }}
        </div>
      </div>
<!--</div>-->

    
    
    
<div class="form-group">
    {{ HTML::link('city/create', 'Add', array('class' => 'btn btn-success')) }}
</div>

@stop