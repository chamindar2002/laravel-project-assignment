@extends('layouts.default')

@section('content')

<!--<div class="col-md-4 col-md-offset-4">-->
      <div class="panel panel-info">
        <div class="panel-heading">Search Hotels</div>
        <div class="panel-body">
            <div class="form-group">
<!--                {{var_dump($city_selected)}}-->
                {{ Form::label('search', 'Filter By City') }}
                {{ Form::select('city_id', $cities, $city_selected, array('class' => 'form-control','id'=>'city_selector')) }}
            </div>
            
                
<!--            <div class="form-group">
                {{ HTML::link('hotel/create', 'Search', array('class' => 'btn btn-success')) }}
            </div>-->
            

        </div>
      </div>
<!--</div>-->


<div class="panel panel-default">
    <div class="panel-heading">{{sizeof($data)}} Records Found</div>
    <div class="panel-body">
        <div class="form-group">
           @foreach ($data as $d)
           <div class='item_place_holder'>
                
               <h3>{{ $d->hotel_name }}</h3>
               <p>
                   {{$d->city_name}}
               </p>
                    <a href='#' id='{{$d->id}}' class='link_more_info btn btn-info' data-toggle="modal" data-target="#myModal">More</a>
                
           </div>
           @endforeach
        </div>
    </div>
</div>

<!--   lighbox bootstrap modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Hotel Info</h4>
        </div>
            <div class="modal-body">
                          
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--            <button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
   </div>
</div>
<!-- end of bootsrap lightbox modal -->

<?php echo $data->links(); ?> 

@stop

@section('scripts')



<script type='text/javascript'>
var placeholder_html = '<br><span class="loader" style="margin-left:45%;"><img src="<?php echo url(); ?>/images/loading.gif" alt="Loading...") /></span><br><br>';

$(document).ready(function() {
   $('.link_more_info').click(function(event){
    event.preventDefault();
    
    var id = $(this).attr('id');
    
    $.ajax({
                type :'POST',
                dataType:'html',
                
                cache: false,
                url : 'home/fetchMoreInfo',
                data : { id : id},
                
                beforeSend: function() {
                    
                    $('.modal-body').html(placeholder_html);
                },
                success : function(result){
                     //console.log(result);
                     $('.modal-body').html(result);
                }
            });
                
    console.log(id);
});


$('#city_selector').change(function(event) {
           
           var val = $('#city_selector').val();
           var url = window.location.href;
           //if(val != ''){
              addParam(url,'city',val);
           //}else{
             // addParam(url,'city',val);
           //}
           
           
    });


});

</script>
@stop