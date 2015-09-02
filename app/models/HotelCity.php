<?php

class HotelCity extends \Eloquent {
	protected $fillable = [];
        
       
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'view_hotel_city_relation';

        
        
        public function labels($key){
            $labels = array(
              'id' => 'ID',
              'hotel_name' => 'Hotel Name',
              'address_1'=>'Address 1',
              'address_1'=>'Address 2',
              'city_name'=>'City',
            );
            
            return $labels[$key];
        }
}