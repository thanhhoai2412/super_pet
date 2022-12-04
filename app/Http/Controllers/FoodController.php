<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Food;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return response()->view('admin.food.index',['foods'=>$foods,'com'=>'food']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.food.create',['com'=>'food']);
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
                'detail' => 'required | string | max:255',
                'price' => 'required | int | min:1 | max:255',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        if($validator->fails()){
            return redirect()->route('admin.food.create')->withErrors($validator);
        }
        else{
            Food::create([
                'name' => $request->input('name'),
                'detail' => $request->input('detail'),
                'price' => $request->input('price'),
                
            ]);
            session()->flash('msg', 'Created successfully!!');
            return redirect()->route('admin.food');
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
        $food = Food::find($id);
        return response()->view('admin.food.update',['com'=>'food','food'=>$food]);
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
        Food::where('id',(int)$id)->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price')
        ]);
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('admin.food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::where('id',$id)->delete();
        session()->flash('msg', 'Delete Successfully!!!!');
        return redirect()->back();
    }
}
