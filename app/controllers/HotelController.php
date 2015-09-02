<?php

class HotelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /hotels
	 *
	 * @return Response
	 */
    
        protected $hotel;
    
        public function __construct(City $hotel) {
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /hotels
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		//
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