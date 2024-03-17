<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Vote;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($unique_identifier)
    {
        $enquete = Enquete::where('unique_identifier', $unique_identifier)->firstOrFail();
        return view('votes.create', compact('enquete'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO：ここあきらかに無駄な実装なきがするのでリファクタリングの余地有り
        $enqueteId = Enquete::where('id', $request->enquete_id)->firstOrFail();

        // バリデーションなしでリクエストから直接データを取得
        $data = $request->only([
            'enquete_id',
            'name',
            'location',
            'reservation_time',
            'cuisine_type',
            'ambiance'
        ]);

        // createメソッドを使用してVoteモデルの新しいインスタンスを作成し、データベースに保存
        $vote = Vote::create($data);

        return redirect()->route('enquetes.index', ['unique_identifier' => $enqueteId->unique_identifier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vote = Vote::where('id', $id)->firstOrFail();

        // Voteモデルから関連するEnqueteモデルにアクセス
        $enquete = $vote->enquetes; // enquete()リレーションを利用
        // dd($enquete);
        return view('votes.edit', compact('vote', 'enquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $unique_identifier)
    {
        $vote = Vote::where('id', $request->id)->firstOrFail();
        $vote->name = $request->name;
        $vote->location = $request->location;
        $vote->reservation_time = $request->reservation_time;
        $vote->cuisine_type = $request->cuisine_type;
        $vote->ambiance = $request->ambiance;
        $vote->save();

        return redirect()->route('enquetes.index', $unique_identifier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
