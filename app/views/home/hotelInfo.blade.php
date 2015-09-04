<div class="panel panel-info">
        <div class="panel-heading"><strong>{{ $data->hotel_name }}</strong></div>
        <div class="panel-body">
            <div class="form-group">
                
                    <strong>
                    {{$data->address_1}}
                    ,
                    {{ ($data->address_2 != '' ) ? $data->address_2.',' : ''}}
                    
                    {{$data->city_name}}
                    .
                    </strong>
                
            </div>
        </div>
</div>