<?php

namespace App\Http\Controllers;

use App\Models\Deelnemers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Teams;

use App\Traits\traitViews;

class TeamsController extends Controller
{
    use traitViews;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('front.mijn-account.teams.index',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.mijn-account.teams.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->goed_doel == 0) {
            return redirect()->back()->with('status','no_doel')->withInput();
        }
        $arr_team               = new Teams();
        $arr_team->naam         = $request->naam;
        $arr_team->goed_doel    = $request->goed_doel;
        $arr_team->user_id      = Auth::user()->id;
        $arr_team->save();

        return redirect(route('mijn-account.teams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $arr_team = Teams::find($request->id);

        return view('front.mijn-account.teams.edit',$this->getTeamledenData($arr_team,false,false,false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teams $teams)
    {
        $arr_team               = Teams::find($request->id);
        $arr_team->naam         = $request->naam;
        $arr_team->goed_doel    = $request->goed_doel;
        $arr_team->user_id      = Auth::user()->id;
        $arr_team->save();

        return redirect(route('mijn-account.teams'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arr_team   = Teams::find($id);
        $user       = Auth::user();

        if($arr_team->user_id == $user->id) {
            if(count($arr_team->relDeelnemers)>0) {
                return redirect()->back()->with('status','teamnotempty');
            }
            else {
                $arr_team->delete();
            }
        }

        return redirect(route('mijn-account.teams'));
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function addTeamLid(Request $request)
    {
        $arr_team = Teams::find($request->teamid);

        //Check if team has not more then 3 members
        if(count($arr_team->relDeelnemers)<4) {
            isset($request->referentienr) ? $referentienr = $request->referentienr : $referentienr = $request->deelnemer;
            $arr_deelnemer = Deelnemers::where('referentienr',$referentienr)->first();
            if(isset($arr_deelnemer)){
                if($arr_deelnemer->team_id == null && $arr_deelnemer->hasPaid() == true) {
                    Deelnemers::where('referentienr', $referentienr)->update(['team_id' => $arr_team->id]);
                    $arr_team->refresh();
                    return view('front.mijn-account.teams.teamleden', $this->getTeamledenData($arr_team))->render();
                }
                elseif($arr_deelnemer->hasPaid() == false) {
                    return view('front.mijn-account.teams.teamleden',$this->getTeamledenData($arr_team,false,false, false,true))->render();
                }
                else {
                    return view('front.mijn-account.teams.teamleden',$this->getTeamledenData($arr_team,true,false, false,false))->render();
                }
            }
            else {
                return view('front.mijn-account.teams.teamleden',$this->getTeamledenData($arr_team,false,false, true,false ))->render();
            }
        }
        else {
            return view('front.mijn-account.teams.teamleden',$this->getTeamledenData($arr_team,false,true, false,false))->render();
        }

        return view('front.mijn-account.teams.teamleden',['arr_team' => $arr_team])->render();
    }

    public function removeTeamLid(Request $request)
    {
        $arr_team = Teams::find($request->teamid);
        Deelnemers::where('referentienr',$request->referentienr)->update(['team_id' => null]);
        $arr_team->refresh();

        return view('front.mijn-account.teams.teamleden',$this->getTeamledenData($arr_team,false,false,false))->render();
    }
}
