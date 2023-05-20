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
   public function show(User $user, Member $member)
    {
        return view('members/member')->with(['members' => $member->get()])->with(['user' => $user->get()]);  
    }
    
   public function create(Sport $sport, Prefecture $prefecture)
    {
        return view('members/create')->with(['sports' => $sport->get()])->with(['prefectures' => $prefecture->get()]);
    }
    public function store(MemberRequest $request, Member $member)
    {
        // dd($request);
        $img_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $user_id = Auth::id();
        $input = $request['member'];
        $input = $input + ['img_path' => $img_path] + ['user_id' => $user_id];
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
    

}
