<?php

class CityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /city
	 *
	 * @return Response
	 */
    
        protected $city;
    
        public function __construct(City $city) {
           $this->city = $city;
        }
    
	public function index()
	{
            //$data = array();
            $data = $this->city->orderBy('name','asc')->get();
            return View::make('city.index',['data'=>$data]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /city/create
	 *
	 * @return Response
	 */
	public function create()
	{
            $model = $this->city;
           
            return View::make('city.create',['model'=>$model]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /city
	 *
	 * @return Response
	 */
	public function store()
	{
            if(!$this->city->isValid($input = Input::all())){
                return Redirect::back()->withInput()->withErrors($this->city->errors);
            }
            
            /*$user = new User;
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->save();*/
             $data = Input::all();
            
            $this->city->create($input);
            
            //return Redirect::to('/users');
            return Redirect::route('city.index');
	}

	/**
	 * Display the specified resource.
	 * GET /city/{id}
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
	 * GET /city/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            
            $model = $this->city->find($id);
            //return $user;
            
            return View::make('city.edit',array('model'=>$model));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /city/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            if(!$this->city->isValid($input = Input::all())){
                return Redirect::back()->withInput()->withErrors($this->city->errors);
            }
            
            $city = $this->city->find(Input::get('id'));
            
            $city->name = Input::get('name');
            
            $city->save();
            
            return Redirect::route('city.index');
             
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /city/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function getCityDataTable(){
            //$query = $this->city->orderBy('name','asc')->get();
            //$query = City::select('name', 'active', 'last_login', 'id')->get();
            $query = City::select(array('id','name'))->get();
                    
            return Datatable::collection($query)
                                ->showColumns('id', 'name')
                                ->searchColumns('id','name')
                                ->orderColumns('id','name')
                                ->addColumn('Action', function($model){
                                        return '<a href="city/' . $model->id . '/edit">Edit</a>';
                                        
                                    })

                                ->make();
        }

}