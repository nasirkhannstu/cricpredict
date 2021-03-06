<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\Type;
use App\Stadium;
use Session;
use Image;
use Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('id','desc')->paginate(20);

        $teams = Team::all();
        $stadiums = Stadium::all();
        $types = Type::all();
        return view('game.index')->withGames($games)->withTeams($teams)->withStadiums($stadiums)->withTypes($types);
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
                'name'          => 'max:255',
                'teama_id'    => 'integer',
                'teamb_id'    => 'integer',
                'type_id'    => 'integer',
                'ampaira_id'    => 'integer',
                'city_id'    => 'integer',
                'predict_id'    => 'integer',
                'owned_id'    => 'integer',
                'image'    => 'image',
                'des'           => 'required'
            ));
        //Store in the database
        $game = new Game;
        $game->name = $request->name;
        $game->teama_id = $request->teama_id;
        $game->teamb_id = $request->teamb_id;
        $game->stadium_id = $request->stadium_id;
        $game->type_id = $request->type_id;
        $game->ampaira_id = $request->ampaira_id;
        $game->coach = $request->coach;
        $game->city_id = $request->city_id;
        $game->predict_id = $request->predict_id;
        $game->owned_id = $request->owned_id;
        $game->des = $request->des;

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/games/'. $filename);
           Image::make($image)->save($location);

           $game->image = $filename;
        }

        $game->save();

        Session::flash('success','The Game Created successfully!');

        //redirect to another page
        return redirect()->route('game.index');
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
        $game = Game::find($id);

        $teams = Team::all();
        $tms = array();
        foreach ( $teams as $team ){
            $tms[$team->id] = $team->name;
        }
        $stadiums = Stadium::all();
        $std = array();
        foreach ( $stadiums as $stadium ){
            $std[$stadium->id] = $stadium->name;
        }
        $types = Type::all();
        $typ = array();
        foreach ( $types as $type ){
            $typ[$type->id] = $type->name;
        }
        return view('game.edit')->withGame($game)->withTeams($tms)->withStadiums($std)->withTypes($typ);
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
                'name'          => 'max:255',
                'teama_id'    => 'integer',
                'teamb_id'    => 'integer',
                'stadium_id'    => 'integer',
                'type_id'    => 'integer',
                'ampaira_id'    => 'integer',
                'city_id'    => 'integer',
                'predict_id'    => 'integer',
                'owned_id'    => 'integer',
                'image'    => 'image',
                'des'           => 'required'
            ));
        //Store in the database
        $game = Game::find($id);
        $game->name = $request->input('name');
        $game->teama_id = $request->input('teama_id');
        $game->teamb_id = $request->input('teamb_id');
        $game->stadium_id = $request->input('stadium_id');
        $game->type_id = $request->input('type_id');
        $game->ampaira_id = $request->input('ampaira_id');
        $game->city_id = $request->input('city_id');
        $game->predict_id = $request->input('predict_id');
        $game->owned_id = $request->input('owned_id');
        $game->des = $request->input('des');

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/games/'. $filename);
           Image::make($image)->save($location);

           $oldfilename = $game->image;
           $game->image = $filename;
           Storage::delete('games/'.$oldfilename);
        }

        $game->save();

        Session::flash('success','The Game Updated successfully!');

        //redirect to another page
        return redirect()->route('game.index');
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
