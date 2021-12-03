<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vehicle::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'licence_number' => 'required|max:25|min:2', 
            'model_id' => 'required|numeric|max:500',
            'production_year' => 'required',
            'mileage' => 'required|numeric|min:1',
            'date_of_registration' => 'required',
            'veteran' => 'in:yes,no',
            'brand' => 'required|numeric|min:1|max:50000',
            
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        }
        return Vehicle::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'licence_number' => 'required|max:25|min:2', 
            'model_id' => 'required|numeric|max:500',
            'production_year' => 'required',
            'mileage' => 'required|numeric|min:1',
            'date_of_registration' => 'required',
            'veteran' => 'in:yes,no',
            'brand' => 'required|numeric|min:1|max:50000',
            
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        }

        $vehicle = Vehicle::find($id);

        $vehicle->update($request->all());

        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
    }
}
