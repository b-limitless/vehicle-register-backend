<?php

namespace App\Http\Controllers;
use App\Models\Models;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Models::all();

        $models = DB::table('models')
        ->join('brands', 'models.brand_id', '=', 'brands.id')
        ->select('models.*', 'brands.name as brandName')
        ->get();
        
        $brands = Brand::all();

        return ['brands' => $brands, 'models' => $models];
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
            'name' => 'required|max:255', 
            'seat_count' => 'required|numeric|max:50|min:1',
            'brand_id'=>'required|numeric',
            'fuel'=>'in:Gasoline,Diesel,El,Hybrid'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $model = new Models();
        $model->name = $request->name;
        $model->seat_count = $request->seat_count;
        $model->fuel = $request->fuel;
        $model->brand_id = $request->brand_id;

        $model->save();

        return $model;
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
            'name' => 'required|max:255', 
            'seat_count' => 'required|numeric|max:50|min:1',
            'brand_id'=>'required|numeric',
            'fuel'=>'in:Gasoline,Gasoline,El,Hybrid'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $model = Models::find($id);
        $model->name = $request->name;
        $model->seat_count = $request->seat_count;
        $model->fuel = $request->fuel;
        $model->brand_id = $request->brand_id;

        $model->update();
        
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $model)
    {
        $model->delete();  
    }
}
