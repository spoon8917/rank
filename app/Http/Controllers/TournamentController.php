<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\Member;

class TournamentController extends Controller
{
    public function create(Member $member)
    {
        return view('tournaments/create')->with(['members' => $member->get()]);  
    }
    
     public function store(Request $request, Tournament $tournament)
    {
        // dd($request);
        // dd($request['first']);
        $first_point = (int)$request['first'];
        $second_point = (int)$request['second'];
        $third_point = (int)$request['third'];
        $best8_point = (int)$request['best8'];
        $best16_point = (int)$request['best16'];
        $best32_point = (int)$request['best32'];
        $setting = array(
        'first' => $first_point,
        'second' => $second_point,
        'third' => $third_point,
        'best8' => $best8_point,
        'best16' => $best16_point,
        'best32' => $best32_point
        );
        $jsonData = json_encode($setting);
        // dd($setting);
        // dd($jsonData);
        // dd($setting['first']);//$jsonData['first']は無理
        $name=$request['name'];
        $input_tournament = ['name' => $name] + ['point_setting' =>  $jsonData];
        // dd($input);
        $tournament->fill($input_tournament)->save();
        return redirect('/tournaments');
    }
    
    public function index(Tournament $tournament)
    {
        return view('tournaments/index')->with(['tournaments' => $tournament->get()]);  
    }
}
