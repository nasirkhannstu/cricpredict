<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Session;
use Image;
use Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::orderBy('id','desc')->paginate(20);
        return view('player.index')->withPlayers($players);
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
                'born'   => 'max:255',
                'year'   => 'max:255',
                'type'   => 'max:255',
                'batstyle'   => 'max:255',
                'bowlstyle'   => 'max:255',
                'wickets'   => 'max:255',
                'avgrun'   => 'max:255',
                'matchplayed'   => 'max:255',
                'des'   => 'required',
            ));
        //Store in the database
        $player = new Player;
        $player->name = $request->name;
        $player->born = $request->born;
        $player->year = $request->year;
        $player->type = $request->type;
        $player->batstyle = $request->batstyle;
        $player->bowlstyle = $request->bowlstyle;
        $player->wickets = $request->wickets;
        $player->avgrun = $request->avgrun;
        $player->matchplayed = $request->matchplayed;
        $player->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/players/'. $filename);
           Image::make($image)->save($location);

           $player->image = $filename;
        }
        $player->save();
        Session::flash('success','The Player Created successfully!');
        //redirect to another page
        return redirect()->route('player.index');
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
        $player = Player::find($id);
        return view('player.edit')->withPlayer($player);
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
        $this->validate($request, array(
                'name'   => 'max:255',
                'born'   => 'max:255',
                'year'   => 'max:255',
                'type'   => 'max:255',
                'batstyle'   => 'max:255',
                'bowlstyle'   => 'max:255',
                'wickets'   => 'max:255',
                'avgrun'   => 'max:255',
                'matchplayed'   => 'max:255',
                'des'   => 'required',
            ));
        //Store in the database
        $player = Player::find($id);
        $player->name = $request->name;
        $player->born = $request->born;
        $player->year = $request->year;
        $player->type = $request->type;
        $player->batstyle = $request->batstyle;
        $player->bowlstyle = $request->bowlstyle;
        $player->wickets = $request->wickets;
        $player->avgrun = $request->avgrun;
        $player->matchplayed = $request->matchplayed;
        $player->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/players/'. $filename);
           Image::make($image)->save($location);

           $oldfilename = $player->image;
           $player->image = $filename;
           Storage::delete('players/'.$oldfilename);
        }
        $player->save();
        Session::flash('success','The Player Updated successfully!');
        //redirect to another page
        return redirect()->route('player.index');
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
