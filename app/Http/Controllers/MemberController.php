<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sport;
use App\Models\Prefecture;
use App\Http\Requests\MemberRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth; 

class MemberController extends Controller
{
   public function index(Member $member)
    {
        return view('members/index')->with(['members' => $member->orderBy('rank')->get()]);  
    }
    
   public function create(Sport $sport, Prefecture $prefecture)
    {
        return view('members/create')->with(['sports' => $sport->get()])->with(['prefectures' => $prefecture->get()]);
    }
    
    public function store(MemberRequest $request, Member $member)
    {
        $user_id = Auth::id();
        $input = ['user_id' => $user_id] + $request['member'];
        if($request->file('image')){
            $img_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input = $input + ['img_path' => $img_path]; 
        }
        $member->fill($input)->save();
        return redirect('/members');
    }
    public function edit(Member $member){
        return view('members/edit')->with(['member' => $member]);
    }
    
    public function update(MemberRequest $request, Member $member)
    {
        // dd($request);
        $img_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $user_id = Auth::id();
        $input_member = $request['member'];
        $input_member = $input_member + ['img_path' => $img_path] + ['user_id' => $user_id];
        // dd($input_member);
        $member->fill($input_member)->save();
        return redirect('/members');
    }
    public function delete(Member $member)
    {
        $member->delete();
        return redirect('/members');
    }
    
    public function match(Member $member)
    {
        return view('members/match')->with(['members' => $member->get()]);
    }
    public function update_rank(Request $request, Member $member)
    {
    $winner_id = (int)$request['winner'];
    $loser_id = (int)$request['loser'];

    $winner = Member::find($winner_id);
    $loser = Member::find($loser_id);

    if ($winner->rank > $loser->rank) {
        // 勝者と敗者のrankを設定
        $new_rank_winner = $loser->rank;
        $new_rank_loser = $loser->rank + 1;

        // 勝者と敗者の間にいるメンバーのrankを1つ下げる（+1する）
        Member::where('rank', '>=', $loser->rank)
            ->where('rank', '<', $winner->rank)
            ->increment('rank');

        // 勝者のrankを更新
        $winner->rank = $new_rank_winner;
        $winner->save();

        // 敗者のrankを更新
        $loser->rank = $new_rank_loser;
        $loser->save();
        }

    return redirect('/members');
    }
}
