<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberTournament;
use App\Models\Tournament;
use App\Models\Member;


class MemberTournamentController extends Controller
{
    public function create(Tournament $tournament, Member $member)
    {
        // $array=array();
        // foreach($member->where('name','川上a')->first()->tournaments()->get() as $result){
        //     dd($result->point_setting);
        //     array_push($array,$result->pivot->tournament_rank);
        // }
        // dd($array);
        // dd($member->where('name','川上a')->first()->tournaments()->get());
        return view('member_tournaments/create')->with(['tournaments' => $tournament->get()])->with(['members' => $member->get()]); 
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $first_id = (int)$request['first'];
        $second_id = (int)$request['second'];
        $tournament_id = (int)$request['tournament'];
        // dd(Member::where('id',$first_id)->first()->tournaments());
        Member::where('id',$first_id)->first()->tournaments()->attach($tournament_id,['tournament_rank'=>1]);
        Member::where('id',$second_id)->first()->tournaments()->attach($tournament_id,['tournament_rank'=>2]);
        return redirect('/');
    }
}
