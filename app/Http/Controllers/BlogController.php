<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->view('admin.blog.index',['blogs'=>$blogs,'com'=>'blog']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.blog.create',['com'=>'blog']);
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
                'title' => 'required | string | max:255',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        if($validator->fails()){
            return redirect()->route('admin.blog.create')->withErrors($validator);
        }
        else{
            Blog::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'time_up' => date("Y-m-d H:i:s")
                
            ]);
            session()->flash('msg', 'Created successfully!!');
            return redirect()->route('admin.blog');
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
        $blog = Blog::find($id);
        return response()->view('admin.blog.update',['com'=>'blog','blog'=>$blog]);
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
        if (!empty($request->input('content'))) {
            Blog::where('id',(int)$id)->update([
                'title' => $request->input('title'),
                'time_up' => date("Y-m-d H:i:s"),
                'content' => $request->input('content'),

            ]);
            session()->flash('msg', 'Update Successfully!!!!');
            return redirect()->route('admin.blog');
        }else{
            Blog::where('id',(int)$id)->update([
                'title' => $request->input('title'),
                'time_up' => date("Y-m-d H:i:s")
            ]);
            session()->flash('msg', 'Update Successfully!!!!');
            return redirect()->route('admin.blog');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();
        session()->flash('msg', 'Delete Successfully!!!!');
        return redirect()->back();
    }
}
