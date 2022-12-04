<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Species;
use App\Models\Petdetail;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Pets = Pet::All();
        return response()->view('admin.pet.index',['Pets'=>$Pets,'com'=>'pet']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::all();
        return response()->view('admin.pet.create',['com'=>'pet','species'=>$species]);
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
                'species' => 'required | string | max:255',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        if($validator->fails()){
            return redirect()->route('admin.pet.create')->withErrors($validator);
        }
        else{
            $pet = Pet::create([
                'pet' => $request->input('name'),
                'id_species' => $request->input('species'),
                
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('admin.pet');
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
    public function edit($id,$id_species)
    {
        $speciess = Species::all();
        $species = Species::where('id','=',$id_species)->first();
        $pet = Pet::find($id);
        return response()->view('admin.pet.update',['com'=>'pet','pet'=>$pet,'speciess'=>$speciess,'species'=>$species]);
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
        Pet::where('id',(int)$id)->update([
            'pet' => $request->input('name'),
            'id_species' => $request->input('species')
        ]);
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('admin.pet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petdetail::where('id_pet',$id)->delete();
        Pet::where('id',$id)->delete();
        return redirect()->back();
    }
}
