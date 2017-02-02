<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stadium;
use Session;
use Image;
use Storage;
class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiums = Stadium::orderBy('id','desc')->paginate(20);
        return view('stadium.index')->withStadiums($stadiums);
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
                'h1chase'   => 'max:255',
                'h2chase'   => 'max:255',
                'l1chase'   => 'max:255',
                'l2chase'   => 'max:255',
                'location'   => 'max:255',
                'location'   => 'max:255',
                'coord'   => 'max:255',
                'recordcap'   => 'max:255',
                'opened'   => 'max:255',
                'fieldsize'   => 'max:255',
                'totalmatch'   => 'max:255',
                'des'   => 'required',
            ));
        //Store in the database
        $stadiums = new Stadium;
        $stadiums->name = $request->name;
        $stadiums->h1chase = $request->h1chase;
        $stadiums->h2chase = $request->h2chase;
        $stadiums->l1chase = $request->l1chase;
        $stadiums->l2chase = $request->l2chase;
        $stadiums->location = $request->location;
        $stadiums->coord = $request->coord;
        $stadiums->capacity = $request->capacity;
        $stadiums->recordcap = $request->recordcap;
        $stadiums->opened = $request->opened;
        $stadiums->fieldsize = $request->fieldsize;
        $stadiums->totalmatch = $request->totalmatch;
        $stadiums->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/stadium/'. $filename);
           Image::make($image)->save($location);

           $stadiums->image = $filename;
        }
        $stadiums->save();
        Session::flash('success','The Stadiums Created successfully!');
        //redirect to another page
        return redirect()->route('stadium.index');
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
        $stadium = Stadium::find($id);
        return view('stadium.edit')->withStadium($stadium);
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
        $stadiums = Stadium::find($id);
        $stadiums->name = $request->input('name');
        $stadiums->h1chase = $request->input('h1chase');
        $stadiums->h2chase = $request->input('h2chase');
        $stadiums->l1chase = $request->input('l1chase');
        $stadiums->l2chase = $request->input('l2chase');
        $stadiums->location = $request->input('location');
        $stadiums->coord = $request->input('coord');
        $stadiums->capacity = $request->input('capacity');
        $stadiums->recordcap = $request->input('recordcap');
        $stadiums->opened = $request->input('opened');
        $stadiums->fieldsize = $request->input('fieldsize');
        $stadiums->totalmatch = $request->input('totalmatch');
        $stadiums->des = $request->input('des');

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/stadium/'. $filename);
           Image::make($image)->save($location);

           $oldfilename = $stadiums->image;
           $stadiums->image = $filename;
           Storage::delete('stadium/'.$oldfilename);
        }

        $stadiums->save();

        Session::flash('success','The Stadium Info Updated successfully!');

        //redirect to another page
        return redirect()->route('stadium.index');
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
