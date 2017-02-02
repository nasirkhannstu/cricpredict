<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Session;
use Image;
use Storage;

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

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/teams/'. $filename);
           Image::make($image)->save($location);

           $team->image = $filename;
        }

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
       
        $team = Team::find($id);
        $team->name = $request->input('name');
        $team->pla = $request->input('pla');
        $team->plb = $request->input('plb');
        $team->plc = $request->input('plc');
        $team->pld = $request->input('pld');
        $team->ple = $request->input('ple');
        $team->plf = $request->input('plf');
        $team->plg = $request->input('plg');
        $team->plh = $request->input('plh');
        $team->pli = $request->input('pli');
        $team->plj = $request->input('plj');
        $team->plk = $request->input('plk');
        $team->pll = $request->input('pll');
        $team->plm = $request->input('plm');
        $team->pln = $request->input('pln');
        $team->plo = $request->input('plo');
        $team->plp = $request->input('plp');
        $team->plq = $request->input('plq');
        $team->plr = $request->input('plr');
        $team->coach = $request->input('coach');
        $team->desa = $request->input('desa');

        if($request->hasFile('image')){
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/teams/'. $filename);
           Image::make($image)->save($location);

           $oldfilename = $team->image;
           $team->image = $filename;
           Storage::delete('teams/'.$oldfilename);
        }

        $team->save();

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
