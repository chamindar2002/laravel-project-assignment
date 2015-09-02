<?php

class City extends \Eloquent {
	protected $fillable = ['name'];
        
        
        public static $rules = [
                                'name' => 'required',
                                
                            ];
        
        public $errors;
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

        
        public function isValid($data){
            $validation = Validator::make($data, static::$rules);
            
             if($validation->passes()) return true;
             
             $this->errors = $validation->messages();
             
             return false;
        }
        
        public function labels($key){
            $labels = array(
              'id' => 'ID',
              'name' => 'Name Of City',
            );
            
            return $labels[$key];
        }
}