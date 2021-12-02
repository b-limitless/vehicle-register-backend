<?php

namespace App\Http\Controllers;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Models::all();
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
            'fuel'=>'in:Gasoline,Gasoline,El,Hybrid'
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        }
        return Models::create($request->all());
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
            'name' => 'required|max:255', 
            'seat_count' => 'required|numeric|max:50|min:1',
            'fuel'=>'in:Gasoline,Gasoline,El,Hybrid'
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        }

        $model = Models::find($id);

        $model->update($request->all());

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
