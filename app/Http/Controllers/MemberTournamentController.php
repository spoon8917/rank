<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberTournament;
use App\Models\Tournament;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MemberTournamentController extends Controller
{
    public function create(Tournament $tournament, Member $member)
    {
        return view('member_tournaments/create')->with(['tournaments' => $tournament->get()])->with(['members' => $member->get()]); 
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $first_id = (int)$request['first'];
        $second_id = (int)$request['second'];
        $third_id = (int)$request['third'];
        $tournament_id = (int)$request['tournament'];
        $best8_ids = $request->best8;
        $best16_ids = $request->best16;
        $best32_ids = $request->best32;
        Member::where('id',$first_id)->first()->tournaments()->attach($tournament_id,['tournament_rank'=>1]);
        Member::where('id',$second_id)->first()->tournaments()->attach($tournament_id,['tournament_rank'=>2]);
        Member::where('id',$third_id)->first()->tournaments()->attach($tournament_id,['tournament_rank'=>3]);
        if($best8_ids != null){
            $best8_ids = $request->best8;
            $best8_ids = array_map('intval', $best8_ids);
            $best8=Member::whereIn('id', $best8_ids)->get();
            foreach ($best8 as $member_8){
                    $member_8->tournaments()->attach($tournament_id,['tournament_rank' => 8]);
            }
        }
        if($best16_ids != null){
            $best16_ids = $request->best16;
            $best16_ids = array_map('intval', $best16_ids);
            $best16=Member::whereIn('id', $best16_ids)->get();
            foreach ($best16 as $member_16){
                    $member_16->tournaments()->attach($tournament_id,['tournament_rank' => 16]);
            }
        }
         if($best32_ids != null){
            $best32_ids = $request->best32;
            $best32_ids = array_map('intval', $best32_ids);
            $best32=Member::whereIn('id', $best32_ids)->get();
            foreach ($best32 as $member_32){
                    $member_32->tournaments()->attach($tournament_id,['tournament_rank' => 32]);
            }
        }
        return redirect('/member_tournaments');
    }
    
    public function index()
    {
        $user = Auth::user();
        // membersテーブルから全メンバーのidとnameを取得
        $members = DB::table('members')
            ->select('members.id', 'members.name')
            ->where('user_id', $user->id)
            ->get();

        // ランキングの作成に使用する配列の作成
        $rankings = [];
        //  dd(DB::table('member_tournament')->first());
        // 全メンバーに対する繰り返し処理の実行
        foreach ($members as $member){
            $totalPoints = DB::table('member_tournament')
                // あるメンバーのIDについて、member_tournamentテーブルにそのIDが含まれているデータを全て取得する
                ->where('member_id', $member->id)
                // 上記の絞り込みによって取得されたmember_tournamentテーブルと、tournamentsテーブルを合体させる
                ->join('tournaments', 'member_tournament.tournament_id', '=', 'tournaments.id')
                // 上記のテーブル合体によって合計ポイントが計算できるようになったので、
                //  該当するメンバーが以下の順位であった場合に合計ポイント（total_points）に加算していく
                ->selectRaw("SUM(CASE 
                    WHEN member_tournament.tournament_rank = 1 THEN tournaments.first
                    WHEN member_tournament.tournament_rank = 2 THEN tournaments.second
                    WHEN member_tournament.tournament_rank = 3 THEN tournaments.third
                    WHEN member_tournament.tournament_rank = 8 THEN tournaments.best8
                    WHEN member_tournament.tournament_rank = 16 THEN tournaments.best16
                    WHEN member_tournament.tournament_rank = 32 THEN tournaments.best32
                    ELSE 0
                END) as total_points")
                ->first();
            // $rankings配列にメンバーと合計ポイントを追加（total_pointsが存在しないメンバーに関しては0を格納...「?? 0」の部分）
            $rankings[] = [
                'member' => $member,
                'totalPoints' => $totalPoints->total_points ?? 0,
            ];
            // dd($rankings);
        }

        // 合計ポイントの降順にメンバーを並び替える
        $sortedRankings = collect($rankings)->sortByDesc('totalPoints')->values()->all();
        return view('member_tournaments/index', compact('sortedRankings'));
    }
    
}
