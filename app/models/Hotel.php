<?php

class Hotel extends \Eloquent {
	protected $fillable = ['name','address_1','address_2','city_id'];
        
        
        public static $rules = [
                                'name' => 'required',
                                'address_1'=>'required',
                                'address_1'=>'required',
                                'city_id'=>'required',
                            ];
        
        public $errors;
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hotels';

        
        public function isValid($data){
            $validation = Validator::make($data, static::$rules);
            
             if($validation->passes()) return true;
             
             $this->errors = $validation->messages();
             
             return false;
        }
        
        public function labels($key){
            $labels = array(
              'id' => 'ID',
              'name' => 'Name',
              'address_1'=>'Address 1',
              'address_1'=>'Address 2',
              'city_id'=>'City',
            );
            
            return $labels[$key];
        }
}