<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use Session;
use Image;
use Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id','desc')->paginate(20);
        return view('type.index')->withTypes($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate the data
        $this->validate($request, array(
                'name'   => 'max:255',
                'type'   => 'max:255',
                'country'   => 'max:255',
                'format'   => 'max:255',
                'firstmatch'   => 'max:255',
                'recentchamp'   => 'max:255',
                'mostrun'   => 'max:255',
                'mostwicket'   => 'max:255',
                'des'   => 'required',
            ));
        //Store in the database
        $type = new Type;
        $type->name = $request->name;
        $type->type = $request->type;
        $type->country = $request->country;
        $type->format = $request->format;
        $type->firstmatch = $request->firstmatch;
        $type->recentchamp = $request->recentchamp;
        $type->mostrun = $request->mostrun;
        $type->mostwicket = $request->mostwicket;
        $type->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/types/'. $filename);
           Image::make($image)->save($location);

           $type->image = $filename;
        }
        $type->save();
        Session::flash('success','The League Type Created successfully!');
        //redirect to another page
        return redirect()->route('type.index');
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
        $type = Type::find($id);
        return view('type.edit')->withType($type);
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
        //dd($request);
        //validate the data
        $this->validate($request, array(
                'name'   => 'max:255',
                'type'   => 'max:255',
                'country'   => 'max:255',
                'format'   => 'max:255',
                'firstmatch'   => 'max:255',
                'recentchamp'   => 'max:255',
                'mostrun'   => 'max:255',
                'mostwicket'   => 'max:255',
                'des'   => 'required',
            ));
        //Store in the database
        $type = Type::find($id);
        $type->name = $request->name;
        $type->type = $request->type;
        $type->country = $request->country;
        $type->format = $request->format;
        $type->firstmatch = $request->firstmatch;
        $type->recentchamp = $request->recentchamp;
        $type->mostrun = $request->mostrun;
        $type->mostwicket = $request->mostwicket;
        $type->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/types/'. $filename);
           Image::make($image)->save($location);

           $oldfilename = $type->image;
           $type->image = $filename;
           Storage::delete('types/'.$oldfilename);
        }
        $type->save();


        Session::flash('success','The League Type Updated successfully!');
        //redirect to another page
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
