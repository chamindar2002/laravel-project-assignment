<?php

class HotelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /hotels
	 *
	 * @return Response
	 */
    
        protected $hotel;
    
        public function __construct(Hotel $hotel) {
           $this->hotel = $hotel;
        }
        
	public function index()
	{
            $data = $this->hotel->orderBy('name','asc')->get();
            return View::make('hotel.index',['data'=>$data]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /hotels/create
	 *
	 * @return Response
	 */
	public function create()
	{
            $model = $this->hotel;
            $cities = ['' => ''] + City::lists('name', 'id');

             
            return View::make('hotel.create',['model'=>$model,'cities'=>$cities]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /hotels
	 *
	 * @return Response
	 */
	public function store()
	{
            if(!$this->hotel->isValid($input = Input::all())){
                return Redirect::back()->withInput()->withErrors($this->hotel->errors);
            }
            
            $data = Input::all();
            
            $this->hotel->create($input);
            
            //return Redirect::to('/users');
            return Redirect::route('hotel.index');
	}

	/**
	 * Display the specified resource.
	 * GET /hotels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /hotels/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $model = $this->hotel->find($id);
            //return $user;
            $cities = ['' => ''] + City::lists('name', 'id');
            return View::make('hotel.edit',array('model'=>$model,'cities'=>$cities));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /hotels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            if(!$this->hotel->isValid($input = Input::all())){
                return Redirect::back()->withInput()->withErrors($this->hotel->errors);
            }
            
            $hotel = $this->hotel->find(Input::get('id'));
            
            $hotel->name = Input::get('name');
            $hotel->address_1 = Input::get('address_1');
            $hotel->address_2 = Input::get('address_2');
            $hotel->city_id = Input::get('city_id');
            $hotel->save();
            
            return Redirect::route('hotel.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /hotels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function getHotelDataTable(){
            //$query = $this->city->orderBy('name','asc')->get();
            //$query = City::select('name', 'active', 'last_login', 'id')->get();
            $query = HotelCity::select(array('id','hotel_name','address_1','address_2','city_name'))->get();
                    
            return Datatable::collection($query)
                                ->showColumns('id', 'hotel_name','address_1','address_2','city_name')
                                ->searchColumns('id', 'hotel_name','address_1','address_2','city_name')
                                ->orderColumns('id', 'hotel_name','address_1','address_2','city_name')
                                ->addColumn('Action', function($model){
                                        return '<a href="hotel/' . $model->id . '/edit">Edit</a>';
                                        
                                    })

                                ->make();
        }

}