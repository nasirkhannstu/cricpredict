<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use Session;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('game.index');
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
                'stadium_id'    => 'integer',
                'type_id'    => 'integer',
                'ampaira_id'    => 'integer',
                'coach'    => 'integer',
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
        //
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
