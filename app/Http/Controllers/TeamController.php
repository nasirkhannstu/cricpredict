<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id','desc')->paginate(20);
        return view('team.index')->withTeams($teams);
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
            ));
        //Store in the database
        $team = new Team;
        $team->name = $request->name;
        $team->pla = $request->pla;
        $team->plb = $request->plb;
        $team->plc = $request->plc;
        $team->pld = $request->pld;
        $team->ple = $request->ple;
        $team->plf = $request->plf;
        $team->plg = $request->plg;
        $team->plh = $request->plh;
        $team->pli = $request->pli;
        $team->plj = $request->plj;
        $team->plk = $request->plk;
        $team->pll = $request->pll;
        $team->plm = $request->plm;
        $team->pln = $request->pln;
        $team->plo = $request->plo;
        $team->plp = $request->plp;
        $team->plq = $request->plq;
        $team->plr = $request->plr;
        $team->coach = $request->coach;
        $team->desa = $request->desa;

        $team->save();

        Session::flash('success','The Team Created successfully!');

        //redirect to another page
        return redirect()->route('team.index');
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
         $team = Team::find($id);
        return view('team.edit')->withTeam($team);
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
       
        $game = Team::find($id);
        $game->name = $request->input('name');
        $game->pla = $request->input('pla');
        $game->plb = $request->input('plb');
        $game->plc = $request->input('plc');
        $game->pld = $request->input('pld');
        $game->ple = $request->input('ple');
        $game->plf = $request->input('plf');
        $game->plg = $request->input('plg');
        $game->plh = $request->input('plh');
        $game->pli = $request->input('pli');
        $game->plj = $request->input('plj');
        $game->plk = $request->input('plk');
        $game->pll = $request->input('pll');
        $game->plm = $request->input('plm');
        $game->pln = $request->input('pln');
        $game->plo = $request->input('plo');
        $game->plp = $request->input('plp');
        $game->plq = $request->input('plq');
        $game->plr = $request->input('plr');
        $game->coach = $request->input('coach');
        $game->desa = $request->input('desa');

        $game->save();

        Session::flash('success','The Team Updated successfully!');

        //redirect to another page
        return redirect()->route('team.index');
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
