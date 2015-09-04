<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author chaminda
 */


class HomeController extends \BaseController{
    
    public function index(){
    
        //$data = HotelCity::all()->paginate(10);
        $city_selected = Input::get('city');
        
        $cities = ['All' => 'All'] + City::lists('name', 'id');
        
        $page_size = utilities::paginationPageSize();
        
        $data = DB::table('view_hotel_city_relation')->paginate($page_size);
         
        if($city_selected != 'All' && $city_selected != null){ 
            $data = HotelCity::where('city_id', '=', $city_selected)->simplePaginate($page_size); 
        }
        
        $data->appends(array('city'=>$city_selected));
        
        return View::make('home.index',['data'=>$data,'cities'=>$cities,'city_selected'=>$city_selected]);
    }
    
    public function fetchMoreInfo(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $data = HotelCity::find($id);
            
            
        }
        
        return View::make('home.hotelInfo',['data'=>$data]);
    }
}

?>
