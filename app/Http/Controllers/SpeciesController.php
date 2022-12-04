<?php

namespace App\Http\Controllers;
use App\Models\Species;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Species::all();
        return response()->view('admin.species.index',['species'=>$species,'com'=>'species']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.species.create',['com'=>'species']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [ 
                'name' => 'required | string | max:255',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        if($validator->fails()){
            return redirect()->route('admin.species.create')->withErrors($validator);
        }
        else{
            Species::create([
                'species' => $request->input('name'),
                
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('admin.species');
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $species = Species::find($id);
        return response()->view('admin.species.update',['com'=>'species','species'=>$species]);
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
        Species::where('id',(int)$id)->update([
            'species' => $request->input('name')
        ]);
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('admin.species');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Species::where('id',$id)->delete();
        return redirect()->back();
    }
}
